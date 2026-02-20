<?php
/**
 * Standalone Parsedown Test Script
 * 
 * Run this directly from command line:
 *   php test-parsedown.php
 * 
 * Or access it via browser:
 *   http://localhost/parsedown-party/test-parsedown.php
 */

require_once __DIR__ . '/vendor/autoload.php';

// Read the test markdown file
$markdown = file_get_contents(__DIR__ . '/test-sample.md');

// Initialize Parsedown Extra
$parsedown = new ParsedownExtra();

// Parse the markdown
$html = $parsedown->text($markdown);

// Output as HTML page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parsedown Test Results</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            color: #333;
        }
        h1, h2, h3, h4, h5, h6 {
            margin-top: 24px;
            margin-bottom: 16px;
            font-weight: 600;
            line-height: 1.25;
        }
        h1 { font-size: 2em; border-bottom: 1px solid #eaecef; padding-bottom: 0.3em; }
        h2 { font-size: 1.5em; border-bottom: 1px solid #eaecef; padding-bottom: 0.3em; }
        h3 { font-size: 1.25em; }
        h4 { font-size: 1em; }
        h5 { font-size: 0.875em; }
        h6 { font-size: 0.85em; color: #6a737d; }
        code {
            background-color: rgba(27, 31, 35, 0.05);
            border-radius: 3px;
            padding: 0.2em 0.4em;
            font-family: "SFMono-Regular", Consolas, "Liberation Mono", Menlo, monospace;
            font-size: 85%;
        }
        pre {
            background-color: #f6f8fa;
            border-radius: 3px;
            padding: 16px;
            overflow: auto;
            line-height: 1.45;
        }
        pre code {
            background-color: transparent;
            padding: 0;
            font-size: 100%;
        }
        blockquote {
            border-left: 4px solid #dfe2e5;
            padding: 0 1em;
            color: #6a737d;
            margin: 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 16px 0;
        }
        table th, table td {
            border: 1px solid #dfe2e5;
            padding: 6px 13px;
        }
        table th {
            background-color: #f6f8fa;
            font-weight: 600;
        }
        table tr:nth-child(2n) {
            background-color: #f6f8fa;
        }
        hr {
            border: 0;
            border-top: 2px solid #eaecef;
            margin: 24px 0;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        a {
            color: #0366d6;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .test-info {
            background: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 30px;
        }
        .test-info h2 {
            margin-top: 0;
            border-bottom: none;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="test-info">
        <h2>✓ Parsedown Test</h2>
        <p>This page shows the parsed HTML output from <code>test-sample.md</code> using ParsedownExtra.</p>
        <p>If you see properly formatted content below (not raw markdown), then Parsedown is working correctly.</p>
    </div>

    <?php echo $html; ?>

</body>
</html>
