<html>
    <body bgcolor=#d8dfea>
        <?php
            //Chamado do configuração da pagina 
            include 'setup/setupConfig.php';

            $id_lista = 0; //Auxiliar para controlar numero de livros por andar da estante

            $query = "SELECT idLivro, nomeLivro FROM Livro";
            $result = mysqli_query($link, $query);
            if(empty($result) === FALSE)
            {
                echo "
                <table border='tabuleiroLivrosExistentes' bgcolor=#afbdd4>
                    <tr>";
                while (list($idLivro, $nomeLivro ) = mysqli_fetch_row($result))
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
                                        <td style='width:148px;'><a href='mostraLivro.php?idLivro=".$idLivro."'>
                                            <center>        
                                                ".$nomeLivro."
                                            </center>    
                                        </td>
                                    </tr>
                                </table>
                            </td>";
                            if($id_lista == 9)
                            {
                                echo "</tr><tr>";
                                $id_lista = 0;
                            }
                            $id_lista++;
                }
            }
            echo "</tr>
            </table>";
        ?>
    </body>
</html>