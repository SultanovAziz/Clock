<?php


namespace clock\base;


use clock\Db;

abstract class Model
{
    public $attribute = [];
    public $errors = [];
    public $route = [];

    public function __construct(){
        Db::instance();
    }

}