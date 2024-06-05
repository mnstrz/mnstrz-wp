<?php

namespace mnstrz\app;

class Db
{
	public $name, $installed_version, $version;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function install()
	{

	}

	public function update()
	{
		
	}

	public function do_install()
	{
		register_activation_hook(__FILE__,[$this,'install']);
	}

	public function do_update()
	{
		$plugin_data = get_plugin_data(  __DIR__ .'/../'.$this->name.".php");
		
		$this->version = $plugin_data['Version'];

		if(!get_option($this->name."_version"))
		{
			update_option($this->name."_version",$this->version);
		}

		$this->installed_version = get_option($this->name."_version");

		$this->update();

		update_option($this->name."_version",$this->version);
	}
}