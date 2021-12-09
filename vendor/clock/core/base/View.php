<?php


namespace clock\base;


class View
{

    public $route;
    public $controller;
    public $model;
    public $view;
    public $layout;
    public $prefix;
    public $meta = ['title' => '','desc' => '','keywords' => ''];
    
    public function __construct($route= [],$meta)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->model = $route['action'];
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
    }

    public function  setLayout($layout = ''){
        if ($layout === false){
            $this->layout = false;
        }
        else {
            $this->layout = $layout ?: LAYOUT;
        }
    }
    public function render($data){
        if (!empty($data)) extract($data);
        $view = APP.'/views/'.$this->prefix.$this->controller.'/'.$this->view.'.php';
        if (file_exists($view)){
            ob_start();
            require_once $view;
            $content = ob_get_clean();
        }
        else{
            throw new \Exception('Файл был не найден',404);
        }
        if ($this->layout !== false){
            $layout  = APP.'/views/layout/'.$this->layout.'.php';
            if (file_exists($layout)){
                require_once $layout;
            }
            else{
                throw new \Exception("Файл был не найден",404);
            }
        }
        else{
            throw new \Exception('Файл был не найден',404);
        }


    }

    public function getMeta(){
        $output = "<title>". $this->meta['title']."</title>".PHP_EOL;
        $output .= '<meta name="description"  content="'.$this->meta["desc"].'">'.PHP_EOL;
        $output .= '<meta name="keywords"  content="'.$this->meta["keywords"].'">'.PHP_EOL;
        return $output;
    }
}