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
            width: 90vh;
            height: 80vh;
            overflow-y: scroll;
            /* Esto crea una barra de desplazamiento vertical */
            scrollbar-width: 2px;
            /* Establece el grosor de la barra de desplazamiento */
            margin-top: 10px;
        }

        /* Personaliza la apariencia de la barra de desplazamiento */
        .menu-container::-webkit-scrollbar {
            width: 6px;
            /* Grosor de la barra de desplazamiento */
        }

        .menu-container::-webkit-scrollbar-thumb {
            background-color: #888;
            /* Color del pulgar de la barra de desplazamiento */
            border-radius: 3px;
            /* Borde redondeado del pulgar */
        }


        .menu-item {
            width: 90%;
            opacity: 0.97;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 20px;
            margin-left: 40px;
            transition: transform 0.3s;
            

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
            width: 50%;
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

        .links {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: right;
            width: 50%;
        }



        aside {
            width: 40vh;
            margin: 2vh;
            opacity: 0.9;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: fit-content;
        }

        main {
            display: flex;
        }

        .formBlock {
            margin-left: 50px;
            padding: 4px;
            margin-bottom: 30px;
        }

        .input-style {
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #555;
            outline: none;

        }

        .input-style:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .radio-inputs {
            display: flex;
            flex-wrap: wrap;
            border-radius: 0.5rem;
            background-color: #EEE;
            box-sizing: border-box;
            box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
            padding: 0.25rem;
            width: 60%;
            font-size: 14px;
        }

        .radio-inputs .radio {
            flex: 1 1 auto;
            text-align: center;
        }

        .radio-inputs .radio input {
            display: none;
        }

        .radio-inputs .radio .name {
            display: flex;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            border: none;
            padding: .5rem 0;
            color: rgba(51, 65, 85, 1);
            transition: all .15s ease-in-out;
        }

        .radio-inputs .radio input:checked+.name {
            background-color: #fff;
            font-weight: 600;
        }

        #p-form {
            text-align: center;
        }

        h3 {
            text-align: center;
        }

        /* Estilos para el control de rango */
        .range-container {
            display: flex;
            align-items: center;
        }

        .range-value {
            margin-left: 10px;
        }

        #button {
            --color: #0077ff;
            font-family: inherit;
            display: inline-block;
            width: 5em;
            height: 2.6em;
            line-height: 2.5em;
            overflow: hidden;
            cursor: pointer;
            margin: 20px;
            font-size: 17px;
            z-index: 1;
            color: var(--color);
            border: 2px solid var(--color);
            border-radius: 6px;
            position: relative;
            margin: auto;
            margin-left: 90px;
        }

        #button::before {
            position: absolute;
            content: "";
            background: var(--color);
            width: 150px;
            height: 200px;
            z-index: -1;
            border-radius: 50%;
        }

        #button:hover {
            color: white;
        }

        #button:before {
            top: 100%;
            left: 100%;
            transition: 0.3s all;
        }

        #button:hover::before {
            top: -30px;
            left: -30px;
        }

        .rating {
            display: inline-block;
        }

        .rating input {
            display: none;
        }

        .rating label {
            float: right;
            cursor: pointer;
            color: #ccc;
            transition: color 0.3s;
        }

        .rating label:before {
            content: '\2605';
            font-size: 30px;
        }

        .rating input:checked~label,
        .rating label:hover,
        .rating label:hover~label {
            color: #6f00ff;
            transition: color 0.3s;
        }


    </style>
    <link rel="stylesheet" href="../Templates/assets/outstyles.css">

</head>

<body>
    <nav id="navbar">
        <div class="flex items-center justify-between h-20 w-full pr-32 p-10 mt-5 mb-6">
            <img src="../Templates/media/logo.png" alt="Logo" class=" logo">

            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <!-- Add navigation links here -->
                </div>
            </div>
            <button class="md:hidden bg-transparent text-white hover:text-gray-300 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>

            <!-- Links del navbar -->
            <ul class="flex items-end p-5">
                <li class="">
                    <a href="carerList.php" class="font-bold p-2 text-xl">Feed</a>
                </li>
                <li class="">
                    <a href="../Controller/profileCarer.php" class="font-bold p-2 text-xl">Perfil</a>
                </li>
                <li class="">
                    <a href="../Controller/logout.php" class="btn-blue font-bold py-2 px-4 rounded-full focus:outline-none p-2 text-xl">Cerrar sesión</a>
                </li>
            </ul>
        </div>


    </nav>
    <main>
        <aside>
            <form id="filterForm" action="" method="get">
                <H3>FILTROS</H3>

                <div class="formBlock">
                    <label for="location"></label>
                    <input type="text" placeholder="Localizacion" class="input-style">
                </div>
                <p id="p-form">Lugar para alojar</p>
                <div class="formBlock">
                    <div class="radio-inputs">
                        <label class="radio">
                            <input type="radio" name="radio">
                            <span class="name">Si</span>
                        </label>

                        <label class="radio">
                            <input type="radio" name="radio">
                            <span class="name">No</span>
                        </label>
                    </div>
                </div>
                <div class="formBlock">
                    <div class="rating">
                        <input value="5" name="rating" id="star5" type="radio">
                        <label for="star5"></label>
                        <input value="4" name="rating" id="star4" type="radio">
                        <label for="star4"></label>
                        <input value="3" name="rating" id="star3" type="radio">
                        <label for="star3"></label>
                        <input value="2" name="rating" id="star2" type="radio">
                        <label for="star2"></label>
                        <input value="1" name="rating" id="star1" type="radio">
                        <label for="star1"></label>
                    </div>
                </div>
                <div class="formBlock">
                    <label for="">Precio máximo/hora</label>
                    <div class="range-container">
                        <input type="range" id="priceRange" placeholder="20" min="0" max="30" oninput="updateRangeValue(this.value)">
                        <output for="priceRange" class="range-value" id="rangeValue">0</output>
                    </div>
                </div>

                <button value="Filtrar" id="button"> Filtrar</button>
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
<script>
    function updateRangeValue(value) {
        document.querySelector('.range-value').textContent = value;
    }
</script>

</html>