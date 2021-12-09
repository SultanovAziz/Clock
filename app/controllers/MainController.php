<?php


namespace app\controllers;


use app\widgets\currency\Currency;
use clock\App;
use clock\Cache;

class MainController extends AppController
{
    public function __construct($route)
    {

        parent::__construct($route);

    }

    public function indexAction(){
        $this->setMeta("Главная страница","Описание","Ключевики");
        $brands = \R::find('brand','LIMIT 3');
        $hits = \R::find('product',"hit = '1' AND status = '1' LIMIT 8");
        $hits = array_chunk($hits,4);
        $this->setData(compact('brands','hits'));

    }
}