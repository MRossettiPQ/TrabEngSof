<?php                
    if(!isset($_SESSION))// Verifica se existe uma sessão criada
    {
        session_start(); // Inicia uma nova sessão

        if(!isset($_SESSION['idProfiles']))
        {
            $_SESSION['idProfiles'] = '0';  //Para iniciar uma sessão sem login
            $_SESSION['idUser'] = '0';      //Usuario nulo do banco de dados
        }
    }
?>