<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"><link rel="stylesheet" href="./styles/style.css">
  <link rel="shortcut icon" href="./img/admin.svg" type="image/x-icon">
  <script type="text/javascript" src="./proc/validarcrearprofe.js"></script>
</head>
<body>
    <h2></h2>
    <form class="login" name="formulario"  action="./insertadminp.php" method="post">
    <H3>CREAR PROFESOR</H3>
    <input id="logDNI" type="text" placeholder="DNI" name="log1DNI" required>
    <input id="lognombre" type="text" placeholder="Nombre" name="log1nombre" required>
    <input id="logapellido1" type="text" placeholder="1r Apellido" name="log1apellido1" required>
    <input id="logapellido2" type="text" placeholder="2n Apellido" name="log1apellido2" required>
    <input id="logemail" type="email" placeholder="Email" name="log1email" required>
    <input id= "logtelf" type="text" placeholder="Telefono" name="log1telf" required>
    <select id="logclase" name="log1dept">
      <option value="">--DEPT--</option>
      <option value="1">SMX</option>
      <option value="2">ASIX</option>
      <option value="3">DAW</option>
    </select>
    <input id="logpass" type="password" placeholder="Password" name= "log1pass" required>
    <button onclick="return validarProfe()" name="insesion" type="submit">Crear</button>
</form>
<div class="paddingt paddingl">
<button type="submit" value="Login" onclick="window.history.go(-1)" class="btn btn-outline-dark">Atrás</button>
</div>
</body>
</html>