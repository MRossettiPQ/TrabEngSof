<?php                
    if(!isset($_SESSION))// Verifica se existe uma sessão criada
    {
        session_start();                                   // session_start inicia a sessão

        if(!isset($_SESSION['idProfiles']))
        {
            $_SESSION['idProfiles'] = '4';  
            $_SESSION['idUser'] = '0';  
        }
    }
?>