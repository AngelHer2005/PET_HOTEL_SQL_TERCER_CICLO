<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PET HOTEL</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>        
    <header>
		<a href="#" class="logo">PET HOTEL</a>
        <nav>
            <ul>
                <li><a href="#Inicio">INICIO</a></li>
                <li><a href="#Nosotros">NOSOTROS</a></li>
                <li><a href="#Servicios">SERVICIOS</a></li>
                <li><a href="#Contacto">CONTACTO</a></li>
                <li><a href="LOGIN.php">LOGOUT</a></li>
            </ul>
        </nav>
	</header>
    </div>
    <main>
    <div class="Inicio" id="Inicio">
        <img src="https://static.wixstatic.com/media/9d51e4_05e4350bc8294bba98c84aefac1956df~mv2.png/v1/fill/w_789,h_446,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/LOGOMIPATA.png" alt="LOGO">
        <div class="Bienvenido">
            <span>BIENVENIDO A</span>
            <span>PET HOTEL</span>
            <p>¡Tu mascota merece lo mejor! <br>En nuestro PET HOTEL cuidamos de ellos con cariño y profesionalismo. ¡Haz tu reserva ahora!</p>
            <a href="RESERVAS.php" style="font-weight:bold;" class="btn btn-danger btn-lg">HAZ TU RESERVA</a>
        </div>
    </div>
            
        <div class="Nosotros" id="Nosotros">
            <span>SOBRE NOSOTROS</span>
            <p>En PET HOTEL, entendemos que tu mascota es parte de tu familia. Nuestro compromiso es brindarle a tu compañero peludo un hogar lejos de casa, donde se sienta amado, seguro y feliz.</p>
        </div>
        <div class="Servicios" id="Servicios">
            <p class="text-center">NUESTROS SERVICIOS</p>
            <div class="ser1">
                <img src="https://img.freepik.com/vector-premium/diseno-logotipo-tienda-mascotas-cachorro-medio-patas-perro-ilustracion-vector-plano-plantilla-animal_463676-1612.jpg?w=740" alt="">
                <span>Hospedaje Premium</span>
                <p>Ofrecemos alojamiento de primera clase para tu mascota en un entorno seguro y confortable. Nuestras instalaciones están diseñadas para que tu mascota se sienta como en casa mientras estás fuera, con atención personalizada y comodidades especiales.</p>
            </div>
            <div class="ser2">
                <img src="https://img.freepik.com/vector-premium/diseno-logotipo-tienda-mascotas-cachorro-medio-patas-perro-ilustracion-vector-plano-plantilla-animal_463676-1612.jpg?w=740" alt="">
                <span>Servicios de Spa y Belleza</span>
                <p>Ofrecemos alojamiento de primera clase para tu mascota en un entorno seguro y confortable. Nuestras instalaciones están diseñadas para que tu mascota se sienta como en casa mientras estás fuera, con atención personalizada y comodidades especiales.</p>
            </div>
            <div class="ser3">
                <img src="https://img.freepik.com/vector-premium/diseno-logotipo-tienda-mascotas-cachorro-medio-patas-perro-ilustracion-vector-plano-plantilla-animal_463676-1612.jpg?w=740" alt="">
                <span>Paseos y Actividades Recreativas</span>
                <p>Brindamos paseos diarios y actividades recreativas supervisadas para que tu mascota se mantenga activa y entretenida durante su estancia. Nuestro personal capacitado se asegura de que tu mascota reciba el ejercicio y la estimulación mental adecuados.</p>
            </div>
            <div class="ser4">
                <img src="https://img.freepik.com/vector-premium/diseno-logotipo-tienda-mascotas-cachorro-medio-patas-perro-ilustracion-vector-plano-plantilla-animal_463676-1612.jpg?w=740" alt="">
                <span>Servicio de Alimentación Especializada</span>
                <p>Proporcionamos dietas personalizadas y atención especializada para mascotas con necesidades dietéticas específicas. Nos aseguramos de que tu mascota reciba la alimentación adecuada según sus requerimientos y preferencias.</p>
            </div>
        </div>
        <hr>
        <div class="Contacto" id="Contacto">
            <div class="contact-info">
                <h2>CONTÁCTANOS</h2>
                <p>Av. Los Álamos 183, Chilca 15870,</p>
                <p>Chilca, Peru</p>
                <p>997 150 226</p>
                <p><a href="mailto:angelhernanpatricioarroyo@gmail.com">angelhernanpatricioarroyo@gmail.com</a></p>
                <p>Horario de atención:</p>
                <p>HORARIOS DE ATENCIÓN AL PÚBLICO:</p>
                <p>De 8:30 am a 5:30 pm</p>
                <div class="social-icons">
                    <a href="#"><img src="../IMÁGENES/wsp.png" alt="Facebook"></a>
                    <a href="#"><img src="../IMÁGENES/gmail.png" alt="Gmail"></a>
                    <a href="#"><img src="../IMÁGENES/github.png" alt="GitHub"></a>
                </div>
            </div>
            <div class="contact-form">
                    <div class="text-center"><h1>FORMULARIO</h1></div>
                    <div class="mb-3">
                        <label for="nombre">Nombre:&ensp;</label>
                        <input type="text" id="nombre" name="nombre" required>
                        <label for="apellido">&ensp;Apellido:&ensp;</label>
                        <input type="text" id="apellido" name="apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email:&ensp;</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje">Mensaje:&ensp;</label>
                        <textarea id="mensaje" name="mensaje" class="form-control h-100" rows="4" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
    <script type="text/javascript">
		window.addEventListener("scroll", function(){
			var header = document.querySelector("header");
			header.classList.toggle("abajo",window.scrollY>0);
		})
	</script>
</body>
</html>