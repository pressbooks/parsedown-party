<?php

namespace Tests;

use ParsedownParty\Plugin;

/**
 * Test Plugin class
 *
 * @group parsedown-party
 */
class PluginTest extends \WP_UnitTestCase
{
    protected $plugin;

    protected function setUp(): void
    {
        parent::setUp();

        // Initialize the plugin
        $this->plugin = Plugin::init();
    }

    public function test_plugin_initialization()
    {
        $this->assertInstanceOf(Plugin::class, $this->plugin);
    }

    public function test_parsedown_autoenable_filter_defaults_to_false()
    {
        $result = apply_filters('parsedownparty_autoenable', false);
        $this->assertFalse($result);
    }

    public function test_parsedown_autoenable_filter_can_be_enabled()
    {
        add_filter('parsedownparty_autoenable', '__return_true');
        $result = apply_filters('parsedownparty_autoenable', false);
        $this->assertTrue($result);
        remove_filter('parsedownparty_autoenable', '__return_true');
    }

    public function test_use_markdown_for_post_returns_false_for_nonexistent_post()
    {
        $result = $this->plugin->useMarkdownForPost(null);
        $this->assertFalse($result);
    }

    public function test_use_markdown_meta_can_be_set()
    {
        $post_id = $this->factory->post->create([
            'post_title' => 'Test Post',
            'post_content' => '# Markdown Header',
        ]);

        update_post_meta($post_id, Plugin::METAKEY, 1);

        $post = get_post($post_id);
        $result = $this->plugin->useMarkdownForPost($post);

        $this->assertTrue($result);
    }

    public function test_parsedown_converts_markdown_to_html()
    {
        $post_id = $this->factory->post->create([
            'post_title' => 'Markdown Post',
            'post_content' => '# Test Header',
        ]);

        update_post_meta($post_id, Plugin::METAKEY, 1);

        global $post;
        $post = get_post($post_id);
        setup_postdata($post);

        $content = $this->plugin->parseTheContent('# Test Header');

        $this->assertStringContainsString('<h1>Test Header</h1>', $content);

        wp_reset_postdata();
    }

    public function test_html_to_markdown_conversion()
    {
        // Create a test converter instance via reflection since it's private
        $reflection = new \ReflectionClass($this->plugin);
        $property = $reflection->getProperty('htmlConverter');
        $property->setAccessible(true);
        $converter = $property->getValue($this->plugin);

        $html = '<h1>Test Header</h1>';
        $markdown = $converter->convert($html);

        $this->assertStringContainsString('# Test Header', $markdown);
    }

    public function test_editor_settings_modified_when_markdown_enabled()
    {
        $post_id = $this->factory->post->create([
            'post_title' => 'Markdown Post',
            'post_content' => '# Test',
        ]);

        update_post_meta($post_id, Plugin::METAKEY, 1);

        global $post, $pagenow;
        $post = get_post($post_id);
        $pagenow = 'post.php';

        $settings = [
            'wpautop' => true,
            'media_buttons' => true,
            'tinymce' => true,
            'quicktags' => true,
        ];

        $modified = $this->plugin->parseEditorSettings($settings);

        $this->assertFalse($modified['wpautop']);
        $this->assertFalse($modified['media_buttons']);
        $this->assertFalse($modified['tinymce']);
        $this->assertFalse($modified['quicktags']);

        wp_reset_postdata();
    }

    public function test_editor_settings_unchanged_when_markdown_disabled()
    {
        $post_id = $this->factory->post->create([
            'post_title' => 'Regular Post',
            'post_content' => 'Regular content',
        ]);

        update_post_meta($post_id, Plugin::METAKEY, 0);

        global $post, $pagenow;
        $post = get_post($post_id);
        $pagenow = 'post.php';

        $settings = [
            'wpautop' => true,
            'media_buttons' => true,
            'tinymce' => true,
            'quicktags' => true,
        ];

        $modified = $this->plugin->parseEditorSettings($settings);

        $this->assertTrue($modified['wpautop']);
        $this->assertTrue($modified['media_buttons']);
        $this->assertTrue($modified['tinymce']);
        $this->assertTrue($modified['quicktags']);

        wp_reset_postdata();
    }
}
