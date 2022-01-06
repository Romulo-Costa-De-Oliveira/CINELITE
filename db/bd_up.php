<?php

$bd = new SQLite3("filmes.db");

$sql = "DROP TABLE IF EXISTS filmes";

if ($bd->exec($sql))
        echo "\ntabela filmes apagada\n";


$sql = "CREATE TABLE filmes (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        titulo VARCHAR(200) NOT NULL,
        poster VARCHAR(200),
        sinopse TEXT,
        nota DECIMAL(3,1),
        favorito INT DEFAULT 0
   )
";

if ($bd->exec($sql))
        echo "\ntabela filmes criada\n";
else
        echo "\nerro ao criar tabela filmes\n";

$sql = "INSERT INTO filmes (titulo, poster, sinopse, nota) VALUES(
        
        'Homem-Aranha: Sem Volta Para Casa',
        'https://www.themoviedb.org/t/p/w300/t0fSUE2KsFNGXwui9knxd3XsW8n.jpg',
        'Peter Parker é desmascarado e não consegue mais separar sua vida normal dos grandes riscos de ser um super-herói. Quando ele pede ajuda ao Doutor Estranho, os riscos se tornam ainda mais perigosos, e o forçam a descobrir o que realmente significa ser o Homem-Aranha.',
        8.8
        )";
if ($bd->exec($sql))
        echo "\nfilmes inseridos com sucesso\n";
else
        echo "\nerro ao inserir filmes\n";