<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    <link rel="stylesheet" href="../Templates/assets/outstyles.css">

</head>
<style>
    body {
        color: #252f48;
        background-color: #f5efd4;
    }

    h1 {
        font-size: 3.5rem;
        font-weight: 700;
    }

    .divImageAndDesc {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 500px;

    }

    .logo {
        width: 15vh;
    }

    .hiddenForm {
        display: none;
    }
</style>

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
                    <a href="../Templates/carerList.php" class="font-bold p-2 text-xl">Feed</a>
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

        <div class="flex justify-center w-2/4 ">
            <div class="w-max-full  ">
                <h2 class="text-7xl font-bold  mb-8  text-center"><?php if (isset($row["username"])) echo $row["username"] ?></h2>

                <div class="divImageAndDesc ">
                    <figure>
                        <img src="../Templates/media/account.png" alt="imagen de usuario">
                    </figure>
                    <div>
                        <p> PLACEHOLDER ipsum dolor sit amet consectetur adipisicing elit. Officiis modi omnis eum et corrupti a accusamus quaerat eius alias! Natus laborum reiciendis praesentium veniam tempore est explicabo, iusto animi consequuntur.PLACEHOLDER </p>
                    </div>
                </div>

                <div class="m-10 flex flex-col justify-center items-center">

                    <p class="text-xl mb-2">Email: <?php if (isset($row["email"])) echo $row["email"] ?></p>
                    <p class="text-xl mb-2">Número de Teléfono: <?php if (isset($row["phone"])) echo $row["phone"] ?></p>
                    <p class="text-xl mb-2">Ubicación: <?php if (isset($row["area"])) echo $row["area"] ?></p>

                    <div class="m-5">
                        <button id="editPwd" class="flex p-2.5 #71f1f4 rounded-xl hover:rounded-3xl hover:bg-cyan-600 transition-all duration-300 text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Editar Perfil
                        </button>

                    </div>
                </div>
            </div>

        </div>

        <div id="hiddenForm" class="hiddenForm w-full flex  flex-wrap mb-8">
            <form class="max-w-md mx-auto ml-auto mb-auto p-5 bg-white rounded-lg shadow-2xl" action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                <div class="grid md:grid-cols-2 md:gap-6  justify-center">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php if (isset($row["username"])) echo $row["username"] ?>" />
                        <label for="name" class="text-center peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6  justify-center">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="tel" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php if (isset($row["phone"])) echo $row["phone"] ?>" />
                        <label for="phone" class="text-center peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telefono</label>
                    </div>
                </div>
                <div class="mb-4">
                    <p class="text-gray-500 flex ">Tienes un lugar para alojar la mascota?</p>
                    <input type="radio" name="place" value="yes" id="yes" checked>
                    <label for="yes" class="text-gray-500 mr-2">si</label>
                    <input type="radio" name="place" value="no" id="no">
                    <label for="no" class="text-gray-500">no</label>

                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="area" id="area" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php if (isset($row["area"])) echo $row["area"] ?>" />
                    <label for="area" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Area</label>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class=" bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
                </div>
            </form>
        </div>
    </main>



</body>
<script>
    const editPwdButton = document.getElementById("editPwd");
    const hiddenForm =  document.getElementById("hiddenForm");
    editPwdButton.addEventListener("click", () => {
        if (hiddenForm.style.display == "block") {
            hiddenForm.style.display = "none";
        } else {
            hiddenForm.style.display = "block";
        }
        
    });
</script>

</html>