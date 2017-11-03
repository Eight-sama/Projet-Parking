<?php

namespace PPEParking\Models;

use App\Functions;
use PDO;

class Authentication
{

    const ID_NOT_MEMBER = 0;
    const ID_USER = 1;
    const ID_ADMIN = 2;

    public function login()
    {
        global $db;
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
                return true;
            }
            return false;
        }
        return false;
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

    public function getUserInfoFromId()
    {
        global $db;
        $request = $db->query("SELECT * FROM user WHERE id_u =" . $_GET['id']);
        return $request;
    }

    public function getAllUsersInfos()
    {
        global $db;
        return $db->query("SELECT * FROM user");
    }

    public function insertConfirmSlotApp()
    {
        global $db;
        $state = 0;
        $date_fin = date("Y-m-d", strtotime('+3 days', mktime(0, 0, 0, date('m'), date('d'), date('Y'))));
        $request = $db->prepare("INSERT INTO reserve(id_s,id_u,date_r_deb,etat,date_r_fin) VALUES (?,?,?,?,?)");
        $request->execute([$_GET['id_slot'], $_SESSION['id'], date('Y-m-d'), $state, $date_fin]);
        $this->sql_check_error($request);
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

    public function insertApplyRegister()
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


    public function updateUserAccept()
    {
        global $db;
        $db->query("UPDATE user SET lvl = 1 WHERE id_u = '" . $_GET['id'] . "'");
    }

    public function updateUserRefuse()
    {
        global $db;
        $db->query("DELETE * FROM user WHERE id_u = '" . $_GET['id'] . "'");
    }

    public function updateSlotAccept()
    {
        global $db;
        $date_fin = date("Y-m-d", strtotime('+7 days', mktime(0, 0, 0, date('m'), date('d'), date('Y'))));
        $db->query("UPDATE reserve SET etat = 1, date_r_fin = '".$date_fin."' WHERE id_u = '" . $_GET['id'] . "' AND id_s = '" . $_GET['id_slot'] . "' AND id_r = '" . $_GET['id_r'] . "'");
        $db->query("DELETE FROM reserve WHERE id_u = '" . $_GET['id'] . "' AND etat = 0");
        $db->query("UPDATE slot SET state_s = 1 WHERE id_s = '" . $_GET['id_slot'] . "'");
        
    }

    public function updateSlotRefuse()
    {
        global $db;
        $db->query("UPDATE reserve SET etat = 2 WHERE id_u = '" . $_GET['id'] . "' AND id_s = '" . $_GET['id_slot'] . "'");
    }

    public function getRequestCheck(){
        global $db;
        return $db->query("SELECT id_u FROM reserve Where id_s='".$_GET['id_nb']."'  AND id_u='".$_SESSION['id']."'");
    }
    public function getRequestNb(){
        global $db;
        return $db->query("SELECT COUNT(DISTINCT id_u) AS nb FROM reserve WHERE id_s='".$_GET['id_nb']."'");
    }
    public function getRegisterUserOnModif()
    {
        global $db;
        $request = $db->query("SELECT * FROM user WHERE lvl = 0");
        return $request;
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

    public function getAllSlotsInfos()
    {
        global $db;
        return $db->query("SELECT * FROM slot");
    }

    public function getRequestOnModif()
    {
        global $db;
        $request = $db->query("SELECT * FROM reserve r, user u, slot s WHERE etat = 0 AND u.id_u = r.id_u AND s.id_s = r.id_s ORDER BY id_r ASC");
        return $request;
    }

    public function getAcceptedRequest()
    {
        global $db;
        $request = $db->query("SELECT * FROM reserve r, user u, slot s WHERE etat = 1 AND u.id_u = r.id_u AND s.id_s = r.id_s");
        return $request;
    }

    public function getRefusedRequest()
    {
        global $db;
        $request = $db->query("SELECT * FROM reserve r, user u, slot s WHERE etat = 2 AND u.id_u = r.id_u AND s.id_s = r.id_s");
        return $request;
    }

    public function getSlotType($type)
    {
        global $db;
        $request = $db->query("SELECT * FROM slot WHERE type_s = '" . $type . "'");
        return $request;
    }
}
