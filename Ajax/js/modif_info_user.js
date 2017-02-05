// Contact Form Scripts
$(function () {
    $("#info_user input#btn_modif_info").click(function (e) {
        event.preventDefault();
        var email = $("input#uti_email").val();
        var tel = $("input#uti_tel").val();
        $.ajax({
            url: "././php/modif_info_user.php"
            , type: "POST"
            , data: {
                email: email
                , tel: tel
            }
            , cache: false
            , success: function () {
                // Success message
                $('#success').html("<div class='alert alert-success'>");
                $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>");
                $('#success > .alert-success').append("<strong>Les infos ont bien été modifié </strong>");
                $('#success > .alert-success').append('</div>');
            }
            , error: function () {
                $('#success').html("<div class='alert alert-danger'>");
                $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>");
                $('#success > .alert-danger').append("<strong>Desolé impossible de modifier");
                $('#success > .alert-danger').append('</div>');
            }
        , });
    });
});