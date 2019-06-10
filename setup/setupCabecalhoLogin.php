<?php
    if(!isset($_SESSION))
    {
        // session_start inicia a sessão
        session_start();
        // verifica se a sessão foi criada
        if(!isset($_SESSION['idProfiles']))
        {
            $_SESSION['idProfiles'] = '0';  //tipo de usuario para acesso sem login
            $_SESSION['idUser'] = '0';    //usuario para acesso sem login
        }
    }
    if(isset($_SESSION))
    {
        if (($_SESSION['idProfiles'] == 1) || ($_SESSION['idProfiles'] == 2))
        {
            echo "<nav id='menuLogin'>
                <ul>
                    <li><a href='mostraUsuarioPainel.php'>Painel:".$_SESSION['nickUser']."</a></li>
                    <li><a href='envioUsuarioLogout.php'>Logout</a></li>
                </ul>
            </nav>";
        }
        else
        {
            echo "<nav id='menuLogin'>
                <ul>
                    <li><a href='mostraLogar.php'>Logar</a></li>
                    <li><a href='mostraCadastro.php'>Registrar</a></li>
                    <li><a href='envioUsuarioLogout.php'>Logout</a></li>
                </ul>
            </nav>";
        }
    }
?>