<!DOCTYPE html>
<?php
require_once '../DataBase/dataBase.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista de cuidadores</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../Templates/scripts/carerListDropDown.js"></script>
    <style>
        .trFeedUser {
            text-align: center;
        }

        body {
            background-image: url('media/patternTETRIS.svg');
            
        }

        nav {
            
            width: 100%;
            min-height: 175px !important;
        }
        .logo {
            width: 150px;

        }
    </style>
</head>

<body class="">
    <header class="pt-11">
        <nav id="navbar">
            <div class="flex items-center justify-between h-20 w-full pr-32 p-10 mb-6">

                <img src="media/logo-removebg-preview.png" alt="" class="logo ml-28">

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
                <ul class="flex items-end w-1/2 justify-start p-5">

                    <li class="">
                        <a href="../Controller/profileCarer.php" class="btn-blue font-bold py-2 px-4 rounded-full focus:outline-none p-2 text-xl">Perfil</a>
                    </li>
                    <li class="">
                        <a href="/templates" class="btn-blue font-bold py-2 px-4 rounded-full focus:outline-none p-2 text-xl">Cerrar sesión</a>
                    </li>
                </ul>
            </div>

            <!--ENSEÑAR ESTO SOLO SI EL USUARIO NO ESTÁ VERIFICADO AÚN!!-->
            <div class=" m-auto w-5/6 bg-slate-100 text-black p-1 flex justify-center items-center ">
                <p> Aún no te has verificado? Hazlo ahora y consigue todas las funcionalidades de Mascotier de manera gratuíta </p>
                <button type="button" class=" text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-4 "><a href="/templates">Verificarme ahora!</a></button>

            </div>

        </nav>
        <h1 class="text-black text-center text-5xl mt-5">Cuidadores disponibles</h1>
    </header>


    <main class="m-10">

        <!-- table-->


        <div class=" w-3/4 relative overflow-x-auto m-auto rounded-xl">
            <table class="w-full text-sm text-left border-4 border-green-200 rtl:text-right ">
                <thead class="trFeedUser text-xs  uppercase  bg-green-200 text-black">
                    <tr>
                        <th class="px-6 py-3">
                            Nombre
                        </th>
                        <th class="px-6 py-3">
                            Zona
                        </th>
                        <th class="px-6 py-3">
                            Valoración
                        </th>
                        <th class="px-6 py-3">
                            Con lugar para cuidar?
                        </th>
                        <th class="px-6">
                            Reservar
                        </th>
                        <th class="px-6">
                            Saber más
                        </th>

                    </tr>
                </thead>
                <tbody>



                    <!--Generating the data for the table-->
                    <?php

                    $pdo = dataBase::getInstance();
                    $db = $pdo->connectToDatabase();

                    $statement = $db->prepare("SELECT * FROM `users` where (type='carer')"); //this number is the owner id so it has to be changed every time we use this file

                    $statement->execute();
                    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($data as $row) {
                        // Access the data fields using the column names
                        $username = $row['username'];
                        $zone = $row['area'];
                        $rating = $row['rating'];
                        $hasPlace = $row['hasPlace'];
                    ?>

                        <tr class="trFeedUser   border-b bg-green-100 text-black border-gray-700 ">

                            <th scope='row' class='px-6 py-4   text-gray-900 whitespace-nowrap '>
                                <?php echo "$username"; // Display the username 
                                ?>
                            </th>

                            <th scope='row' class='px-6 py-4  text-gray-900 whitespace-nowrap '>
                                <?php echo "$zone";  // Display the zone 
                                ?>
                            </th>

                            <th scope='row' class=' px-6 py-4  text-gray-900 whitespace-nowrap '>
                                <?php echo "$rating"; // Display the rating 
                                ?>
                            </th>

                            <th scope='row' class='px-6 py-4  text-gray-900 whitespace-nowrap '>
                                <?php if ($hasPlace == 1) {
                                    echo "Si";
                                } else {
                                    echo "No";
                                } // Display the HasPlace variable. si no especificas q tiene un lugar, no lo tiene
                                ?>
                            </th>

                            <th scope='row' class='px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white'>
                                <!--Send petition -->
                                <button type="button" class="text-white bg-gradient-to-r from-green-900 via-green-700 to-green-800 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="./signup_owner.html">Enviar petición</a></button>
                            </th>

                            <th scope='row' class='  text-gray-900 whitespace-nowrap dark:text-white'>
                                <!--Go to profile -->
                                <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="./signup_owner.html">Ir al perfil</a></button>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


    </main>

</body>

</html>