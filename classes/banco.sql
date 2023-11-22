USE sistema_livrariapjint;

CREATE TABLE acervo01(
    id int NOT NULL PRIMARY KEY, AUTO_INCREMENTO,
    idEditora varchar(255) NOT NULL,
    titulo varchar(255) NOT NULL,
    autor varchar(255),
    ano int,
    preco float,
    quantidade int,
    tipo text

    );

    INSERT INTO acervo01
    (idEditora,titulo,autor,ano,preco,quantidade,tipo) VALUES
    ('Mordena', 'Portugues', 'Zeca','2023','150', '1','l'
    );