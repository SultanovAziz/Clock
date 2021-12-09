<?php


namespace app\controllers;


class CurrencyController extends AppController
{

    public function changeAction()
    {
        $currency = empty($_GET['curr']) ? null : $_GET['curr'];
        if($currency){
            $curr = \R::findOne('currency','code = ?',[$currency]);
            if (!empty($curr)){
                setcookie("currency",$currency,time()+3600*24*7,'/');
            }
        }
        redirect();
    }

}