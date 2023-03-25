<?php
ob_start();
session_start();
session_destroy();
?>

<script language="javascript">;
alert("Log out Successful");
window.location.replace("./HomePage");
</script>;