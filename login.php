<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reunion_island";

$connection = new mysqli($servername, $username, $password);

if ($connection->connect_error) {
    die("connection failed : " . $connection->connect_error);
} else {
    $connection->select_db($dbname);
}



$sql = "SELECT username, password FROM user WHERE 1";
$result = $connection->query($sql);
while ($row = $result->fetch_assoc()) {
    $DBusername = $row['username'];
    $DBpassword = $row['password'];
}

global $username, $password;

if (isset($_POST['username']) && isset($_POST['password'])){
if ($DBusername == $_POST['username'] && $DBpassword == $_POST['password']) {
    session_start();

    $_SESSION['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $_SESSION['password'] = filter_var(($_SESSION['password']), FILTER_SANITIZE_STRING);

    header('Location: read.php');
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

<form action="" method="post">
    <div>
        <label for="username">Identifiant</label>
        <input type="text" name="username">
    </div>
    <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password">
    </div>
    <div>
        <input type="submit" name="button" value="Se connecter">
    </div>
</form>
</body>
</html>
