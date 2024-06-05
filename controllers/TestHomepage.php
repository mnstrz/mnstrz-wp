<?php

namespace mnstrz\controllers;
use mnstrz\app\Controller;

class TestHomepage
{
	public static function index()
	{

	}

	public static function settings()
	{
		Controller::view('setting',['name'=>'John']);
	}
}