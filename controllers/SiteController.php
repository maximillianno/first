<?php
/**
 * Created by PhpStorm.
 * User: maxus
 * Date: 26.06.2017
 * Time: 8:18
 */
class SiteController{

    public function actionIndex(){

        require_once ROOT.'/views/site/index.php';
        return true;
    }
}