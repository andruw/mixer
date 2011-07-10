<?php

define('DOCUMENT_ROOT', __DIR__);
define('DIR_LIBS', DOCUMENT_ROOT . '/libs');
define('DIR_TEMPLATE', DOCUMENT_ROOT . '/templates');

require(DIR_LIBS . '/smarty/Smarty.class.php');

$smarty = new Smarty;

//$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->display(DIR_TEMPLATE . '/2011/layout.tpl');