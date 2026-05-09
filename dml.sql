INSERT INTO autorzy(imie, nazwisko) VALUES
    ("Scott", "Hanselman"),
    ("Devin", "Rader"),
    ("Badrinarayanan", "Lakshmiraghavan"),
    ("Jamie", "Kurtz"),
    ("Brian", "Wortman"),
    ("John", "Shovic"),
    ("Ryan", "Benedetti"),
    ("Ronan", "Cranley"),
    ("Lynn", "Beighley"),
    ("Keerti", "Kotaru"),
    ("Bolesław", "Prus"),
    ("George", "Orwell"),
    ("Andrzej", "Sapkowski"),
    ("Stanisław", "Lem"),
    ("Henryk", "Sienkiewicz"),
    ("Fiodor", "Dostojewski"),
    ("Charles", "Dickens"),
    ("Stefan", "Żeromski")




INSERT INTO ksiazki(tytul) VALUES
    ("Professional ASP.NET 4 in C# and VB"),
    ("Pro ASP.NET Web API Security"),
    ("ASP.NET Web API 2, 2nd Edition"),
    ("Raspberry Pi IoT Projects"),
    ("Head First jQuery"),
    ("Head First SQL"),
    ("Material Design implementation with AngularJS"),
    ("Lalka"),
    ("Rok 1984"),
    ("Wiedźmin"),
    ("Niezwyciężony"),
    ("Quo Vadis"),
    ("Zbrodnia i kara"),
    ("Opowieść wigilijna"),
    ("Przedwiośnie")


INSERT INTO ksiazki_autorzy(id_autora, id_ksiazki) VALUES
    (1,1),
    (2,1),
    (3,2),
    (4,3),
    (5,3),
    (6,4),
    (7,5),
    (8,5),
    (9,6),
    (10,7),
    (11,8),
    (12,9),
    (13,10),
    (14,11),
    (15,12),
    (16,13),
    (17,14),
    (18,15)






