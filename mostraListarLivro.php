<html>
<body bgcolor=#d8dfea>
    <?php
        //Chamado do configuração da pagina 
        include 'setup/setupConfig.php';
    ?>           
    <center>
        <table border="tabuleiroCabecalhoUsuarios" align='center' bgcolor=#afbdd4>
        <tr>
            <td style='width:67px;height:34px;'>
                <center style="width:67px;">
                        ID
                </center>
            </td>
            <td style='width:167px;height:34px;'>
                <center>
                        Nome Livro
                </center>
            </td>
            <td style='width:167px;height:34px;'>
                <center>
                        Editora
                </center>
            </td> 
            <td style='width:130px;height:34px;'>
                <center>
                        Data Lançamento
                </center>
            </td> 
            <td style='width:90px;height:34px;'>
                <center>
                        Pais
                </center>
            </td>
            <td style='width:167px;height:34px;'>
                <center>
                        Tag
                </center>
            </td> 
            <td style='width:400px;'>
                <center>
                        Descrição
                </center>
            </td>  
            <td style='width:69px;height:62px;'>
                <center>
                        Aceitar
                </center>
            </td> 
        </tr>
    </table>
    </center>
    <?php
        $query = "SELECT idLivro, nomeLivro, lancLivro, contLivro, descLivro, localLivro, classLivro, editoraLivro, generoLivro FROM livro";
        $result = mysqli_query($link, $query);

        if(empty($result) === FALSE)
        {
            //percorrimento das linhas retornadas pela query
            while (list($idLivro,$nomeLivro, $lancLivro, $contLivro, $descLivro, $localLivro, $editoraLivro, $classLivro, $generoLivro) = mysqli_fetch_row($result))
            {
                echo "<center>
                    <table border='tabuleiroUsuarios' align='center' bgcolor=#afbdd4>
                    <tr>
                        <td style='width:67px;height:34px;'>
                            <center>
                            ".
                                    $idLivro
                            ."
                            </center>
                        </td> 
                        <td style='width:167px;height:34px;'>
                            <center>
                            ".
                                    $nomeLivro
                            ."
                            </center>
                        </td> 
                        <td style='width:167px;height:34px;'>
                            <center>
                            ".
                                    $editoraLivro
                            ."
                            </center>
                        </td> 
                        <td style='width:130px;height:34px;'>
                            <center>
                            ".
                                    $lancLivro
                            ."
                            </center>
                        </td> 
                        <td style='width:90px;height:34px;'>
                            <center>
                            ".
                                    $localLivro
                            ."
                            </center>
                        </td> 
                        <td style='width:167px;height:34px;'>
                            <center>
                            ".
                                    $generoLivro
                            ."
                            </center>
                        </td>
                        <td style='width:400px;'>
                            <center>
                                    ".$descLivro."
                            </center>
                        </td>
                        <td style='width:69px;height:62px;'>
                            <form name='comentar' action='mostraLivroEditar.php?idLivro=".$idLivro."' method='post' >
                                <input type='submit' value ='EDITAR'align = 'center' margin='0' style='width:69px;height:62px;'>
                            </form>
                            <form name='comentar' action='envioLivroDeletar.php?idLivro=".$idLivro."' method='post' >
                                <input type='submit' value ='DELETAR'align = 'center' margin='0' style='width:69px;height:62px;'>
                            </form>
                        </td>
                    </tr>
                </table>
                </center>
                ";
            }
        }
    ?>
    </body>
</html>