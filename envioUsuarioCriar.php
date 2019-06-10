<?php
    //Chamado do conexão da pagina
    include 'setup/setupSESSION.php';
    include 'setup/setupConectaBanco.php';
    if((empty($_POST['loginNovo'])) || (empty($_POST['senhaNova'])) || (empty($_POST['nomeNovo']))|| (empty($_POST['nascimentoNovo']))|| (empty($_POST['emailNovo'])))
    {        
        echo "<script>
        alert('Todos os campos são obrigatorios.');
            window.history.back();
        </script>";
    }
    else
    {
        $pNickUser = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['loginNovo']); //nome de usuario minusculo
        $pNomeNovo = $_POST['nomeNovo'];                                        //nome completo do usuario  
        $pNascimentoNovo = $_POST['nascimentoNovo'];                            //data de nascimento do usuario
        $pEmailNovo = $_POST['emailNovo'];                                      //email do usuario
        $pNovaSenha = md5($_POST['senhaNova']);                                 //usar md5 na senha utilziada
        
        $query_2 = "SELECT usuario FROM usuario WHERE nickUser='$newLogin'";    //procurar existencia de usuario
        $result_2 = mysqli_query($link, $query_2);
        if(!mysqli_fetch_array($result_2))
        {
            $query_1 = "INSERT INTO Usuario (tipoUser, nickUser, passUser, nomeUser, nascUser, emailUser) VALUES ('2','$pNickUser','$pNovaSenha','$pNomeNovo','$pNascimentoNovo','$pEmailNovo')";
            if($link->query($query_1) === TRUE)
            {
                $query_3 = "SELECT * FROM Usuario WHERE nickUser='$pNickUser' AND passUser='$pNovaSenha'"; //procurar existencia de usuario
                $result_3 = mysqli_query($link, $query_3);
        
                if(!mysqli_fetch_array($result_3))
                {
                    // define variaveis da sessão
                    $_SESSION['idProfiles'] = $idProfile;   
                    $_SESSION['idUser'] = $id_Usuario;
                    $_SESSION['usuario'] = $newLogin;
                    setcookie("usuario", "$newLogin", time() + 3600);
                    setcookie("senha", "$novaSenha", time() + 3600);

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
                    unset($_SESSION['login']);
                    setcookie("usuario", '', time() - 3600);
                    setcookie("senha", '', time() - 3600);
                    //Destrói
                    session_abort();  
                    //Redireciona para a página de anterior     
                    echo "<script>
                        window.history.back();
                    </script>";
                }
            }
            else
            {
                echo "<br>"."Erro: ".$query_1."<br>".$link->error;
                $link->close();
                echo "<script>
                alert('Nome de usuario identico ja cadastrado');
                window.history.back();
                </script>";       
            }
        }
        else
        {
            echo "<script>
                alert('Nome de usuario identico ja cadastrado');
                window.history.back();
            </script>";
            $link->close();  
        }
    }
?>