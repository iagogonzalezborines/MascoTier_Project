<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Owner</title>
    <link rel="stylesheet" href="../Templates/assets/outstyles.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        padding: 0;
        background-image: url(media/pattern3.svg);
    }
</style>

<body class="">
    <header>
        <nav class="flex items-center justify-between" id="navbar">
            <!-- temporal Logo -->
            <div class="flex items-center mr-10">
                <img class="h-20 w-20 " src="media/logo.svg" alt="Logo">
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
    </header>

    <hr>
    <h1 class="text-center text-white text-5xl m-5 ">Registro Dueño</h1>
    <div id="main-container" class="mt-10 p-10 bg-[#dfdf67] rounded-lg max-w-sm mx-auto">

        <form class="max-w-md mx-auto" action="../Controller/register.php" method="post">
        <?php if (isset($msg_error)) {
                echo "<p class='text-center'>$msg_error</p>";
            } ?>
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="email" id="email"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="pwd" id="pwd"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="pwd"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contraseña</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="repeat_pwd" id="repeat_pwd"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="repeat_pwd"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmar
                    contraseña</label>
                    
            </div>
            <div class=" md:grid-cols-2 md:gap-6 flex justify-center">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="name" id="name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                </div>

            </div>
            <div class="grid md:grid-cols-2 md:gap-6  justify-center">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="tel" name="phone" id="phone"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="phone"
                        class="text-center peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telefono</label>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6  justify-center">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="idDocument" id="idDocument"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dni:</label>
                </div>

            </div>

            <div class="grid md:grid-cols-2 md:gap-6  justify-center">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="date" name="birth-date" id="birth-date"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="birth-date"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Fecha de nacimiento</label>
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
                <input type="text" name="city" id="city"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="city"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">city</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="hidden" name="userType" id="userType" value="owner"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="userType"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label>
            </div>
            <div class="flex justify-center">
                <button type="submit"
                    class=" bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrarse</button>
            </div>
        </form>
    </div>
    <div class="flex justify-center m-1">
        <p class="text-white mr-5  "> Tienes cuenta de MascoTier?</p>
        <a href="login.html" class="text-blue-400">Iniciar sesion</a>
    </div>
</body>

</html>