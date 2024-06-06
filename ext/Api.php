<?php

namespace mnstrz\ext;

class Api
{
	public function init()
	{
		//add_action('rest_api_init','register_api');
	}

	public function authentication()
	{
		try {
			return true;
		} catch (\Exception $e) {
			return false;
		}
	}

	public function register_api()
	{
		register_rest_route( 'mnstrz/v1', 'example-api',array(
	            'methods'  => 'POST',
	            'callback' => [$this,'example'],
	            'args' => [
	            	'token' => [
						'description' => __( 'Example API'),
						'type' => 'string',
						'required' => true
					],
					'email' => [
						'name' => 'Name',
						'type'	=> 'string',
						'required' => true
					]
	            ],
	            'permission_callback' => [$this,'authentication']
	    ));
	}

	public function example()
	{

	}
}