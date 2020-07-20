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
            <form action="login.php" method="POST">
                <h2 class="text-center">Login here</h2>
                <div class="form-group">
                    <label for="username">Username/Email</label>
                    <input type="text" class="form-control form-control-lg" name="username" value="<?php echo $username1; ?>" >
                    <div>
                <span class="text-danger"><?php if(isset($errorusername)) echo $errorusername; ?></span>
          
                </div> 
                </div>
              
               
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control form-control-lg" name="pwd">
                    <div>
                <span class="text-danger"><?php if(isset($errorpwd)) echo $errorpwd; ?></span>
                </div> 
                </div>
                
               
                <div class="form-group">
                   <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg ">Login</button>
                 
                </div>
                
                <p class="text-center">You're new to here. <a href="signup.php">signup here</a></p>

            </form>
         </div>
     </div>
 </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>