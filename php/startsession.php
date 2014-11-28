<?php
    require_once('./php/db_connect.php');
	
    function getUserInfo($userid, $passwdInMD5) {
        $genDBase_mysqli = new genDBase_mysqli();
        $query = $genDBase_mysqli->prepare("SELECT Realname, GroupID, LevelID, IsActive FROM tb_Users WHERE ID=? AND Password=?");
        if (!$query) {
            return FALSE;
        }
        $query->bind_param("ss", $userid, $passwdInMD5);
        $query->execute();
        $result = $query->get_result();
        $row = $result->fetch_array();
        $query->close();
        $genDBase_mysqli->close();
        return $row;
    }
    session_start();
    // If the session vars aren't set, try to set them with a cookie
    $needLogin = true;
    if (isset($_SESSION['genDBase_userId']) && isset($_SESSION['genDBase_token'])) {
        if (getUserInfo($_SESSION['genDBase_userId'], $_SESSION['genDBase_token'])) {
            $needLogin = false;
        }
    } else {
        if (isset($_COOKIE['genDBase_userId']) && isset($_COOKIE['genDBase_token'])) {
            $info = getUserInfo($_COOKIE['genDBase_userId'], $_COOKIE['genDBase_token']);
            if ($info) {
                $_SESSION['genDBase_userId'] = $_COOKIE['genDBase_userId'];
                $_SESSION['genDBase_realName'] = $info[0];
                $_SESSION['genDBase_groupId'] = $info[1];
                $_SESSION['genDBase_levelId'] = $info[2];
                $_SESSION['genDBase_token'] = $_COOKIE['genDBase_token'];
                
                $needLogin = false;
            }
        }
    }
    if ($needLogin) {
        Header("HTTP/1.1 303 See Other");
        Header("Location: ./php/restaurantLogin.php");
        exit;
    }
?>