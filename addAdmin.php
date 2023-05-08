<?php

include '../Controller/adminC.php';

$error = "";

// create admin
$admin = null;

// create an instance of the controller
$adminC = new adminC();
if (
    isset($_POST["firstname"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["ville"]) &&
    isset($_POST["password"])
) {
    if (
        !empty($_POST["firstname"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["ville"]) &&
        !empty($_POST["password"])
    ) {
        $admin = new admin(
            null,
            $_POST['firstname'],
            $_POST['adresse'],
            $_POST['ville'],
            $_POST['password']
        );
        $adminC->addadmin($admin);
        header('Location:ListAdmin.php');
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
    <a href="ListAdmin.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="firstname">firstname:
                    </label>
                </td>
                <td><input type="text" name="firstname" id="firstname" maxlength="20"></td>
            </tr>
            
            <tr>
                <td>
                    <label for="adresse">adresse:
                    </label>
                </td>
                <td>
                    <input type="text" name="adresse" id="adresse">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ville">ville:
                    </label>
                </td>
                <td><input type="text" name="ville" id="ville" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="password">password:
                    </label>
                </td>
                <td>
                    <input type="text" name="password" id="password" maxlength="20">
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>