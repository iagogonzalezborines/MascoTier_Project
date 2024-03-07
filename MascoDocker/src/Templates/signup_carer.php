<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../Templates/assets/outstyles.css">

</head>
<style>
    body {
        background-color: #f5efd4;
        background-image: url(media/paws.jpg);
        
    }
</style>

<body>
    <header>
        <nav class="flex items-center justify-between w-max" id="navbar">
            
            <div class="flex items-center mr-10">
                <a href="index.html"><img class="h-20 w-20 m-0  " src="media/logo-removebg-preview.png" alt="Logo" /></a>
                <span class="text-black font-bold text-lg">MASCOTIER</span>
            </div>
            
    </header>

    <h1 class="text-center text-black font-bold text-5xl m-5 ">Registro Cuidador</h1>

    <div id="main-container" class="mt-10 p-10 bg-[#fcf6db] rounded-lg max-w-sm mx-auto">

        <form class="max-w-md mx-auto bg-[#fcf6db]" action="../Controller/register.php" method="post">
            <?php if (isset($msg_error)) {
                echo "<p class='text-center'>$msg_error</p>";
            } ?>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-green-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-500 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="pwd" id="pwd" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="pwd" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contraseña</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="repeat_pwd" id="repeat_pwd" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="repeat_pwd" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmar contraseña</label>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6  justify-center">


            </div>

            <div class="grid md:grid-cols-2 md:gap-6  justify-center">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="tel" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                    <label for="phone" class="text-center peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telefono</label>
                </div>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6  justify-center">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="idDocument" id="idDocument" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                    <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dni:</label>
                </div>

            </div>

            <div class="grid md:grid-cols-2 md:gap-6  justify-center">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="date" name="birth-date" id="birth-date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                    <label for="birth-date" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Fecha de nacimiento</label>
                </div>

            </div>



            <div class="relative z-0 w-full mb-5 group">
                <label for="country">País: (solo estamos en españa por el momento:(    )</label><span style="color: red !important; display: inline; float: none;">*</span>

                <select id="country" name="country" class="form-control">
                    <option value="España">España</option>
                                    </select>

                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <select name="province" id="province" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer" >
                                       
                                        <option value="Vigo">Vigo</option>

                                    </select>
                                    <label for="province" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-cyan-600 peer-focus:dark:text-cyan-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Provincia</label>
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <select name="city" id="city" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer" >
                                        <option value="">Introduce tu ciudad</option>
                                        <option value="Vigo">Vigo</option>

                                    </select>
                                    <label for="city" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-cyan-600 peer-focus:dark:text-cyan-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ciudad</label>
                                </div>
                                <div class="">
                                    <p class="text-gray-500 flex ">¿Dispones de un espacio apropiado para el cuidado de la mascota?</p>
                                    <input type="radio" name="hasPlace" value="yes" id="yes">
                                    <label for="yes" class="text-gray-500 mr-2">Si</label>
                                    <input type="radio" name="hasPlace" value="no" id="no">
                                    <label for="no" class="text-gray-500">No</label>

                                </div>


                                <script>
                                    $(document).ready(function() {
                                        $('#country').change(function() {
                                            var countryId = $(this).val();
                                            if (countryId) {
                                                $('#province').prop('disabled', false);
                                                $('#province').html('<option value="">Loading...</option>');
                                                $('#city').prop('disabled', true);
                                                $('#city').html('<option value="">Select City</option>');
                                                $.ajax({
                                                    url: 'get_provinces.php', // Replace with the PHP file to fetch provinces based on country
                                                    type: 'POST',
                                                    data: {
                                                        country_id: countryId
                                                    },
                                                    success: function(response) {
                                                        $('#province').html(response);
                                                    }
                                                });
                                            } else {
                                                $('#province').prop('disabled', true);
                                                $('#province').html('<option value="">Select Province</option>');
                                                $('#city').prop('disabled', true);
                                                $('#city').html('<option value="">Select City</option>');
                                            }
                                        });

                                        $('#province').change(function() {
                                            var provinceId = $(this).val();
                                            if (provinceId) {
                                                $('#city').prop('disabled', false);
                                                $('#city').html('<option value="">Loading...</option>');
                                                $.ajax({
                                                    url: 'get_cities.php', // Replace with the PHP file to fetch cities based on province
                                                    type: 'POST',
                                                    data: {
                                                        province_id: provinceId
                                                    },
                                                    success: function(response) {
                                                        $('#city').html(response);
                                                    }
                                                });
                                            } else {
                                                $('#city').prop('disabled', true);
                                                $('#city').html('<option value="">Select City</option>');
                                            }
                                        });
                                    });
                                </script>

                                <div class="flex justify-center">
                                    <button type="submit" class=" bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800">Registrarse</button>
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="hidden" name="userType" id="userType" value="carer" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-cyan-500 focus:outline-none focus:ring-0 focus:border-cyan-600 peer" placeholder=" " />
                                    <label for="area" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-cyan-600 peer-focus:dark:text-cyan-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label>
                                </div>
                            </form>
                        </div>
                        <div class="flex justify-center m-1">
                            <p class="text-black mr-5  "> ¿Dispones de una cuenta en MascoTier?</p>
                            <a href="login.html" class="text-cyan-600">Iniciar sesion</a>
                        </div>
                    </body>

                    </html>
