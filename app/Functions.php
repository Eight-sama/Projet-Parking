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
        if (strlen($contenu) > 200) {
            return substr($contenu, 0, 200) . "...";
        }
        return $contenu;
    }

    /*
    *@verifForm($_post)
    *Verify form entries
    */
    public static function eVerifForm($post)
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['nom']) && preg_match("#^([A-Za-z]{1,})$#", $_POST['nom'])) {
                if (isset($_POST['prenom']) && preg_match("#^([A-Za-z]{1,})$#", $_POST['prenom'])) {
                    if (isset($_POST['mdp']) && preg_match("#^([A-Za-z0-9]{1,})$#", $_POST['mdp'])) {
                        if (isset($_POST['email'])) {
                            $nom = htmlspecialchars($_POST['nom']);
                            $prenom = htmlspecialchars($_POST['prenom']);
                            $email = htmlspecialchars($_POST['email']);
                            $mdp = sha1(($_POST['mdp']));
                            inscription($nom, $prenom, $mdp, $email);

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
    public static function eForEach($v1, $v2, $object)
    {
        foreach ($v1 as $v2) {
            return $object;
        }
    }

    /*
    *@e_if(bool,var/object,var/object)
    *Views if
    */
    public static function eIf($condition, $if, $else)
    {
        if ($condition) {
            return $if;
        } else {
            return $else;
        }
    }

    /*
    *@e_while(bool,var/object)
    *Views while
    */
    public static function eWhile($condition, $object)
    {
        while ($condition) {
            return $object;
        }
    }

    /*
    *@eUrlToClass(string)
    *Models
    */
    public static function eUrlToClass($str)
    {
        if (preg_match("#^([a-zA-Z]._[a-zA-Z])$#", $str)) {
            list($first, $second) = explode('_', $str);
            $last = ucfirst($first) . ucfirst($second);
            return $last;
        } else {
            return ucfirst($str);
        }
    }

    public function input($type, $name, $content)
    {

        $html = "<div class='form-group'>";
        $html .= "<label for='" . $name . "'>" . $content . "</label>";
        $html .= "<input class='form-control' id='" . $name . "' name='" . $name . "' type='" . $type . "'>";
        $html .= "</div>";

        return $html;
    }

    public function submit($class, $content, $name)
    {
        $html = "<div class='form-group'>";
        $html .= "<button class='" . $class . "' type='" . $name . "' name='" . $name . "' id='" . $name . "'>";
        $html .= $content;
        $html .= "</button>";
        $html .= "</div>";

        return $html;
    }

    public function select($name, $values)
    {

        $html = "<select class='' name='" . $name . "' id='" . $name . "'> ";
        $i = 1;
        foreach ($values as $value) {
            $html .= "<option value='" . $i . "'>" . $value . "</option>";
            $i++;
        }

        $html .= "</select>";

        return $html;
    }

    public function textarea($name, $value)
    {
        $html = "<textarea name='" . $name . "' id='" . $name . "'> ";
        $html .= $value;
        $html .= "</textarea>";

        return $html;
    }

    public function checkbox($name, $value)
    {

        $html = "<p>";
        $html .= " <input type='" . $name . "' id='" . $name . "' />";
        $html .= " <label for='" . $name . "'>" . $value . "</label>";
        $html .= "</p>";

        return $html;
    }

    public function radio($label, $name, $values, $options = [])
    {

        $constructor = '';

        foreach ($options as $k => $v) {
            $constructor .= " $k = '$v' ";
        }

        $html = "<div class='radio'> $label";

        foreach ($values as $value) {

            $html .= "<label>";
            $html .= "<input type='radio' $constructor name='" . $name . "' id='$name' value='" . $value . "'>";
            $html .= $value;
            $html .= "</label>";

        }

        $html .= "</div>";

        return $html;
    }

    public function header($link){
        header('Location :'.BASE_URL.$link);
    }

    /*
    *@display(str)
    *Display the page while using ob_start
    */
    public function display($page, $object)
    {
        ob_start();
        require "src/PPEParking/Views/content/" . $page . ".view.php";
        $content = ob_get_contents();
        ob_end_clean();
        require "src/PPEParking/Views/layout/main_layout.php";
    }
}
