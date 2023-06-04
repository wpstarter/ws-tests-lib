<?php
/**
 * Installs WordPress for running the tests and loads WordPress and the test libraries
 */
require_once __DIR__.'/functions.php';
if(!$config_file_path=wp_testbench_env('WP_TESTBENCH_CONFIG')){
    $config_file_path =  __DIR__.'/../wp-tests-config.php';
}
$config_file_path=wp_testbench_path($config_file_path);


if ( ! is_readable( $config_file_path ) ) {
    echo "\033[31mError: [$config_file_path] is missing!\033[0m".PHP_EOL;
    echo "Please use wp-tests-config-sample.php to create a config file." . PHP_EOL;
    exit(1);
}

require_once $config_file_path;

// Load WordPress.
if(!defined('ABSPATH')){
    echo 'Error: no ABSPATH';
    exit(1);
}
if(!isset($_SERVER['HTTP_HOST'])){
    $_SERVER['HTTP_HOST']='example.org';
}

require_once ABSPATH . 'wp-settings.php';


