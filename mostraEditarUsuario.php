<html>
    <body bgcolor=#d8dfea>
        <?php
        //Chamado do configuração da pagina 
        include 'setup/setupConfig.php';

        $pIdUser = $_GET['idUser'];

        $query = "SELECT nickUser, nomeUser, nascUser, idUser, tipoUser, emailUser FROM usuario WHERE idUser='$pIdUser'";
        $result = mysqli_query($link, $query);
        //percorrimento das linhas retornadas pela query
        while (list($nickUser, $nomeUser, $nascUser, $idUser, $tipoUser, $emailUser) = mysqli_fetch_row($result))
        {
            echo "<center>
                <p> Edição de dados do usuario: ".$nickUser." <p>

                <form name='editaUsuario' action='envioUsuarioEditar.php?idUser=".$idUser."' method='post' >
                    <table border='formularioEdicao' bgcolor=#afbdd4>
                        <tr>
                            <td>
                                <table border='dadosFilme' bgcolor=#afbdd4>
                                    <tr>
                                        <td style ='width:130px; height:45px;'>
                                            <center>Nome</center> 
                                        </td>
                                        <td style ='width:130px; height:45px;'>
                                            <center>     
                                                <input name='nomeNovo' type='text' value='".$nomeUser."'  align = 'center' style ='width:130px; height:45px;'>
                                            </center> 
                                        </td>
                                        <td style ='width:130px; height:45px;'>
                                            <center>Nascido</center> 
                                        </td>
                                        <td style ='width:130px; height:45px;'>
                                            <center>         
                                                <input name='nascimentoNovo' type='date' value=".$nascUser." align = 'center' style ='width:130px; height:30px;' align='center'>
                                            </center> 
                                        </td>
                                    </tr>
                                    <tr>
                                    <td style ='width:130px; height:45px;'>
                                        <center>Usuario</center> 
                                    </td>
                                    <td style ='width:130px; height:45px;'>
                                        <center>     
                                            ".$nickUser."
                                        </center> 
                                    </td>
                                    <td style ='width:130px; height:45px;'>
                                        <center>Email</center> 
                                    </td>
                                    <td style ='width:130px; height:45px;'>
                                        <center>         
                                            <input name='emailNovo' type='email' value='".$emailUser."' align = 'center' style ='width:230px; height:45px;' align='center'placeholder='nome@email.com' required>
                                        </center> 
                                    </td>
                                </tr>
                                <tr>
                                    <td style ='width:130px; height:45px;'>
                                        <center>Tipo de Usuario</center> 
                                    </td>
                                    <td style ='width:130px; height:45px;'>
                                        <select name='tipoProfile' style ='width:130px; height:45px;'>
                                            <option value='2'";
                                            if($tipoUser == 1)
                                            {
                                                echo"selected='selected'";
                                            }
                                            echo "
                                            >Manager</option>

                                            <option value='1'";
                                            if($tipoUser == 2)
                                            {
                                                echo"selected='selected'";
                                            }
                                            echo ">Usuario</option>";
                                            echo "
                                        </select>
                                    </td>
                                    <td style ='width:130px; height:45px;'>
                                        <center>Senha</center> 
                                    </td>
                                    <td style ='width:230px; height:45px;'>
                                        <center>         
                                            <input name='senhaNova' type='password' align = 'center' style ='width:230px; height:45px;' align='center'>
                                        </center> 
                                    </td>
                                </tr>                               
                                </table>
                            </td>
                        </tr>
                        <table border='tabuleiroOpcaoManager' bgcolor=#afbdd4>
                        <tr>
                            <td style='width:648px;height:62px;'>
                                <input type='submit' value ='Editar'align = 'center' margin='0' style='width:648px;height:62px;'>
                            </td>
                        </form>
                        </tr>
                        </table> 
                </table>
            </center>";
        }
        ?>    
    </body>
</html>