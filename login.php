<!-- il login, per la natura del localhost, funziona solo sul pc dove risiede il server
il login funziona come registrazione.php-->
<?php
session_start();
$dbconn =pg_connect("host=localhost port=5432 dbname=elenco_iscritti user=postgres password=Giorgio99!")
or die('Could not connect: ' .pg_last_error());


$password=$_POST['password'];
$uname=$_POST['username'];

$sql="select * from iscritti where username='$uname' and password = '$password'";

	
$result=pg_query($sql)or die('Query failed:'.pg_last_error());
$num = pg_num_rows($result);


// controlla se esiste già un iscritto 
if($num == 1){
	header('location:catalogo_animali/catalogo.html');
}
else{
	header('location:index.html');
}
?>
