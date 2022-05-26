<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="shortcut icon" href="./img/modificar.svg" type="image/x-icon">
  <script type="text/javascript" src="./proc/validarcrearalumne.js"></script>
    <title>Document</title>
</head>
<body>
    
    <?php

        include './proc/conexion.php';
        $id=$_GET['id'];
        $sql = "SELECT * FROM tbl_professor WHERE id_professor=$id;";
        $result = mysqli_query($connection, $sql);
        $animal = mysqli_fetch_array($result, MYSQLI_ASSOC);

    ?>

    <form  class="login" action="./updatep.php" method="post">
    <H3>MODIFICAR USUARIO</H3>
        <input type="text" name="dni_prof" placeholder="DNI" required value="<?php echo $animal['dni_prof']; ?>">
        <input type="text" name="nom_prof" placeholder="Nombre" required value="<?php echo $animal['nom_prof']; ?>">
        <input type="text" name="cognom1_prof" placeholder="Apellido" required value="<?php echo $animal['cognom1_prof']; ?>">
        <input type="text" name="cognom2_prof" placeholder="Apellido" required value="<?php echo $animal['cognom2_prof']; ?>">
        <input type="text" name="telf" placeholder="Telefono" required value="<?php echo $animal['telf']; ?>">
        <input type="text" name="email_prof" placeholder="Correo" required value="<?php echo $animal['email_prof']; ?>">
        <input type="text" name="dept" placeholder="Departamento" required value="<?php echo $animal['dept']; ?>">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <input type="submit" value="Modificar">
    </form>
    <div class="paddingt paddingl">
        <button type="submit" value="Login" onclick="window.location.href = './adminp.php'" class="btn btn-outline-dark">Atrás</button>
    </div>

</body>
</html>