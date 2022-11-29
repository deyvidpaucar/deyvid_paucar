<?php
$nombre="";
$clave="";
$recordarUsuario= false;
//si se selecciona la opcion "recordarme" hacer:
if(isset($_COOKIE["recordarPreferencias"])){
    $datos= explode(";", $_COOKIE["recordarPreferencias"]);
    $nombre = explode(":",$datos[0])[1];
    $clave= explode(":",$datos[1])[1];

    $recordarUsuario=true;
}

?>



<html>
    <head>
        <title> REGISTRO</title>
    </head>
    <body>
        <h1>LOGIN</h1>
        <form action="control_sesiones.php" method="POST">
            Usuario:<br>
            <input type="text" name="nombre" value="<?php if($recordarUsuario){echo $nombre;}else{echo "";} ?>"/><br>
            Clave:<br>
            <input type="password" name="clave" value="<?php if($recordarUsuario){echo $clave;}else{echo "";} ?>"/><br>
            <br>
            <input type="checkbox" name="chkRecordarme" <?php if($recordarUsuario){echo "checked";}?>>Recordarme</input><br>
            <br>
            <input type="submit" name="Enviar"/>
        </form>
    </body>
</html>