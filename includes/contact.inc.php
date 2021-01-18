<?php
include './includes/title.inc.php';
$errors = [];
$missing = [];
// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // email processing script
    $to = 'scoder127@gmail.com';  // use your own email address
    $subject = 'Feedback from Norway';
    // list expected fields
    $expected = ['name', 'email', 'comments', 'subscribe', 'interests', 'howhear', 'characteristics', 'terms'];
    $required = ['name', 'comments', 'email', 'subscribe', 'interests', 'howhear', 'characteristics', 'terms'];
    // set default values for variables that might not exist
    if (!isset($_POST['subscribe'])) {
        $_POST['subscribe'] = '';
    }
    if (!isset($_POST['interests'])) {
        $_POST['interests'] = array();
    }
    if (!isset($_POST['characteristics'])) {
        $_POST['characteristics'] = array();
    }
    if (!isset($_POST['terms'])) {
        $_POST['terms'] = '';
        $errors['terms'] = true;
    }
    // minimum number of required check boxes
    $minCheckboxes = 2;
    if (count($_POST['interests']) < $minCheckboxes) {
        $errors['interests'] = true;
    }
    // minimum number of required list items
    $minList = 2;
    if (count($_POST['characteristics']) < $minList) {
        $errors['characteristics'] = true;
    }
    // create additional headers
    $headers[] = 'From: Contact Form<scoder127@gmail.com>';
    $headers[] = 'Content-Type: text/plain; charset=utf-8';
    require './includes/processmail.inc.php';
    if ($mailSent) {
        header('Location: http://www.example.com/thank_you.php');
        exit;
    }
}
?>

