<?php
include('header.php');

if (isset($_POST['pedido']) && (isset($_POST['total']))) {
    $pedido = $_POST['pedido'];
    $preuTotal = $_POST['total'];
}
?>
<div class="contenidor">
    <div class="content_left">

        <div class="formulario">
            <p>Por favor, rellena los datos a continuación para confirmar tu pedido</p>

            <form method="post" action="gracias.php" autocomplete="on">
                <input type="text" name="pedido" value="<?= $pedido ?>" hidden>
                <input type="text" name="total" value="<?= $preuTotal ?>" hidden>
                <p>
                    <label for="name">Nombre</label></br>
                    <input class="form-input" type="text" name="name" value="" required autofocus></p>
                <p>
                    <label for="telf">Telefono</label></br>
                    <input class="form-input" type="tel" name="telf" value="" pattern="[0-9]{9}" required></p>
                <p>
                    <label for="email">Correo electronico</label></br>
                    <input class="form-input" type="email" name="email" value="@inspedralbes.cat" required></p>
                </br>
                <input type="submit" class="button-blue" value="FINALIZAR PEDIDO"></br>
            </form>

            <a href="index.php"><input class="button-orange" type="submit" value="VOLVER A INICIO"></a>
        </div>

        <!--Se llega a esta pàgina desde formulario de hacer pedido,
        con POST recogemos los datos de la cesta de la compra
        * Tambien podemos crear cookie "cesta de la compra" y recoger datos de alli
        Con el boto "submit" mandamos datos de formulario mas datos de cesta de la compra
        a gracias.php (nombre provisional) -->


        </p>
    </div>
    <div class="content_right">
        <!-- En este lado se deberian mostrar los articulos que por POST recibimos de la 
        pàgina menu.php -->
        <?php
        if (isset($_POST['pedido'])) {
            print_r($_POST['pedido']);
        }

        if (isset($_POST['total'])) {
            $total = $_POST['total'];
            echo "<h3>TOTAL: $total</h3>";
        }

        ?>
    </div>
</div>
<?php
include('footer.php');
?>
</div>