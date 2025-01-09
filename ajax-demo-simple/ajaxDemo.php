<?php
require_once './repondeur.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
</head>
<body>

<form action="#" method="post">
<button id="btnOne">Click One</button>
<button id="btnTwo">Click Two</button>
<button type="submit" name="monSubmit" id="oldSubmit">Submit</button>
</form>

<div>
	<?php
	$result = "Pas clické";
	if(isset($_REQUEST['monSubmit'])) {
		$result =  mySubmit();
		}
	?>
</div>

<div id="resultDiv">
		<?php echo $result?>
</div>


<script>

function callAjax(idFct) {
	var xhr = new XMLHttpRequest();
	var method = "GET";
	url = './repondeur.php?idFct=' + idFct;

    // Initialiser la requête (GET ou POST selon la méthode)
    xhr.open(method, url, true);

    // Définir le type de contenu pour POST (si des données sont envoyées)
    if (method === 'POST') {
        xhr.setRequestHeader('Content-Type', 'application/json');
    }

    // Définir la fonction à exécuter à la réception de la réponse
    xhr.onload = function() {
        if (xhr.status == 200) {
            // La requête a réussi, appeler le callback avec la réponse
			result = JSON.parse(xhr.responseText);
			document.getElementById("resultDiv").innerHTML = result[0] + " - " + result[1];
			console.log(xhr.responseText);
        } else {
            // En cas d'erreur HTTP
			document.getElementById("resultDiv").innerHTML = "erreur";
        }
    };

    xhr.send();
}

document.getElementById("btnTwo").addEventListener("click", function() { 
	event.preventDefault();
	/*document.getElementById("resultDiv").innerHTML = "";
	callAjax(2);*/
	document.getElementById("resultDiv").innerHTML = "click 2";
});


document.getElementById("btnOne").addEventListener("click", function() { 
	event.preventDefault();
	document.getElementById("resultDiv").innerHTML = "";
	callAjax(1);
});
</script>
</body>
</html>