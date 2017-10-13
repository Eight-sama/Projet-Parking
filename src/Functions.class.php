<?php
namespace Core;

class Functions
{
	/*
    *@str_sub(str,int)
    *Limit the string chain to the int limit
    */
    public function str_sub($contenu, $nb = 200)
    {
        if(strlen($contenu)>200)
        {
            return substr($contenu,0,200)."...";
        }
        return $contenu;
    }
	/*
    *@verif_form($_post)
    *Verify form entries
    */
    public function verif_form($post){
        if(isset($_POST['submit'])){
            if(isset($_POST['nom']) && preg_match("#^([A-Za-z]{1,})$#",$_POST['nom'])){
                if(isset($_POST['prenom']) && preg_match("#^([A-Za-z]{1,})$#",$_POST['prenom'])){
                    if(isset($_POST['mdp']) && preg_match("#^([A-Za-z0-9]{1,})$#",$_POST['mdp'])){
                        if(isset($_POST['email'])){
                            $nom=htmlspecialchars($_POST['nom']);
                            $prenom=htmlspecialchars($_POST['prenom']);
                            $email=htmlspecialchars($_POST['email']);
                            $mdp=sha1(($_POST['mdp']));
                            inscription($nom,$prenom,$mdp,$email);

                        }
                    }
                }
            }
        }
    }
	/*
    *@e_foreach(array,array,object)
    *Views foreach
    */
	public function e_foreach($v1,$v2, $object){
        foreach($v1 as $v2){
            return $object;
        }
    }
	/*
    *@e_if(bool,var/object,var/object)
    *Views if
    */
    public function e_if($condition, $else, $if){
        if($condition){
            return $if;
        }
        else{
            return $else;
        }
    }
	/*
    *@e_while(bool,var/object)
    *Views while
    */
    public function e_while($condition, $object){
        while($condition){
            return $object;
        }
    }
}
