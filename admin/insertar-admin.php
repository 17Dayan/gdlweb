<?php


if(isset($_POST['agrear-admin'])) {
    $usuario = $_POST['usuario'];
    $nombre =  $_POST['nombre'];
    $password = $_POST['password'];

    $opciones = array{
        'cost' => 12
        
    };

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try {
         
   
       $stnt = $conn->prepare("INSERT INTO admins(usuario, nombre, password") VALUES (?, ?, ?);
       $stnt->bind_param("sss", $usuario, $nombre, $password_hashed);
       $stnt->execute();
       $id_registro = $stnt->insert_id;
       if($stnt->affected_rows) {
           $respuesta = array](
               'respuesta' => 'exito',
               'id_admin' => $id_registro
             );

            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
          
       }
       $stnt->close();
       $conn->close();
    }catch (Exception $e) {
        echo "Error:" . $e-getMessage();
    }
    die(json_encode($respuesta));
}
if(isset($_POST['login-admin'])){
    $usuario = $_POST['admin'];
    $password = $_POST['password'];

    try {
        include_once 'funciones/funciones.php';
        $stnt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?;");
        $stnt->bind_param("s", $usuario);
        $stnt->execute();
        $stnt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);
    }catch (Exception $e) {
        echo "Error:" . $e->getMessage();
    }

    die(json_encode($respuesta);)
}