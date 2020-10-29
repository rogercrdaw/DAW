<div class="main"><?php
                    include('header.php');
                    ?>
    <div class="contenidor">
        <div class="content_left">

            <?php
            // SOLO SI existen todos los datos que recibimos por POST del formulario
            if ((isset($_POST['name'])) && (isset($_POST['telf'])) && (isset($_POST['email'])) && (isset($_POST['pedido'])) && (isset($_POST['total']))) {

                // Procedemos a grabar los datos en el archivo de pedidos

                /**Crear variable Date para saber la fecha de hoy.
                 * La utilizamos para dar nombre al archivo de pedidos de hoy
                 * y assignar un numero de pedidos único en milisegundos */

                $fecha = getdate();
                $numPedido = $fecha[0];
                $diaHoy =  $fecha['year'] . '-' . $fecha['mon'] . '-' . $fecha['mday'];

                //Obtener ruta actual absoluta y crear ruta del archivo de pedidos de hoy
                $rutaActual = getcwd();
                $rutaArchivoPedidosHoy = $rutaActual . '/admin' . '/' . $diaHoy . '.txt';

                /**Abrir archivo (crear si no existe), bloquearlo y sobreescribir con puntero
                 * al final del archivo para no borrar datos ya existentes */
                $nuevoPedido = $numPedido . ' - ' . $_POST['name'] . ' - ' . $_POST['telf'] . ' - ' . $_POST['email'] . ' - ' . $_POST['total'] . '#' . $_POST['pedido'] . '|';
                if (file_put_contents($rutaArchivoPedidosHoy, $nuevoPedido, FILE_APPEND | LOCK_EX)) {
                    // Si se graban los datos correctamente, proceder a crear cookies
                    setcookie('userName', $_POST['name'], time() + (86400 * 1), "/"); // 86400 = 1 day
                    setcookie('userTelf', $_POST['telf'], time() + (86400 * 1), "/"); // 86400 = 1 day
                    setcookie('userMail', $_POST['email'], time() + (86400 * 1), "/"); // 86400 = 1 day
                    setcookie('numPedido', $numPedido, time() + (86400 * 1), "/"); // 86400 = 1 day)
                    // Y mandar mensage de succesful
                    echo '<h3>Gracias por realizar su pedido</h3>' .
                        '<p>Tu numero de pedido con los datos que nos has facilitado es <b>' . $numPedido . '</b>.</br>' .
                        'Tu pedido està en camino !!</p>';
                }
            } else { //De lo contrario, solo que un dato no se reciba correctamente, mandar mensage de error!
                echo '<h3>NO SE HA PODIDO PROCESAR TU PEDIDO</h3>' . '<p>Vuelve a intentarlo en unos minutos</p';
            }

            ?>

        </div>
        <div class="content_right">
            <a href="index.php"><input class="button-blue" type="submit" value="VOLVER A INICIO"></a>
            <button class="button-orange" type="button" onclick="borrarCookies()">ELIMINAR COOKIES</button>
        </div>
    </div>
    <?php
    include('footer.php');
    ?>
</div>