<?php
require "../require/config.php";

function limpiarDatos($data) {    //Esta función corrige errores previos que pueda haber puesto el usuario
      $data = trim($data);    //Limpia los espacios tanto detrás como delante del string
      $data = stripslashes($data);    //
      $data = htmlspecialchars($data);    //Limpia caracteres especiales
      return $data;
  }

$name = $email = $phone = $address = $province =$Zcode=$news =$format =$othert =$city= "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (!empty($_POST["name"]) || !empty($_POST["phone"])|| !empty($_POST["email"])) {
        print_r($_POST);
      $name = limpiarDatos($_POST["name"]);
      $email = limpiarDatos($_POST["email"]);
      $phone = limpiarDatos($_POST["phone"]);

      if (isset($_POST["address"])) {
        $address = limpiarDatos($_POST["address"]);
      } else {
        $address = null;
      }
      
      
      if (isset($_POST["province"])) {
        $province = limpiarDatos($_POST["province"]);
      } else {
        $province = null;
      }
      if (isset($_POST["Zcode"])) {
        $Zcode = limpiarDatos($_POST["Zcode"]);
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
       } else {
         $format = null;
       }
       if (isset($_POST["othert"])) {
        $othert = limpiarDatos($_POST["othert"]);
      } else {
        $cheko = null;
      }
      if (isset($_POST["city"])) {
        $city = limpiarDatos($_POST["city"]);
      } else {
        $city = null;
      }
    }
  }
    

    //Nombre, email y número de teléfono

//Función para validar que el campo nombre no esté vacío y que además cumpla las condiciones que queremos
function validar_nombre($name) {
  if (!preg_match("/^[a-zA-Z-' ]$/",$name)) {
      return false;
  }
  else {
      return true;
  }
}

//Función para validar el campo movil (+34|0034|34)?[ -](6|7)[ -]([0-9][ -]){8}

function validar_movil($phone){
  if (!preg_match("(+34|0034|34)?[ -](6|7)[ -]([0-9][ -]*){8}",$phone)) {
      return false;
  }
  else {
      return true;
  }
}

    echo "<strong>Nombre </strong>".$name."<br>";
    echo "<strong>Email </strong>".$email."<br>";
    echo "<strong>Phone </strong>".$phone."<br>";
  //   foreach($cheko as $cheka){
  //     echo $cheka . "<br>";
  // }
?>