<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a name="profbut" type="button" class="btn btn-primary">Profesores</a>
<a name="alubut" type="button" class="btn btn-primary">Alumnos</a>
<?php
session_start();

include './proc/conexion.php';

$boton1=$_POST['alubut'];
$boton2=$_POST['profbut'];

if(isset($boton1)) {
    $sql = "SELECT * FROM tbl_alumne;";
    $listadodept= mysqli_query($connection, $sql);

    foreach ($listadodept as $alumno) {
        
        // echo $rutacompleta;
        echo '<tr>';
        echo "<td>{$alumno['dni_alu']}</td>";
        echo "<td>{$alumno['nom_alu']}</td>";
        echo "<td>{$alumno['cognom1_alu']}</td>";
        echo "<td>{$alumno['cognom2_alu']}</td>";
        echo "<td>{$alumno['email_alu']}</td>";
        echo "<td>{$alumno['classe']}</td>";
        echo "<td>{$alumno['telf_alu']}</td>";
        echo "<td>{$alumno['passwd_alu']}</td>";
        ?>
        <td><button type="button" class="btn btn-danger" onClick="aviso('borrar.php?id=<?php echo $alumno['id_alumne']; ?>')" >Borrar</button></td>
    
        <td><button class="btn btn-primary" onClick="aviso('modificar.php?id=<?php echo $alumno['id_alumne']; ?>')">Modificar</button></td>

        <td><button type="button" class="btn btn-warning" onClick="aviso('borrar.php?id=<?php echo $alumno['id_alumne']; ?>')" >Email</button></td>
        <?php
    }
        echo '</table>';
    ?>
    <script>

    function aviso(url) {
        Swal.fire({
            title: '¿Estas seguro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
        })
    }
        
        
    </script>
    <?php
} else if (isset($boton2)) {

    $sql1 = "SELECT * FROM tbl_professor;";
    $listadoprof= mysqli_query($connection, $sql1);

    foreach ($listadoprof as $professor) {
        
        // echo $rutacompleta;
        echo '<tr>';
        echo "<td>{$professor['nom_prof']}</td>";
        echo "<td>{$professor['cognom1_prof']}</td>";
        echo "<td>{$professor['cognom2_prof']}</td>";
        echo "<td>{$professor['email_prof']}</td>";
        echo "<td>{$professor['telf']}</td>";
        echo "<td>{$professor['dept']}</td>";
        echo "<td>{$professor['passwd_prof']}</td>";
        ?>
        <td><button type="button" class="btn btn-danger" onClick="aviso('borrar.php?id=<?php echo $professor['id_professor']; ?>')" >Borrar</button></td>
    
        <td><button class="btn btn-primary" onClick="aviso('modificar.php?id=<?php echo $professor['id_professor']; ?>')">Modificar</button></td>

        <td><button type="button" class="btn btn-warning" onClick="aviso('borrar.php?id=<?php echo $professor['id_professor']; ?>')" >Email</button></td>
        <?php
    }
}
?>

<form id="form-filter" name="form-filter">
    <div class="form-wrapper small">

        <div class="input-wrapper">
            <button class="navbar-button form-label" type="button" id="product-btn">Alumno <span class="form-span"><i class="fas fa-caret-down"></span></i></button>

            <?php 
            $tipoProductos = Utils::showTiposProductos(); 
            ?>
            <div class="product-wrapper" id="produc-category">
                <?php while($tipo = $tipoProductos->fetch_object()): ?> 
                    <label class="label-wrapper" for="<?=$tipo->nombre?>"><?=$tipo->nombre?>
                        <input class="checkbox" type="checkbox" name="id_tipo" id="<?=$tipo->nombre?>" value="<?=$tipo->id?>">
                        <span class="checkmark"></span>   
                    </label>
                <?php endwhile; ?> 
            </div>
        </div>

    </div>
</form>   

</body>
</html>
