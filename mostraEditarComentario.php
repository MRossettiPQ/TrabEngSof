<html>

    <body bgcolor=#d8dfea>
        <?php
            //Chamado do cabeçalho Login da pagina 
            include 'setup/setupConfig.php';
            
            $pIdComentario = $_GET['idComentario'];
            $pNomeLivro = $_GET['nomeLivro'];

            $query = "SELECT contComenta, notaComenta FROM comenta WHERE idComenta = $pIdComentario";
            $result = mysqli_query($link, $query);
            while (list($contComenta, $notaComenta) = mysqli_fetch_row($result))
            {
                echo "
                <center>
                <p> Edição de comentario para o livro: ".$pNomeLivro." <p>
                <form name='atualiza' action='envioComentarioEditar.php?idComentario=".$pIdComentario."' method='post' >
                <table border='formularioEdicao' bgcolor=#afbdd4>
                    <tr>
                        <td>
                            <table border='dadosFilme' bgcolor=#afbdd4>
                                <tr>
                                    <td style ='width:130px; height:60px;'>
                                        <center>Comentario</center> 
                                    </td>
                                    <td style = 'width:230px; height:60px;'>
                                        <center>     
                                            <input name='comentarioNovo' type='text' value='".$contComenta."' style = 'width:600px; height:150px;'>
                                        </center> 
                                    </td>
                                    <td style ='width:90px; height:60px;'>
                                        <center>Nota</center> 
                                    </td>
                                    <td style = 'width:90px; height:60px;'>
                                        <center>         
                                            <input name='notaNova' type='number' value=".$notaComenta." style = 'width:90px; height:150px;' align='center'>
                                        </center> 
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <table border='formularioEdicao' bgcolor=#afbdd4>
                    <tr>
                        <td>
                            <center>
                                <input type='submit' value ='EDITAR'  style='width:466px;height:100px;' align = 'center' margin='0'>
                            </center>                        
                            </form>
                        </td>
                        <form name='deleta' action='envioComentarioDeletar.php?idComentario=".$pIdComentario."' method='post' >
                            <td>
                                <center>
                                    <input type='submit' value ='DELETAR'  style='width:466px;height:100px;' align = 'center' margin='0'>
                                </center>                        
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