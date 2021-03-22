$("#signup").click(function(e){
    email = $("#email").val();
    $.ajax({
        url: "/verify_mail",
        method: "post",
        data : 'email=' + email,
        dataType : "html",
        success : function(retour){
            e.preventDefault();
            console.log(retour);
           if(retour == 1){
            e.preventDefault();
            $("#notif_mail").append(
                "<p class='rouge'>Adresse mail déjà utilisée</p>"
            )
           }
        }
    })

    mdp = $("#pass").val();
    mdp2 = $("#re_pass").val();
	if(mdp != mdp2){
		e.preventDefault();
		$("#notif").append(
			"<p class='rouge'>La confirmation du mot de passe ne correspond pas</p>"
		)
    }


})

$("#test").click(function(e){
    alert("mail");
    email = $("#email").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        url: "/verify_mail",
        method: "POST",
        data : 'email=' + email,
        dataType : "html",
        success : function(retour){
            e.preventDefault();
            console.log(retour);
           if(retour == 1){
            e.preventDefault();
            $("#notif_mail").append(
                "<p class='rouge'>Adresse mail déjà utilisée</p>"
            )
           }
        },
        error : function(resultat, statut, erreur){
            console.log(resultat);
        }
    })
})
