<?php

session_start();

require 'config/db.php';
require_once 'emailController.php';
 $erroruser = $erroremail = $errorpassword = $errorcpassword ="";
  $username = $email  = $password =$cpassword = "";

$username1 =  $password1 = "";
$errorusername =  $errorpwd= "";

 $error =false;

if(isset($_POST['signup-btn'])){
    $username=$_POST['username'];
    $email=$_POST['emails'];
    $password=$_POST['pwd'];
    $cpassword=$_POST['cpwd'];


    if(empty($username)){
		$error=true;
		$erroruser="please eneter your full name";
	}
	elseif(!preg_match("/^[a-zA-Z ]*$/",$username)) {
		$error=true;
      $erroruser = "Only letters and white space allowed";
  }

  if(empty($email)){
    $error=true;
    $erroremail="please eneter your email";
}  
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error=true;
    $erroremail="please enter correct email";
}

if(empty($password)){
    $error=true;
    $errorpassword="please eneter your password";
}
elseif (strlen($password)< 6) {
    $error=true;
    $errorpassword="password must at least 6 characterd!";
}
if(empty($cpassword)){
    $error=true;
    $errorcpassword="please re-enter your password";
}
elseif (strlen($cpassword)< 6) {
    $error=true;
    $errorcpassword="password must at least 6 characters!";
}

elseif($password!=$cpassword){
    $error=true;
    $errorcpassword="password does not matching!";
}


    $emailQry=" SELECT * FROM users where email=? LIMIT 1";
    $stmt=$con->prepare($emailQry);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result=$stmt->get_result();
    $userCount=$result->num_rows;
    $stmt->close();

    if($userCount > 0){
        $error=true;
        $erroremail="Email already exits!";
    }

    if($error == 0){
        $password=password_hash($password,PASSWORD_DEFAULT);
        $token=bin2hex(random_bytes(50));
        $verified=false;

        $sql="INSERT INTO users(username,email,verified,token,password) VALUES (?, ?, ?, ?, ?)";
        $stmt=$con->prepare($sql);
        $stmt->bind_param('ssbss', $username, $email, $verified, $token, $password);
        
        if($stmt->execute()){
            $user_id =$con->insert_id;
            $_SESSION['id']=$user_id;
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
            $_SESSION['verified']=$verified;

            sendVerificationEmail($email,$token);


            
            $_SESSION['message']="You are logged in ";
            $_SESSION['alert-class']="alert-success";
            header('location: home.php');
            exit();

        }

        else{
            $errors['db_error']="Database error: failed";
        }


    }

}



//login 

if(isset($_POST['login-btn']))
 {
    $username1=$_POST['username'];
    $password1=$_POST['pwd'];
   


    if(empty($username1)){
		$error=true;
		$errorusername="please eneter your full name";
	}
	

if(empty($password1)){
    $error=true;
    $errorpwd="please eneter your password";
}


        
    if($error == 0){
        $sql1 =" SELECT * FROM users WHERE username=? OR email=? LIMIT 1 ";
        $stmt=$con->prepare($sql1);
        $stmt->bind_param('ss', $username1, $username1);
        $stmt->execute();
        $result=$stmt->get_result();
        $user=$result->fetch_assoc();
    
        if(password_verify($password1, $user['password'])){
     
            $_SESSION['id']=$user['id'];
            $_SESSION['username']=$user['username'];
            $_SESSION['email']=$user['email'];
            $_SESSION['verified']=$user['verified'];
            
           
            header('location: container.php');
            exit();
        }
        else{
            $error=true;
            $errorpwd="incorrect password or username";
        }
    


    }
  

    }


//logout 

    if(isset($_GET['logout'])){

        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['verified']);

        header('location: login.php');
        exit();

    }


    //verify token

    function verifyUser($token){
        global $con;
        $sql="SELECT * FROM users WHERE token='$token' LIMIT 1";
        $result=mysqli_query($con,$sql);

        if(mysqli_num_rows($result)>0){
            $user =mysqli_fetch_assoc($result); 
            $update_query="UPDATE users SET verified=1 WHERE token='$token'";

            if(mysqli_query($con,$update_query)){

                $_SESSION['id']=$user['id'];
                $_SESSION['username']=$user['username'];
                $_SESSION['email']=$user['email'];
                $_SESSION['verified']= 1;
                
                $_SESSION['message']="You are successfully verified ";
                $_SESSION['alert-class']="alert-success";
                header('location: home.php');
                exit();
            }
            else{
                echo 'User not found';
            }

        }
    }


?>