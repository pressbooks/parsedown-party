<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$tests_dir = getenv('WP_TESTS_DIR') ?: '/tmp/wordpress-tests-lib';

require_once "{$tests_dir}/includes/functions.php";

tests_add_filter('muplugins_loaded', function () {
    require_once dirname(__DIR__) . '/parsedown-party.php';
});

require_once "{$tests_dir}/includes/bootstrap.php";
