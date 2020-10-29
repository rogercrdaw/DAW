<?php
include('header.php');
?>
<main>
    <div class="one-page">
        <h1 class="title">CANTINA PEDRALBES</h1>
        <?php
        if ((isset($_COOKIE['numPedido'])) && (isset($_COOKIE['userName']))) {
            ?>
            <div class="info">

                <p>Hola <?= $_COOKIE['userName'] ?>! Tu pedido <?= $_COOKIE['numPedido'] ?> esta en camino</br>
                    Esperamos mañana, poder seguir ofreciendote nuestros servicios</p>
            </div>
        <?php
        } else {
            ?>
            <div class="info">
                <p>Bienvenido a la Cantina del IES Pedralbes</p>
            </div>
            <div class="main-buttons">
                <form action="info.php">
                    <button class="main-buttons" type="submit">
                        <i class="fa fa-map-marker"></i> INFO</button>
                </form>
                <form action="menu.php">
                    <button class="main-buttons" type="submit">
                        <i class="fa fa-shopping-cart"></i> COMPRAR</button>
                </form>
            </div>
    </div>
</main>
<?php
    include('footer.php');
    ?>

<script>
    // En la HOMEPAGE decidimos que no saldria el menu del header
    document.getElementsByTagName("header")[0].style.display = "none";
</script>

<?php
}
?>

</body>

</html>