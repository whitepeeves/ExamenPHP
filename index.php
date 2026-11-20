<!DOCTYPE html>
<html lang="es">




<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cara o Cruz 2.0 🗣️🗣️🗣️</title>


    <style>



        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #29037c;
            border-radius: 5px;




        }



        fieldset {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;

        }




        .moneda {
            font-size: 24px;
            font-weight: bold;


        }



    </style>














</head>
<body>


    <div class="container">
    <h1>Cara o Cruz 2.0</h1>



    <?php
    session_start();




    if (!isset($_SESSION['pot'])) {
        $_SESSION['pot'] = 100;









    }

    if (isset($_POST['reiniciar'])) {

        $_SESSION['pot'] = 100;
        $_SESSION['apostado'] = 0;
        $_SESSION['moneda'] = '';








    } elseif (isset($_POST['apostar'])) {
        $dinero = $_POST['dinero'];
        $postura = $_POST['postura'];





        if ($dinero > 0 && $dinero <= $_SESSION['pot']) {
            $_SESSION['pot'] -= $dinero;
            $_SESSION['apostado'] = $dinero;





            $moneda = rand(0, 1) ? 'CARA' : 'CRUZ';
            $_SESSION['moneda'] = $moneda;




            if ($moneda == $postura) {
                $_SESSION['pot'] += $dinero * 2;
            }





        }



    }


    ?>









    <form method="post">



        <fieldset>
            <legend>Moneda:</legend>
            <div class="moneda"><?php echo isset($_SESSION['moneda']) ? $_SESSION['moneda'] : ''; ?></div>




        </fieldset>




        <fieldset>

            <legend>Postura:</legend>
            <input type="number" name="dinero" placeholder="Dinero a apostar" required>


            <select name="postura" required>
                <option value="">Selecciona Cara o Cruz</option>
                <option value="CARA">Cara</option>
                <option value="CRUZ">Cruz</option>
            </select>


            <button type="submit" name="apostar">Apostar</button>


            
        </fieldset>

        <fieldset>

            <legend>POT:</legend>
            <div><?php echo $_SESSION['pot']; ?></div>





        </fieldset>



        <button type="submit" name="reiniciar">Reiniciar</button>




    </form>

    </div>












    
</body>
































</html>