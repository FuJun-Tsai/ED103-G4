<?php 
session_start();
// session_destroy();
unset($_SESSION["MEMBER_NO"]);
unset($_SESSION["MEMBER_ID"]);
unset($_SESSION["MEMBER_PSW"]);
unset($_SESSION["MEMBER_IMAGE"]);

?>