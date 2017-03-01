<?php
if (isset($_POST["submit"])) {
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$empresa = $_POST['empresa'];
$message = $_POST['message'];
$human = intval($_POST['human']);
$from = 'Contacto - Echeverri';
$to = 'jgep8211@hotmail.com,jorgemontoyab@gmail.com';
$subject = 'Contacto a través del sitio web';

$body ="From: $apellido . $nombre\n E-Mail: $email\n Empresa: $empresa\n Message:\n $message";
// Check if name has been entered
if (!$_POST['apellido']) {
$errApellido = 'Por favor ingrese su apellido';
}
// Check if name has been entered
if (!$_POST['nombre']) {
$errNombre = 'Por favor ingrese su nombre';
}

// Check if email has been entered and is valid
if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
$errEmail = 'Por favor ingrese una dirección de correo válida';
}

//Check if message has been entered
if (!$_POST['message']) {
$errMessage = 'Por favor ingrese su mensaje';
}
//Check if simple anti-bot test is correct
if ($human !== 5) {
$errHuman = 'La respuesta es incorrecta';
}
// If there are no errors, send the email
if (!$errApellido && !$errName && !$errEmail && !$errMessage && !$errHuman) {
if (mail ($to, $subject, $body, $from)) {
$result='<div class="alert alert-success">Gracias, nos pondremos en contacto con Ud. muy pronto</div>';
} else {
$result='<div class="alert alert-danger">Hubo un error enviando su mensaje. Inténtelo de nuevo más tarde.</div>';
}
}
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Contacto - Familia Echeverri</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://use.fontawesome.com/8c3aeef5e2.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Libre+Baskerville|Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="container container-1"><!-- Contenedor global -->
        <div class="interno">
            <header>
                <div class="row">
                    <div class="col-sm-12 hidden-xs">
                        <img class="banner" src="img/banner_path.svg" alt="Banner Principal">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 visible-xs-block">
                        <img class="banner-movil" src="img/banner_movil_path.svg" alt="Banner Principal">
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="col-xs-12">
                    <nav class="navbar navbar-default">
                        
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.html">Inicio <span class="sr-only">(activo)</span></a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fincas <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="bonanza.html">La Bonanza</a></li>
                                            <li><a href="orizaba.html">Orizaba</a></li>
                                            <li><a href="lajolla.html">La Jolla</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="cafe.html">El café</a></li>
                                    <li><a href="andes.html">Andes</a></li>
                                    <li><a href="galeria.html">Galería</a></li>
                                    <li class="active"><a href="#">Contacto</a></li>
                                </ul>
                                </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                                
                            </nav>
                        </div>
                    </div>
                    <div class="row contenido">
                    <div class="col-xs-12">
                        <h1 class="text-center">Contacto</h1>
                    </div>    
                    </div>
                    <div class="row contenido">
                    <div class="col-xs-12">
                        <form name="contactform" role="form" method="post" action="contacto-multimedico.php">
                            <div class="form-group">
                                <label for="inputApellido">Apellido</label>
                                <input type="text" class="form-control" id="inputApellido" placeholder="Apellido" name="apellido" value="<?php echo htmlspecialchars($_POST['apellido']); ?>">
                                <?php echo "<p class='text-danger'>$errApellido</p>";?>
                            </div>
                            <div class="form-group">
                                <label for="inputNombre">Nombre</label>
                                <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" name="nombre" value="<?php echo htmlspecialchars($_POST['nombre']); ?>">
                                <?php echo "<p class='text-danger'>$errNombre</p>";?>
                            </div>
                            <div class="form-group">
                                <label for="inputCorreo">Correo electrónico</label>
                                <input type="text" class="form-control" id="inputCorreo" placeholder="ejemplo@dominio.com" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                                <?php echo "<p class='text-danger'>$errEmail</p>";?>
                            </div>
                            <div class="form-group">
                                <label for="inputEmpresa">Empresa</label>
                                <input type="text" class="form-control" id="inputEmpresa" placeholder="Ingrese el nombre de su empresa" name="empresa" value="<?php echo htmlspecialchars($_POST['empresa']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="TextArea">Descripción</label>
                                <textarea class="form-control" rows="6" id="inputTextArea" placeholder="¿En qué le podemos ayudar?" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
                                <?php echo "<p class='text-danger'>$errMessage</p>";?>
                            </div>
                            <div class="form-group">
                                <label for="human">2 + 3 = ?</label>
                                <input type="text" class="form-control" id="human" name="human" placeholder="Su respuesta">
                                <?php echo "<p class='text-danger'>$errHuman</p>";?>
                            </div>
                            <div class="form-group">
                                <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
                            </div>
                            <div class="form-group">
                                <?php echo $result; ?>
                            </div>
                        </form>
                    </div>    
                    </div>
                    <div class="row footer">
                        
                        <div class="col-xs-6">
                            <h3>Enlaces de interés</h3>
                            <ul>
                                <li><a href="https://www.federaciondecafeteros.org/" target="_blank">Federación Nacional de Cafeteros</a></li>
                                <li><a href="http://www.cooperandes.com/" target="_blank">delosAndes Cooperativa</a></li>
                                <li><a href="http://cafepaisa.org/index.php?option=com_content&view=article&id=43&Itemid=29" target="_blank">Comité Departamental de Cafeteros de Antioquia</a></li>
                                <li><a href="https://federaciondecafeteros.org/static/files/Medidas_Cafeteras_Diarias.pdf" target="_blank">Medidas Cafeteras Diarias</a></li>
                                <li><a href="http://www.cafedecolombia.com/familia" target="_blank">Café de Colombia</a></li>
                                <li><a href="http://www.cenicafe.org/" target="_blank">Cenicafé</a></li>
                                <li><a href="http://www.andes-antioquia.gov.co/index.shtml#3" target="_blank">Municipio de Andes</a></li>
                                <li><a href="http://www.eljardin-antioquia.gov.co/index.shtml" target="_blank">Municipio de Jardín</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-6">
                            <div class="granito">
                                <address>
                                    <img src="img/grano_cafe.svg" alt="Grano de café con los colores de Colombia"> Familia Echeverri <br>
                                    Calle XX # XX-XX <br>
                                    Tel. xxxxxxxx <br>
                                    correo@correo.com <br>
                                    Andes - Antioquia <br>
                                    Colombia
                                </address>
                            </div>
                        </div>
                        
                    </div>
                </div>
                </div><!-- /Contenedor global -->
                
                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="js/bootstrap.min.js"></script>
    </body>
</html>