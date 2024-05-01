<?php

session_start();

if(isset($_SESSION["o"])){
    $_SESSION["o"] = null;
    session_destroy();
    
    

    echo "success";
}

?>