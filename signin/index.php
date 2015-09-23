<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/db.php');

if (!empty($_POST['useremail'])) {
    $sql = "SELECT * FROM users LEFT JOIN company ON users.company = company.id WHERE users.email = '" . $_POST['useremail'] . "';";
    $query = $db->prepare($sql);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!empty($user)) {
        session_start();
        $_SESSION = $user;

        $value = array(
            'email' => $_SESSION['email'],
        );
        $expiry = time()+(365 * 24 * 60 * 60);
        setcookie("supportMe", json_encode($value), $expiry, '/');

        header("Location: ../account/");

    } else {
        header('Location: ../?login=nouser');
    }
}