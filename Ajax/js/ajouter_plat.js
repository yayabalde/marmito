	var form = document.getElementById('ajout_plat');
	//var texte = document.getElementById('myText');
	var ok = document.getElementById('btn_ajouter_plat');
	ok.onclick = function (e) {
	    e.preventDefault();
	    var data = new FormData(form);
	    ajaxPost("Ajax/php/ajouter_plat.php", data, getReponse);
	    form.reset();
	};

	function getReponse(res) {
	    document.getElementById('success').innerHTML = res;
	}