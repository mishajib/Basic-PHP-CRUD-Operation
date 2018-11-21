<?php
function redirect() {
    header('Location: ../index.php');
    exit();
}

if (!isset($_GET['email']) || !isset($_GET['token'])) {
    redirect();
} else {
    require_once ('../includes/db.php');

    $email = $db_connection->real_escape_string($_GET['email']);
    $token = $db_connection->real_escape_string($_GET['token']);

    $sql = $db_connection->query("SELECT id FROM profilesystemwithemailconfirmation WHERE email='$email' AND token='$token' AND isEmailConfirmed=0");

    if ($sql->num_rows > 0) {
        $db_connection->query("UPDATE profilesystemwithemailconfirmation SET isEmailConfirmed=1, token='' WHERE email='$email'");
        echo '<span style="color: green;">Your email has been verified! You can log in now!</span>';
        header( "refresh:3;url= ../login.php" );
    } else
        redirect();
}