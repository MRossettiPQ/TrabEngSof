<html>
<body bgcolor=#d8dfea>
    <?php
        //Chamado do cabeçalho da pagina
        include 'setupCabecalhoLogin.php';
        echo "</br></br>";
        //Chamado do cabeçalho da pagina
        include 'setupCabecalho.php';
        include 'setupCabecalhoCadastro.php';
        //Chamado do cabeçalho da pagina
        include 'setupPagina.php';
        //Chamado do conexão da pagina
        include 'setupConectaBanco.php';
        echo "
            <center>
            <p> Sugestão de Jogo <p>

            <form name='criarUsuario'  enctype='multipart/form-data'  action='envioJogoCriar.php' method='post' >
                <table border='formularioCriarJogo' bgcolor=#afbdd4>
                    <tr>
                        <td>
                            <table border='dadosJogo' bgcolor=#afbdd4>
                                <tr>
                                    <td style ='width:130px; height:50px;'>
                                        <center><b>Titulo</b></center> 
                                    </td>
                                    <td style ='width:630px; height:50px;'>
                                        <center><input name='nomeJogo' value= 'Qual o titulo que você irá sugerir'type='Text' align='center' style='width:630px;height:50px;'></center> 
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
                                            <input name='jogoEstudio' type='text' align = 'center' style ='width:187px; height:45px;' align='center'>
                                        </center> 
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center><b>Lançamento</b></center>  
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center>         
                                            <input name='jogoLancado' type='date' align = 'center' style ='width:187px; height:30px;' align='center'>
                                        </center> 
                                    </td>
                                </tr>
                                <tr>
                                    <td style ='width:187px; height:45px;'>
                                        <center><b>Maximo de Jogadores</b></center> 
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center>     
                                            <input name='jogoPlayers' type='number' align = 'center' style ='width:187px; height:45px;'>
                                        </center> 
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center><b>Genero</b></center> 
                                    </td>
                                    <td style ='width:187px; height:45px;'>
                                        <center>         
                                            <input name='jogoTag' type='text' align = 'center' style ='width:187px; height:45px;'>
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
                                        <center><textarea cols='30' rows='5' name='jogoDesc' wrap='hard' value= 'Qual o titulo que você irá sugerir'type='Text' align='center' style='width:765px;height:100px;'></textarea></center> 
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
                                        <center><input name='jogoClass' value= '0'type='number' align='center' style='width:378px;height:35px;'></center> 
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
                            <input type='submit' value ='Sugerir'align = 'center' margin='0' style='width:775px;height:62px;'>
                        </td>
                        </form>
                    </tr>
            </table>
        </center>";
    ?>    
</body>
</html>