<?php
/**
 * Created by PhpStorm.
 * User: maxus
 * Date: 26.06.2017
 * Time: 8:19
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT',dirname(__FILE__));

include ROOT.'/components/Router.php';
$router = new Router();
$router->Run();
