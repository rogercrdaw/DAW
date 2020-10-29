<!DOCTYPE html>
</div>
<html lang="en">

<head>
    <title>Cantina Pedralbes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
    <!-- PROPIO GRUPO 4 -->
    <link rel="stylesheet" href="../css/cantina.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/cantina.js"></script>
</head>
<!--cabezera-->
<header>
    <ul>
        <li class="nav-bar-title"><a class="active" href="../index.php">CANTINA PEDRALBES</a></li>
        <li class="nav-bar-icon"><a href="../index.php"><i class="fa fa-home"></i></a></li>

    </ul>
</header>
<!--Cierre cabezera y iniciamos body-->

<body>
    <div class="contenidor">
        <div class="content_left">
            <div class="formulario">
                <h3>Pagina de administracion de pedidos</h3>
                <?php

                /**Crear variable Date para saber la fecha de hoy.
                 * La usaremos para saber el nombre del archivo de pedidos de hoy */

                $fecha = getdate();
                $diaHoy =  $fecha['year'] . '-' . $fecha['mon'] . '-' . $fecha['mday'];

                //Obtener ruta actual absoluta y crear ruta del archivo de pedidos de hoy
                $rutaActual = getcwd();
                $rutaArchivoPedidosHoy = $rutaActual . '/' . $diaHoy . '.txt';

                //Si el archivo no existe es que no hay pedidos aun
                if (!file_exists($rutaArchivoPedidosHoy)) {
                    echo '<p>No hay pedidos para el dia de hoy</p>';
                } else {
                    //Abrir archivo y bolcar contenido en un array de pedidos
                    $gestor = fopen($rutaArchivoPedidosHoy, 'r');
                    $stringPedidos = fgets($gestor);
                    fclose($gestor);

                    $pedidos = explode('|', $stringPedidos);

                    for ($i = 0; $i < (count($pedidos) - 1); $i++) {
                        $pedido = explode("#", $pedidos[$i]);
                        $pedidoID = $pedido[0];
                        $pedidoDetalle = $pedido[1];
                        ?>
                        <button class="button-blue" type="button" onclick="mostrarCesta('<?= $pedidoDetalle ?>')">
                            <?= $pedidoID ?></button><br>
                    <?php
                        }
                        ?>
                    <form action="../index.php">
                        <button class="button-orange" type="submit">IR A PAGINA PRINCIPAL</button>
                    </form>
                <?php
                }

                ?>
            </div>
        </div>
        <div class="content_right">
        </div>
    </div>
    <footer>
        <div class="footer-left">
            <ul>
                <li>
                    <a href="admin/admin.php">Aviso legal</a>
                </li>
                <li>
                    <a href="#" onclick="alertaPremium('Esta pàgina web usa cookies\n\n')">Politica de privacidad</a>
                </li>
                <li>
                    <a href="#" onclick="alertaPremium('Grupo 4\nAleix, Oscar y Roger\n\n')">Sobre nosotros</a>
                </li>
                <ul>
        </div>
        <div class="footer-right">
            <ul>
                <li>
                    <a href="#" onclick="alertaPremium('Activa tus redes sociales con la versión Premium\n\nHazte premium por solo 5\'99€/mes\nPara mas información: oscar@inspedralbes.cat\n\n')">
                        <i class="fab fa-instagram"></i></a>
                </li>
                <li>
                    <a href="#" onclick="alertaPremium('Activa tus redes sociales con la versión Premium\n\nHazte premium por solo 5\'99€/mes\nPara mas información: oscar@inspedralbes.cat\n\n')">
                        <i class="fab fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#" onclick="alertaPremium('Activa tus redes sociales con la versión Premium\n\nHazte premium por solo 5\'99€/mes\nPara mas información: oscar@inspedralbes.cat\n\n')">
                        <i class="fab fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#" onclick="alertaPremium('Activa tus redes sociales con la versión Premium\n\nHazte premium por solo 5\'99€/mes\nPara mas información: oscar@inspedralbes.cat\n\n')">
                        <i class="fab fa-google-plus"></i></a>
                </li>
                </li>
            </ul>
        </div>
    </footer>
    <script>
        function alertaPremium(text) {
            alert(text);
        }
    </script>

    <script>
        function mostrarCesta(cesta) {
            console.log(cesta);
            document.getElementsByClassName('content_right')[0].innerHTML = cesta;
        }
    </script>