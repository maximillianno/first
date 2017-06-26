<?php
/**
 * Created by PhpStorm.
 * User: maxus
 * Date: 26.06.2017
 * Time: 11:00
 */
class ProductController{
    public function actionView($id){

        require_once ROOT.'/views/product/view.php';
        return true;
    }
}