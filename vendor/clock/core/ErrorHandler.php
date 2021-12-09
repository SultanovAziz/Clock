<?php


namespace clock;


class ErrorHandler
{
    public function __construct(){
        if (DEBUG){
            error_reporting(-1);
        }
        else{
            error_reporting(0);
        }
        set_exception_handler([$this,'exeptionHandler']);
    }
    public function exeptionHandler($error){
        $this->logError($error->getMessage(),$error->getFile(),$error->getLine());
        $this->dispayError('Исключение',$error->getMessage(),$error->getFile(),$error->getLine(),$error->getCode());
    }
    public function logError($message = '',$file = '',$line = ''){
        error_log("[".date('Y-m-d H-i-s')."] Текст ошибки : {$message} | Файл : {$file} | Строка : {$line}\n=====================\n",3,ROOT.'/tmp/errors.log');
    }

    public function dispayError($throw,$message,$file,$line,$code = 404){
        if (!DEBUG and $code == 404){
            require_once WWW.'/errors/404.php';
        }
        else if (DEBUG){
            require_once WWW.'/errors/dev.php';
        }
        else{
            require_once WWW.'/errors/prod.php';
        }
        exit();
    }

}