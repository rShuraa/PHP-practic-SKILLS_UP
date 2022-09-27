<?php
require "../require/config.php";

$name = $email = $phone = $address = $province =$Zcode =$newshtml =$newscss =$newsjs =$format =$othert = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $address = $_POST["address"];
      $province = $_POST["province"];
      $Zcode = $_POST["Zcode"];
      $news = $_POST["newshtml"];
      $format = $_POST["format"];
      $othert = $_POST["othert"];
      $city = $_POST["city"];
    }

    echo "$name";
    echo "$email";
    echo "$phone";
    echo "$address";
    echo "$province";
    echo "$Zcode";
    echo "$news";
    echo "$format";
    echo "$othert";
    echo "$city";
?>