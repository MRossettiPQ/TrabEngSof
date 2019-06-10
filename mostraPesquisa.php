<html>
    <body bgcolor=#d8dfea>
        <?php
            //Chamado do configuração da pagina 
            include 'setup/setupConfig.php';

            $pPesquisado = $_POST['Pesquisado']; //Nome do livro pesquisado

            $query = "SELECT idLivro, nomeLivro FROM livro WHERE nomeLivro LIKE '%".$pPesquisado."%'";
        
            $result = mysqli_query($link, $query);
            if(empty($result) === FALSE)
            {
                $id_lista = 0;
                echo "
                <table border='tabuleiroLivrosExistentes' bgcolor=#afbdd4>
                    <tr>";
                while (list($idLivro, $nomeLivro) = mysqli_fetch_row($result))
                {
                            echo "
                            <td>
                                <table border='livro".$nomeLivro."' bgcolor=#afbdd4>
                                    <tr>
                                        <td style='width:148px;height:218px;'><a href='mostraLivro.php?idLivro=".$idLivro."'>
                                            <center>        
                                                <img src='idVisual/Livros/".$nomeLivro.".jpg' alt='Capa' style='width:148px;height:218px;'>
                                            </center>    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='width:148px;'><a href='mostraJogo.php?id=".$idLivro."'>
                                            <center>        
                                                ".$nomeLivro."
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