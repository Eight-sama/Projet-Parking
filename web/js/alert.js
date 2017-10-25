$(document).ready(function () {
    $(".parking-scheme-reservation-a").click(function () {
        $("#myalertbox-a").modal({
            "keyboard"  : true,
            "show"      : true
        });
    });
    $(".parking-scheme-reservation-b").click(function () {
        $("#myalertbox-b").modal({
            "keyboard"  : true,
            "show"      : true
        });
    });
    $(".parking-scheme-reservation-c").click(function () {
        $("#myalertbox-c").modal({
            "keyboard"  : true,
            "show"      : true
        });
    });
    $(document).click(function() {
        if( this.id != 'myalertbox-a') {
            $("#myalertbox-a").hide();
        }
        if( this.id != 'myalertbox-b') {
            $("#myalertbox-b").hide();
        }
        if( this.id != 'myalertbox-c') {
            $("#myalertbox-c").hide();
        }
    });
});