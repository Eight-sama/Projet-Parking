<?php

namespace PPEParking\Models;

class Authentication
{

    const ID_NOT_MEMBER = 0;
    const ID_USER = 1;
    const ID_ADMIN = 2;

    public function inscription($surname, $name, $mdp, $email)
    {
        global $bdd;

        $request = $bdd->prepare("INSERT INTO user(surname,name,email,mdp)  Values(:surname ,:name , :email , :mdp) ");
        $request->bindValue(":surname", $surname, PDO::PARAM_STR);
        $request->bindValue(":name", $name, PDO::PARAM_STR);
        $request->bindValue(":email", $email, PDO::PARAM_STR);
        $request->bindValue(":mdp", $mdp, PDO::PARAM_STR);
        $request->execute();

        return $request;
    }

    public function login()
    {
        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);
        $requete = $bdd->query("SELECT * FROM user WHERE login ='" . $login . "' AND mdp = '" . $mdp . "'");
        if ($reponse = $requete->fetch()) {
            $_SESSION['connecte'] = true;
            $_SESSION['id'] = $reponse['idUtilisateur'];
            $_SESSION['rang'] = $reponse['rang'];
            $_SESSION['log'] = $reponse['login'];
            $_SESSION['email'] = $reponse['email'];
            $connected = true;
            return $connected;
        } else {
            $connected = false;
            return $connected;
        }
    }

    public function isUser($id)
    {
        if ($this->getUserInfo($id, "lvl") == self::ID_USER) {
            return true;
        } else {
            return false;
        }
    }

    public function isAdmin($id)
    {
        if ($this->getUserInfo($id, "lvl") == self::ID_ADMIN) {
            return true;
        } else {
            return false;
        }
    }

    public function isConnected()
    {
        if (isset($_SESSION) && !empty($_SESSION)) {
            if (($_SESSION['lvl'] == self::ID_USER || $_SESSION['lvl'] == self::ID_ADMIN)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function getUserInfo($id, $column)
    {
        global $bdd;
        $request = $bdd->prepare("SELECT ? FROM users WHERE id = ?");
        $request->execute([$column, $id]);
        return $request->fetch();
    }

    public function majMdp($mdp)
    {
        global $bdd;
        $request = $bdd->prepare("UPDATE user SET mdp = :mdp WHERE id_u=" . $_SESSION['id']);
        $request->execute(array('mdp' => $mdp));
    }

    public function getLogin($login)
    {
        global $bdd;
        $request = $bdd->prepare("SELECT * FROM user WHERE login = ?");
        $request->execute(array($login));
        return $request;
    }

    public function getEmail($email)
    {
        global $bdd;
        $request = $bdd->prepare("SELECT * FROM user WHERE email = ?");
        $request->execute(array($email));
        return $request;
    }

    public function majEmail($email)
    {
        global $bdd;
        $request = $bdd->prepare("UPDATE user SET email = :email WHERE id_u=" . $_SESSION['id']);
        $request->execute(array(
            'email' => $email
        ));
    }

    public function getMdp()
    {
        global $bdd;
        $request = $bdd->query("SELECT mdp FROM user WHERE id_u =" . $_SESSION['id']);
        $request = $request->fetch();
        return $request;
    }

    public function updateOtherProfile()
    {
        if (isset($_POST['submit']) && $this->isConnected() && $this->isAdmin()) {
            if ($_POST['email'] != $this->getUserInfo($_GET['id_u'], 'email')) {

            }
            if ($_POST['mdp'] != $this->getUserInfo($_GET['id_u'], 'mdp')) {

            }
            if ($_POST['login'] != $this->getUserInfo($_GET['id_u'], 'login')) {

            }
            if ($_POST['surname'] != $this->getUserInfo($_GET['id_u'], 'surname')) {

            }
            if ($_POST['name'] != $this->getUserInfo($_GET['id_u'], 'name')) {

            }
        }
    }

    public function updateSelfProfile()
    {
        if (isset($_POST['submit']) && $this->isConnected() && $_SESSION['id_u'] == $_GET['id_u']) {
            if ($_POST['email'] != $this->getUserInfo($_GET['id_u'], 'email')) {

            }
            if ($_POST['login'] != $this->getUserInfo($_GET['id_u'], 'login')) {

            }
            if ($_POST['surname'] != $this->getUserInfo($_GET['id_u'], 'surname')) {

            }
            if ($_POST['name'] != $this->getUserInfo($_GET['id_u'], 'name')) {

            }
        }
    }

    public function ajoutDemandePlace($id)
    {
        global $bdd;
        $requete = $bdd->prepare("Update user set lvl = 2 WHERE  id_u=:id ");
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->execute();
    }

}
