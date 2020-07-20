
<?php require_once 'config/Controller/authcontroller.php';
    
    
    if(isset($_GET['token'])){
        $token=$_GET['token'];
        verifyUser($token);
    }
    
    
    if(!isset($_SESSION['id'])){
        header('location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link  rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
 <div class="container">
     <div class="row">
         <div class="col-md-5 offset-md-4 form-div">

         <?php if(isset($_SESSION['message'])): ?>
            <div class="alert <?php echo $_SESSION['alert-class']; ?> ">
               <?php 
               echo $_SESSION['message']; 
               unset($_SESSION['message']);
               unset($_SESSION['alert-class']);
               ?>
            </div>

            <?php endif; ?>
            <h4>Welocome <?php echo $_SESSION['username']; ?></h3>
          
            <?php if(!$_SESSION['verified']): ?>
            <div class="alert alert-warning">
                first of all you must need to verify your email address. 
                Verify message is autmatically sent to your email address.
                please go to your email and confirm it. We just emailed you at
                <p> <?php echo $_SESSION['email']; ?></p>
            </div>
            <?php endif; ?>
            <?php if($_SESSION['verified']): ?>
            <a class="btn btn-success" href="container.php">Click here</a>
            <?php endif; ?>
         </div>
     </div>
 </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>