<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"><link rel="stylesheet" href="./styles/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<form class="login"  action="./proc/proc_login.php" method="post">
  <input type="text" placeholder="Email" name="logemail">
  <input type="password" placeholder="Password" name= "logpass">
  <button name="insesion" type="submit">Login</button>
</form>

<a href="https://codepen.io/davinci/" target="_blank">check my other pens</a>
<!-- partial -->
<?php
// if (isset($_GET['msg'])) {
// $msg=$_GET['msg'];
// if ($msg==1) {
// echo "<br>";
// echo "<span>Usuario o Contraseña Incorrecto</span>";
// echo "<br>";
// }else{
// }
// }
?> 
</body>
</html>
