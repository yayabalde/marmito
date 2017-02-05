// Contact Form Scripts

$(function() {

    $("#contact input, #contact textarea, #contact select").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); 
          
            var civilite = $("select#civilite").val();
            var nom = $("input#nom").val();
            var email = $("input#email").val();
            var sujet = $("input#sujet").val();
            var message = $("textarea#message").val();
            var prenom = nom; 
            
            if (prenom.indexOf(' ') >= 0) {
                prenom = nom.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "././php/contact.php",
                type: "POST",
                data: {
                    civilite: civilite,
                    nom: nom,
                    email: email,
                    sujet: sujet,
                    message: message
                },
                cache: false,
                success: function() {
                    // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Votre message a bien été envoyé </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    $('#contact').trigger("reset");
                },
                error: function() {
                   
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Desolé " + prenom + ", votre message n'a pu être envoyer. veuillez recommencer!");
                    $('#success > .alert-danger').append('</div>');
                    
                    $('#contact').trigger("reset");
                },
            });
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});



$('#nom').focus(function() {
    $('#success').html('');
});
