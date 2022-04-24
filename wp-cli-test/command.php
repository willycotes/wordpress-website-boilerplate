<?php


require_once __DIR__ . '/vendor/autoload.php';

use WP_CLI\CLITest\Test;

$instance = new Test();

WP_CLI::add_command( 'test', $instance );