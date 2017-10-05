<?php 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>
 
<?php
if(isset($_GET['delete'] , $_GET['id'])){
    if ($current_user['role'] == 'Clerk') {
echo "sorry Clerks are not allowed to access this module";
exit();
}
$f_no = (int) $_GET['id']; 
mysqli_query($conn,"DELETE FROM `jugada` WHERE `id` = '" .stripslashes($f_no)."' ") ; 
echo (mysqli_affected_rows($conn)) ? "La jugada ha sido eliminada!<br /> " : "No se ha eliminado la jugada!<br /> ";
}
?> 
<a class="btn btn-large btn-primary" href="add.php"><i class="icon-plus icon-white"></i>Registrar</a><br/><br/>
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
        <th>#</th>
        <th>Fecha:</th>
        <th>Hora:</th>
        <th>Apuesta:</th>
        <th>Ganancia:</th>
         <?php if ($current_user['role'] != 'Clerk') {?><th style="text-align: center">Acciones</th> <?php } ?>
        </thead>
    <tbody>
  <?php

$qry=  mysqli_query($conn,"select * from jugada") or die("unable to fetch records".  mysqli_error($conn));
$i=0;
while($row=  mysqli_fetch_array($qry))
{
    foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
    $i+=1;
    echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$row['fecha'].'</td>';
          echo '<td>'.$row['hora'].'</td>';
        echo '<td>'."Bs. ".$row['apuesta'].'</td>';
        echo '<td>'."Bs. ".$row['ganancia'].'</td>';
      
         if ($current_user['role'] != 'Clerk') {
             echo '<td  style="text-align: center">
                <a href="'.PAGE_URL.'jugadas/edit.php?edit=1&id='.$row['id'].'" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Editar</a> | 
                <a href="'.PAGE_URL.'jugadas/?delete=1&id='.$row['id'].'" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Eliminar</a> 
             </td>';
         }

    echo '</tr>';
}
?>
</tbody>
</table>


<?php 
include '../incl/footer.incl.php';
?>