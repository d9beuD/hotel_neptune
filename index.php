<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['firstname'])) {
        echo $_POST['name'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include './navbar.php'; ?>
    <form action="" method="post">
        <input type="text" name="name">
        <input type="text" name="firstname">
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>