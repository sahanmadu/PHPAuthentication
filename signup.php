
<?php  require_once 'config/Controller/authcontroller.php'; ?>
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
            <form action="signup.php" method="POST">
                <h2 class="text-center">signup here</h2>
                

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control form-control-lg" name="username" value="<?php echo $username; ?>">

                 <div>
                <span class="text-danger"><?php if(isset($erroruser)) echo $erroruser; ?></span>
                </div> 
                </div>

                <div class="form-group">
                    <label for="emails">Email</label>
                    <input type="email" class="form-control form-control-lg" name="emails"  value="<?php echo $email; ?>">
                </div>
                <div>
                <span class="text-danger"><?php if(isset($erroremail)) echo $erroremail; ?></span>
                </div> 
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control form-control-lg" name="pwd">

                </div>
                <div>
                <span class="text-danger"><?php if(isset($errorpassword)) echo $errorpassword; ?></span>
                </div> 
                <div class="form-group">
                    <label for="cpwd">Confirm password</label>
                    <input type="password" class="form-control form-control-lg" name="cpwd">

                </div>
                <div>
                <span class="text-danger"><?php if(isset($errorcpassword)) echo $errorcpassword; ?></span>
                </div> 
                <div class="form-group">
                   <button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg ">Sign up</button>
                 
                </div>
                
                <p class="text-center">Already member <a href="login.php">login here</a></p>

            </form>
         </div>
     </div>
 </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>