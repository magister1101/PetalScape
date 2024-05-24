<?php

//continue if you are logged in, redirect to login page if not
if(isset($_SESSION['id'])){
    echo "<script>location.href='index.php'</script>";
}