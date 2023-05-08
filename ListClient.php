<?php
include '../Controller/clientC.php';
$clientC = new clientC();
$list = $clientC->listclient();
?>
<html>

<head></head>

<body>
<a href="../index.php">Back ADMIN </a>
    <center>
        <h1>List of clients</h1>
        <h2>
            <a href="addClient.php">Add client</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id client</th>
            <th>firstname</th>
            <th>ville</th>
            <th>Adresse</th>
            <th>password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $client) {
        ?>
            <tr>
                <td><?= $client['idclient']; ?></td>
                <td><?= $client['firstname']; ?></td>
                <td><?= $client['ville']; ?></td>
                <td><?= $client['adresse']; ?></td>
                <td><?= $client['password']; ?></td>
                <td align="center">
                    <form method="POST" action="updateClient.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $client['idclient']; ?> name="idclient">
                    </form>
                </td>
                <td>
                    <a href="deleteClient.php?idclient=<?php echo $client['idclient']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>