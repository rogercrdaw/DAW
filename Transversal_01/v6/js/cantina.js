

function mostrarInfo() {
    alert("HORARI DE LA CANTINA\n Dilluns a Divendres: 8:00 - 14:30");
}

function comprovaHora() {
    f = new Date();
    mati = document.getElementById("menu_mati");
    tarda = document.getElementById("menu_tarda");

    if (f.getHours() < 11 || (f.getHours() == 11 && f.getMinutes() < 30)) {
        tarda.style.display="none";
    } else {
        mati.style.display="none";
    }
}

function checkCookie() {
    if (getCookie('yahacomprado') != 'no') {
        document.getElementById('comprar').style.display = "block";

        f = new Date();
        enlace = document.getElementById("comprar").getElementsByTagName("a");

        if (f.getHours() < 11 || (f.getHours() == 11 && f.getMinutes() < 30)) {
            enlace[0].setAttribute("href", "esmorcar.php")
        } else {
            enlace[0].setAttribute("href", "dinar.php")
        }
    } else {
        document.getElementById('comprar').style.display = "none";
    }
}

function borrarCookies() {
    document.cookie = "userName=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "userTelf=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "userMail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

}