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
    <script src="scripts/carerListDropDown.js"></script>

</head>

<body class="bg-gray-800 p-4">
    <header>
        <nav class="flex items-center justify-between" id="navbar">
            <!-- temporal Logo -->
            <div class="flex items-center mr-10">
                <img class="h-20 w-20" src="media/logo.svg" alt="Logo" />
                <span class="text-white font-bold text-lg">MASCOTIER</span>
            </div>
            <!-- Links del navbar -->
            <ul class="flex items-center w-1/2 justify-start p-5">
                <li class="mr-6">
                    <a href="#" class="text-gray-100 hover:text-blue-400">Item</a>
                </li>
                <li class="mr-6">
                    <a href="#" class="text-gray-100 hover:text-blue-400">Item</a>
                </li>
                <li class="mr-6">
                    <a href="#" class="text-gray-100 hover:text-blue-400">Item</a>
                </li>
                <li class="mr-6">
                    <a href="#" class="text-gray-100 hover:text-blue-400">Item</a>
                </li>
                <li class="mr-6">
                    <a href="#" class="text-gray-100 hover:text-blue-400">Item</a>
                </li>
                <li class="mr-6">
                    <a href="#" class="text-gray-100 hover:text-blue-400">Item</a>
                </li>
            </ul>
        </nav>
        <h1 class="text-white text-center text-5xl">lista de cuidadores</h1>
    </header>


    <main class="m-10">

        <!-- table-->


        <div class="bg-white w-3/4 relative overflow-x-auto m-auto rounded-xl">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                    <th class="px-6 py-3">
                            
                        </th>
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
                            Disponibilidad
                        </th>
                        <th class="px-6">
                            Reservar
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
                        <tr class="trFeedUser bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                            <th>
                                <svg class="arrowDownDropDown w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </th>
                            <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                <?php echo "$username"; // Display the username 
                                ?>
                            </th>

                            <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                <?php echo "$zone";  // Display the zone 
                                ?>
                            </th>

                            <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                <?php echo "$rating"; // Display the rating 
                                ?>
                            </th>

                            <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                <?php if ($hasPlace == 1) {
                                    echo "Si";
                                } else {
                                    echo "No";
                                } // Display the HasPlace variable. si no especificas q tiene un lugar, no lo tiene
                                ?>
                            </th>

                            <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                <!--Display the rating -->
                                <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="./signup_owner.html">Enviar petición</a></button>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


    </main>

</body>

</html>