<?php
if(!empty($_POST["lang"]))
{
//setcookie(lang, $_COOKIE["lang"], time()-3600);
unset($_COOKIE["lang"]);
setcookie(lang, $_POST["lang"]);
}
?>