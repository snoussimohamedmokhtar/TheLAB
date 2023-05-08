<?php
include '../Controller/adminC.php';
$adminC = new adminC();
$list = $adminC->listadmin();
?>
<html>

<head></head>

<body>
<a href="../index.php">Back ADMIN </a>
    <center>
        <h1>List of admins</h1>
        <h2>
            <a href="addAdmin.php">Add admin</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id admin</th>
            <th>firstname</th>
            <th>ville</th>
            <th>Adresse</th>
            <th>password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $admin) {
        ?>
            <tr>
                <td><?= $admin['idadmin']; ?></td>
                <td><?= $admin['firstname']; ?></td>
                <td><?= $admin['adresse']; ?></td>
                <td><?= $admin['ville']; ?></td>
                <td><?= $admin['password']; ?></td>
                <td align="center">
                    <form method="POST" action="updateadmin.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $admin['idadmin']; ?> name="idadmin">
                    </form>
                </td>
                <td>
                    <a href="deleteadmin.php?idadmin=<?php echo $admin['idadmin']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>