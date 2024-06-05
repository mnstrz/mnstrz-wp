<?php

namespace mnstrz\app;

class Controller
{
	public static function view($filename,$data=[])
	{
		extract($data);
		require_once __DIR__."/../views/$filename.php";
	}
}