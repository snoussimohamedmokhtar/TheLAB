<?php
session_start();
include "db_conn.php";
include 'C:/xampp/htdocs/freshshop-master/config.php';

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: sign-in.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: sign-in.php?error=Password is required");
        exit();
    } else {
        $sql2 = "SELECT * FROM admin WHERE firstname=:uname AND password=:pass";
        $sql = "SELECT * FROM client WHERE firstname=:uname AND password=:pass";

        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindValue(':uname', $uname);
        $stmt2->bindValue(':pass', $pass);
        $stmt2->execute();

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':uname', $uname);
        $stmt->bindValue(':pass', $pass);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $row = $stmt->fetch();
            if ($row['firstname'] === $uname && $row['password'] === $pass) {
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: my-account.php");
                exit();
            } else {
                header("Location: sign-in.php?error=Incorrect User name or password");
                exit();
            }
        } else if ($stmt2->rowCount() === 1) {
            $row = $stmt2->fetch();
            if ($row['firstname'] === $uname && $row['password'] === $pass) {
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: my-account.php");
                exit();
            } else {
                header("Location: sign-in.php?error=Incorrect User name or password");
                exit();
            }

        } else {
            header("Location: sign-in.php?error=Incorrect User name or password");
            exit();
        }
    }

} else {
    header("Location: sign-in.php");
    exit();
}
