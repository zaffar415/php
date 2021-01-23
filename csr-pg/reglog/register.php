
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Register</title>
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

<body >
<div class="login-form">
<form class="formValidate" id="formValidate" method="post" action="../routers/register-router.php">
        <h2 class="text-center">Register</h2>       
        <?php if(isset($_GET['error'])) : ?>
        <div class="form-group text-danger">
            <li>User Already Exist</li>
        </div>
        <?php endif; ?>
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="email"name="email" class="form-control" placeholder="E-Mail" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="Address" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Contact" required="required" pattern="[0-9]{10}" title="Should contain 10 Numbers Only">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
       
       
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
       
    </form>
    <p class="text-center"><a href="./login.php">Login</a></p>
</div>
 
<script>
    $('input[name="phone"]').keypress(function() {
        return false;
    });
</script>

</body>
</html>
