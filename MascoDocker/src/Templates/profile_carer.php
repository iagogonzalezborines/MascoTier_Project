<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    <link rel="stylesheet" href="../Templates/assets/outstyles.css">
    
</head>

<body class="bg-gray-900 text-white">
    <div class="flex m-10 ">
    <div class="flex justify-start flex-wrap w-2/3 ml-5">
        <div class="m-auto flex justify-center w-1/2 ">
            <img src="../Templates/media/cat1.png" alt="" class="w-1/2  rounded-full border-4 border-white">
        </div>

        <div class="w-max-full ">
            <h2 class="text-7xl font-bold mb-4  text-center"><?php if(isset($row["username"]))echo $row["username"]?></h2>
            <p class="text-lg text-center mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod,
                nunc vitae
                aliquam tincidunt, nisl mauris tincidunt urna, a aliquam nunc nisl id nunc.</p>
            <div class="m-10 flex flex-col justify-center items-center">    

                <p class="text-xl mb-2">Email: <?php if(isset($row["email"]))echo $row["email"]?></p>
                <p class="text-xl mb-2">Número de Teléfono: <?php if(isset($row["phone"]))echo $row["phone"]?></p>
                <p class="text-xl mb-2">Ubicación: <?php if(isset($row["area"]))echo $row["area"]?></p>

                <div class="m-5">
                    <button id="editPwd"
                        class="flex p-2.5 #71f1f4 rounded-xl hover:rounded-3xl hover:bg-cyan-600 transition-all duration-300 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Editar Perfil
                    </button>
                </div>
            </div>
        </div>
        
    </div>
    <div class="w-full flex  flex-wrap">
        <h1 class="text-7xl w-full text-center m-auto ">Perfil</h1>
    <form class="max-w-md mx-auto ml-auto mb-auto p-5 bg-white rounded-lg" action="../Controller/profileCarer.php" method="post">
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " value="<?php if(isset($row["email"])) echo $row["email"] ?>" />
            <label for="email"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo</label>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6  justify-center">
        <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="name" id="name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " value="<?php if(isset($row["username"])) echo $row["username"] ?>"/>
                <label for="name"
                    class="text-center peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
            </div>

        </div>
        <div class="grid md:grid-cols-2 md:gap-6  justify-center">
            <div class="relative z-0 w-full mb-5 group">
                <input type="tel" name="phone" id="phone"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " value="<?php if(isset($row["phone"])) echo $row["phone"] ?>" />
                <label for="phone"
                    class="text-center peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telefono</label>
            </div>
        </div>
        <div class="">
            <p class="text-gray-500 flex ">Tienes un lugar para alojar la mascota?</p>
            <input type="radio" name="place" value="yes" id="yes">
            <label for="yes" class="text-gray-500 mr-2">si</label>
            <input type="radio" name="place" value="no" id="no">
            <label for="no" class="text-gray-500">no</label>

        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="area" id="area"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " value="<?php if(isset($row["area"])) echo $row["area"] ?>" />
            <label for="area"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Area</label>
        </div>
        <div class="flex justify-center">
            <button type="submit"
                class=" bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
        </div>
    </form>
</div>
</div>
</body>
<script>

</script>

</html>