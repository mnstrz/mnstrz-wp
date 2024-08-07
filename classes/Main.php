<?php

namespace mnstrz\app;

class Main
{
	public $name, $version, $cache;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function init()
	{
		$name = $this->name;
		add_action('plugins_loaded',function()
		{
			if ( ! function_exists( 'get_plugin_data' ) ) {
			    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			}
			$this->init_setting();
		});
	}

	public function init_setting()
	{
		$plugin_data = get_plugin_data(  __DIR__ .'/../'.$this->name.".php");
		$this->version = $plugin_data['Version'];
		$this->cache = $this->version;

		$this->provider();
		$this->controllers();
		$this->routes();
		$this->database();
		$this->ajax();
		$this->api();
		$this->styles();
		$this->scripts();
	}

	protected function routes()
	{
		if(file_exists(__DIR__."/../routes/web.php"))
		{
			require_once __DIR__."/../routes/web.php";
		}
	}

	protected function controllers()
	{
		$controllers = glob(__DIR__."/../controllers/*.php");
		foreach($controllers as $controller)
		{
			require_once $controller;
		}
	}

	protected function database()
	{
		$database = new \mnstrz\database\Database($this->name);
		$database->do_install();
		$database->do_update();
	}

	protected function styles()
	{
		/*wp_enqueue_style($this->name."-style",plugin_dir_url( __DIR__ ). 'assets/css/style.css',[],$this->cache);*/
	}

	protected function scripts()
	{
		/*wp_register_script($this->name."-scripts", plugin_dir_url( __DIR__ ).'assets/js/scripts.js',array('jquery'),$this->cache);
		wp_localize_script($this->name."-scripts",'myAjax',array('ajaxurl' => admin_url('admin-ajax.php')));
		wp_enqueue_script($this->name."-scripts");*/
	}

	protected function provider()
	{
		$api = new \mnstrz\ext\Provider();
		$api->init();
	}

	protected function ajax()
	{
		$ajax = new \mnstrz\ext\Ajax();
		$ajax->init();
	}

	protected function api()
	{
		$api = new \mnstrz\ext\Api();
		$api->init();
	}
}