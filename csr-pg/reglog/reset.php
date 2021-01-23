
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Login</title>
  
  


  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>

<body>
 
<div class="login-form">
<form method="post" action="../routers/reset-router.php" class="login-form" id="form">
        <h2 class="text-center">Reset Password</h2>       
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Enter Your Registered E-mail" required="required">
        </div>
        
      
       
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Reset</button>
        </div>
       
    </form>
    
</div>
</body>
</html>
