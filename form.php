<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // $fullname = $_POST['fullname'];
    // $email = $_POST['email'];
   

    if(empty($_POST['fullname'])){
      $nameerror = "Name is required";
    }else{
      $fullname = $_POST['fullname'];
 
    }


    if(empty($_POST['email'])){
      $emailerror = "email is required";
    }else{
      $email = $_POST['email'];
    }

    
    $message = $_POST['message'];


    if(!empty($fullname) and !empty($email)){
      $formdata = $fullname . $email . $message;

        // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
      $mail = mail("towhid2302@gmail.com","PHP Contact Form",$formdata,$headers);
    
        if($mail){
          $sucess = "You are sucessfull";
          }else{
            $filed = "You are sucessfully filed";
          }
      }
  
    }


    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container p-5">
<form method="POST">

<!-- FullName  -->

  <div class="form-group">
    <label>Full Name</label>
    <input value="<?php if(isset($fullname)){ echo $fullname; }?>" name="fullname" type="text" class="form-control"  placeholder="Full Name">
    <p  class="text-danger" ><?php if(isset($nameerror)){
        echo $nameerror;
    }?></p>
  </div>

<!-- Email  -->

  <div class="form-group">
    <label >Email</label>
    <input value="<?php if(isset($email)){echo $email;}?>" type="email" name="email" class="form-control" placeholder="Email">
    <p class="text-danger" ><?php if(isset($emailerror)){echo $emailerror;}?></p>
  </div>

  <!-- Message  -->


  <div class="form-group">
    <label>Message</label>
    <textarea class="form-control"  name="message" id="" cols="30" rows="10"><?php if(isset($message)){echo $message;}?></textarea>
  </div>
  <button type="submit" name="submit-btn" class="btn btn-primary mt-3">Submit</button>
</form>


<p class="text-sucess">

<?php
  if(isset($sucess)){
    echo $sucess;
  }
?>
  
</p>

<p class="text-danger">

<?php
  if(isset($filed)){
    echo $filed;
  }
?>
  
</p>

</div>


</body>
</html>