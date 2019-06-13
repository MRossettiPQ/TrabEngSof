<html>
<body bgcolor=#d8dfea>
    <?php
        //Chamado do cabeçalho da pagina
        include 'setup/setupConfig.php';

        $idLivro = $_GET['idLivro'];
        $query = "SELECT 	nomeLivro, lancLivro, contLivro, descLivro, localLivro, editoraLivro, classLivro, generoLivro, custoLivro, autorLivro FROM livro WHERE idLivro = '$idLivro'";
        $result = mysqli_query($link, $query);

        while (list($nomeLivro, $lancLivro, $contLivro, $descLivro, $localLivro, $editoraLivro, $classLivro, $generoLivro, $custoLivro, $autorLivro ) = mysqli_fetch_row($result))
        {    
            echo "
                <center>
                <p> Atualização de Jogo: <b>".$nomeLivro."</b><p>

                <form name='criarUsuario'  enctype='multipart/form-data'  action='envioJogoEditarSist.php?idJogo=".$idLivro."' method='post' >
                    <table border='formularioCriarJogo' bgcolor=#afbdd4>
                        <tr>
                            <td>
                                <table border='dadosJogo' bgcolor=#afbdd4>
                                    <tr>
                                        <td style ='width:130px; height:50px;'>
                                            <center><b>Titulo</b></center> 
                                        </td>
                                        <td style ='width:630px; height:50px;'>
                                            <center><input name='nomeJogo' value= '".$nomeLivro."'type='Text' align='center' style='width:630px;height:50px;'></center> 
                                        </td>
                                    <tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table border='dadosJogo' bgcolor=#afbdd4>
                                    <tr>
                                        <td style ='width:130px; height:50px;'>
                                            <center><b>Autor</b></center> 
                                        </td>
                                        <td style ='width:630px; height:50px;'>
                                            <center><input name='nomeJogo' value= '".$autorLivro."'type='Text' align='center' style='width:630px;height:50px;'></center> 
                                        </td>
                                    <tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table border='dadosJogo' bgcolor=#afbdd4>
                                    <tr>
                                        <td style ='width:187px; height:45px;'>
                                            <center><b>Estudio</b></center> 
                                        </td>
                                        <td style ='width:187px; height:45px;'>
                                            <center>
                                                <input name='jogoEstudio' value='".$editoraLivro."'type='text' align = 'center' style ='width:187px; height:45px;' align='center'>
                                            </center> 
                                        </td>
                                        <td style ='width:187px; height:45px;'>
                                            <center><b>Lançamento</b></center>  
                                        </td>
                                        <td style ='width:187px; height:45px;'>
                                            <center>         
                                                <input name='jogoLancado' value='".$lancLivro."'type='date' align = 'center' style ='width:187px; height:30px;' align='center'>
                                            </center> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style ='width:187px; height:45px;'>
                                            <center><b>Maximo de Jogadores</b></center> 
                                        </td>
                                        <td style ='width:187px; height:45px;'>
                                            <center>     
                                                <input name='jogoPlayers' value='".$localLivro."' type='number' align = 'center' style ='width:187px; height:45px;'>
                                            </center> 
                                        </td>
                                        <td style ='width:187px; height:45px;'>
                                            <center><b>Genero</b></center> 
                                        </td>
                                        <td style ='width:187px; height:45px;'>
                                            <center>         
                                                <input name='jogoTag' value='".$generoLivro."'type='text' align = 'center' style ='width:187px; height:45px;'>
                                            </center> 
                                        </td>
                                    </tr>                               
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table border='dadosJogo' bgcolor=#afbdd4>
                                    <tr>
                                        <td style ='width:630px; height:30px;'>
                                            <center><b>Descrição</b></center> 
                                        </td>
                                    <tr>
                                    <tr>
                                        <td style ='width:765px; height:100px;'>
                                            <center><textarea cols='30' rows='5' name='jogoDesc' wrap='hard' type='Text' align='center' style='width:765px;height:100px;'>".$descLivro."</textarea></center> 
                                        </td>
                                    <tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table border='dadosJogo' bgcolor=#afbdd4>
                                    <tr>
                                        <td style ='width:380px; height:35px;'>
                                            <center><b>Classicação indicativa</b></center> 
                                        </td>
                                        <td style ='width:380px; height:35px;'>
                                            <center><input name='jogoClass' value= '".$classLivro."'type='number' align='center' style='width:378px;height:35px;'></center> 
                                        </td>
                                    <tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table border='dadosJogo' bgcolor=#afbdd4>
                                    <tr>
                                        <td style ='width:380px; height:35px;'>
                                            <center><b>Custo diaria</b></center> 
                                        </td>
                                        <td style ='width:380px; height:35px;'>
                                            <center><input name='jogoClass' value= '".$custoLivro."'type='number' align='center' style='width:378px;height:35px;'></center> 
                                        </td>
                                    <tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>        
                                <input type='submit' value ='Corrigir'align = 'center' margin='0' style='width:775px;height:62px;'>
                            </td>
                            </form>
                        </tr>
                </table>
            </center>";
        }
    ?>    
</body>
</html>