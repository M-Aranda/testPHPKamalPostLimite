<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Indice</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="js/bootstrap.js">

        <style>
            .center {
                margin: auto;
                width: 10%;
                border: 3px solid #73AD21;
                padding: 10px;
            }

            #nombre{
                margin: auto;
                width: 90%;
                border: 2px solid #73AD21;
                padding: 10px;  
            }

            #clave{
                margin: auto;
                width: 90%;
                border: 2px solid #73AD21;
                padding: 10px;  
            }

            #ingresar{
                margin: auto;
                width: 100%;
                border: 1px solid #73AD21;
                padding: 10px;   
            }




        </style>



    </head>
    <body>

        <div class="center">



            <form action="../controller/IniciarSesion.php" method="post">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre :" required maxlength="15">
                <br>
                <input type="password" name="clave" id="clave" placeholder="clave :" required maxlength="10">
                <br>
                <br>
                <input id="ingresar" type="submit" value="Login" style="background-color: #007bff ">
            </form>
        </div>


    </body>
</html>