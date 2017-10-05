<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
include 'validate.php';

if ($current_user['role'] == 'Clerk') {
echo "sorry Clerks are not allowed to access this module";
exit();
}

?>
<h1>Editar Jugada</h1>
<?php
//if (isset($_GET['edit']) && isset($_GET['id'])) {
    $f_no = (int) $_GET['id'];
    if (isset($_POST['submitted'])) {
        // 
               $sql = "UPDATE jugada SET  fecha =  '{$_POST['fecha']}' , hora =  '{$_POST['hora']}' ,  apuesta =  '{$_POST['apuesta']}' , ganancia =  '{$_POST['ganancia']}' WHERE id = '$f_no' ";
            $rslt = mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $f_no =  $_POST['f_no'];
            echo (mysqli_affected_rows($conn)) ? " Editado con exito!<br />" : "Hubo error! <br />";
            echo "";
            
         
    }
    $jugada_to_edit = mysqli_query($conn,"SELECT * FROM jugada WHERE id =".  stripslashes($f_no) );

    $row = mysqli_fetch_array($jugada_to_edit);
     //echo $validation['nulls'];
    ?>
<a href='index.php' class='btn btn-primary'>Regresar</a>
<form action='' method='post' class="form-horizontal"> 
    <div class="control-group">
        <label class="control-label" for="f_no"> Fecha:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Fecha" name='fecha' value='<?php echo stripslashes($row['fecha']) ?>'/>
<?php echo $validation['fecha'] ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_id">Hora:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Hora" name='hora' value='<?php echo stripslashes($row['hora']) ?>'/> 
<?php echo $validation['id'] ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_name"> Apuesta:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Apuesta" name='apuesta' value='<?php echo stripslashes($row['apuesta']) ?>'/> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_locallity"> Ganancia:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Ganancia" name='ganancia' value='<?php echo stripslashes($row['ganancia']) ?>'/> 
        </div>
    </div>
    
     
    <div class="control-group">

        <div class="controls">
            <input type='hidden' value='1' name='submitted' />
            <input type='submit' value='Aceptar' class="btn btn-success btn-large" /> 
             
        </div>
    </div>
</form>
<?php  //} ?> 