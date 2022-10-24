<?php
include 'includes/functions.inc.php';
$inputErr=$_GET['error'] ?? '';
$username = '';
if(isset($_POST['submit'])){
    if(empty($_POST['username'])){
        $inputErr = 'Username is required!';
    }else{
        $response =  getRepos($_POST['username']);
        if(!empty($response['message'])){
            $inputErr = $response['message'];
        }else{
            $username = $_POST['username'];
        } 

    }
}
?>

<?php include 'header.php'?>

<?php include 'footer.php'?>


