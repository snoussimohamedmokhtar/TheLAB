<?php

//include 'config.php';
include 'db_conn.php';

include 'C:/xampp/htdocs/freshshop-master/clientC.php';
$clientC = new clientC();
$list = $clientC->listclient();

session_start();

$user_id = $_SESSION['firstname'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['update'])){

   $name = $_POST['firstname'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
  
  //$email = $_POST['email'];
   //$email = filter_var($email, FILTER_SANITIZE_STRING);
   
   $update_profile = $conn->prepare("UPDATE `client` SET firstname = ? WHERE firstname = ?");
   $update_profile->execute([$name, $user_id]);


   $old_pass = $_POST['old_pass'];
   $previous_pass = md5($_POST['previous_pass']);
   $previous_pass = filter_var($previous_pass, FILTER_SANITIZE_STRING);
   $new_pass = md5($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = md5($_POST['confirm_pass']);
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   //foreach ($list as $client) { if($_SESSION['firstname']==$client['firstname'])
    

   if(!empty($previous_pass) || !empty($new_pass) || !empty($confirm_pass)){

    $test=0;
    foreach ($list as $client) { if($previous_pass=="yassine"){$test=1;}}

      if($test==0){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         $update_password = $conn->prepare("UPDATE `client` SET password = ? WHERE firstname = ?");
         $update_password->execute([$confirm_pass, $user_id]);
         $message[] = 'password has been updated!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>user profile update</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<h1 class="title"> update <span>user</span> profile </h1>

<section class="update-profile-container">

   <?php
      $select_profile = $conn->prepare("SELECT * FROM `client` WHERE idclient = ?");
      $select_profile->execute([$user_id]);
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      
      <div class="flex">
         <div class="inputBox">
            <span>username : </span>
            <input type="text" name="firstname" required class="box" placeholder="enter your name" value="">
           <!-- <span>email : </span>-->
           <!-- <input type="email" name="email" required class="box" placeholder="enter your email" value=" <?= $fetch_profile['email']; ?>"> -->
            
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="">
            <span>old password :</span>
            <input type="password" class="box" name="previous_pass" placeholder="enter previous password" >
            <span>new password :</span>
            <input type="password" class="box" name="new_pass" placeholder="enter new password" >
            <span>confirm password :</span>
            <input type="password" class="box" name="confirm_pass" placeholder="confirm new password" >
         </div>
      </div>
      <div class="flex-btn">
         <input type="submit" value="update profile" name="update" class="btn">
         <a href="user_page.php" class="option-btn">go back</a>
      </div>
   </form>

</section>

</body>
</html>