<?php
require "../require/config.php";

function limpiarDatos($data) {    //Esta función corrige errores previos que pueda haber puesto el usuario
  $data = trim($data);    //Limpia los espacios tanto detrás como delante del string
          $data = stripslashes($data);    //
          $data = htmlspecialchars($data);    //Limpia caracteres especiales
          return $data;
      }

  $name = $email = $phone = $address = $province =$Zcode=$news =$format =$othert =$city="";
  $name_err = $email_err = $phone_err = false;
  $chekeao;

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

      if (isset($_POST["city"])) {
        $city = limpiarDatos($_POST["city"]);
      } else {
        $city = null;
      }

      if (isset($_POST["Zcode"])) {
        $Zcode = limpiarDatos($_POST["Zcode"]);
        
      } else {
        $Zcode = null;
      }
      
      $cheko = filter_input(
        INPUT_POST, //Pilla el post del index
        'new', //este es el name de tu input checkbox del array
        FILTER_SANITIZE_SPECIAL_CHARS, //limpia datos
        FILTER_REQUIRE_ARRAY //lo convierte en array
      );
      $string=implode("," ,$cheko); //Mete en la variable $string todos los elementos del array + una coma

      
      

      // if (isset($_POST["format"])) {
      //   $format = limpiarDatos($_POST["format"]);
        
      // } else {
      //   $format = null;
      // }


      


      if (isset($_POST['format'])) {
        $format = limpiarDatos($_POST["format"]);
        if ($format == "fhtml") {
          $format = 0;
        } else {
          $format = 1;
        }
      }


      if (isset($_POST["othert"])) {
        $othert = limpiarDatos($_POST["othert"]);
      } else {
      $othert = null;
      }

      $lenArray = count($cheko);
      switch ($lenArray) {
        case 1:
          if ($cheko[0]=="100") {
            $chekeao = bindec('100');
          } elseif ($cheko[0]=="010") {
            $chekeao =bindec('010');
          } else {
            $chekeao = bindec('001');
          }
          break;
        
        case 2:
          if ($cheko[0] != "100") {
            $chekeao = bindec('011');
          } elseif ($cheko[1] != "010") {
            $chekeao = bindec('101');
          } else {
            $chekeao = bindec('110');
          }
          break;
          
        case 3:
          $chekeao = bindec('111');
          break;

        default:
          $chekeao = bindec('100');
          break;
      }

      try {
        $sql = "SELECT * from news_reg WHERE fullname = :fullname OR email = :email OR phone = :phone";
  
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fullname',$name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
  
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        echo "Resultado es: " . var_dump($resultado) . "<br>";
  
        if ($resultado){
          echo "La información existe.<br>";
        } else{
          try {
            $sql = "INSERT INTO news_reg (fullname, email, phone, address, city, state, zipcode, newsletters, format_news, suggestion) VALUES (:fullname, :email, :phone, :address, :city, :state, :zipcode, :newsletters,:format_news, :suggestion)";
  
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fullname', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':city', $city, PDO::PARAM_STR);
            $stmt->bindParam(':state', $province, PDO::PARAM_STR);
            $stmt->bindParam(':zipcode', $Zcode, PDO::PARAM_STR);
            $stmt->bindParam(':newsletters', $chekeao, PDO::PARAM_INT);
            $stmt->bindParam(':format_news', $format, PDO::PARAM_INT);
            $stmt->bindParam(':suggestion', $othert, PDO::PARAM_STR);
  
            $stmt->execute();
            echo "Datos introducidos correctamente.<br>";
          } catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
          }
        }
      } catch (PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
      }



      echo "<strong>Name: </strong>".$name."<br/>";
      echo "<strong>Email: </strong>".$email."<br/>";
      echo "<strong>Phone: </strong>".$phone."<br/>";
      echo "<strong>Address: </strong>".$address."<br/>";
      echo "<strong>Province: </strong>".$province."<br/>";
      echo "<strong>City: </strong>".$city."<br/>";
      echo "<strong>Z-Code: </strong>".$Zcode."<br/>";
      echo "<strong>Format: </strong>".$format."<br/>";
      echo "<strong>Comment: </strong>".$othert."<br/>";
      echo "<strong>News: </strong>".$string."<br>";
      // var_dump($cheko);
      echo "<strong>News: </strong>".$chekeao."<br>";


      
  } else {
      if ($name_err == true) {
        echo "Formato de nombre incorrecto<br/>";
      } 
      if ($email_err == true) {
        echo "Formato de email incorrecto<br/>";
      } 
      if ($phone_err == true) {
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



//El array si me viene 1pues compruebo cual me llegó, dependiendo de que me llegó lo compruebo con un switch y le establezco la variable en funcion de su valor 


  //   foreach($cheko as $cheka){
  //     echo $cheka . "<br>";
  // }
?>