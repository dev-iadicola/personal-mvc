USE mymvc;
CREATE TABLE IF NOT EXISTS portfolio (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    overview TEXT,
    link VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS contatti (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    email VARCHAR(100),
    messaggio TEXT,
    typologie VARCHAR(20),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    password VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL unique,
     created_at DATETIME DEFAULT NOW()
);



CREATE TABLE IF NOT EXISTS tokens (
    token VARCHAR(255) PRIMARY KEY,
    email VARCHAR(60),
    created_at DATETIME DEFAULT NOW(),
    CONSTRAINT fk_email_user FOREIGN KEY (email)
        REFERENCES users(email)
);
