$(document).ready (function (event) {
    setTimeout (reroute, 5000);
    event.preventDefault ();
});

var reroute = function () {
    window.location.href = "http://localhost/virtual_classroom/";
}
