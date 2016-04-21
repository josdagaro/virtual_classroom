$(document).ready (function (event) {
    setTimeout (reroute, 5000);
    event.preventDefault ();
});

var reroute = function () {
    window.location.href = "http://159.203.112.148:8080";
}
