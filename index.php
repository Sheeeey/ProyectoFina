<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"><link rel="stylesheet" href="./styles/style.css"> 
  <script type="text/javascript" src="./proc/validarlogin.js"></script>
</head>
<body>
<?php
    session_start();
    $_SESSION['login']=false;
?>


<!-- partial:index.partial.html -->
<form class="login"  action="proc/proc_login.php"  method="post">
  
  <input id="logemail" type="email" placeholder="Email" name="logemail">
  <input id= "logpass" type="password" placeholder="Password" name= "logpass">
  <button onclick="return validarLogin()" name="insesion" type="submit">Login</button>



  <?php
//   if (isset($_GET['msg'])) {
//     $msg=$_GET['msg'];
//     if ($msg==1) {
//     echo "<br>";
//     echo "<span>Usuario o Contraseña Incorrecto</span>";
//     echo "<br>";
//     }else{
//     }
// }
?>				
</form>
</body>
</html>
