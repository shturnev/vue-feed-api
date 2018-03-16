<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 16.03.2018
 * Time: 12:19
 */

namespace classes\getters;


trait MainGet
{
    public function get($array)
    {
        if(!$array['m']){
            throw new \Exception("Invalid parametr `m`");}

        $m = "m_".$array['m'];
        return $this->$m($array);
    }

}