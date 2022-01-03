<?php


namespace app\widgets\menu;


use clock\App;
use clock\Cache;

class Menu
{
    protected $tpl;
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'clock_menu';
    protected $attr = [];
    //in admin
    protected $prepend = '';

    public function __construct($options = [])
    {
        $this->tpl = __DIR__.'/menu_tpl/menu.php';
        $this->setOptions($options);
        $this->run();
    }
    public function setOptions($options)
    {
        foreach ($options as $k => $v){
            if (property_exists($this,$k)){
                $this->$k = $v;
            }
        }
    }
    public function run()
    {
        $cache = Cache::instance();
        $this->menuHtml = $cache->getCache($this->cacheKey);
         if (!$this->menuHtml){
             $this->data = App::$app->getProperty('cats');
             if (!$this->data){
                 $this->data = \R::getAssoc("SELECT * FROM {$this->table}");
             }
             $this->tree = $this->getTree();
             $this->menuHtml = $this->getMenuHtml($this->tree);
             if($this->cache){
                 $cache->setCache($this->cacheKey,$this->menuHtml,$this->cache);
             }
         }
        return $this->output();

    }
    public function output(){
        $attr = '';
        if (!empty($this->attr)){
            foreach ($this->attr as $key => $value) {
                $attr .= " $key = '$value' ";
            }
        }

        echo "<{$this->container} class = '{$this->class}' $attr >";
        echo $this->prepend;
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }
    protected function getTree(){
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node){
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }
            else{
                $data[$node['parent_id']]['child'][$id] = &$node;
            }
        }
        return $tree;

    }
    protected function getMenuHtml($tree,$tab = ''){
        $str  = '';
        foreach ($tree as $id => $category) {
            $str.= $this->catToTemplate($category,$tab,$id);
        }
        return $str;
    }
    protected function catToTemplate($category,$tab,$id){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}