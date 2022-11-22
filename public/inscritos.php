<?php 
    require "../modules/require/config.php";
    htmlspecialchars($_SERVER['PHP_SELF']);
    $_SERVER['REQUEST_METHOD'] == null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Info</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css"> <!-- Se va ALV -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET') : ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST"></form>
            <button name="nombrequequieran">USUARIO -></button>
        </form>
    <?php else : ?>
        <?php 
        $sql = "SELECT * news_reg";
        $stmt = $conn->prepare($sql);
        $stmt -> execute();
        
        if ($result = $stmt->setFetchMode(PDO::FETCH_ASSOC)) {
            echo "<table>
            <thead>
                <tr>
                    <td class='tab_principal'>NOMBRE</td>
                    <td class='tab_principal'>EMAIL</td>
                    <td class='tab_principal'>PHONE</td>
                    <td class='tab_principal'>ADDRESS</td>
                    <td class='tab_principal'>CITY</td>
                    <td class='tab_principal'>PROVINCE</td>
                    <td class='tab_principal'>ZCODE</td>
                </tr>
            </thead>";
            foreach (($rows = $stmt->fetchAll()) as $row ) {
                echo "<tr>
                <td class='tab_secundaria'>".$rows['fullname']."</td>
                <td class='tab_secundaria'>".$rows['email']."</td>
                <td class='tab_secundaria'>".$rows['phone']."</td>
                <td class='tab_secundaria'>".$rows['address']."</td>
                <td class='tab_secundaria'>".$rows['city']."</td>
                <td class='tab_secundaria'>".$rows['state']."</td>
                <td class='tab_secundaria'>".$rows['zipcode']."</td>
            </tr>
            <tr>
                <td><div class='tab_principal'>Newsletter</div><div class='tab_secundaria'>".$rows['newsletters']."</div></td>
                <td class='tab_principal'>SUGGESTION</td>
                <td class='tab_secundaria' colspan='4'>".$rows['suggestion']."</td>
                <td><div class='tab_principal'>FORMAT</div><div class='tab_secundaria'>".$rows['format_news']."</div></td>
            </tr>";
            }
            echo "</table>";
        } else {
            echo "<p> 0 Results, no found data</p><br/>";
        }
        $conn = null;
        ?>
    <?php endif ?>
</main>
        
</body>
</html>