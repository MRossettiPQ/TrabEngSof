<html>
<body bgcolor=#d8dfea>
    <?php
        //Chamado do configuração da pagina 
        include 'setup/setupConfig.php';
        echo "
            <center>
            <p> Sugestão de Livro <p>

            <form name='criarUsuario'  enctype='multipart/form-data'  action='envioLivroNovo.php' method='post' >
                <table border='formularioCriarJogo' bgcolor=#afbdd4>
                    <tr>
                        <td>
                            <table border='dadosJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style ='width:130px; height:50px;'>
                                        <center><b>Titulo</b></center> 
                                    </td>
                                    <td style ='width:630px; height:50px;'>
                                        <center><input name='nomeLivro' value= 'Qual o titulo que você irá sugerir'type='Text' align='center' style='width:630px;height:50px;'></center> 
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
                                        <center><input name='autorLivro' value= 'Qual o titulo que você irá sugerir'type='Text' align='center' style='width:630px;height:50px;'></center> 
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
                                        <center><b>Editora</b></center> 
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center>
                                            <input name='editoraLivro' type='text' align = 'center' style ='width:187px; height:45px;' align='center'>
                                        </center> 
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center><b>Lançamento</b></center>  
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center>         
                                            <input name='dataLivro' type='date' align = 'center' style ='width:187px; height:30px;' align='center'>
                                        </center> 
                                    </td>
                                </tr>
                                <tr>
                                    <td style ='width:187px; height:45px;'>
                                        <center><b>Localidade</b></center> 
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center>     
                                            <input name='localLivro' type='text' align = 'center' style ='width:187px; height:45px;'>
                                        </center> 
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center><b>Genero</b></center> 
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center>         
                                            <input name='tagLivro' type='text' align = 'center' style ='width:187px; height:45px;'>
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
                                        <center><textarea cols='30' rows='5' name='descLivro' wrap='hard' value= 'Qual o titulo que você irá sugerir'type='Text' align='center' style='width:765px;height:100px;'></textarea></center> 
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
                                        <center><input name='classLivro' value= '0'type='number' align='center' style='width:378px;height:35px;'></center> 
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
                                        <center><input name='custoLivro' value= '0'type='number' align='center' style='width:378px;height:35px;'></center> 
                                    </td>
                                <tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>        
                            <table border='dadosJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style ='width:380px; height:45px;'>
                                        <center><b>Capa</b></center>
                                    </td>
                                    <td style ='width:380px; height:45px;'>
                                    <input name='arquivo' type='file' />
                                    </td>
                                </tr>                       
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>        
                            <table border='dadosJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style ='width:380px; height:45px;'>
                                        <center><b>Livro</b></center>
                                    </td>
                                    <td style ='width:380px; height:45px;'>
                                    <input name='arquivoEpub' type='file' />
                                    </td>
                                </tr>                       
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>        
                            <input type='submit' value ='Sugerir'align = 'center' margin='0' style='width:775px;height:62px;'>
                        </td>
                        </form>
                    </tr>
            </table>
        </center>";
    ?>    
</body>
</html>