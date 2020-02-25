<!--password_hash()-->
<?php
$pass = "MotDEPass3";
  echo password_hash($pass, PASSWORD_DEFAULT);  // Affiche le mot de passe crypté
?>

<!--Vérifier la correspondance entre mot de passe hashé et son origine-->
<?php
$pass = "MotDEPass3";
$pass_hash = password_hash($pass, PASSWORD_DEFAULT);
if (password_verify($pass, $pass_hash))
{
  echo "Mot de passe correct";
}
else
{
  echo "Mot de passe incorrect";
}
?>

<!--Autre solution-->
<?php
$hash_pass = sha1($pass1);
$q = $db->prepare('INSERT INTO users(pseudo, email, password, ip, created)
VALUES(:pseudo, :email, :password, :ip, now())');
$q->execute(array(
'pseudo' => $pseudo,
'email' => $email,
'password' => $hash_pass,
'ip' => $SERVER['REMOTEADDR']
));
?>

<!--Autre solution-->
<?php       
if(preg_match("#^[a-zA-Z0-9]{4,6}$#", $_POST['form_pseudo'])) $pseudo = $_POST['form_pseudo'];
?>