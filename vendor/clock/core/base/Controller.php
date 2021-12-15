<?php


namespace clock\base;


abstract class Controller
{

    public $route;
    public $controller;
    public $view;
    public $model;
    public $layout;
    public $prefix;
    public $meta = ['title' => '','desc' => '','keywords' => ''];
    public $data;

    public function __construct($route = []){
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
        $this->model = $route['action'];
    }

    public function setData($data){
        $this->data  = $data;
    }

    public function getView(){
        $view = new View($this->route,$this->meta);
        $view->setLayout($this->layout);
        $view->render($this->data);
    }

    public function setMeta($title = '',$desc = '',$keyword = ''){
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keyword;
    }

    public function isAjax(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest";
    }

    public function loadView($view,$vars = []){
        extract($vars);
        require_once APP."/views/{$this->prefix}{$this->controller}/{$view}.php";
        die();
    }
}