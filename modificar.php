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
  <script type="text/javascript" src="./proc/validarcrearalumne.js"></script>
    <title>Document</title>
</head>
<body>
    <?php

        include './proc/conexion.php';
        $id=$_GET['id'];
        $sql = "SELECT * FROM tbl_alumne WHERE id_alumne=$id;";
        $result = mysqli_query($connection, $sql);
        $animal = mysqli_fetch_array($result, MYSQLI_ASSOC);

    ?>

    <form  class="login" action="./update.php" method="post">
    <H3>MODIFICAR USUARIO</H3>
        <input type="text" name="dni_alu" placeholder="DNI" value="<?php echo $animal['dni_alu']; ?>">
        <input type="text" name="nom_alu" placeholder="Nombre" value="<?php echo $animal['nom_alu']; ?>">
        <input type="text" name="cognom1_alu" placeholder="Apellido" value="<?php echo $animal['cognom1_alu']; ?>">
        <input type="text" name="cognom2_alu" placeholder="Apellido" value="<?php echo $animal['cognom2_alu']; ?>">
        <input type="text" name="telf_alu" placeholder="Telefono" value="<?php echo $animal['telf_alu']; ?>">
        <input type="text" name="email_alu" placeholder="Correo" value="<?php echo $animal['email_alu']; ?>">
        <input type="text" name="classe" placeholder="Classe" value="<?php echo $animal['classe']; ?>">
        <input type="text" name="passwd_alu" placeholder="Password" value="<?php echo $animal['passwd_alu']; ?>">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <input type="submit" value="Modificar">

    </form>

</body>
</html>