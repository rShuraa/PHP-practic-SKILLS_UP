<?php
require "../require/config.php";

function limpiarDatos($data) {    //Esta función corrige errores previos que pueda haber puesto el usuario
  $data = trim($data);    //Limpia los espacios tanto detrás como delante del string
          $data = stripslashes($data);    //
          $data = htmlspecialchars($data);    //Limpia caracteres especiales
          return $data;
      }

  $name = $email = $phone = $address = $province =$Zcode=$news =$format =$othert =$city= "";
  $name_err = $email_err = $phone_err = false;

function validar_nombre($name) {
  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) { 
    return false;
  } else{
    return true;
  }
}

function validar_movil($phone){
  if (!preg_match("/^[0-9]{9}+$/",$phone)) { 
    return false;
} else{
    return true;
}
}

function validar_email($email) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  return true;
} else {
  return false;
}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["name"]) || !empty($_POST["phone"])|| !empty($_POST["email"])) {
    $name = limpiarDatos($_POST["name"]);
    $email = limpiarDatos($_POST["email"]);
    $phone = limpiarDatos($_POST["phone"]);


    if (!validar_nombre($name)){
      $name_err = true;
    }

    if (!validar_email($email)){
      $email_err = true;
    }

    if (!validar_movil($phone)){
      $phone_err = true;
    } 
      
    

    if (validar_nombre($name) && validar_email($email) && validar_movil($phone)) {
      echo "<strong>Name: </strong>".$name."<br/><strong>Email: </strong>".$email."<br/><strong>Phone: </strong>".$phone."<br/>";
    

    if (isset($_POST["address"])) {
      $address = limpiarDatos($_POST["address"]);
      echo "<strong>Address: </strong>".$address."<br/>";
    } else {
      $address = null;
    }


    if (isset($_POST["province"])) {
      $province = limpiarDatos($_POST["province"]);
      echo "<strong>Province: </strong>".$province."<br/>";
    } else {
      $province = null;
    }

    if (isset($_POST["city"])) {
      $city = limpiarDatos($_POST["city"]);
      echo "<strong>City: </strong>".$city."<br/>";
    } else {
      $city = null;
    }

    if (isset($_POST["Zcode"])) {
      $Zcode = limpiarDatos($_POST["Zcode"]);
      echo "<strong>Z-Code: </strong>".$Zcode."<br/>";
    } else {
      $Zcode = null;
    }
    
    if (isset($_POST["new"])) {
      $cheko = limpiarDatos($_POST["new"]);
      var_dump($cheko);
    } else {
      $cheko = null;
    }

    if (isset($_POST["format"])) {
      $format = limpiarDatos($_POST["format"]);
      echo "<strong>Format: </strong>".$format."<br/>";
    } else {
      $format = null;
    }


    if (isset($_POST["othert"])) {
      $othert = limpiarDatos($_POST["othert"]);
      echo "<strong>Comment: </strong>".$othert."<br/>";
    } else {
      $othert = null;
    }
  } else {
      if ($name_err == true) {
        echo "Formato de nombre incorrecto<br/>";
      } if ($email_err == true) {
        echo "Formato de email incorrecto<br/>";
      } if ($phone_err == true) {
        echo "Formato de teléfono incorrecto<br/>";
      }
    }
  } else {
  echo "MENSAJE DE VALORES REQUERIDOS NO HAN LLEGADO";
  }
} else {
  echo "METODO POST NO HA LLEGADO";
}
    

    //Nombre, email y número de teléfono

//Función para validar que el campo nombre no esté vacío y que además cumpla las condiciones que queremos






  //   foreach($cheko as $cheka){
  //     echo $cheka . "<br>";
  // }
?>