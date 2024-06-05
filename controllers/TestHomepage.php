<?php

namespace mnstrz\controllers;
use mnstrz\app\Controller;

class TestHomepage
{
	public static function index()
	{
		global $wp_query;
		if (isset($wp_query->query_vars['mnstrz-test'])) {

			ob_start();
        	get_header();

			Controller::view('index',['name'=>'John']);

			get_footer();
	        $output = ob_get_clean();
	        echo $output;
	        exit;
		}
	}

	public function add_flush_rewrite_rules() {
	    add_custom_rewrite_rules();
	    flush_rewrite_rules();
	}

	public static function settings()
	{
		Controller::view('setting',['name'=>'John']);
	}
}