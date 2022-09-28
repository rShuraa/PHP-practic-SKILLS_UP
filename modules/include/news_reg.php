<?php
require "../require/config.php";

$name = $email = $phone = $address = $province =$Zcode=$news =$format =$othert =$city= "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (!empty($_POST["name"]) || !empty($_POST["phone"])|| !empty($_POST["email"])) {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $address = $_POST["address"];
      $province = $_POST["province"];
      $Zcode = $_POST["Zcode"];
      $cheko = $_POST["new"];
      $format = $_POST["format"];
      $othert = $_POST["othert"];
      $city = $_POST["city"];
      } else {
        echo "Debe rellenar los datos requeridos";
      }
      
    }

    function limpiarDatos($data) {    //Esta función corrige errores previos que pueda haber puesto el usuario
      $data = trim($data);    //Limpia los espacios tanto detrás como delante del string
      $data = stripslashes($data);    //
      $data = htmlspecialchars($data);    //Limpia caracteres especiales
      return $data;
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

    echo "$name<br>";
    echo "$email<br>";
    echo "$phone<br>";
    echo "$address<br>";
    echo "$province<br>";
    echo "$Zcode<br>";
    foreach($cheko as $cheka){
      echo $cheka . "<br>";
  }
    echo "<br>$format<br>";
    echo "$othert<br>";
    echo "$city<br>";
?>