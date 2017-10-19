<?php
namespace App;

class Functions
{
	/*
    *@str_sub(str,int)
    *Limit the string chain to the int limit
    */
    public static function eStrSub($contenu, $nb = 200)
    {
        if(strlen($contenu)>200)
        {
            return substr($contenu,0,200)."...";
        }
        return $contenu;
    }
	/*
    *@verifForm($_post)
    *Verify form entries
    */
    public static function eVerifForm($post){
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
	public static function eForEach($v1,$v2, $object)
    {
        foreach($v1 as $v2){
            return $object;
        }
    }
	/*
    *@e_if(bool,var/object,var/object)
    *Views if
    */
    public static function eIf($condition, $else, $if)
    {
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
    public static function eWhile($condition, $object)
    {
        while($condition){
            return $object;
        }
    }
    /*
    *@eUrlToClass(string)
    *Models
    */
    public static function eUrlToClass($str){
        if(preg_match("#^([a-zA-Z]._[a-zA-Z])$#",$str)){
            list($first,$second) = explode('_',$str);
            $last = ucfirst($first).ucfirst($second);
            return $last;
        }
        else{
            return ucfirst($str);
        }
    }
    /*
    *@display(str)
    *Display the page while using ob_start
    */
    public function display($page)
    {
        ob_start();
        require "src/PPEParking/Views/content/".$page.".view.php";
        $content = ob_get_contents();
        ob_end_clean();
        require "src/PPEParking/Views/layout/main_layout.php";
    }
}
