<?php
session_start();

if(isset($_SESSION['id'])){ 

    session_destroy(); //destroys the session.
    echo"<script>location.href='../index.php'</script>";

}
else{ //if not logged in but manages to get to click the logout, it will automatically redirect to login page.
    echo"<script>location.href='../index.php'</script>";
}



?>