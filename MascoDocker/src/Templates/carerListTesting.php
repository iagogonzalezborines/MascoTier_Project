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
            background-color: #f4f4f4;
            color: #333;
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
            background-color: #333;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav .logo {
            display: block;
            width: 150px;
            margin: 0 auto;
        }

        .menu-container {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px auto;
            width: 100%;
        }

        .menu-item {
            width: 400px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 20px;
            margin-left:40px;
            overflow: hidden;
            transition: transform 0.3s;
            width: calc(33.33% - 20px);
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
    </style>
</head>

<body>
    <header>
        <h1>Lista de Cuidadores - Mascotier</h1>
    </header>

    <nav>
        <img src="media/logo-removebg-preview.png" alt="Logo de Mascotier" class="logo">
    </nav>

    <main>
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