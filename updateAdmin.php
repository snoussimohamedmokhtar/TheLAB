<?php

include 'C:/xampp/htdocs/freshshop-master/adminC.php';
include 'C:/xampp/htdocs/freshshop-master/config.php';

$error = "";

// create admin
$admin = null;

// create an instance of the controller
$adminC = new adminC();
if (
    isset($_POST["idadmin"]) &&
    isset($_POST["firstname"]) &&
    isset($_POST["ville"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["password"])
) {
    if (
        !empty($_POST["idadmin"]) &&
        !empty($_POST['firstname']) &&
        !empty($_POST["ville"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["password"])
    ) {
        $admin = new admin(
            $_POST['idadmin'],
            $_POST['firstname'],
            $_POST['ville'],
            $_POST['adresse'],
            $_POST['password']
        );
        $adminC->updateadmin($admin, $_POST["idadmin"]);
        header('Location:my-account.php');
    } else
        $error = "Missing information";
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="my-account.php">Back</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    
        $admin = $adminC->showadmin($_POST['idadmin']);

    ?>
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idadmin">Id admin:
                        </label>
                    </td>
                    <td><input type="text" name="idadmin" id="idadmin" value="<?php echo $admin['idadmin']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="firstname">firstname:
                        </label>
                    </td>
                    <td><input type="text" name="firstname" id="firstname" value="<?php echo $admin['firstname']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="ville">ville:
                        </label>
                    </td>
                    <td><input type="text" name="ville" id="ville" value="<?php echo $admin['ville']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label efor="adresse">Adresse:
                        </label>
                    </td>
                    <td>
                        <input etype="text" name="adresse" value="<?php echo $admin['adresse']; ?>" id="adresse">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">password:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="password" id="password" value="<?php echo $admin['password']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
   
</body>

</html>