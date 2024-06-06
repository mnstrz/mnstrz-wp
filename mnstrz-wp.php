<?php

/**
 * Plugin Name: Monsterz Wordpress Plugin
 * Description: Monsterz Wordpress Plugin Core
 * Author: Monsterz
 * Author URI: https://mnstrz.com
 * Text Domain: mnstrz-wp
 * License: GPL-2.0+
 * Version: 1.0.0
 */

$namespace = [
	'mnstrz\\app' => 'classes',
	'mnstrz\\controllers' => 'controllers',
	'mnstrz\\database' => 'database',
	'mnstrz\\ext' => 'ext'
];

spl_autoload_register(function ($class) use($namespace) {
	foreach($namespace as $namespace_name => $namespace_path)
	{
		$class = str_replace($namespace_name,$namespace_path,$class);
	}
    $class = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($class)) {
        require_once $class;
    }
});

$main = new \mnstrz\app\Main('mnstrz-wp');
$main->init();