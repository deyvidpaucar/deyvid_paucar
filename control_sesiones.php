<?php

session_start();

if(isset($_POST)){
    $_SESSION['nombre'] = $_POST["nombre"];
    $_SESSION['clave'] = $_POST["clave"];

    //creamos una cookie para guardar los datos del usuario
    if(isset($_POST["chkRecordarme"])){
        if($_POST["chkRecordarme"]==true){
            $guardarPreferencias="nombre:".$_POST['nombre'].";clave:".$_POST['clave'];
            setcookie("recordarPreferencias",$guardarPreferencias,time()+(60*60*24),"/","localhost");
        }
    }else{
        if(isset($_COOKIE["recordar"])){
            setcookie("recordarPreferencias","",time()-(60*60*24*30),"/","localhost");
            
        }
    }
    header("Location:menu_principal.php");
}else{
    header("Location:index.php");
}

?>