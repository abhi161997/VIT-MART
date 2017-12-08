 <?php
session_start();
?>

<?php
session_unset();
if(session_destroy()){

echo "<script>alert('Logged out successfully')</script> ";
}
?>

