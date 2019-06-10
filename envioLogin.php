<?php
    //Chamado do conexão da pagina
    include 'setup/setupConfig.php';
    
    if(empty($_POST["Usuario"]) || empty($_POST["Senha"])) //VERIFICA SE OS CAMPOS FORAM ENVIADOS VAZIOS
    {
        echo "
        <script>
            alert('O campo Usuario e Senha são obrigatorios.');
            window.history.back();
        </script>";
    }
    else
    {
        $novoUsuario = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST["Usuario"]);
        $novaSenha = md5($_POST["Senha"]);

        $query = "SELECT idUser, nickUser, tipoUser FROM usuario WHERE nickUser='$novoUsuario' AND passUser='$novaSenha'";
        $result = mysqli_query($link, $query);
        while(list($idUser, $nickUser, $tipoUser) = mysqli_fetch_row($result))
        {       
            if (mysqli_num_rows($result) > 0) 
            {
                // define variaveis da sessão
                $_SESSION['idProfiles'] = $tipoUser;   
                $_SESSION['idUser'] = $idUser;
                $_SESSION['nickUser'] = $novoUsuario;
                setcookie("nickUser", "$novoUsuario", time() + 3600);
                //Redireciona para a página inicial    
                echo "<script>
                    window.location.href = 'mostraPrincipal.php';
                </script>";
            } 
            else 
            {
                //Limpa
                unset($_SESSION['idUser']);
                unset($_SESSION['idProfiles']);
                unset($_SESSION['nickUser']);
                setcookie("nickUser", '', time() - 3600);
                //Destrói
                session_abort();  
                //Redireciona para a página de anterior     
                echo "<script>
                    window.location.href = 'mostraPrincipal.php';
                </script>";
            }
        }
    }
?>