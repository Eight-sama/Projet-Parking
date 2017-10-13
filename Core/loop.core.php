<?php

namespace Core;

class Loop{
    public function e_foreach($v1,$v2, $object){
        foreach($v1 as $v2){
            return $object;
        }
    }
    public function e_if($condition, $else, $if){
        if($condition){
            return $if;
        }
        else{
            return $else;
        }
    }
    public function e_while($condition, $object){
        while($condition){
            return $object;
        }
    }
}
