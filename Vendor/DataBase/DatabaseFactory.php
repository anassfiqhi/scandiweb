<?php

namespace Vendor\DataBase;

use Vendor\Config\DotEnv;

class DatabaseFactory {
    
	protected static $instance;
	protected $DB_HOST;
	protected $DB_PORT;
	protected $DB_NAME;
	protected $DB_USER;
	protected $DB_PASS;

	protected function __construct() {}

	public static function getInstance() {

		if(empty(self::$instance)) {

			(new DotEnv(__DIR__ . '/../../.env'))->load();
			$DB_HOST = DotEnv::Env('DB_HOST');
			$DB_PORT = DotEnv::Env('DB_PORT');
			$DB_NAME = DotEnv::Env('DB_NAME');
			$DB_USER = DotEnv::Env('DB_USER');
			$DB_PASS = DotEnv::Env('DB_PASS');

			try {
				self::$instance = new \PDO("mysql:host=".$DB_HOST.';port='.$DB_PORT.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
				self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_SILENT);  
				self::$instance->query('SET NAMES utf8');
				self::$instance->query('SET CHARACTER SET utf8');

			} catch(\PDOException $error) {
				echo $error->getMessage();
			}

		}

		return self::$instance;
	}

	public static function setCharsetEncoding() {
		if (self::$instance == null) {
			self::getInstance();
		}

		self::$instance->exec(
			"SET NAMES 'utf8';
			SET character_set_connection=utf8;
			SET character_set_client=utf8;
			SET character_set_results=utf8");
	}
}