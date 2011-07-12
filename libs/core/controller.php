<?php

abstract class Controller {

	public $tpl;
	protected $layout = 'layout';
	protected $theme = '2011';
	protected $section;

	public function __construct() {
		$this->tpl = new Smarty();

		$this->section = isset($_GET['sectoin']) ? $_GET['sectoin'] : 'default';

		#$this->tpl->debugging = true;
		#$this->tpl->caching = true;
		#$this->tpl->cache_lifetime = 120;
	}

	/**
	 * Link parser
	 * @param type $view - pohled
	 * @param type $section - sekce
	 * @param type $absolute - absolutni odkat - TODO
	 * @return type 
	 */
	public function link($view, $section, $absolute = false) {
		$link = array(Enviroment::VIEW => $view, Enviroment::SECTION => $section);

		if (Enviroment::$rewrite) {
			$link = implode('/', $link);
		} else {
			$link = '?' . http_build_query($link);
		}

		return $absolute === true ? Enviroment::$serverName . $link : '/' . $link;
	}

	/**
	 * Vyber podsablony a rendrovani webu 
	 */
	public function render() {
		$this->tpl->assign('contentSection', DIR_TEMPLATE . '/' . $this->theme . '/' . Enviroment::$view . '/' . $this->section . '.tpl');
		$this->tpl->display(DIR_TEMPLATE . '/' . $this->theme . '/' . $this->layout . '.tpl');
	}

	/**
	 * Nastavi hlavni layout
	 * @param type $name 
	 */
	public function setLayout($name) {
		$this->layout = $name;
	}

	/**
	 * Nastavi tema
	 * @param type $name 
	 */
	public function setTheme($name) {
		$this->theme = $name;
	}

}
