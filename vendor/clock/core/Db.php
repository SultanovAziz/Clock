<?php


namespace clock;


class Db
{
    use TSingeltone;

    protected function __construct(){
        $db = require_once CONF .'/config_db.php';
        class_alias('\RedBeanPHP\R','\R');
        \R::setup($db['dns'],$db['user'],$db['password']);
        
        if (!\R::testConnection()){
            throw new \Exception("База данных не была подключенна",500);
        }

        if (DEBUG){
            \R::freeze(true);
        }
    }
}