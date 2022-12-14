<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio PHP 1</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <h1>The Code Review</h1>
    </header>

    <div class="top">
        <h2>Signup for our newsletter</h2>
        <p>Get a the latest news on how your code is doing right in your inbox</p>
    </div>
    <div class="wrapper">
        <hr class="thick">
        <hr>
        <form action="../modules/include/news_reg.php" method="post">
            <fieldset class="contact">
                <legend>Contact Information</legend>
                <div class="contact_input">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Required">
                    <br>
                </div>
                <div class="contact_input">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Required"><br>
                </div>
                <div class="contact_input">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Required"><br>
                </div>
                <div class="contact_input">
                    <label for="address">Calle / Address</label>
                    <input type="text" id="address" name="address"><br>
                </div>
                <div class="contact_input">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city"><br>
                </div>
                <div class="contact_input">
                    <label for="province">Province</label>
                    <select name="province" id="province">
                        <option value="">Elige Provincia</option>
                        <option value="??lava/Araba">??lava/Araba</option>
                        <option value="Albacete">Albacete</option>
                        <option value="Alicante">Alicante</option>
                        <option value="Almer??a">Almer??a</option>
                        <option value="Asturias">Asturias</option>
                        <option value="??vila">??vila</option>
                        <option value="Badajoz">Badajoz</option>
                        <option value="Baleares">Baleares</option>
                        <option value="Barcelona">Barcelona</option>
                        <option value="Burgos">Burgos</option>
                        <option value="C??ceres">C??ceres</option>
                        <option value="C??diz">C??diz</option>
                        <option value="Cantabria">Cantabria</option>
                        <option value="Castell??n">Castell??n</option>
                        <option value="Ceuta">Ceuta</option>
                        <option value="Ciudad Real">Ciudad Real</option>
                        <option value="C??rdoba">C??rdoba</option>
                        <option value="Cuenca">Cuenca</option>
                        <option value="Gerona/Girona">Gerona/Girona</option>
                        <option value="Granada">Granada</option>
                        <option value="Guadalajara">Guadalajara</option>
                        <option value="Guip??zcoa/Gipuzkoa">Guip??zcoa/Gipuzkoa</option>
                        <option value="Huelva">Huelva</option>
                        <option value="Huesca">Huesca</option>
                        <option value="Ja??n">Ja??n</option>
                        <option value="La Coru??a/A Coru??a">La Coru??a/A Coru??a</option>
                        <option value="La Rioja">La Rioja</option>
                        <option value="Las Palmas">Las Palmas</option>
                        <option value="Le??n">Le??n</option>
                        <option value="L??rida/Lleida">L??rida/Lleida</option>
                        <option value="Lugo">Lugo</option>
                        <option value="Madrid">Madrid</option>
                        <option value="M??laga">M??laga</option>
                        <option value="Melilla">Melilla</option>
                        <option value="Murcia">Murcia</option>
                        <option value="Navarra">Navarra</option>
                        <option value="Orense/Ourense">Orense/Ourense</option>
                        <option value="Palencia">Palencia</option>
                        <option value="Pontevedra">Pontevedra</option>
                        <option value="Salamanca">Salamanca</option>
                        <option value="Segovia">Segovia</option>
                        <option value="Sevilla">Sevilla</option>
                        <option value="Soria">Soria</option>
                        <option value="Tarragona">Tarragona</option>
                        <option value="Tenerife">Tenerife</option>
                        <option value="Teruel">Teruel</option>
                        <option value="Toledo">Toledo</option>
                        <option value="Valencia">Valencia</option>
                        <option value="Valladolid">Valladolid</option>
                        <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                        <option value="Zamora">Zamora</option>
                        <option value="Zaragoza">Zaragoza</option>
                    </select><br></div>
                <div class="contact_input">
                    <label id="label_Zcode" for="Zcode">Zip Code</label><br>
                    <input type="text" id="Zcode" name="Zcode"><br>
                </div>
            </fieldset>
            <hr>
            <fieldset class="news radio checkbox">
                <legend>Newsletter</legend>
                <label>Select the newsletters you would like to recive</label><br>
                <br>
                <input id="newshtml" type="checkbox" value="100" name="new[]">
                <label for="newshtml">HTML News</label><br>
                <br>
                <input id="newscss" type="checkbox" value="010" name="new[]">
                <label for="newscss">CSS News</label><br>
                <br>
                <input id="newsjs" type="checkbox" value="001" name="new[]">
                <label for="newsjs">Javascript News</label><br>
                <br>
                <label>Newsletter format</label><br>
                <br>
                <input id="fhtml" type="radio" name="format" value="fhtml">
                <label for="fhtml">HTML</label><br>
                <br>                
                <input id="fplaintxt" type="radio" name="format" value="fplaintxt">
                <label for="fplaintxt">Plain text</label><br>
                <br>
                <label for="othert">Other topics you'd like to hear about</label><br>
                <br>
                <textarea id="othert" name="othert" placeholder="Write the topics you would like to read..."></textarea>
            </fieldset>

            <button type="submit">Sign Up</button>
        </form>
</div>

<?php include '../modules/include/footer.php';?>

</body>
</html>