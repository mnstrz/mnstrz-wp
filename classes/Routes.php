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
		add_action('wp_loaded',[$this,'add_endpoint']);
		add_filter('query_vars',[$this,'add_query_vars']);
		add_action('template_redirect',[$this->class,$this->function]);
		add_action('after_switch_theme',[$this,'add_flush_rewrite_rules']);
	}

	public function add_endpoint() {
		add_rewrite_rule('^'.$this->path.'/?$', 'index.php?'.$this->path.'=true', 'top');
	}

	public function add_query_vars($vars) {
		$vars[] = $this->path;
		return $vars;
	}

	public function add_flush_rewrite_rules() {
	    add_custom_rewrite_rules();
	    flush_rewrite_rules();
	}

	public function add_menu_page($page_title='',$menu_title='',$capability='manage_options',$menu_slug='',$callback=null,$icon_url ='',$position=999)
	{
		$page_title = (!$page_title) ? $this->title : $page_title;
		$menu_title = (!$menu_title) ? $this->title : $menu_title;
		$menu_slug = (!$menu_slug) ? $this->path : $menu_slug;
		$callback = (!$callback) ? [$this->class,$this->function] : $callback;

		add_menu_page(
			$page_title,
			$menu_title,
			$capability,
			$menu_slug,
			$callback,
			$icon_url,
			$position
		);
		return $this;
	}

	public function add_submenu_page($parent='',$page_title='',$menu_title='',$capability='manage_options',$menu_slug='',$callback=null,$position=999)
	{
		$page_title = (!$page_title) ? $this->title : $page_title;
		$menu_title = (!$menu_title) ? $this->title : $menu_title;
		$menu_slug = (!$menu_slug) ? $this->path : $menu_slug;
		$callback = (!$callback) ? [$this->class,$this->function] : $callback;

		add_submenu_page(
			$parent,
			$page_title,
			$menu_title,
			$capability,
			$menu_slug,
			$callback,
			$position
		);
		return $this;
	}
}