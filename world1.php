<?php
    $id_user = 'asdas';

    session_start();
    if(isset($_SESSION['POST'])){
		$session = $_SESSION['POST'];
        $id_user=$session['id_user'];
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Epiverso</title>
	<style type="text/css">
		body {
			margin : 0;
		}
	</style>
	<script src="./js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
	<input type="hidden" id="id_user" name="id_user"  value="<?php  echo($id_user); ?>"  >
	<script>
		let id_user

		function goodAnswer(coins){
			fetch('./services/addcoins.php?coins='+coins+'&id='+id_user, {
				method: 'GET',
			}).then(
				response => response.json()
			).then(
				response => {
				}
			).catch(
				error => console.log(error)
			)

		}
		function validateCloseAnswer(id_question,coins){
			var ans
			console.log("BUTTONN")
			for(i = 1;i<=4;i++){
				try{
					if(document.getElementById("radio"+i).checked){
						ans = i
						break
					}
				}
				catch(e){}
			}
			console.log("La respuesta fue: "+i)

			if(ans != null){
				fetch('./services/checkanswer.php?id_question='+id_question+'&correct='+ans, {
					method: 'GET',
				}).then(
					response => response.json()
				).then(
					response => {
						respuesta = response[0].slice(0,1)[0]
						if(respuesta){
							console.log(respuesta)
							goodAnswer(coins)
						}else{
						}
					}
				).catch(
					error => console.log(error)
				)
			}
		}
	</script>
 	<script type="module" src='js/main.js'type="text/javascript"></script>
	 
</body>
</html>
