<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cuidadores - Mascotier</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('media/pattern6.svg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Estilos del encabezado */
        header {
            background-color: #fff;
            padding: 10px 0;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }

        /* Estilos del navbar */
        nav {
            background-color: #f6f8f7;
            opacity: 0.97;
            border-radius: 20px;
            display: flex;
            flex-direction: row;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav .logo {
            left: 100px;
            display: flex;
            width: 120px;
            margin-left: 30px;
        }

        .menu-container {

            align-self: center;
            justify-self: center;
            margin: auto;
            margin-left: 10vh;
            width: 80vh;
        }

        .menu-item {
            width: 400px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 20px;
            margin-left: 40px;
            transition: transform 0.3s;
            width: 100%;

            /* Para mostrar en columnas hacia abajo */
            display: flex;
            flex-direction: row;
        }

        .menu-item:hover {
            transform: scale(1.05);
        }

        .game-image-container {
            width: 120px;
            /* Aumentamos un poco el tamaño de la imagen */
            height: 120px;
            /* Aumentamos un poco el tamaño de la imagen */
            border-radius: 8px 0 0 8px;
            /* Borde redondeado solo a la izquierda */
            overflow: hidden;
        }

        .game-image-container img {
            width: 100%;
            /* Para que la imagen se ajuste correctamente al contenedor */
            height: 100%;
            /* Para que la imagen se ajuste correctamente al contenedor */
            object-fit: cover;
            /* Para evitar que la imagen se deforme */
        }

        .game-text {
            padding: 20px;
            /* Aumentamos el espacio interno */
            text-align: left;
            /* Alineamos el texto a la izquierda */
            flex-grow: 1;
            /* Hacemos que el texto ocupe el espacio restante */
        }

        .game-text h1 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }

        .game-text p {
            margin: 5px 0;
            color: #666;
        }

        aside {
            width: 40vh;
            border: 4px solid black;
            margin: 2vh;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        main {
            display: flex;
        }


    </style>
</head>

<body>


    <nav>
        <img src="media/logo-removebg-preview.png" alt="Logo de Mascotier" class="logo">
    </nav>

    <main>
        <aside>
        <form action="" method="get">
            <H3>FILTROS</H3>
            
            

            </form>
        </aside>
        <div class="menu-container">
            <?php
            // Requerir la clase de la base de datos
            require_once '../DataBase/dataBase.php';

            // Conectar a la base de datos
            $pdo = dataBase::getInstance();
            $db = $pdo->connectToDatabase();

            // Preparar y ejecutar la consulta
            $statement = $db->prepare("SELECT * FROM `users` WHERE type = 'carer'");
            $statement->execute();
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Iterar sobre los datos y mostrarlos en el menú de rectángulos flotantes
            foreach ($data as $row) {
                $username = $row['username'];
                $zone = $row['area'];
                $rating = $row['rating'];
                $hasPlace = $row['hasPlace'];
            ?>
                <div class="menu-item">
                    <div class="game-image-container">
                        <!-- Puedes colocar la imagen del cuidador aquí -->
                        <img src="media/happydoggo.png" alt="Avatar de <?php echo $username; ?>">
                    </div>
                    <div class="game-text">
                        <h1><?php echo $username; ?></h1>
                        <p>Zona: <?php echo $zone; ?></p>
                        <p>Valoración: <?php echo $rating; ?></p>
                        <p>Con lugar para cuidar: <?php echo ($hasPlace == 1) ? "Sí" : "No"; ?></p>
                        <!-- Puedes agregar más información sobre el cuidador aquí -->
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
</body>

</html>