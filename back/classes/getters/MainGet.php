<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 21.03.2018
 * Time: 17:07
 */

namespace classes\getters;


trait MainGet
{
    public function get(array $array)
    {
        if(!is_numeric($array['m'])){
            throw new \Exception("Не корректный параметр `m`");}


        $m = "m_".$array['m'];
        return $this->$m($array);
    }
}