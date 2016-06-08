<?php
require_once("class/config.inc.php");
unset($_SESSION['user_name']); 
unset($_SESSION['user_id']); 
unset($_SESSION['groups']); 
unset($_SESSION['user_type']); 
unset($_SESSION['error_msg']); 
unset($_SESSION['error_msg1']);
unset($_SESSION['http_referer']); 
$_SESSION['msg']='You have logged out successfully';
?>
<script type="text/javascript">
window.location="index.php";
</script>
<?php
?>