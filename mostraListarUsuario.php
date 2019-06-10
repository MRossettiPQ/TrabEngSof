<html>
<body bgcolor=#d8dfea>
    <?php
        //Chamado do configuração da pagina 
        include 'setup/setupConfig.php';
    ?>        
    <center>
        <table border="tabuleiroCabecalhoUsuarios" align='center' bgcolor=#afbdd4>
        <tr>
            <td>
                <center style="width:67px;">
                        ID
                </center>
            </td>
            <td>
                <center style="width:167px;">
                        Tipo de Usuario
                </center>
            </td>
            <td>
                <center style="width:200px;">
                        Nome
                </center>
            </td> 
            <td>
                <center style="width:130px;">
                        Usuario
                </center>
            </td> 
            <td>
                <center style="width:90px;">
                        Nascimento
                </center>
            </td> 
            <td>
                <center style="width:390px;">
                        E-Mail
                </center>
            </td> 
            <td>
                <center style="width:69px;">
                        Editar
                </center>
            </td> 
        </tr>
    </table>
    </center>
    <?php
        $query = "SELECT nickUser, nomeUser, nascUser, idUser, tipoUser, emailUser FROM usuario";
        $result = mysqli_query($link, $query);
        //percorrimento das linhas retornadas pela query
        while (list($nickUser, $nomeUser, $nascUser, $idUser, $tipoUser, $emailUser) = mysqli_fetch_row($result))
        {
            echo 
            "
                <center>
                <table border='tabuleiroUsuarios' align='center' bgcolor=#afbdd4>
                <tr>
                    <td style='width:67px;height:34px;'>
                        <center>
                        ".
                                $idUser
                        ."
                        </center>
                    </td> 
                    <td style='width:167px;height:34px;'>
                        <center>
                        ";
            if($tipoUser == 1)
            {
                echo "Manager";
            }
            else
            {
                echo "Usuario";
            }
            echo "
                        </center>
                    </td> 
                    <td style='width:200px;height:34px;'>
                        <center>
                        ".
                                $nomeUser
                        ."
                        </center>
                    </td> 
                    <td style='width:130px;height:34px;'>
                        <center>
                        ".
                                $nickUser
                        ."
                        </center>
                    </td> 
                    <td style='width:90px;height:34px;'>
                        <center>
                        ".
                                $nascUser
                        ."
                        </center>
                    </td> 
                    <td style='width:390px;height:34px;'>
                        <center>
                        ".
                                $emailUser
                        ."
                        </center>
                    </td>
                    <form name='comentar' action='mostraEditarUsuario.php?idUser=".$idUser."' method='post' >
                        <td style='width:69px;height:62px;'>
                                <input type='submit' value ='Editar'align = 'center' margin='0' style='width:69px;height:62px;'>
                        </td>
                    </form>";
            echo "
                </tr>
            </table>
            </center>
            ";
        }               
    ?>
    </body>
</html>