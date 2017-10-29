$(document).ready(function() {
    $(".parking-scheme-reservation").click(function() {
        $("#modal-text").html("Voulez-vous réserver la place " + $(this).html() + "?");
        $("#yes").attr("href", "index.php?page=beforeConfirmSlotApp&id_nb=" + $(this).attr("id"));
        $("#myalertbox").modal({
            "keyboard": true,
            "show": true
        });
    });
    $(document).click(function() {
        if (this.id != 'myalertbox') {
            $("#myalertbox").modal({
                "keyboard": true,
                "show": false
            });
        }
    });
    $("#error_email").hide();
    $("#error_pwd").hide();

    var err_log_email = false;
    var err_log_pwd = false;

    $('#email').focusout(function() {
        verif_email_connect('#form-modify', '#email', '#error_email');
    });
    $('#password').focusout(function() {
        verif_password_connect('#form-modify-2', '#password', '#error_pwd');
    });
    $('#password2').focusout(function() {
        verif_password_both('#form-modify-2', '#password', '#password2', '#error_pwd');
    });

    function verif_email_connect(form, email_form_id, email_error_id) {
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        var log_email = $("").val();

        if (pattern.test($(email_form_id).val()) || log_email == 'admin@admin.admin') {
            $(email_error_id).hide();
        } else {
            $(email_error_id).html("Adresse e-mail invalide ou vide.")
            $(email_error_id).show();
            err_log_email = true;
        }
    }

    function verif_password_connect(form, password_form_id, password_error_id) {
        var log_pwd = $(password_form_id).val();

        if (log_pwd == "") {
            $(password_error_id).html("Mot de passe vide ou invalide.");
            $(password_error_id).show();
            err_log_pwd = true;
        } else {
            $(password_error_id).hide();
        }
    }
    function verif_password_both(form, password_form_id_1, password_form_id_2, password_error_id){
        var log_pwd_1 = $(password_form_id_1).val();
        var log_pwd_2 = $(password_form_id_2).val();

        if(log_pwd_1 != "" && log_pwd_1 != log_pwd_2){
            $(password_error_id).html("Les deux mots de passe ne sont pas identiques");
            $(password_error_id).show();
            err_log_pwd = true;
        }else{
            $(password_error_id).hide();
        }
    }

    $('#form-modify').submit(function() {
        err_log_email = false;

        verif_email_connect('#form-modify', '#email', '#error_email');

        if (err_log_email == false) {
            return true;
        } else {
            return false;
        }

    });
    $('#form-modify-2').submit(function() {
        err_log_pwd = false;

        verif_password_connect('#form-modify-2', '#password', '#error_pwd');
        verif_password_both('#form-modify-2', '#password', '#password2', '#error_pwd');

        if (err_log_pwd == false) {
            return true;
        } else {
            return false;
        }

    });
});