<?php                
    if(!isset($_SESSION))
    {
        // session_start inicia a sessão
        session_start();
        // verifica se a sessão foi criada
        if(!isset($_SESSION['idProfiles']))
        {
            $_SESSION['tipoUser'] = '0';  //tipo de usuario para acesso sem login
            $_SESSION['idUser'] = '0';    //usuario para acesso sem login
        }
    }
    if(isset($_SESSION))
    {
        if (($_SESSION['tipoUser'] == 1) || ($_SESSION['tipoUser'] == 2) || ($_SESSION['tipoUser'] == 3))
        {
            echo "<nav id='menuLogin'>
                <ul>
                    <li><a href='mostraUsuarioPainel.php'>Painel:".$_SESSION['usuario']."</a></li>
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