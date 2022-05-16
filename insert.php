<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include './proc/conexion';



$comprobar= "SELECT id_professor FROM tbl_professor;";
$cons = mysqli_query($connection,$comprobar);
$lista_emails=array();

while ($fila = mysqli_fetch_assoc($cons)){
    $lista_emails[]=$fila['id_professor']; 
}

$cont =0;
foreach($lineas as $linea){
    if($cont==0){
        $cont++;
        continue;
    }
    $campos = explode(";",$linea);
    // echo $campos[3];
    // echo "<br>";
    $Nombre=$campos[0];
    $Raça=$campos[1];
    $Pais=$campos[2];
    $Edat=$campos[3];

  if (!in_array($campos[2],$lista_emails)) {
    $sql = "INSERT INTO id_professor (nom_ani, raça_ani, pais_ani, edat_ani) VALUES ('$Nombre', '$Raça', '$Pais', '$Edat');";
    $insert = mysqli_query($connection, $sql);
    echo "<script type=\"text/javascript\">alert(\"Usuario '$Nombre' agregado correctamente\");</script>"; 
    } else{
        echo "<script type=\"text/javascript\">alert(\"Usuario '$Nombre' repetido\");</script>"; 
    }



}


?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Proceso terminado',
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

        aviso('./admin.php');
    </script>
</body>
</html>