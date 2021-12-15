<?php


namespace app\controllers;


class CartController extends AppController
{

    public function addAction(){
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $quantity = !empty(($_GET['quantity'])) ? (int)$_GET['quantity'] : null;
        $mod_id = !empty($_GET['mod']) ? (int)$_GET['mod'] : null;
        $mod = null;
        if ($id){
            $product = \R::findOne('product','id = ?',[$id]);
            if (!$product){
                return false;
            }
            if ($mod_id){
                $mod = \R::findOne('modification','id = ? AND product_id = ?' ,[$mod_id,$id]);
            }
            debug($mod);
        }
        die();
    }
}