INSERT INTO `szczegoloweinformacje`(id_ksiazki, isbn, opis, okladka) VALUES 
	(1, "978-1-4571-0402-2", "ASP.NET is about making you as productive as possible when building fast and secure web applications. Each release of ASP.NET gets better and removes a lot of the tedious code that you previously needed to put in place, making common ASP.NET tasks easier. With this book, an unparalleled team of authors walks you through the full breadth of ASP.NET and the new and exciting capabilities of ASP.NET 4. The authors also show you how to maximize the abundance of features that ASP.NET offers to make your development process smoother and more efficient.", "professional_asp.net_4_in_c_and_vb.jpg"),
	(2, "978-1-4302-5782-0", "ASP.NET Web API is a key part of ASP.NET MVC 4 and the platform of choice for building RESTful services that can be accessed by a wide range of devices. Everything from JavaScript libraries to RIA plugins, RFID readers to smart phones can consume your services using platform-agnostic HTTP. Fortunately, ASP.NET Web API provides a simple, robust security solution of its own that fits neatly within the ASP.NET MVC programming model and secures your code without the need for SOAP, meaning that there is no limit to the range of devices that it can work with – if it can understand HTTP, then it can be secured by Web API. These SOAP-less security techniques are the focus of this book.", "pro_asp.net_web_api_security.jpg"),
	(3, "978-1-484201-10-7", "The ASP.NET MVC Framework has always been a good platform on which to implement REST-based services, but the introduction of the ASP.NET Web API Framework raised the bar to a whole new level. Now in release version 2.1, the Web API Framework has evolved into a powerful and refreshingly usable platform. This concise book provides technical background and guidance that will enable you to best use the ASP.NET Web API 2 Framework to build world-class REST services.", "asp.net_web_api_2_2nd_edition.jpg"),
	(4, "978-1-484213-78-0", "This book is designed for entry-through-intermediate-level device designers who want to build their own Internet of Things (IoT) projects for prototyping and proof-of-concept purposes. Expert makers may also find interesting new approaches. Raspberry Pi IoT Projects contains the tools needed to build a prototype of your design, sense the environment, communicate with the Internet (over the Internet and Machine to Machine communications) and display the results.", "raspberry_pi_iot_projects.jpg"),
	(5, "978-1-4493-9321-2", "Want to add more interactivity and polish to your websites? Discover how jQuery can help you build complex scripting functionality in just a few lines of code. With Head First jQuery, you'll quickly get up to speed on this amazing JavaScript library by learning how to navigate HTML documents while handling events, effects, callbacks, and animations. By the time you've completed the book, you'll be incorporating Ajax apps, working seamlessly with HTML and CSS, and handling data with PHP, MySQL and JSON.", "head_first_jquery.jpg"),
	(6, "978-0-596-52684-9", "Maybe you've written some simple SQL queries to interact with databases. But now you want more, you want to really dig into those databases and work with your data. Head First SQL will show you the fundamentals of SQL and how to really take advantage of it.", "head_first_sql.jpg"),
	(7, "978-1-484221-89-1", "Building web and mobile apps that are interactive, fluid and provide consistent experience across devices ranging from desktops, tablets and smart phones is challenging. User Interface (UI) elements need to adapt to various screen sizes and yet the code behind need to be reusable and follow best of coding practices. Material Design with AngularJS details out building such sophisticated web and mobile apps by combining Material Design and AngularJS concepts.", "material_design_implementation_with_angularjs.jpg"),
	(8, "978-83-83875-46-0", "Wciągająca opowieść o marzeniach, upadku i próbie odnalezienia sensu w świecie pełnym sprzeczności. Wokulski - człowiek sukcesu, który mimo bogactwa nie potrafi znaleźć szczęścia - staje się symbolem tragicznego rozdarcia między pragnieniem a rzeczywistością. Powieść, która zmusza do refleksji nad naturą ludzkich wyborów i ceną poświęcenia. Prus mistrzowsko łączy wątki obyczajowe z filozoficznymi, tworząc dzieło uniwersalne, aktualne także współcześnie.", "lalka.jpg"),
	(9, "978-83-28708-41-9", "W świecie „Roku 1984” George’a Orwella rzeczywistość jest przerażająca - to dystopijna wizja społeczeństwa kontrolowanego przez bezwzględny reżim, gdzie Wielki Brat obserwuje każdy krok. Bohaterowie żyją w strachu przed donosami i propagandą, a pojęcia takie jak „prawda” czy „wolność” stają się iluzoryczne.", "rok84.jpg"),
	(10, "978-83-28178-76-2", "Geralt mierzy się z potworem zrodzonym z grzechu! Ogłoszenie przybite na rozstajach sprowadza wiedźmina do Wyzimy, gdzie grasuje krwiożercza strzyga. Nie jest to zwyczajny potwór, lecz przeklęta księżniczka, i król oczekuje, że zostanie odczarowana, a nie zabita. Są też tacy, którzy zapłacą Geraltowi za pozbycie się problemu w bardziej radykalny sposób. Zanim więc wiedźmin sięgnie po miecz, będzie musiał nawigować w sieci intryg, by odkryć, czyje słowa sprowadziły na Wyzimę tę grozę.", "wiedzmin.jpg"),
	(11, "978-83-08085-81-3", "Powieść 'Niezwyciężony' zajmuje szczególne miejsce w dorobku Stanisława Lema. Z kilku powodów. Przede wszystkim jest to batalistyczna space opera – opowieść o starciu ludzi z powstałą samorzutnie na odległej planecie populacją mikroautomatów niszczących wszelkie myślenie. Lem jako pisarz wielokrotnie opisywał kosmos i perypetie międzygalaktycznych podróżników, rzadko jednak czynił to tak jak w tej powieści doprowadzając do otwartego konfliktu zbrojnego. Fabuła 'Niezwyciężonego' to wymarzony i niemal gotowy scenariusz wielkiego batalistycznego filmu. ", "niezwyciezony.jpg"),
	(12, "978-83-73272-23-1", "Winicjusz jest dumnym Rzymianinem, przekonanym, że wolno mu sięgnąć po wszystko, czego pragnie. Kiedy poznaje Ligię, zakładniczkę z plemienia Ligów oddaną na wychowanie jednemu z jego znajomych, jest pewien, że dziewczyna musi należeć do niego. Ligia jest jednak chrześcijanką i kieruje się zupełnie innymi zasadami niż Winicjusz... Dla egoistycznego patrycjusza spotkanie ze społecznością chrześcijan to początek zmian w jego życiu i postrzeganiu świata, które uczynią z niego zupełnie innego człowieka. Czy uda mu się zdobyć miłość Ligii i czy ocali ją przed gniewem szalonego cesarza Nerona?", "quovadis.jpg"),
	(13, "978-83-83878-33-1" , "Zbrodnia i kara to bez wątpienia najwybitniejsze literackie studium psychiki zbrodniarza. Dostojewski nadzwyczaj wnikliwie obrazuje motywy popełnionej zbrodni, a także wewnętrzną walkę sprawcy z dręczącymi go wyrzutami sumienia. Nadaje swojemu bohaterowi cechy człowieka zatraconego we własnym egoizmie, uważającego się za jednostkę wybitną, stworzoną do wielkich czynów, w pełni uprawnioną do eliminacji osób „zwykłych, bezużytecznych oraz plugawych”. Za zbrodnię czeka jednak sroga kara. Tragiczna w wydźwięku powieść o wyobcowaniu, nieodwracalności czynów oraz ich bolesnych konsekwencjach.", "zbrodniaikara.jpg"),
	(14, "978-83-83505-41-1", "W tej niezwykłej opowieści poznajemy losy Ebenezera Scrooge`a, postaci, która stała się symbolem skąpstwa i egoizmu. Jego niechęć do świąt Bożego Narodzenia oraz brak empatii wobec innych ludzi prowadzą go do samotności i nieszczęścia. Jednak pewnej nocy, w wyniku niezwykłych wydarzeń, jego życie ulega diametralnej zmianie. Ta historia, napisana przez Karola Dickensa, jest nie tylko klasyką literatury, ale także głęboką refleksją nad wartościami, które powinny towarzyszyć każdemu z nas.", "opowiescwigilijna.jpg"),
	(15, "978-83-84257-61-6", "Przedwiośnie to opowieść o przemianach społeczno-politycznych XX wieku, a także o przemianie głównego bohatera, któremu towarzyszymy w procesie dojrzewania. Wychowany w carskiej Rosji Cezary Baryka przybywa do Polski, ojczyzny zmarłych rodziców, ojczyzny, która właśnie odzyskała niepodległość. Młody Cezary, który przez lata słuchał opowieści o wspaniałym kraju „szklanych domów”, odwiedza miejsce ubogie i chaotyczne.", "przedwiosnie.jpg")



INSERT INTO magazyn(id_ksiazki, cena, ilosc) VALUES
    (1, 57, 550),
    (2, 157, 100),
    (3, 112, 0),
    (4, 35.50, 13),
    (5, 49.90, 146),
    (6, 31, 54),
    (7, 110, 36),
    (8, 50, 64),
    (9, 24.99, 113),
    (10, 15, 210),
    (11, 59.50, 15),
    (12, 40.99, 23),
    (13, 38, 0),
    (14, 19.99, 103),
    (15, 16.50, 98);