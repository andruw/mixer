<?php

define('DOCUMENT_ROOT', __DIR__);
define('DIR_LIBS', DOCUMENT_ROOT . '/libs');
define('DIR_TEMPLATE', DOCUMENT_ROOT . '/templates');

require DIR_LIBS . '/core/controller.php';
require(DIR_LIBS . '/smarty/Smarty.class.php');

require DIR_LIBS . '/core/loader.php';
require DOCUMENT_ROOT . '/controller/home.php';
require DOCUMENT_ROOT . '/controller/gallery.php';

Enviroment::run();