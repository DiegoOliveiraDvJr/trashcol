<?php

    session_start();
    
    if(isset($_SESSION['user']) && $_SESSION['user']['autenticado']){
        
    }else{
        header('Location: /login');
        die();
    }

?>