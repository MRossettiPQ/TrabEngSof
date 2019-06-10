<html>
    <body bgcolor=#d8dfea>
        <?php
            //Chamado do configuração da pagina 
            include 'setup/setupConfig.php';

            $pIdUsuario = $_SESSION['idUser'];          //Disponibilizado pela sessão criada
            $pIdLivro = $_GET['idLivro'];               //Enviado pelo formulario da pagina mostraBiblioteca.php

            //QUERY INFORMAÇÕES LIVRO
            $query_1 = "SELECT 	nomeLivro, lancLivro, contLivro, descLivro, localLivro, editoraLivro, classLivro, generoLivro FROM livro WHERE idLivro = '$pIdLivro'";
            $result_1 = mysqli_query($link, $query_1);

            //QUERY INFORMAÇÕES COMENTARIOS
            $query_3 = "SELECT FK_Usuario_idUser, idComenta, contComenta, notaComenta, dataComenta FROM comenta WHERE FK_Livro_idLivro='$pIdLivro'";
            $result_3 = mysqli_query($link, $query_3);

            while (list($nomeLivro, $lancLivro, $contLivro, $descLivro, $localLivro, $editoraLivro, $classLivro, $generoLivro) = mysqli_fetch_row($result_1))
            {
                //QUERY NOTAS
                $query_2 = "SELECT notaComenta FROM comenta WHERE FK_Livro_idLivro='$pIdLivro'";
                $result_2 = mysqli_query($link, $query_2);

                //CALCULA A MEDIA BASEADO NAS NOTAS
                if(empty($result_2) === FALSE)
                {
                    $soma = 0;
                    $cont = 0;
                    $media = 0;
                    while (list($nota) = mysqli_fetch_row($result_2))
                    {
                        $soma = $soma + $nota;
                        $cont = $cont + 1;
                    }
                    if($cont >= 1)
                    {
                        $media = $soma/$cont;
                    }
                }

                    echo "
                        <center>
                        <table border='comentarios' bgcolor=#afbdd4>
                        <tr>  
                            <td valign='center' style='width:1185px'>
                                <table border='cartaoJogo' bgcolor=#afbdd4>
                                    <tr>
                                        <td valign='top'>
                                            <img src='idVisual/Livros/".$nomeLivro.".jpg' alt='Capa' style='width:323px;height:476px;'>
                                        </td>
                                        <td valign='top' style='width:723px;height:476px;'>
                                            <table border='dadosJogo' bgcolor=#afbdd4>
                                                <tr>
                                                    <td style='width:720px;height:50px;'>
                                                    <center><b>".$nomeLivro."</b></center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign='top' style='width:720px;height:372px;'>
                                                        <table border='dadosBasico' bgcolor=#afbdd4>
                                                            <tr>
                                                                <td valign='center' style='width:177.5px;height:65px;'>
                                                                    <center><b>Editora</center></b>
                                                                </td>
                                                                <td valign='center' style='width:177.5px;height:65px;'>
                                                                        <center>".$editoraLivro."</center>
                                                                    </td>
                                                                <td valign='center' style='width:177.5px;height:65px;'>
                                                                    <center><b>Lançamento</center></b>
                                                                </td>
                                                                <td valign='center' style='width:177.5px;height:65px;'>                    
                                                                    <center>".$lancLivro."</center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign='center' style='width:177.5px;height:65px;'>
                                                                    <center><b>Nascionalidade</center></b>
                                                                </td>
                                                                <td valign='center' style='width:177.5px;height:65px;'>
                                                                    <center>".$localLivro."</center>
                                                                </td>
                                                                <td valign='center' style='width:177.5px;height:65px;'>
                                                                    <center><b>Genero</center></b>
                                                                </td>
                                                                <td valign='center' style='width:177.5px;height:65px;'>                    
                                                                    <center>".$generoLivro."</center>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border='dadosBasico' bgcolor=#afbdd4>
                                                            <tr>
                                                                <td valign='center' style='width:703px;height:35px;'>
                                                                    <center><b>Descrição</center></b>
                                                                </td>
                                                                <tr>
                                                                    <td valign='top' style='width:703px;height:241px;'>
                                                                        <center>".$descLivro."</center>
                                                                    </td>
                                                                </tr>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td valign='top' style='width:123px;height:476px;'>
                                            <table border='lateralDireita' bgcolor=#afbdd4>
                                                <tr>
                                                    <td style='width:120px;height:50px;'>
                                                        <center>
                                                        <b>NOTA</b>
                                                        </center>
                                                    </td>
                                                </tr>                            
                                                <tr>
                                                    <td style='width:120px;height:100px;'>
                                                        <input type='submit' style = 'width:118px; height:98px;' value='".$media."'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style='width:120px;height:278px;'>

                                                    </td>
                                                </tr>        
                                                <tr>
                                                    <td style='width:120px;height:42px;'>
                                                        <center><b>Indicado:</b>".$classLivro." anos<center>
                                                    </td>
                                                </tr>          
                                            </table>
                                        </td>
                                    </tr>
                                </table>       
                            </td>
                        </tr>
                        <tr>
                            <td style='width:1185px;height:42px;'>
                                <center><b>COMENTAR</b><center> 
                            </td>
                        </tr>
                        <tr>
                        <form name='comentar' action='envioComentarioNovo.php?idLivro=".$pIdLivro."' method='post'>
                            <td style='width:1185px;height:62px;'>
                                <table border='comentarioNovo' bgcolor=#afbdd4>
                                    <tr>
                                        <td style='width:960px;height:62px;'>
                                            <input name='comentarioNovo' value= 'Diga oque pensa sobre este livro e de sua nota'type='Text' align='center' style='width:960px;height:62px;' margin='0' >
                                        </td>
                                        <td style='width:70px;height:62px;'>
                                            <center>
                                            <b>NOTA</b>
                                            </center>
                                        </td>
                                        <td style='width:70px;height:62px;'>
                                            <input name='notaNova' value='0' type='number' align='center' style='width:70px;height:62px;'>
                                        </td>";
                                        if(($_SESSION['idProfiles'] == 2)||($_SESSION['idProfiles'] == 1))
                                        {
                                            echo "
                                            <td style='width:80px;height:62px;'>
                                            <input type='submit' value ='Comentar'align = 'center' margin='0' style='width:80px;height:62px;'>";
                                        }
                                        else
                                        {
                                            echo "</form>
                                            <form name='comentar' action='mostraLogar.php' method='post'>
                                            <td style='width:80px;height:62px;'>
                                            
                                                <input type='submit' value ='Logar'align = 'center' margin='0' style='width:80px;height:62px;'>";
                                        }
                                        echo "</td>
                                        </form>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style='width:1185px;height:42px;'>
                                <center><b>COMENTADOS</b><center> 
                            </td>
                        </tr>
                        <tr>
                            <td valign='top' style='width:1185px;height:600px;'>";
                            if(empty($result_3) === FALSE)
                            {
                                while (list($FK_Usuario_idUser, $idComenta, $contComenta, $notaComenta, $dataComenta) = mysqli_fetch_row($result_3))
                                {
                                    //QUERY INFORMAÇÕES ESTUDIO
                                    $query_4 = "SELECT nickUser  FROM usuario WHERE idUser = '$FK_Usuario_idUser'";
                                    $result_4 = mysqli_query($link, $query_4);

                                    while (list($nickUser) = mysqli_fetch_row($result_4))
                                    {
                                        echo "<table border='comentarios' bgcolor=#afbdd4>
                                            <tr>
                                                <td style='width:180px;height:62px;'>
                                                    <center>
                                                    ".$nickUser."
                                                    </center>
                                                </td>
                                                <td style='width:880px;height:62px;'>
                                                    <center>
                                                    ".$contComenta."
                                                    </center>
                                                </td>
                                                <td style='width:70px;height:62px;'>
                                                    <center>
                                                    <b>".$notaComenta."</b>
                                                    </center>
                                                </td>";
                                                if($FK_Usuario_idUser == $pIdUsuario)
                                                {
                                                    echo "<form name='editar' action='mostraEditarComentario.php?idComentario=".$idComenta."&nomeLivro=".$nomeLivro."' method='post' >
                                                        <td style='width:78px;height:62px;'>   
                                                                    <input type='submit' style = 'width:78px; height:62px;' value='editar'>
            
                                                        </td>";
                                                }
                                                else
                                                {
                                                echo "
                                                <td style='width:80px;height:62px;'>   

                                                </td>";
                                                }
                                                echo "
                                                </form>
                                            </tr>
                                        </table>";
                                    }
                                }
                            }
                            echo "</td>
                        </tr>
                    </table>";
                    echo "<br>";
            }   
        ?>
    </body>
</html>