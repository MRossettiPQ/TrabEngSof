<html>
    <body bgcolor=#d8dfea>
        <?php
            //Chamado do cabeçalho Login da pagina 
            include 'setupCabecalhoLogin.php';
            echo "</br></br>";
            //Chamado do cabeçalho da pagina
            include 'setupCabecalho.php';

            //Chamado do setup pagina
            include 'setupPagina.php';

            //Chamado do conexão da pagina
            include 'setupConectaBanco.php';

            $pPesquisado = $_POST['Pesquisado']; //Nome do livro pesquisado

            $query = "SELECT id_Jogo, nome_Jogo, codLibera FROM jogos WHERE codLibera='1' AND jogos.nome_Jogo LIKE '%".$pPesquisado."%'";
        
            $result = mysqli_query($link, $query);
            if(empty($result) === FALSE)
            {
                $id_lista = 0;
                echo "
                <table border='tabuleiroFilmesExsitentes' bgcolor=#afbdd4>
                    <tr>";
                while (list($id_Jogo, $nome_Jogo, $tag ) = mysqli_fetch_row($result))
                {
                            echo "
                            <td>
                                <table border='tabuleiroFilmesExsitentes' bgcolor=#afbdd4>
                                    <tr>
                                        <td style='width:148px;height:218px;'><a href='mostraJogo.php?id=".$id_Jogo."'>
                                            <center>        
                                                <img src='Imagens/Jogos/".$nome_Jogo.".jpg' alt='Capa' style='width:148px;height:218px;'>
                                            </center>    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='width:148px;'><a href='mostraJogo.php?id=".$id_Jogo."'>
                                            <center>        
                                                ".$nome_Jogo."
                                            </center>    
                                        </td>
                                    </tr>
                                </table>
                            </td>";
                            if($id_lista == 7)
                            {
                                echo "</tr><tr>";
                                $id_lista = 0;
                            }
                            $id_lista++;
                }
                echo "</tr>
                </table>";
            }
            
        ?>    
    </body>
</html>