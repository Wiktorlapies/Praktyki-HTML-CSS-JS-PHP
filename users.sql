CREATE TABLE users (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name varchar(50) NOT NULL,
    email varchar(100) NOT NULL, 
    password varchar(50) NOT NULL,
    is_admin boolean NOT NULL
);


INSERT INTO users(user_name, email, password, is_admin) VALUES
	("jannowak1995", "nowakjan@gmail.com", "j@nN0w@k123", 0),
    ("annaKowalska88", "annak88@wp.pl", "AnN$8844!Sky", 0),
    ("tomekAdmin007", "tomasz@interia.pl", "t0m@5z!@#", 1),
    ("maro1225", "marekwojcik81@gmail.com", "Mw81!Thunder$", 0),
    ("monikadabrowska93", "mdabrowska93@o2.pl", "Md93!Winter*", 0)
