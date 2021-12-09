<?php


namespace app\models;


use clock\App;

class Breadcrumbs
{
    public static function getBreadcrums($category_id,$name = ''){
        $cats = App::$app->getProperty('cats');
        $breadcrums_array = self::getParts($cats,$category_id);
        if ($breadcrums_array){
            $breadcrums = "<li><a href='".PATH."'>Главная</a></li>";
            foreach($breadcrums_array as $alias => $title){
                $breadcrums .= "<li><a href='".PATH."/category/{$alias}'>$title</a></li>";
            }
        }
        if ($name){
            $breadcrums .= "<li>".$name."</li>";
        }
        return $breadcrums;
    }

    public static function getParts($cats,$id){
        if (!$id) return false;
        $breadcrums = [];
        foreach ($cats as $key=>$value){
            if (isset($cats[$id])){
                $breadcrums[$cats[$id]['alias']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            }
        }
        return array_reverse($breadcrums);
    }

}