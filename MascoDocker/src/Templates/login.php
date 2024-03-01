<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
	<link rel="stylesheet" href="../Templates/assets/outstyles.css">

    <link rel="stylesheet" href="../Templates/assets/dog.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-image: 'url(../Templates/media/dalmatian-spots.svg)';
        }

        .login-container {
           /* Color de fondo del contenedor */
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 80%; /* Ajustar el ancho */
            text-align: center;
            border: 2px solid #0dc5de; /* Color de borde del contenedor */
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: white; /* Color de texto */
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 16px; /* Aumentar el tamaño del padding */
            margin-bottom: 20px;
            border: 1px solid #0dc5de; /* Color de borde */
            border-radius: 8px; /* Aumentar el radio de borde */
            transition: border-color 0.3s ease;
            color: white; /* Color de texto */
            background-color: #3bec1300; /* Color de fondo de los inputs */
            font-size: 18px; /* Aumentar el tamaño de fuente */
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            outline: none;
            border-color: linear-gradient(to right, #3bec13, #71f1f4); /* Color de borde al enfocar */
            color: white; /* Color de texto al enfocar */
        }

        .login-container #login-button {
            background-image: linear-gradient(to right, #0dc5de, #13ecc4);
            color: white;
            padding: 16px 30px; /* Aumentar el tamaño del padding */
            border: none;
            border-radius: 8px; /* Aumentar el radio de borde */
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 18px; /* Aumentar el tamaño de fuente */
        }
       

        .login-container .register-link {
            margin-top: 20px;
            color: white; /* Color del texto del enlace */
        }

        .login-container .register-link a {
            color: #71f1f4; /* Color del enlace */
            text-decoration: none;
        }

        .login-container .register-link a:hover {
            text-decoration: underline; /* Subrayar el enlace al pasar el mouse */
        }
    </style>
</head>

<body class= " text-white">
    <nav class="bg-transparent fixed top-0 left-0 right-0 z-10 w-4/5 m-auto "> 
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
				<span class="text-2xl">Mascotier</span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Add navigation links here -->
                    </div>
                </div>
            </div>
        </div>
</nav>

    <div class="login-container">
        <h2 class="text-4xl" >Iniciar Sesión</h2>
		<?php if(isset($msg_error)){echo $msg_error;}?>
        <form action="../Controller/login.php" method="post">
            <input type="text" name="email" placeholder="Correo electrónico">
            <input type="password" name="password" placeholder="Contraseña">
            <button type="submit" id="login-button">Iniciar Sesión</button>
        </form>
        <div class="register-link">
            <a href="../Templates/index.html">Volver atrás</a>
        </div>
    </div>
    <link rel="stylesheet" href="style.css">

<div class="doggy-container">
	
	<div class="bg-colour"></div>

	<div class="doggy doggy-sitting">
		<div class="dog-head-container look-left">
			<div class="dog-left-ear"></div>

			<div class="dog-head-2">
			</div>
			<div class="dog-head">
				<div class="dog-nose"></div>
			</div>
			<div class="dog-head-spot">
				<div class="dog-eye"></div>
			</div>
			<div class="dog-right-ear"></div>
		</div>
		<div class="dog-head-container look-right">
			<div class="dog-left-ear"></div>

			<div class="dog-head-2">
			</div>
			<div class="dog-head">
				<div class="dog-nose"></div>
			</div>
			<div class="dog-head-spot">
				<div class="dog-eye"></div>
			</div>
			<div class="dog-right-ear"></div>
		</div>
		<div class="collar">
			<div class="collar-shade"></div>
		</div>

		<div class="dog-torso">

			<div class="dog-torso-shade">
				<div class="light-right-dog-foot">
					<div class="swipes swipe-chest swipe-chest-light-right">
					<div class="swipe-1-light-right grey-swipe"></div>
					<div class="swipe-2-light-right grey-swipe"></div>
					</div>
				</div>
				<div class="light-right-dog-paw"></div>

			</div>

			<div class="left-dog-foot"></div>
			<div class="dog-torso-light">
				<div class="swipes swipe-chest swipe-chest-light">
					<div class="swipe-1-light grey-swipe"></div>
					<div class="swipe-2-light grey-swipe"></div>
				</div>
			</div>

			<div class="dog-torso-chest">
				<div class="swipes swipe-chest">
					<div class="swipe-1 grey-swipe"></div>
					<div class="swipe-2 grey-swipe"></div>
				</div>
			</div>

			<div class="right-dog-foot"></div>


		</div>

	<div class="doggy-cushion"></div>

	</div>



	<!-- Standing -->

	<div class="doggy doggy-standing">
		<div class="dog-head-container look-left dog-head-standing-up">
			<div class="dog-left-ear dog-left-ear-standing"></div>

			<div class="dog-head-2">
			</div>
			<div class="dog-head">
				<div class="dog-nose"></div>
			</div>
			<div class="dog-head-spot dog-head-spot-standing">
				<div class="dog-eye"></div>
			</div>
			<div class="dog-right-ear dog-right-ear-standing"></div>
		</div>

		<div class="collar collar-standing-up">
			<div class="collar-shade"></div>
		</div>

		<div class="dog-torso dog-torso-standing-up">

			<div class="right-leg-standing"></div>
			<div class="right-hind-standing"></div>

			
			<div class="left-leg-standing">
				<div class="swipes swipe-chest swipe-chest-light-right swipe-chest-standing-2">
					<div class="swipe-1-light-right grey-swipe"></div>
					<div class="swipe-2-light-right grey-swipe"></div>
				</div>
			</div>
			<div class="left-hind-standing"></div>

			<div class="left-dog-foot left-dog-foot-standing"></div>

			<div class="dog-torso-chest dog-chesting-standing-up ">
				<div class="swipes swipe-chest">
					<div class="swipe-1 grey-swipe"></div>
					<div class="swipe-2 grey-swipe"></div>
				</div>
			</div>

			<div class="dog-torso-light-standing">
				<div class="swipes swipe-chest swipe-chest-light-right swipe-chest-standing-1">
					<div class="swipe-1-light-right grey-swipe"></div>
					<div class="swipe-2-light-right grey-swipe"></div>
				</div>
			</div>
			<div class="right-dog-foot right-dog-foot-standing"></div>
		</div>
		<div class="doggy-cushion doggy-cushion-standing"></div>
	</div>



	<!-- Jumping -->


	<div class="doggy doggy-jumping">
		<div class="stars">
			<div class="circle-star circle-star-1"></div>
			<div class="circle-star circle-star-2"></div>
			<div class="circle-star circle-star-3"></div>
			<div class="circle-star circle-star-4"></div>

			<div class="diamond-star diamond-star-1"></div>
			<div class="diamond-star diamond-star-2"></div>
			<div class="diamond-star diamond-star-3"></div>

		</div>
		<div class="dog-head-container look-left dog-head-standing-up">
			<div class="dog-left-ear dog-left-ear-jumping"></div>

			<div class="dog-head-2">
			</div>
			<div class="dog-head">
				<div class="dog-nose"></div>
			</div>
			<div class="dog-head-spot dog-head-spot-standing">
				<div class="dog-eye"></div>
			</div>
			<div class="dog-right-ear dog-right-ear-jumping"></div>
		</div>

		<div class="collar collar-standing-up">
			<div class="collar-shade"></div>
		</div>

		<div class="dog-torso dog-torso-standing-up">

			<div class="right-leg-standing">
				<div class="swipes swipe-chest swipe-chest-light-right swipe-chest-jumping-1">
					<div class="swipe-1-light-right grey-swipe"></div>
					<div class="swipe-2-light-right grey-swipe"></div>
				</div>
			</div>
			<div class="right-hind-standing right-hind-jumping"></div>

			
			<div class="left-leg-standing left-leg-jumping "></div>
			<div class="left-hind-standing left-hind-jumping"></div>

			<div class="left-dog-foot left-dog-foot-jumping"></div>

			<div class="dog-torso-chest dog-chesting-standing-up ">
				<div class="swipes swipe-chest">
					<div class="swipe-1 grey-swipe"></div>
					<div class="swipe-2 grey-swipe"></div>
				</div>
			</div>

			<div class="dog-torso-light-standing">
				<div class="swipes swipe-chest swipe-chest-light-right swipe-chest-jumping-2">
					<div class="swipe-1-light-right grey-swipe"></div>
					<div class="swipe-2-light-right grey-swipe"></div>
				</div>
			</div>
			<div class="right-dog-foot right-dog-foot-jumping"></div>
		</div>
		<div class="doggy-cushion doggy-jumping-cushion"></div>
	</div>


</div>

    
</body>
<script src="scripts/dog.js"></script>

</html>
