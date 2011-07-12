<?php

class Gallery extends Controller {

	public function __construct() {
		parent::__construct();

		$this->tpl->assign('a', 'gallery');
	}

}