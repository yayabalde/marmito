// Contact Form Scripts
$(function () {
    $("#connexion input").jqBootstrapValidation({
        preventSubmit: true
        , submitError: function ($form, event, errors) {
            // additional error messages or events
        }
        , submitSuccess: function ($form, event) {
            //event.preventDefault(); // prevent default submit behaviour
            $("#connexion").submit();
        }
        , filter: function () {
            return $(this).is(":visible");
        }
    , });
    $("a[data-toggle=\"tab\"]").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});
/*When clicking on Full hide fail/success boxes */
$('#nom').focus(function () {
    $('#success').html('');
});