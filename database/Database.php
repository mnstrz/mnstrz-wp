<?php

namespace mnstrz\database;
use mnstrz\app\Db;

class Database extends Db
{

	public function install()
	{
		// do some query

		/**
		 * 
		 * 
		$charset_collate = $wpdb->get_charset_collate();
		$tablename = $wpdb->prefix . 'mnstrz';
		$sql = "CREATE TABLE " . $tablename . " (
					  `id` bigint(20) NOT NULL AUTO_INCREMENT,
					  `name` varchar(255) DEFAULT NULL,
					  PRIMARY KEY (`id`)
					) $charset_collate;
				";
		if ($wpdb->get_var("SHOW TABLES LIKE '$tablename'") != $tablename) {
		    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		    dbDelta($sql);
		}
		* 
		* */
	}

	public function update()
	{
		global $wpdb;

		if($this->installed_version < '1.0.0')
		{
			// do some query

			/**
			 * 
			 * 
			$charset_collate = $wpdb->get_charset_collate();
			$tablename = $wpdb->prefix . 'mnstrz';
			$sql = "CREATE TABLE " . $tablename . " (
						  `id` bigint(20) NOT NULL AUTO_INCREMENT,
						  `name` varchar(255) DEFAULT NULL,
						  PRIMARY KEY (`id`)
						) $charset_collate;
					";
			if ($wpdb->get_var("SHOW TABLES LIKE '$tablename'") != $tablename) {
			    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			    dbDelta($sql);
			}
			* 
			* */
		}
	}
}