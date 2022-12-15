<p>
    Al hacer click en el boton de abajo, se va agenerar un pdf simulando que fuese un contrato.
    <br>
    En este caso, el contenido de este, va ser solamente, la información del usuario con la fecha actual.
</p>
<form method="post" action="index.php?nuevo" class="border text-primary bg-light">
    <input type="submit" value="GENERAR COTNRATO" class="w-100 btn btn-outline-success" name="generar">
</form>
<?php 
    
try{
    include('vista\dashboard\alerts.php'); 
}catch (Exception $e) { }?>