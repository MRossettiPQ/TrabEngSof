<html>
<body bgcolor=#d8dfea>
    <?php
        //Chamado do cabeçalho Login da pagina 
        include 'setup/setupConfig.php';

        $idUsuario = $_SESSION['idUser'];

        $query = "SELECT nickUser, nomeUser, nascUser, tipoUser, emailUser FROM usuario WHERE idUser=$idUsuario";
        $result = mysqli_query($link, $query);
        //percorrimento das linhas retornadas pela query
        while (list($nickUser, $nomeUser, $nascUser, $tipoUser, $emailUser ) = mysqli_fetch_row($result))
        {
            echo "<center>
            <table border='tabuleiroCabecalhoUsuarios' align='center' bgcolor=#afbdd4>
                <tr>
                    <td>
                        <center ><b>
                            Tipo de Usuario
                        </center></b>
                    </td>
                    <td valign= 'center' style='width:200px;height:65px;'>
                    <center>";
                    if($tipoUser == 1)
                    {
                        echo "ADMIN";
                    }
                    else
                    {
                        echo "Usuario";
                    }
                    echo "
                    </center>
                        </td>
                        <td valign= 'center' style='width:200px;height:65px;'>
                            <center><b>
                                    Nome
                            </center></b>
                        </td> 
                        <td valign= 'center' style='width:200px;height:65px;'>
                            <center >
                                    ".$nomeUser."
                            </center>
                        </td> 
                    </tr>
                    <tr>
                        <td valign= 'center' style='width:200px;height:65px;'>
                            <center><b>
                                    Usuario
                            </center></b>
                        </td>
                        <td valign= 'center' style='width:200px;height:65px;'>
                            <center>
                                    ".$nickUser."
                            </center>
                        </td>
                        <td valign= 'center' style='width:200px;height:65px;'>
                            <center><b>
                                    Nascimento
                            </center></b>
                        </td>                   
                        <td valign= 'center' style='width:200px;height:65px;'>
                            <center>
                                    ".$nascUser."
                            </center>
                        </td> 
                    </tr>
                </table>
                <table border='tabuleiroCabecalhoUsuarios' align='center' bgcolor=#afbdd4>
                    <tr> 
                        <td valign= 'center' style='width:401px;height:65px;'>
                            <center><b>
                                E-Mail
                            </center></b>
                        </td> 
                        <td valign= 'center' style='width:411px;height:65px;'>
                            <center>
                                    ".$emailUser."
                            </center>
                        </td> 
                    </tr>
                </table>
                </center>
                <br><br><br>
                <center>";
        }
        /*CASO QUEIRA FAZER LIVROS LIDOS AQUI
        echo "                
        <table border='tabuleiroCabecalhoUsuarios' align='center' bgcolor=#afbdd4>
                    <tr> 
                        <td valign= 'center' style='width:822px;height:65px;'>
                            <center><b>
                                Jogos Recomendados
                            </center></b>
                        </td> 
                    </tr>
                </table>
                </center>";
        
        $query = "SELECT * FROM jogos WHERE FK_Usuario_id_Usuario=$idUsuario";
        $result = mysqli_query($link, $query);
        if(empty($result) === FALSE)
        {
            while (list($id_Jogo, $nome_Jogo, $dataLanca, $players, $descricao, $tag, $classificacao, $dataAddJogo, $nomeEstudio) = mysqli_fetch_row($result))
            {
                echo "<center>
                        <table border='tabuleiroUsuarios' align='center' bgcolor=#afbdd4>
                            <tr>

                                <td valign='top'>
                                    <img src='Imagens/Jogos/".$nome_Jogo.".jpg' alt='Capa' style='width:148px;height:218px;'>
                                </td>
                                
                                <td style='width:167px;height:34px;'>
                                        <center>
                                        ".$nome_Jogo."
                                        </center>
                                </td> 
                                <td style='width:167px;height:34px;'>
                                    <center>
                                        ".$nomeEstudio."
                                    </center>
                                </td> 
                                <td style='width:149px;height:34px;'>
                                    <center>
                                    ".$dataLanca."
                                    </center>
                                </td> 
                                <td style='width:167px;height:34px;'>
                                    <center>
                                    ".$tag."
                                    </center>
                                </td>
                            </tr>
                    </table>
                </center>";
            }
        } */             
    ?>
    </body>
</html>