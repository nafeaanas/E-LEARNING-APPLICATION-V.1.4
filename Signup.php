<?php

include 'Students/Connection.php';
error_reporting(0);
if (isset($_POST['submit'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = md5($_POST['password']); 
     $re_password = md5($_POST['re_password']);

     if ($password == $re_password){
               $sql = "SELECT * FROM comptes WHERE email='$email'";
               $result=mysqli_query($conn,$sql);
               if (!mysqli_num_rows($result) > 0) {
                    $sql = "INSERT INTO comptes (name,email,password )
                    VALUES('$name','$email','$password')";
               $result= mysqli_query($conn,$sql);
               if($result){
                    echo"<script>alert('Wow! User Registration Completed')</script>";
                    $name = "";
                    $email ="";
                    $_POST['password'] = ""; 
                    $_POST['re_password'] = "";
               } else{
                    echo"<script>alert('Woops! Something wrong went')</script>";    
               }  
          } else {
               echo "<script>alert('Woops! Email Already Exist')</script>";
          }
               
          }else{
          echo "<script>alert('password not matched')</script>";
          }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="styleSignup.css">
  <title>Register Form</title>
</head>
<body>
    <main class="signin d-flex justify-content-center py-3">
          <div class="signinf bg-white ">
              <div>
                      <h3 class="border-start border-info border-5 m-4 mx-5 px-1  "><strong>E-classe</strong></h3>
              </div>
              <div class="px-4 text-center">
                      <p class="enter text-muted">enter your information</p>
              </div>
              <form action="" class="p-4 " method="POST" id="form">
                  <div class="mb-2">
                       <label for="exampleInputemail1" class="form-label ">name</label>
                       <input  class="form-control"  aria-describedby="emailHelp" placeholder="Enter your name" id="name" name="name" >
                       <small id="messagename" class="text-danger"></small>

                  </div>
                  <div class="mb-2">
                       <label for="exampleInputemail1" class="form-label ">email</label>
                       <input  class="form-control"  aria-describedby="emailHelp" placeholder="Enter your email" id="email" name="email" >
                       <small id="messageemail" class="text-danger "></small>

                  </div>
                  
                  <div class="mb-2">
                       <label for="exampleInputemail1" class="form-label ">password</label>
                       <input  class="form-control" type="password"  aria-describedby="emailHelp" placeholder="Enter your password" id="password" name="password" >
                       <small id="messagepassword" class="text-danger "></small>

                  </div>
                  <div class="mb-2">
                       <label for="exampleInputemail1" class="form-label ">confirm password </label>
                       <input class="form-control" type="password"  aria-describedby="emailHelp" placeholder="confirm your password" id="conpassword" name="re_password" >
                       <small id="messageconfpass" class="text-danger "></small>

                  </div>
                  <input name="submit"type="submit" class="btn bg-info text-white w-100" value="Create account">
              </form>
              <div class="forget pt-1  text-center p-4">
                       <span>Already have an account?<a class="text-info" href="index.php"><strong>Login her</strong> </a></span>
              </div>
          </div>
    </main>
     <script src="/bootstrap/bootstrap.bundle.min.js"></script>
     <script src="script.js"></script>

</body>
</html>