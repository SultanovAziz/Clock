<?php


namespace clock;


class Cache
{
    use TSingeltone;

    public function setCache($key,$data,$second = 3600){
        if($second){
            $content['data'] = $data;
            $content['end_time'] = time() + $second;
            if (file_put_contents(CACHE.'/'.md5($key).'.txt',serialize($content))){
                return true;
            }
            return false;
        }
    }

    public function getCache($key){
        $cache = CACHE.'/'.md5($key).'.txt';
        if (file_exists($cache)){
            $content = unserialize(file_get_contents($cache));
            if (time()<=$content['end_time']){
                return $content['data'];
            }
            unlink($cache);
        }
    }

    public function deleteCache($key){
        $cache = CACHE.'/'.md5($key).'.txt';
        if (file_exists($cache)){
            unlink($cache);
        }
    }

}