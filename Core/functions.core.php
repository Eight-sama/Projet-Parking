<?php
    function str_sub($contenu, $nb = 200)
    {
        if(strlen($contenu)>200)
        {
            return substr($contenu,0,200)."...";
        }
            
        
        return $contenu;
    }
