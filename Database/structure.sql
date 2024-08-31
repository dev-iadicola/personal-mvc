USE mymvc;

/* raccogli dati visitatori */

USE mymvc;

CREATE TABLE IF NOT EXISTS visitors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip VARCHAR(45) NOT NULL UNIQUE,
    user_agent VARCHAR(200),
    referrer VARCHAR(200)
);

CREATE TABLE IF NOT EXISTS visitor_visits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    visitor_id INT,
    visited DATETIME DEFAULT NOW(),
    request_uri VARCHAR(80) NOT NULL,
    FOREIGN KEY (visitor_id) REFERENCES visitors(id),
    INDEX idx_visitor_id (visitor_id)
);

CREATE TABLE IF NOT EXISTS visit_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    visit_id INT,
    log_message TEXT,
    logged_at DATETIME DEFAULT NOW(),
    FOREIGN KEY (visit_id) REFERENCES visitor_visits(id),
    INDEX idx_visit_id (visit_id)
);

/* dati creati dall'admin */

CREATE TABLE IF NOT EXISTS curriculum (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    img VARCHAR(255) NOT NULL,
    download int DEFAULT 0,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS corsi(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    overview TEXT,
    link VARCHAR(1000) NOT NULL,
    certified YEAR not null,
    ente VARCHAR(100) not null
);

 CREATE TABLE IF NOT EXISTS portfolio (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    overview TEXT,
    link VARCHAR(255) null,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS projects (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    overview TEXT,
    link VARCHAR(255) NOT NULL,
    img VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS contatti (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    email VARCHAR(100),
    messaggio longtext,
    typologie VARCHAR(20),
    created_at DATETIME DEFAULT NOW()
);

/* amministrazione */
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    password VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL UNIQUE,
    token VARCHAR(100) UNIQUE,
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS logs(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    last_log DATETIME DEFAULT NOW(),
    indirizzo VARCHAR(20) NOT NULL,
    deivice VARCHAR(100) NOT NULL
    CONSTRAINT fk_id_user FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS tokens (
    token VARCHAR(255) PRIMARY KEY,
    email VARCHAR(60),
    used BOOL DEFAULT false,
    created_at DATETIME DEFAULT NOW(),
    expiry_date DATETIME AS (created_at + INTERVAL 5 MINUTE) STORED,
  CONSTRAINT fk_email_user FOREIGN KEY (email) 
    REFERENCES users(email) 
    ON UPDATE CASCADE

);

/* laws */


CREATE TABLE IF NOT EXISTS laws (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR (255),
    testo longtext,
    PRIMARY KEY(id)
);

ALTER TABLE laws MODIFY testo MEDIUMTEXT;



/* per la home page */
CREATE TABLE IF NOT EXISTS profile (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    tagline VARCHAR(255),
    welcome_message TEXT,
    selected bool DEFAULT true,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS articles (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) not null,
    subtitle VARCHAR(50) NOT NULL,
    overview TEXT,
    img VARCHAR(1000),
    link VARCHAR(1000),
    created_at DATETIME DEFAULT NOW(),
    PRIMARY KEY(id)
);





/* footer */

CREATE TABLE IF NOT EXISTS links_footer (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    link VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS footer_text (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    overview VARCHAR(100)

);
