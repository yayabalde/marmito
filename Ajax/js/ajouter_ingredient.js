	var form = document.getElementById('ajout_ingredient');
	//var texte = document.getElementById('myText');
	var ok = document.getElementById('btn_ajouter_ingredient');
	ok.onclick = function (e) {
	    e.preventDefault();
	    var data = new FormData(form);
	    ajaxPost("Ajax/php/ajouter_ingredient.php", data, getReponse);
	    form.reset();
	};

	function getReponse(res) {
	    document.getElementById('success').innerHTML = res;
	}