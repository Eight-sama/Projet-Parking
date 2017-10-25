$(document).ready(function () {
    $(".parking-scheme-reservation").click(function () {
        $("#myalertbox").modal({
            "backdrop"  : "static",
            "keyboard"  : true,
            "show"      : true
        });
    });
});