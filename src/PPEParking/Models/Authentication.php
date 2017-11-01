<?php

namespace PPEParking\Models;

use App\Functions;
use PDO;

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
            if ($response['lvl'] > 0) {
                $_SESSION['connected'] = true;
                $_SESSION['id'] = $response['id_u'];
                $_SESSION['lvl'] = $response['lvl'];
                $_SESSION['email'] = $response['email'];
                header('Location: ' . BASE_URL . '/index.php?page=profile');
            } else {
                session_destroy();
                header('Location: ' . BASE_URL . '/index.php?page=profile&notauthorized=yes');
            }
        } else {
            header('Location: ' . BASE_URL . '/index.php?page=profile&error=yes');
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
        global $db;
        if (isset($_POST['submit']) && $this->isConnected()) {
            if ($_POST['email'] != "") {
                $request = $db->prepare('UPDATE user SET email = :email WHERE id_u = :id');
                $request->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
                $request->bindValue(":id", $_SESSION['id'], PDO::PARAM_INT);
                $request->execute();
                $this->sql_check_error($request);
                header('Location: ' . BASE_URL . '/index.php?page=profile&alert=success');
            } else {
                header('Location: ' . BASE_URL . '/index.php?page=profile&alert=failure');
            }
            if ($_POST['surname'] != "") {
                $request = $db->prepare('UPDATE user SET surname = :surname WHERE id_u = :id');
                $request->bindValue(":surname", $_POST['surname'], PDO::PARAM_STR);
                $request->bindValue(":id", $_SESSION['id'], PDO::PARAM_INT);
                $request->execute();
                $this->sql_check_error($request);
                header('Location: ' . BASE_URL . '/index.php?page=profile&alert=success');
            } else {
                header('Location: ' . BASE_URL . '/index.php?page=profile&alert=failure');
            }
            if ($_POST['name'] != "") {
                $request = $db->prepare('UPDATE user SET name = :name WHERE id_u = :id');
                $request->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
                $request->bindValue(":id", $_SESSION['id'], PDO::PARAM_INT);
                $request->execute();
                $this->sql_check_error($request);
                header('Location: ' . BASE_URL . '/index.php?page=profile&alert=success');
            } else {
                header('Location: ' . BASE_URL . '/index.php?page=profile&alert=failure');
            }
            if ($_POST['password'] != "") {
                $request = $db->prepare('UPDATE user SET password = :password WHERE id_u = :id');
                $request->bindValue(":password", sha1($_POST['password']), PDO::PARAM_STR);
                $request->bindValue(":id", $_SESSION['id'], PDO::PARAM_INT);
                $request->execute();
                $this->sql_check_error($request);
                header('Location: ' . BASE_URL . '/index.php?page=profile');
            } else {
                header('Location: ' . BASE_URL . '/index.php?page=profile&alert=failure');
            }
        }
    }

    public function applyRegister()
    {
        global $db;
        $application_date = date('d/m/Y');
        $request = $db->prepare('INSERT INTO user(surname,name,email,password,date_register) VALUES (:surname,:name,:email,:password,:date)');
        $request->bindValue(":surname", $_POST['surname'], PDO::PARAM_STR);
        $request->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
        $request->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
        $request->bindValue(":password", sha1($_POST['password']), PDO::PARAM_STR);
        $request->bindValue(":date", $application_date, PDO::PARAM_STR);
        $request->execute();
        $this->sql_check_error($request);
        header('Location: ' . BASE_URL . '/index.php?page=applyRegisterApp&registered=yes');
    }

    public function sql_check_error()
    {
        global $db;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function displayInfoUser()
    {
        global $bdd;
        $request = $bdd->query("SELECT * FROM user WHERE id_u=" . $_SESSION['id']);
        $response = $request->fetch();
        return $response;
    }

    public function getUserSlotApps()
    {
        global $db;
        $request_slot = $db->query("SELECT * FROM reserve r, slot s WHERE id_u = '" . $_SESSION['id'] . "' AND etat = 0 AND r.id_s = s.id_s");
        return $request_slot;
    }

    public function getUserSlots()
    {
        global $db;
        $request_on = $db->query("SELECT * FROM reserve r, slot s WHERE id_u = '" . $_SESSION['id'] . "' AND r.id_s = s.id_s");
        return $request_on;
    }
}
