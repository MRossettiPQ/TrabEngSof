<html>
    <body bgcolor=#d8dfea>
        <?php
            //Chamado do configuração da pagina 
            include 'setup/setupConfig.php'

            echo "</br></br></br></br></br></br>
                <center>
                    <table border='Aviso'>
                            <tr>
                                <td style = 'width:635px; height:60px;'><center><b>
                                    Para ter acesso ao seu usuario e poder contribuir para comunidade!
                                </b></center></td>
                            </tr>
                    </table>
                </center>
                </br></br></br>
                <center>
                    <form name='formLogar' action='envioDados.php' method='post' >
                        <table border='CampoLogar'>
                            <tr>
                                <td>
                                    <table border='CampoDados'>
                                        <tr>
                                            <td style = 'width:220px; height:60px;'><center><b>Login</b></center></td>      <td style = 'width:400px; height:60px;'><input name='Usuario'type = 'text' style = 'width:400px; height:60px;'></td>
                                        </tr>
                                        <tr>
                                            <td style = 'width:220px; height:60px;'><center><b>Senha</b></center></td>      <td style = 'width:400px; height:60px;'><input name='Senha'type = 'password' style = 'width:400px; height:60px;'></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><input value='Logar' type='submit' style = 'width:635px; height:60px;'></td>
                            </tr>
                    </form>
            </center>";
        ?>    
    </body>
</html>