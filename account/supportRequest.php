<?php
if (!empty($_POST['requestDetails'])) {

    require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/db.php');

    session_start();
    $sql = "INSERT INTO requests (user, details) VALUES ('" . $_SESSION['id'] . "', '" . $_POST['requestDetails'] . "');";
    $query = $db->prepare($sql);
    $query->execute();
    $id = $db->lastInsertId();

    $sql = "SELECT
 requests.id as 'requestId',
 requests.details as 'requestDetails',
 requests.datetime as 'requestDatetime',
 users.name as 'username',
 users.email as 'userEmail',
 users.details as 'userDetails',
 company.name as 'companyName',
 company.email as 'companyEmail'
 FROM requests LEFT JOIN users ON requests.user = users.id LEFT JOIN company ON users.company = company.id WHERE requests.id = " . $id . ";";
    $query = $db->prepare($sql);
    $query->execute();
    $request = $query->fetch(PDO::FETCH_ASSOC);

    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/phpmailer/class.phpmailer.php");

    $emailMessage = "Hi " . $request['companyName'] . ",

You have a new support request from " . $request['username'] . ". The details of the request are:

Request Id: " . $request['requestId'] . "
Request Time: " . $request['requestDatetime'] . "

User Name: " . $request['username'] . "
User Email: " . $request['userEmail'] . "
User Details: " . $request['userDetails'] . "


Request Details: " . $request['requestDetails'] . "

Please action as soon as possible.

Service provided by Support.Me";

    $mail = new PHPMailer();
    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->Host     = "10.168.1.70"; // SMTP server
    $mail->SetFrom("no-reply@taskmanagr.co.uk", 'Support.Me');
    $mail->AddAddress($request['companyEmail']);
    $mail->Subject  = 'Support.Me Request';
    $mail->Body     = $emailMessage;
    $mail->WordWrap = 78;

    if($mail->Send()) {
        header('Location: /account/?request=success');
        exit();
    }

    header('Location: /account/?request=error');
    exit();

}