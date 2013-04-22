 <?php
 	// подключаемся к БД
	include('config/conf.php');
	// проверяем поля ввода
	$login = $_POST['login'];
	$pass = $_POST['passwd']; 
	if ($login && $pass) {
		// и логин и пароль введены
		// делаем запрос в БД 
		$query= "SELECT * FROM user WHERE login = '$login'";
		$auth = mysql_query($query);
		if ($auth) {
			$ath = mysql_fetch_array($auth);
			if ($ath['password'] != $pass) {
				echo("
				<script>
					alert('Wrong password! Try arain.');
					document.location = 'index.html'; 
				</script>
				");
			} else {
				echo("
				<script>
					document.location = 'main.html'; 
				</script>
				"); 	  
			}
		}
	} else {
		echo("
		<script>
			document.location = 'index.html'; 
		</script>
		"); 
	}
?>