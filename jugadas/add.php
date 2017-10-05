<?php
include '../incl/header.incl.php';
include("../incl/conn.incl.php"); // include the connection settings
include 'validate.php';
?>
<h1>Registrar Jugada</h1>
<?php
 
if (isset($_POST['submitted'])) {
//    foreach ($_POST AS $key => $value) {
//        $_POST[$key] = mysqli_real_escape_string($conn, $value);
//    }
  
    
        $sql = "INSERT INTO `jugada` ( `fecha` ,`hora` , `apuesta` , `ganancia`  ) VALUES(  '{$_POST['fecha']}' ,'{$_POST['hora']}' , '{$_POST['apuesta']}' , '{$_POST['ganancia']}' ) ";

        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        echo "Registrado con exito!<br />";
       
    }  
 
?>
<a href='index.php' class='btn btn-primary'>Regresar</a>
<form action='' method='post' class="form-horizontal"> 
    <div class="control-group">
        <label class="control-label" for="f_no"> Fecha:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Fecha" name='fecha'/>
<?php echo $validation['no'] ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_id">Hora:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Hora" name='hora'/> 
<?php echo $validation['id'] ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_name"> Apuesta:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Apuesta" name='apuesta'/> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_locallity"> Ganancia:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Ganancia" name='ganancia'/> 
        </div>
    </div>
    
     
    <div class="control-group">

        <div class="controls">
            <input type='hidden' value='1' name='submitted' />
            <input type='submit' value='Aceptar' class="btn btn-success btn-large" /> 
             
        </div>
    </div>
</form>


<?php
include '../incl/footer.incl.php';
?>
