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
    <title>Modificar Profesores</title>
</head>
<body>
    <?php

        include './proc/conexion.php';
        $dni = $_POST['dni_prof'];
        $nom = $_POST['nom_prof'];
        $cog1 = $_POST['cognom1_prof'];
        $cog2 = $_POST['cognom2_prof'];
        $telf = $_POST['telf'];
        $email = $_POST['email_prof'];
        $clase = $_POST['dept'];
        $id = $_POST['id'];

        $sql = "UPDATE `tbl_professor` SET `dni_prof` = '$dni', `nom_prof` = '$nom', `cognom1_prof` = '$cog1', `cognom2_prof` = '$cog2', `telf` = '$telf', `email_prof` = '$email', `dept` = '$clase' WHERE `id_professor`= $id";
        mysqli_query($connection, $sql);

    ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Registro modificado',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
        }

        aviso('./adminp.php');
    </script>

</body>
</html>