<?php

include 'conexion.php';

function listarpreguntas()
{
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM preguntas where pregunta=1");

    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    if ($rows > 0) {

        $stmt->bind_result($pregunta, $respuesta1, $respuesta2, $respuesta3, $respuesta4, $respuestav);
        $stmt->fetch();

        echo " $pregunta,$respuesta1,respuesta2";

    }

}

function isNull($nombre, $user, $pass, $pass_con, $email)
{
    if (strlen(trim($nombre)) < 1 || strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($email)) < 1) {
        return true;
    } else {
        return false;
    }
}

function nulodoc($doc)
{
    if (strlen(trim($doc)) < 1) {
        return true;
    } else {
        return false;
    }
}

function isEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function validaPassword($var1, $var2)
{
    if (strcmp($var1, $var2) !== 0) {
        return false;
    } else {
        return true;
    }
}

function minMax($min, $max, $valor)
{
    if (strlen(trim($valor)) < $min) {
        return true;
    } else if (strlen(trim($valor)) > $max) {
        return true;
    } else {
        return false;
    }
}

function usuarioExiste($usuario)
{
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT usu_id FROM tbl_usuario WHERE usu_documento = ? LIMIT 1");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt->close();

    if ($num > 0) {
        return true;
    } else {
        return false;
    }
}

function emailExiste($email)
{
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT usu_id FROM tbl_usuario WHERE usu_correo = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt->close();

    if ($num > 0) {
        return true;
    } else {
        return false;
    }
}

function generateToken()
{
    $gen = md5(uniqid(mt_rand(), false));
    return $gen;
}

function hashPassword($password)
{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}

function resultBlock($errors)
{
    if (count($errors) > 0) {
        echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}

function registraUsuario($documento, $nombre, $apellido, $correo, $genero, $tipo, $grado, $institucion, $passwordd, $activacion, $token, $ultima, $solicitud)
{

    /*

    $servename = "localhost";
    $database = "tesis";
    $username = "root";
    $password = "";

    // conexion al servidor

    $con = mysqli_connect($servename, $username, $password, $database);

    //conexion al base de datos
    mysqli_select_db($con, $database);

    $insert="INSERT INTO tbl_usuario(USU_DOCUMENTO, USU_NOMBRE, USU_APELLIDO, USU_CORREO,USU_GENERO, USU_TIPO_USUARIO,grado, USU_INSTITUCION, USU_PASSWORD, USU_ACTIVACION, USU_TOKEN, USU_ULTIMA_SESION, USU_SOLICITUD) VALUES ('{$documento}','{$nombre}','{$apellido}','{$correo}','{$genero}','{$tipo}','{$grado}','{$institucion}','{$passwordd}','{$activacion}','{$token}','{$ultima}','{$solicitud}')";
     */

    global $mysqli;

    $sql = "INSERT INTO tbl_usuario(USU_DOCUMENTO, USU_NOMBRE, USU_APELLIDO, USU_CORREO,USU_GENERO, USU_TIPO_USUARIO,grado, USU_INSTITUCION, USU_PASSWORD, USU_ACTIVACION, USU_TOKEN, USU_ULTIMA_SESION, USU_SOLICITUD) VALUES ('{$documento}','{$nombre}','{$apellido}','{$correo}','{$genero}','{$tipo}','{$grado}','{$institucion}','{$passwordd}','{$activacion}','{$token}','{$ultima}','{$solicitud}')";

    $result = mysqli_query($mysqli, $sql);

    return $result;

/*
if($con->query($insert)===TRUE){
return 1;

}else{
return 0;
}
 */
}

function actulizardatos($id, $documento, $nombre, $apellido, $correo, $fecha, $genero, $tipo, $institucion, $passwordd)
{

    $servename = "localhost";
    $database  = "tesis";
    $username  = "root";
    $password  = "";

// conexion al servidor

    $con = mysqli_connect($servename, $username, $password, $database);
//conexion al base de datos
    mysqli_select_db($con, $database);

    $actulizar = "  UPDATE tbl_usuario SET USU_DOCUMENTO='{$documento}',USU_NOMBRE= '{$nombre}',USU_APELLIDO='{$apellido}' ,USU_CORREO= '{$correo}',USU_FECHA_NACIMIENTO ='{$fecha}',USU_GENERO='{$genero}' ,USU_TIPO_USUARIO='{$tipo}' ,USU_INSTITUCION='{$institucion}' ,USU_PASSWORD='{$passwordd}' WHERE USU_ID='{$id}'";

    if ($con->query($actulizar) === true) {
        return 1;

    } else {
        return 0;

    }

}

function enviarEmail($email, $nombre, $asunto, $cuerpo)
{

    require_once 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tipo de seguridad';
    $mail->Host       = 'smtp.hosting.com';
    $mail->Port       = 'puerto';

    $mail->Username = 'miemail@dominio.com';
    $mail->Password = 'password';

    $mail->setFrom('miemail@dominio.com', 'Sistema de Usuarios');
    $mail->addAddress($email, $nombre);

    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;
    $mail->IsHTML(true);

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }

}

