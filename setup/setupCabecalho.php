<?php        
    if(isset ($_SESSION['idProfiles']) == true)
    {
        if(($_SESSION['idProfiles'] == 1)) //ADMIN
        {
            echo "
            <form name='formPesquisar' action='mostraPesquisa.php' method='post' >
            <nav id='menuLogin'>     
                    <ul>
                        <li><a href='mostraPrincipal.php'>HOME</a></li>
                        <li><a href='mostraBiblioteca.php'>Biblioteca</a></li>
                        <li><a href='mostraCadastroLivro.php'>Adicionar Livro</a></li>
                        <li><a href='mostraListarUsuario.php'>Listar Usuarios</a></li>
                        <li><a href='mostraListarLivro.php'>Listar Livros</a></li>
                        <li><input name='Pesquisado' label='Pesquisado' type = 'text' style = 'width:130px; height:25px;'><input type='submit' value='Procure' style = 'width:70px; height:25px;'></li> 
                    </ul>
            </nav>
            </form>";
        }
        else if(($_SESSION['idProfiles'] == 2)) //USUARIO
        {
            echo "
            <form name='formPesquisar' action='mostraPesquisa.php' method='post' >
            <nav id='menuLogin'> 
                <ul>
                    <li><a href='mostraPrincipal.php'>HOME</a></li>
                    <li><a href='mostraBiblioteca.php'>Listar Livros</a></li>
                    <li><a href='mostraBiblioteca.php'>Meu Livros</a></li>
                    <li><a href='mostraUsuarioPainel.php'>Meu Perfil</a></li> 
                    <li><input name='Pesquisado' label='Pesquisado' type = 'text' style = 'width:130px; height:25px;'><input type='submit' value='Procure' style = 'width:70px; height:25px;'></li> 
                </ul>
            </nav>
            </form>";
        }
        else
        {
            echo "
            <form name='formPesquisar' action='mostraPesquisa.php' method='post' >
            <nav id='menuLogin'>
                <ul>            
                    <li><a href='mostraPrincipal.php'>HOME</a></li>
                    <li><a href='mostraBiblioteca.php'>Listar Livros</a></li>
                    <li><input name='Pesquisado' label='Pesquisado' type = 'text' style = 'width:130px; height:25px;'><input type='submit' value='Procure' style = 'width:70px; height:25px;'></li> 
                </ul>
            </nav>
            </form>";
        }
    }
    else
    {
        echo "
        <form name='formPesquisar' action='mostraPesquisa.php' method='post' >
        <nav id='menuLogin'>
            <ul>            
                <li><a href='mostraPrincipal.php'>HOME</a></li>
                <li><a href='mostraBiblioteca.php'>Listar Livros</a></li>
                <li><input name='Pesquisado' label='Pesquisado' type = 'text' style = 'width:130px; height:25px;'><input type='submit' value='Procure' style = 'width:70px; height:25px;'></li> 
            </ul>
        </nav>
        </form>";
    }
?>