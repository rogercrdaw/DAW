    <?php
    include('header.php');
    require('functions.php');
    ?>

    <script href="js/cantina.js"></script>

    <div class="contenidor">
        <div class="content_left">
            <p class="formulario">Seleccione los productos que desa pedir</p>
            <!--cargamos menú mati en formato formulario-->
            <form id="menu_mati" method="post" action="comprar.php">

                <?php
                $menu_mati = array_merge($productes_mati, $productes_comuns);
                foreach ($menu_mati as $key => $key_value) {
                    ?>
                    <button type="button" class="menu_button" style="background-image: url('img/<?= $key_value[2] ?>')" onclick="añadirCesta('<?= $key_value[0] ?>',<?= floatval($key_value[1]) ?>)">
                        <?= $key_value[0] ?><br><?= floatval($key_value[1]) ?>€</button>
                <?php
                }
                ?>
            </form>
            <hr>
            <!--cargamos menú tarde en formato formulario-->
            <form id="menu_tarda" method="post" action="comprar.php">

                <?php
                $menu_tarda = array_merge($productes_tarda, $productes_comuns);
                foreach ($menu_tarda as $key => $key_value) {
                    ?>
                    <button type="button" class="menu_button" style="background-image: url('img/<?= $key_value[2] ?>')" onclick="añadirCesta('<?= $key_value[0] ?>',<?= floatval($key_value[1]) ?>)">
                        <?= $key_value[0] ?><br><?= floatval($key_value[1]) ?>€</button>
                <?php
                }
                ?>
            </form>
            <script>
                comprovaHora();
            </script>

        </div>
        <div class="content_right"></div>
    </div>

    <?php
    include('footer.php');
    ?>
    </div>
    <script>
        //Creamos un array en el que se recogerán todos los productos seleccionados

        let cestaArray = [];

        function añadirCesta(articulo, precio) {

            if (cestaArray.length == 0) {
                cestaArray.push([articulo, precio, 1]);
            } else {
                let productoExistente = 0;
                for (let i = 0; i < cestaArray.length && productoExistente == 0; i++) {
                    if (cestaArray[i][0] == articulo) {
                        console.log('esta en el array[' + i + ']');
                        productoExistente = 1;
                        cestaArray[i][2]++;
                    } else {
                        console.log('no esta en el array[' + i + ']');
                    }
                }
                if (productoExistente == 0) {
                    cestaArray.push([articulo, precio, 1]);
                }
            }

            //Formatamos la salida de los productos de la cesta en html
            let cestaPHP = cestaArray[0][2] + ' - ' + cestaArray[0][0] + ' - ' + (cestaArray[0][1].toFixed(2) * cestaArray[0][2]) + '</br>';
            let cesta = '<tr><td>' + cestaArray[0][2] + '</td><td>' + cestaArray[0][0] + '</td><td>' + (cestaArray[0][1].toFixed(2) * cestaArray[0][2]).toFixed(2) + '€<td></tr>';

            //Cálculamos el precio total
            let preuTotal = (cestaArray[0][1].toFixed(2) * cestaArray[0][2]);
            for (let i = 1; i < cestaArray.length; i++) {
                cestaPHP += cestaArray[i][2] + ' - ' + cestaArray[i][0] + ' - ' + (cestaArray[i][1].toFixed(2) * cestaArray[i][2]) + '</br>';
                cesta += '<tr><td>' + cestaArray[i][2] + '</td><td>' + cestaArray[i][0] + '</td><td>' + (cestaArray[i][1].toFixed(2) * cestaArray[i][2]).toFixed(2) + '€<td></tr>';
                preuTotal += (cestaArray[i][1].toFixed(2) * cestaArray[i][2])
            }

            //Formatamos la salida del precio total en html
            let total = `<p class="totalCesta">TOTAL: ${preuTotal.toFixed(2)} €  </p>`;

            //Formatamos la salida del boton de finalizar compra total en html con envío de datos por php
            let boton = `
        <form method="post" action="menu.php" >
            <input type="submit" class="button-orange" value="VACIAR CESTA">
        </form>
        <form method="post" action="comprar.php" >
            <input type="text" name="pedido" value="${cestaPHP}" hidden>
            <input type="text" name="total" value="${preuTotal}" hidden>
            <input type="submit" class="button-blue" value="REALIZAR PEDIDO">
        </form>
        `;

            //Mostramos la información de la compra en el content_right
            let taula = `
        <table class="tablaCesta">
                ${cesta}
        </table>
        `;

            return document.getElementsByClassName('content_right')[0].innerHTML = taula + total + boton;

        }
    </script>