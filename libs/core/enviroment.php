<?php

class Enviroment {

	const VIEW ='view';
	const SECTION ='section';
	const ACTION = 'do';
	const ACTION_PREFIX = 'action';

	static protected $theme;
	static protected $mainLayout;
	static public $view;
	static public $action;
	static public $rewrite = false;
	static public $serverName;

	static public function run() {
		self::$serverName = 'http://' . $_SERVER['SERVER_NAME']. '/';

		self::$view = isset($_GET[Enviroment::VIEW]) ? $_GET[Enviroment::VIEW] : 'home';
		self::$action = isset($_GET[Enviroment::ACTION]) ? $_GET[Enviroment::ACTION] : false;

		$view = new self::$view;
		if (self::$action !== false) {
			$actionName = Enviroment::ACTION_PREFIX . self::$action;
			$view->$actionName();
		}
		$view->render();
	}

	static public function setLayout($name) {
		self::$mainLayout = $name;
	}

	static public function setTheme($name) {
		self::$theme = $name;
	}

}