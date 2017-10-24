<?php

namespace PPEParking\Models;

use App\Functions;

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
        global $db;
        $function = new Functions();
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $request = $db->query("SELECT * FROM user WHERE email ='" . $email . "' AND password = '" . $password . "'");
        if ($response = $request->fetch()) {
            $_SESSION['connected'] = true;
            $_SESSION['id'] = $response['id_u'];
            $_SESSION['lvl'] = $response['lvl'];
            $_SESSION['email'] = $response['email'];
            $function->header('index.php?page=profile');
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

    public function isAdmin($lvl)
    {
        if ($lvl == 2) {
            return true;
        } else {
            return false;
        }
    }

    public function isConnected()
    {
        if (isset($_SESSION) && !empty($_SESSION)) {
            if (($_SESSION['connected'])) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function getUserInfo($id, $column)
    {
        global $db;
        $request = $db->query("SELECT " . $column . " FROM user WHERE id_u = $id");
        if ($response = $request->fetch()) {
            return $response[$column];
        }
    }

    public function majMdp($mdp)
    {
        global $bdd;
        $request = $bdd->prepare("UPDATE user SET mdp = :mdp WHERE id_u=" . $_SESSION['id']);
        $request->execute(array('mdp' => $mdp));
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

    public function dispSlotAppl()
    {

        global $bdd;

        $req = 'SELECT * FROM user WHERE lvl = 2';
        $requete = $bdd->query($req);

        return ($data = $requete->fetch());
    }


    public function validateReserv($id)
    {

        global $bdd;

        $alert = "";

        $req = "SELECT * FROM occuper WHERE id_u = 'null'  ";
        $requete = $bdd->query($req);

        $date_deb = date("Y-m-d H:i:s");

        $date_explosee = explode(" ", $date_deb);
        $jmd = $date_explosee[0];
        $his = $date_explosee[1];

        $date_explosee = explode("-", $date_deb);
        $year = $date_explosee[0];
        $mois = $date_explosee[1];
        $jour = $date_explosee[2];


        $date_fin = mktime(0, 0, 0, $mois, $jour + 7, $year);//durée fix a une semaine
        $date_fin = date("Y-m-d H:i:s", $date_fin);


        if ($requete->fetch()) {

            $requete2 = $bdd->prepare("Update occuper set id_u = :id , date_deb = :date_deb , date_fin= :date_fin  WHERE id_u = 'null' limit 1 ");
            $requete2->bindValue(":id", $id, PDO::PARAM_INT);
            $requete2->bindValue(":date_deb", $date_deb, PDO::PARAM_INT);
            $requete2->bindValue(":date_fin", $date_fin, PDO::PARAM_INT);
            $requete2->execute();

            $requete5 = $bdd->prepare("Update user set lvl = 4 where id_u = :id ");
            $requete5->bindValue(":id", $id, PDO::PARAM_INT);
            $requete5->execute();

        } else {
            $requete3 = $bdd->prepare("Update user set lvl = 3 ,  rg_fa = (select Max(rg_fa) from (Select * from user) as dtg )+1 where id_u = :id");
            $requete3->bindValue(":id", $id, PDO::PARAM_INT);
            $requete3->execute();

        }
    }

    public function displayInfoUser()
    {
        global $bdd;
        $request = $bdd->query("SELECT * FROM user WHERE id_u=" . $_SESSION['id']);
        $response = $request->fetch();
        return $response;
    }
}