function validaIdToken($id, $token)
{
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT usu_activacion FROM tbl_usuario WHERE usu_id = ? AND usu_token = ? LIMIT 1");
    $stmt->bind_param("is", $id, $token);
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    if ($rows > 0) {
        $stmt->bind_result($activacion);
        $stmt->fetch();

        if ($activacion == 1) {
            $msg = "La cuenta ya se activo anteriormente.";
        } else {
            if (activarUsuario($id)) {
                $msg = 'Cuenta activada.';
            } else {
                $msg = 'Error al Activar Cuenta';
            }
        }
    } else {
        $msg = 'No existe el registro para activar.';
    }
    return $msg;
}

function activarUsuario($id)
{
    global $mysqli;

    $stmt = $mysqli->prepare("UPDATE tbl_usuario SET usu_activacion=1 WHERE usu_id = ?");
    $stmt->bind_param('s', $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function isNullLogin($usuario, $password)
{
    if (strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1) {
        return true;
    } else {
        return false;
    }
}

function login($usuario, $passwordd)
{
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT usu_id, usu_tipo_usuario, usu_password FROM tbl_usuario WHERE usu_documento = ? || usu_correo = ? LIMIT 1");
    $stmt->bind_param("ss", $usuario, $usuario);
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    if ($rows > 0) {

        if (isActivo($usuario)) {

            $stmt->bind_result($id, $tipo_usuario, $passwd);
            $stmt->fetch();

            echo "$passwd";
            echo "$passwordd";

            if ($passwd == $passwordd) {

                lastSession($id);
                $_SESSION['id_usuario']   = $id;
                $_SESSION['tipo_usuario'] = $tipo_usuario;

                header("location:Vista/principal.php");
            } else {

                $errors = "La contrase&ntilde;a es incorrecta";
            }
        } else {
            $errors = 'El usuario no esta activo';
        }
    } else {
        $errors = "El nombre de usuario o correo electr&oacute;nico no existe";
    }
    return $errors;
}

function lastSession($id)
{

    global $mysqli;

    $stmt = $mysqli->prepare("UPDATE tbl_usuario SET usu_ultima_sesion=NOW(), usu_solicitud=1 WHERE usu_id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
}

function isActivo($usuario)
{
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT usu_activacion FROM tbl_usuario WHERE usu_documento = ? || usu_correo = ? LIMIT 1");
    $stmt->bind_param('ss', $usuario, $usuario);
    $stmt->execute();
    $stmt->bind_result($activacion);
    $stmt->fetch();

    if ($activacion == 1) {
        return true;
    } else {
        return false;
    }
}

function generaTokenPass($user_id)
{
    global $mysqli;

    $token = generateToken();

    $stmt = $mysqli->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id = ?");
    $stmt->bind_param('ss', $token, $user_id);
    $stmt->execute();
    $stmt->close();

    return $token;
}

function getValor($campo, $campoWhere, $valor)
{
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT $campo FROM usuarios WHERE $campoWhere = ? LIMIT 1");
    $stmt->bind_param('s', $valor);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num > 0) {
        $stmt->bind_result($_campo);
        $stmt->fetch();
        return $_campo;
    } else {
        return null;
    }
}

function getPasswordRequest($id)
{
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT usu_solicitud FROM tbl_usuario WHERE usu_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($_id);
    $stmt->fetch();

    if ($_id == 1) {
        return true;
    } else {
        return null;
    }
}

function buscarestudiante()
{
    global $mysqli;

    $sql = "SELECT  USU_ID,USU_DOCUMENTO,USU_NOMBRE,USU_APELLIDO ,USU_CORREO,USU_FECHA_NACIMIENTO,USU_GENERO ,USU_TIPO_USUARIO,USU_INSTITUCION ,USU_PASSWORD,USU_ULTIMA_SESION FROM tbl_usuario";

    $result = mysqli_query($mysqli, $sql);

    return $result;

}

function buscarestudiantedoc($doc)
{
    global $mysqli;

    $sql    = "SELECT usuarios.id,usuarios.nombre,usuarios.usuario, usuarios.password  FROM usuarios where id='$doc' ";
    $result = mysqli_query($mysqli, $sql);

    return $result;

}

function verificaTokenPass($user_id, $token)
{

    global $mysqli;

    $stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token_password = ? AND password_request = 1 LIMIT 1");
    $stmt->bind_param('is', $user_id, $token);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num > 0) {
        $stmt->bind_result($activacion);
        $stmt->fetch();
        if ($activacion == 1) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function cambiaPassword($password, $user_id, $token)
{

    global $mysqli;

    $stmt = $mysqli->prepare("UPDATE usuarios SET password = ?, token_password='', password_request=0 WHERE id = ? AND token_password = ?");
    $stmt->bind_param('sis', $password, $user_id, $token);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
