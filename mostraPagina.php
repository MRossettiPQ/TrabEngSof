<body bgcolor=#d8dfea>
        <?php
            //Chamado do configuração da pagina  include 'Base/O Homem de Giz.epub';
            include 'setup/setupConfig.php';
            $pIdLivro = $_GET['idLivro'];  
            //QUERY INFORMAÇÕES LIVRO
            $query_1 = "SELECT 	nomeLivro FROM livro WHERE idLivro = '$pIdLivro'";
            $result_1 = mysqli_query($link, $query_1);

            while (list($nomeLivro) = mysqli_fetch_row($result_1))
            {
                echo "<title>BookReader - $nomeLivro</title>";
                echo "
                <center>
                    <table border='quadroLivro' bgcolor=#afbdd4>
                        <tr>  
                            <td valign='center' style='width:1300px;height:700px;'>
                                include 'mostraLivro.html';
                            </td>
                        </tr>
                    </table>
                </center>";

                //include 'Base/'$nomeLivro'.epub'
            }
        ?>
</body>