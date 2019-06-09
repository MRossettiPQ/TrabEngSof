<html>
    <body bgcolor=#d8dfea>
        <?php
            //Chamado do configuração da pagina 
            include 'setup/setupConfig.php'
        ?>
        </br></br></br></br></br></br>
        <center>
            <table border="Pesquisa">
                    <tr>
                        <td style = "width:635px; height:60px;"><center><b>
                            Procure por um Livro!
                        </b></center></td>
                    </tr>
            </table>
        </center>
        </br></br></br>
        <center>
            <form name="formPesquisar" action="mostraPesquisa.php" method="post" >
                <table border="CampoPesquisar">
                    <tr>
                        <td style = "width:400px; height:60px;"><input name="Pesquisado" label="Pesquise" type = "text" style = "width:400px; height:60px;"></td>        <td><input type="submit" style = "width:235px; height:60px;"></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>