<?php
if (isset($_POST['cookie']) && ($_POST['cookie']=="ok")) {
   setcookie("cookie","ok", time()+(86400 * 30));
   echo "C'est enregistré !";
} else {
   echo "Il y a une erreur";
}
?>
