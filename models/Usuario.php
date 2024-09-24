<?php 
    class Usuario extends Conectar{

        public function login(){
            $conectar=parent::conexion();
            parent::set_names();
            if(isset($_POST["cli_ruc"])){
                $correo = $_POST["usu_correo"];
                $pass = $_POST["usu_pass"];
                if(empty($correo)and empty($pass)){
                    header("Location:".conectar::ruta()."index.php?m=2");
                    exit();
                }else{
                    $sql = "SELECT * FROM `tm_usuario` WHERE `usu_correo`=? and `usu_pass`=? and estado=1";
                    $stmt=$conectar->prepare($sql);
                    $stmt -> bindValue(1, $correo);
                    $stmt -> bindValue(2, $pass);
                    $stmt -> execute();
                    $resultado = $stmt->fetch();
                    if(is_array($resultado)and count($resultado)>0){

                    }else{
                        header("Location:".conectar::ruta()."index.php?m=2");
                    }


                }
            }
        }
    }
?>