window.setTimeout(function(){
    var elem = document.getElementById('php');
    document.getElementById('php').style.width = '85%';
    elem.addEventListener("transitionend", function() {
        document.getElementById('php').innerHTML = "PHP";
    });
    var elem = document.getElementById('html');
    document.getElementById('html').style.width = '80%';
    elem.addEventListener("transitionend", function() {
        document.getElementById('html').innerHTML = "HTML";
    });
    var elem = document.getElementById('js');
    document.getElementById('js').style.width = '70%';
    elem.addEventListener("transitionend", function() {
        document.getElementById('js').innerHTML = "JAVASCRIPT";
    });
    var elem = document.getElementById('css');
    document.getElementById('css').style.width = '60%';
    elem.addEventListener("transitionend", function() {
        document.getElementById('css').innerHTML = "CSS";
    });
    var elem = document.getElementById('mysql');
    document.getElementById('mysql').style.width = '50%';
    elem.addEventListener("transitionend", function() {
        document.getElementById('mysql').innerHTML = "MYSQL";
    });
    var elem = document.getElementById('python');
    document.getElementById('python').style.width = '20%';
    elem.addEventListener("transitionend", function() {
        document.getElementById('python').innerHTML = "PYTHON";
    });
    var elem = document.getElementById('dreamwewer');
    document.getElementById('dreamwewer').style.width = '80%';
    elem.addEventListener("transitionend", function() {
        document.getElementById('dreamwewer').innerHTML = "DREAMWEWER";
    });
    var elem = document.getElementById('coreldraw');
    document.getElementById('coreldraw').style.width = '50%';
    elem.addEventListener("transitionend", function() {
        document.getElementById('coreldraw').innerHTML = "CORELDRAW";
    });
    var elem = document.getElementById('laravel');
    document.getElementById('laravel').style.width = '75%';
    elem.addEventListener("transitionend", function() {
        document.getElementById('laravel').innerHTML = "LARAVEL";
    });
    var elem = document.getElementById('symfony');
    document.getElementById('symfony').style.width = '30%';
    elem.addEventListener("transitionend", function() {
        document.getElementById('symfony').innerHTML = "SYMFONY";
    });
    var elem = document.getElementById('angular');
    document.getElementById('angular').style.width = '35%';
    elem.addEventListener("transitionend", function() {
        document.getElementById('angular').innerHTML = "ANGULAR";
    });
    /*Erganzen*/
}, 500);
