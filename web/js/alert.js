$(document).ready(function () {
    $(".parking-scheme-reservation").click(function () {
        $("#modal-text").html("Voulez-vous réserver la place "+$(this).html()+"?");
        $("#yes").attr("href","index.php?page=confirmSlotApp&id_s="+$(this).attr("id"));
        $("#myalertbox").modal({
            "keyboard"  : true,
            "show"      : true
        });
    });
    $(document).click(function() {
        if( this.id != 'myalertbox') {
            $("#myalertbox").modal({
                "keyboard"  : true,
                "show"      : false
            });
        }
    });
});