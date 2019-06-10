/* Logico: */

CREATE TABLE Usuario (
    nickUser VARCHAR(20),
    nomeUser VARCHAR(20),
    passUser VARCHAR(20),
    nascUser DATE,
    idUser INT PRIMARY KEY,
    tipoUser INT,
    emailUser VARCHAR(20)
);

CREATE TABLE Livro (
    idLivro INT PRIMARY KEY,
    nomeLivro VARCHAR(20),
    lancLivro DATE,
    contLivro VARCHAR(300),
    descLivro VARCHAR(300),
    localLivro VARCHAR(20),
    FK_Editora_idEditora INT
);

CREATE TABLE Editora (
    idEditora INT PRIMARY KEY,
    nomeEditora VARCHAR(20)
);

CREATE TABLE Autor (
    idAutor INT PRIMARY KEY,
    nascAutor DATE,
    paisAutor VARCHAR(20),
    nomeAutor VARCHAR(20)
);

CREATE TABLE escreve (
    FK_Autor_idAutor INT,
    FK_Livro_idLivro INT
);

CREATE TABLE aluguel (
    FK_Livro_idLivro INT,
    FK_Usuario_idUser INT,
    idAluguel INT PRIMARY KEY,
    dataAluguel DATE,
    prazoAluguel DATE
);

CREATE TABLE comenta (
    FK_Usuario_idUser INT,
    FK_Livro_idLivro INT,
    idComenta INT PRIMARY KEY,
    contComenta VARCHAR(300),
    notaComenta FLOAT,
    dataComenta DATE
);
 
ALTER TABLE Livro ADD CONSTRAINT FK_Livro_1
    FOREIGN KEY (FK_Editora_idEditora)
    REFERENCES Editora (idEditora)
    ON DELETE CASCADE ON UPDATE CASCADE;
 
ALTER TABLE escreve ADD CONSTRAINT FK_escreve_0
    FOREIGN KEY (FK_Autor_idAutor)
    REFERENCES Autor (idAutor)
    ON DELETE RESTRICT ON UPDATE RESTRICT;
 
ALTER TABLE escreve ADD CONSTRAINT FK_escreve_1
    FOREIGN KEY (FK_Livro_idLivro)
    REFERENCES Livro (idLivro)
    ON DELETE SET NULL ON UPDATE CASCADE;
 
ALTER TABLE aluguel ADD CONSTRAINT FK_aluguel_1
    FOREIGN KEY (FK_Livro_idLivro)
    REFERENCES Livro (idLivro)
    ON DELETE SET NULL ON UPDATE CASCADE;
 
ALTER TABLE aluguel ADD CONSTRAINT FK_aluguel_2
    FOREIGN KEY (FK_Usuario_idUser)
    REFERENCES Usuario (idUser)
    ON DELETE SET NULL ON UPDATE CASCADE;
 
ALTER TABLE comenta ADD CONSTRAINT FK_comenta_1
    FOREIGN KEY (FK_Usuario_idUser)
    REFERENCES Usuario (idUser)
    ON DELETE SET NULL ON UPDATE CASCADE;
 
ALTER TABLE comenta ADD CONSTRAINT FK_comenta_2
    FOREIGN KEY (FK_Livro_idLivro)
    REFERENCES Livro (idLivro)
    ON DELETE SET NULL ON UPDATE CASCADE