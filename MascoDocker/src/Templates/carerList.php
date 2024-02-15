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
                            Nombre
                        </th>
                        <th class="px-6 py-3">
                            Zona
                        </th>
                        <th class="px-6 py-3">
                            Valoración
                        </th>
                        <th class="px-6 py-3">
                            Estado
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

                        //make the tr
                        echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                        //Make the th
                        echo "<th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>";
                        // Display the username
                        echo "$username";
                        echo "</th>";

                        echo "<th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>";
                        // Display the zone
                        echo "$zone";
                        echo "</th>";

                        echo "<th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>";
                        // Display the rating
                        echo "$rating";
                        echo "</th>";

                        echo "<th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>";
                        // Display the HasPlace variable
                        if ($hasPlace==1) {
                            echo "Si";
                        }else{
                            echo "No"; //Por defecto, si no especifica q tiene un lugar, no lo tiene
                        }
                        echo "</th>";
                        
                        echo "<th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>";
                        // Display the rating
                        echo '<button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="./signup_owner.html">Enviar petición</a></button>';
                        echo "</th>";

                        echo "</tr>";
                    }

                    ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            Bueno y fiable
                        </td>
                        <td class="px-6 py-4">
                            ***
                        </td>
                        <td class="px-6 py-4">
                            Disponible
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Microsoft Surface Pro
                        </th>
                        <td class="px-6 py-4">
                            White
                        </td>
                        <td class="px-6 py-4">
                            Laptop PC
                        </td>
                        <td class="px-6 py-4">
                            $1999
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Magic Mouse 2
                        </th>
                        <td class="px-6 py-4">
                            Black
                        </td>
                        <td class="px-6 py-4">
                            Accessories
                        </td>
                        <td class="px-6 py-4">
                            $99
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </main>

</body>

</html>