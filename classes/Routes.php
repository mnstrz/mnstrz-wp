<?php

namespace mnstrz\app;

class Routes
{
	protected $path, $class, $function, $title;

	public function __constructor()
	{

	}

	public static function web($path,$class_function=[])
	{
		$class = new self;

		$title = str_replace(['-', '_'], ' ', $path);
		$title = strtolower($title);

		$class->path = $path;
		$class->class = $class_function[0];
		$class->function = $class_function[1];
		$class->title = ucwords($title);
		$class->addRoutes();
		return $class;
	}

	public static function admin($path,$class_function=[])
	{
		$class = new self;

		$class->path = $path;
		$class->class = $class_function[0];
		$class->function = $class_function[1];
		$title = str_replace(['-', '_'], ' ', $path);
		$title = strtolower($title);
		$class->title = ucwords($title);
		return $class;
	}

	protected function addRoutes()
	{
		add_action('init',[$this,'add_endpoint']);
		add_filter('query_vars',[$this,'add_query_vars'],0);
		add_action('template_redirect',[$this->class,$this->function]);
		add_action('after_switch_theme',[$this,'add_flush_rewrite_rules']);
	}

	public function add_endpoint() {
		add_rewrite_rule('^'.$this->path.'/?$', 'index.php?'.$this->path.'=true', 'top');
	}

	public function add_query_vars() {
		$vars[] = $this->path;
		return $vars;
	}

	public function add_flush_rewrite_rules() {
	    add_custom_rewrite_rules();
	    flush_rewrite_rules();
	}

	public function addMenu($menu_name='',$title='',$icon='',$order=null)
	{
		$title = (!$title) ? $this->title : $title;
		$menu_name = (!$menu_name) ? $this->path : $menu_name;
		add_menu_page(
			$menu_name,
			$title,
			'manage_options',
			$this->path,
			[$this->class,$this->function],
			$icon,
			$order
		);
		return $this;
	}

	public function addSubmenu($parent='',$menu_name='',$title='',$icon='',$order=null)
	{
		$title = (!$title) ? $this->title : $title;
		$menu_name = (!$menu_name) ? $this->path : $menu_name;

		add_submenu_page(
			$parent,
			$menu_name,
			$title,
			'manage_options',
			$this->path,
			[$this->class,$this->function],
			$icon,
			$order
		);
		return $this;
	}
}