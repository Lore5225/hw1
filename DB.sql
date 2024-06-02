CREATE TABLE registrazioni (
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    email varchar(255) not null unique,
    password varchar(255) not null
);

CREATE TABLE password_reset (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(64) NOT NULL,
    expiration_date DATETIME NOT NULL,
	index idxemail (email),
    FOREIGN KEY (email) REFERENCES registrazioni(email)
);







CREATE TABLE prodotti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    immagine VARCHAR(255),
    descrizione VARCHAR(2000) NOT NULL,
    prezzo integer NOT NULL
);

INSERT INTO prodotti (nome, immagine, descrizione, prezzo)
VALUES ('Evercem Top seal', 'imgdb/evercem-topseal-300x300.jpg', 'Evercem Top Seal garantisce la protezione delle pietre naturali, dei manufatti cementizi, di quelli in cotto e dei laterizi. È un protettivo antidegrado idrorepellente che non altera il colore, la struttura ed il grado di lucentezza od opacità delle superfici trattate.', 40);

INSERT INTO prodotti (nome, immagine, descrizione, prezzo)
VALUES ('Evercem Easy', 'imgdb/evercemEasy.jpg', "
Evercem Easy è una malta polimero-cementizia monocomponente in polvere, pronta all'uso dopo la miscelazione con acqua, che forma una malta superfluida applicabile in strati di circa 2 mm su superfici orizzontali o inclinate. Questo prodotto è ideale per creare superfici antiscivolo su rampe, parcheggi, magazzini, marciapiedi e altre aree soggette a traffico pedonale o veicolare e a condizioni climatiche difficili.", 30);

INSERT INTO prodotti (nome, immagine, descrizione, prezzo)
VALUES ('Geniè', 'imgdb/Geniè.png', "Genié genera un campo elettromagnetico all’interno dei muri che interagisce con le molecole dell’acqua, impedendone la risalita e sconfiggendo al 100% il problema dell’umidità da risalita capillare. Consente quindi una deumidificazione e un’asciugatura permanenti su tutte le tipologie di muratura.", 120);

INSERT INTO prodotti (nome, immagine, descrizione, prezzo)
VALUES ('Gemini', 'imgdb/Gemini.jpg', "Gemini è un’unità di ventilazione ad incasso con recupero di calore per singolo locale che rappresenta la soluzione ideale per garantire il ricambio aria e il recupero del calore puntuale in edifici residenziali, uffici, locali pubblici e commerciali.‎
Gemini permette all’aria che è all’interno degli edifici di circolare e di rinnovarsi scambiandosi con l’aria che è all’esterno.‎", 240);

INSERT INTO prodotti (nome, immagine, descrizione, prezzo)
VALUES ('Geniair', 'imgdb/Geniair.jpg', "Geniair rappresenta la soluzione ideale per garantire il ricambio d'aria con altissima filtrazione e recupero di calore in ambienti residenziali, uffici, locali pubblici e commerciali. Il sistema permette all'aria interna di circolare e rinnovarsi, scambiandosi con l'aria esterna. Grazie a potenti filtri, l'aria esterna viene purificata da smog, pollini e agenti inquinanti prima di essere immessa all'interno, creando un ambiente salubre e confortevole.", 140);


INSERT INTO prodotti (nome, immagine, descrizione, prezzo)
VALUES ('ThermoVital', 'imgdb/Thermovital.png', "L’azione di ClimateCoating ThermoVital applicato alle pareti interne di una stanza regola il tasso di umidità mantenendolo intorno al valore del 55%, riduce i tempi di riscaldamento e/o raffrescamento dell’ambiente e distribuisce uniformemente il calore su tutta la superficie, abbattendo i ponti termici e prevenendo la formazione di condense e muffe.", 35);

INSERT INTO prodotti (nome, immagine, descrizione, prezzo)
VALUES ('ThermoProtect', 'imgdb/ThermoProtect.png', "ClimateCoating ThermoProtect, grazie alle sua elevata elasticità, previene la formazione di microfessurazioni nelle pareti esterne di un edificio, evitando infiltrazioni e conseguenti degradazioni e/o ammaloramenti dei supporti.", 40);

INSERT INTO prodotti (nome, immagine, descrizione, prezzo)
VALUES ('ThermoActive', 'imgdb/ThermoProtect.png', "ClimateCoating ThermoActive è un rivestimento per tetti, già pronto per l’uso, che, dopo l’applicazione, si presenta come una membrana termoceramica. È un rivestimento protettivo e molto resistente adatto per quasi tutte le superfici a tetto.", 45);

INSERT INTO prodotti (nome, immagine, descrizione, prezzo)
VALUES ('Tecnovair', 'imgdb/tecnovair.jpg', "I dispositivi Tecnovair rientrano nella categoria dei cosiddetti “ionizzatori d’aria”, ossia sistemi che rilasciano nell’aria da trattare particelle caricate negativamente e/o positivamente", 70);





CREATE TABLE schedaProdotti (
    prodotto_id integer primary key,
    contenuto json,
    index idxprod (prodotto_id),
    FOREIGN KEY (prodotto_id) REFERENCES prodotti(id)
);



	INSERT INTO schedaProdotti (
		prodotto_id,
		contenuto
	) VALUES (
		1,
		'{
		"titoli": {
			"TitoloPrincipale": "Protezione e rinforzo del calcestruzzo con Evercem DPS",
			"Titolo1": "Non solo per strutture portanti",
			"Titolo2": "L’azione di Evercem DPS sul calcestruzzo",
			"Titolo3": "Come agisce",
			"Titolo4": "Come si utilizza"
		},
		"paragrafi": {
			"ParagrafoPrincipale": "Nonostante il diffondersi dei concetti di bioedilizia e conseguentemente di nuovi materiali destinati alla costruzione degli edifici, il calcestruzzo rimane ancora il materiale più utilizzato. Il fatto che al suo interno abbia le armature in acciaio (da cui il nome cemento armato) non fa di lui un materiale eterno e indistruttibile. Essendo costituito prevalentemente da cemento, sabbia, acqua e barre di armatura, il calcestruzzo non è assolutamente esente da deterioramento causato da agenti atmosferici: sali dell’acqua, acidi, variazioni di temperatura, ecc. esercitano ogni giorno una costante usura delle costruzioni edili e pertanto è necessario ricorrere a trattamenti specifici per mantenerle stabili ed efficienti. Oggi è possibile adottare alcuni rimedi in favore della protezione del calcestruzzo. Il più efficace risulta essere quello di trattarlo con un impregnante ai silicati per cemento, che agisce in profondità e che svolge un’azione idrorepellente e antidegrado. Il sigillante a penetrazione profonda che allunga la vita utile del calcestruzzo si chiama Evercem DPS.",
			"ParagrafoDescrittivo1": "Non dobbiamo pensare al calcestruzzo soltanto nelle strutture portanti di un edificio, bensì anche nella sua pavimentazione e talvolta anche nelle facciate (p.e. prefabbricati). E non bisogna pensare solo alla protezione delle superfici di un edificio, ma anche al recupero delle strutture ammalorate nel tempo. Evercem DPS è stato appositamene studiato per il recupero e la protezione del calcestruzzo. Tra i trattamenti protettivi idrorepellenti presenti sul mercato, il DPS si distingue per essere un impregnante per cemento a penetrazione profonda nonché un sigillante che allunga la vita utile delle superfici e che permette di proteggere, impermeabilizzare e indurire il cemento in maniera permanente. In sintesi, Evercem DPS: impermeabilizza il calcestruzzo, permettendogli comunque di traspirare svolge un’azione antidegrado prolungandone la vita protegge il calcestruzzo dagli agenti esterni come pioggia, sali, olii e acidi, cloruro, UV, cicli gelo/disgelo, carbonatazione, attacchi chimici aumenta la resistenza a compressione",
			"ParagrafoDescrittivo2": "Evercem DPS è in grado di esprimere tutte le sue proprietà, senza alterarne minimamente l’aspetto: lo rinforza e lo indurisce, aumentandone la resistenza alla compressione sigilla le fessurazioni fino a 0,3 mm protegge i ferri d’armatura riduce la formazione di sporco superficiale evita la penetrazione di inquinanti riduce il rilascio di polveri (antispolvero) agisce come antiritiro plastico ed igrometrico se applicato a fresco, appena eliminati i casseri blocca l’umidità di risalita evitando la formazione di efflorescenze saline e bolle su superfici pitturate e resinate, quando applicato su platee e fondazioni agisce anche come ottimo primer per successivi trattamenti di finitura",
			"ParagrafoDescrittivo3": "Applicabile su calcestruzzo nuovo o datato, bagnato o asciutto e su tutte le superfici di cemento comprese le pavimentazioni industriali, Evercem DPS penetra fino a 40 mm all’interno del calcestruzzo, reagisce chimicamente con la matrice inespressa del calcestruzzo e riempie gli spazi vuoti della microstruttura diventandone così parte integrante. Evercem DPS quindi agisce chimicamente dall’interno. A differenza della maggior parte degli altri sigillanti superficiali, che si deteriorano velocemente staccandosi, Evercem DPS diventa parte integrante del calcestruzzo. Il catalizzatore presente nel prodotto è capace di attivare le parti di cemento che non hanno reagito all’idratazione nelle fasi di confezionamento, getto, presa ed indurimento. Ciò è possibile grazie alla presenza nel calcestruzzo di sostanze alcaline (in particolare, l’idrossido di calcio – Ca(OH)2) dalla cui reazione si formano silicati idrati che riempiono gli spazi vuoti della microstruttura.",
			"ParagrafoDescrittivo4": "Comodo, sicuro, ecologico. Pronto all’uso e di semplice applicazione, Evercem DPS si applica a spruzzo in due mani. Ecologico, atossico, incolore, inodore e a base d’acqua, Evercem DPS è certificato per l’utilizzo in vasche e superfici anche a contatto con acqua potabile e per uso alimentare. Evercem è stato utilizzato con successo in tutto il mondo su manufatti in calcestruzzo di molteplici tipologie edili: ponti e strutture autostradali, colonne, muri e parapetti a base cementizia, pavimentazioni in calcestruzzo, stabilimenti di lavorazione dei prodotti alimentari, serbatoi e cisterne d’acqua, aree di parcheggio, industrie chimiche, piazzole esterne di stazioni di servizio, impianti di trattamento dei liquami."
		},
		"immagini": {
			"immagineDescrittiva1": "imgdb/evercem0.png",
			"immagineDescrittiva2": "imgdb/evercem1.jpg",
	"immagineDescrittiva3": "imgdb/evercem2.jpg",
	"immagineDescrittiva4": "imgdb/evercem3.jpg",
	"immagineDescrittiva5": "imgdb/evercem4.jpg"
	}
	}'
	);



INSERT INTO schedaProdotti (
    prodotto_id,
    contenuto
) VALUES (
    2,
    '{
    "titoli": {
        "TitoloPrincipale": "Ripristino del calcestruzzo con Evercem Easy",
        "Titolo1": "Quando è necessario il ripristino del calcestruzzo",
        "Titolo2": "Una malta superfluida da 2mm di spessore",
        "Titolo3": "Adatto per molte operazioni di risanamento",
        "Titolo4": "Ripristino, protezione e finitura estetica"
    },
    "paragrafi": {
        "ParagrafoPrincipale": "Per anni si è creduto che il calcestruzzo armato potesse essere un materiale dalla durata infinita, per il quale non sia necessaria alcuna manutenzione. In realtà, il cemento, la ghiaia, la sabbia e le barre di ferro che, insieme all\'acqua lo compongono, sono materiali soggetti a usura e ammaloramento, come tanti altri. L\'azione costante di agenti atmosferici e sostanze inquinanti può infatti essere la causa, con il passare del tempo, di danneggiamenti e deterioramenti. E questo fenomeno può avvenire sia per le superfici esterne sia per quelle interne degli edifici. Per il risanamento del cemento armato ammalorato e la protezione delle opere in calcestruzzo, anche danneggiato o deteriorato, c’è una soluzione a bassissimo spessore e di facile applicazione: Evercem Easy.",
        "ParagrafoDescrittivo1": "Il fenomeno più comune del deterioramento è causato dalla formazione di fessure sulle murature in seguito alle normali tensioni strutturali dell\'edificio. Le fessure fanno entrare acqua e agenti atmosferici che causano l\'ossidazione e la formazione di ruggine delle barre di ferro annegate nel calcestruzzo. La conseguenza è un aumento di volume delle pareti e un rigonfiamento dell\'intonaco che dopo breve tempo si stacca. Stesso problema può essere causato dall\'umidità da risalita, fenomeno molto frequente negli edifici datati e in quelli dove i lavori di impermeabilizzazione non sono stati eseguiti alla regola dell\'arte. L\'umidità che che si forma sulle parerti proviene direttamente dal terreno: l\'acqua presente nel sottosuolo risale attraverso i muri e si deposita per assorbimento in modo direttamente proporzionale al grado di porosità dei materiali che li compongono. I sali presenti nell\'acqua e nei materiali edili, una volta evaporata l\'acqua, si cristallizzano acquisendo maggior volume e causando il distacco della superficie della muratura dove vanno a depositarsi. In tutti questi casi è necessario ripristinare il calcestruzzo.",
        "ParagrafoDescrittivo2": "Evercem Easy è una polvere premiscelata monocomponente polimero\-cementizia, costituita da inerti selezionati, leganti ad elevatissima resistenza e speciali copolimeri, che miscelata con acqua diventa una malta superfluida agevolmente applicabile con uno spessore di circa 2 mm su superfici orizzontali o inclinate tramite squeegee (tira acqua), rullo o pennello. Grazie a queste caratteristiche, può essere usato per superfici antiscivolo, rampe di passi carrai, rampe di carico e banchine, archeggi, ingressi, garage, magazzini e capannoni industriali, autostrade, ponti, marciapiedi e cordoli, piste di atterraggio elicotteri, murature, pavimentazioni esterne sottoposte a gravose condizioni climatiche o di acidi e agenti corrosivi.",
        "ParagrafoDescrittivo3": "Evercem Easy è idoneo per operazioni di risanamento del calcestruzzo ammalorato quali: Risanamento, di pregevole qualità estetica, di pavimentazioni soggette a traffico pedonale e veicolare;Riparazione di massetti cementizi e betoncini, anche microlesionati;Rasatura di finitura di supporti cementizi come pavimentazioni industriali, palladiane, massetti, sia all\'interno che all\'esterno;Riparazione e ripristino di calcestruzzi strutturali;Ripristino balconi ammalorati;Protezione dei conglomerati cementizi soggetti ad azione di: cicli di gelo\-disgelo, sali disgelanti, deterioramento per carbonatazione.",
        "ParagrafoDescrittivo4": "Elevata adesione al supporto, elevate prestazioni meccaniche e ottima resistenza all\'usura sono le caratteristiche che rendono Evercem Easy particolarmente indicato per la protezione delle superfici in calcestruzzo, anche ammalorate o soggette ad azione di acque meteoriche o di lavaggio. Grazie alla sua speciale formulazione Evercem Easy può essere utilizzato anche come strato di finitura o protezione su supporti come legno, vetro, asfalto e materiali plastici. Evercem Easy, dall\'effetto esteticamente piacevole, è anche pigmentabile con appositi coloranti in funzione della resa estetica desiderata. La sua semplicità e velocità di posa consente inoltre di abbattere i costi di manodopera e di realizzazione dell\'intervento."
    },
    "immagini": {
        "immagineDescrittiva1": "imgdb/evercemEasy0.jpg",
        "immagineDescrittiva2": "imgdb/evercemEasy1.jpg",
		"immagineDescrittiva3": "imgdb/evercemEasy2.png",
		"immagineDescrittiva4": "imgdb/evercemEasy3.png",
		"immagineDescrittiva5": "imgdb/evercemEasy4.png"
    }
    }'
);

INSERT INTO schedaProdotti (
    prodotto_id,
    contenuto
) VALUES (
    3,
    '{
    "titoli": {
        "TitoloPrincipale": "Deumidificazione elettrofisica delle murature con Genié",
        "Titolo1": "Che cos\'è l\'umidità da risalita",
        "Titolo2": "Deumidificazione e asciugatura permanenti",
        "Titolo3": "Genié sconfigge l\'umidità grazie alla multifrequenza",
        "Titolo4": "Brevetto internazionale del sistema a multifrequenza"
    },
    "paragrafi": {
        "ParagrafoPrincipale": "Muffe, efflorescenze saline, distacco dell\'intonaco sono evidenti conseguenze di una muratura colpita da umidità da risalita. Il fenomeno è molto frequente negli edifici di una certa data, dove non sono stati fatti lavori di impermeabilizzazione delle fondazioni o, peggio ancora, gli stessi lavori non sono stati eseguiti a regola d\'arte. Per combattere il problema esiste una tecnologia chiamata deumidificazione elettrofisica, che genera un campo elettromagnetico all\'interno delle murature e interagisce con le molecole dell\'acqua impedendone la risalita. Seguendo questa tecnologia, Tecnova Group ha studiato e prodotto Genié, un esclusivo sistema di deumidificazione elettrofisica muraria con tecnologia a impulsi in multifrequenza. Genié, di cui l\'azienda ha depositato il brevetto internazionale, è un apparecchio di piccole dimensioni ma di enorme e definitiva efficacia contro muffe e umidità da risalita.",
        "ParagrafoDescrittivo1": "Chiamata anche umidità ascendente dal terreno, l\'umidità da risalita è un fenomeno che colpisce generalmente certe tipologie di edifici: come abbiamo detto, edifici datati, ma anche e soprattutto abitazioni e locali situati al pian terreno o al piano seminterrato. L\'acqua presente nel terreno risale penetrando nelle murature a causa del fenomeno fisico della capillarità. Più le murature sono costituite da materiali edili porosi, maggiore è la capacità degli stessi di assorbire l’acqua. I danni provocati dall\'umidità sono generalmente i seguenti: deterioramento intonaco – Avviene per mezzo delle efflorescenze saline, effetto generato dai sali presenti nei materiali edili e nel terreno che, sciogliendosi a contatto con l\'acqua, raggiungono la superficie dei muri. Una volta evaporata l’acqua dalla murature, i sali cristallizzano incrementando il loro volume e andando a fare pressione sull\'intonaco creando deterioramento e indebolimento della struttura muraria. danni estetici – macchie, muffe, pitture scrostate, materiali in legno deteriorati, efflorescenze saline.",
        "ParagrafoDescrittivo2": "Genié genera un campo elettromagnetico all\'interno dei muri che interagisce con le molecole dell’acqua, impedendone la risalita e sconfiggendo al 100% il problema dell\'umidità da risalita capillare. Consente quindi una deumidificazione e un\'asciugatura permanenti su tutte le tipologie di muratura. Il muro così risanato può essere ripristinato, dimenticando per sempre umidità, danni all\'intonaco, fioriture di sali e macchie di muffa.",
        "ParagrafoDescrittivo3": "Per sconfiggere definitivamente l\'umidità da risalita, Genié agisce con molte frequenze anzichè con una sola. A differenza degli altri sistemi, che adottano la mono\-frequenza, il sistema di Tecnova Group attiva invece un treno di impulsi a diverse frequenze che permette di ottenere risultati eccellenti su tutte le tipologie di strutture murarie a prescindere dalla geometria dei pori capillari e dalla composizione della muratura. L\'induzione magnetica generata da Genié è inferiore a quella di una lampadina.",
        "ParagrafoDescrittivo4": "Tecnova Group ha deciso di valorizzare il vantaggio competitivo di Genié rispetto agli altri dispositivi presenti sul mercato, registrando il marchio Multifrequency Inside e apponendo un\'etichetta con il marchio su ciascun dispositivo. Questo marchio non identifica un prodotto commerciale ma una tecnologia, un metodo per approcciare il problema dell\'umidità da risalita in maniera non invasiva, definitiva ed efficace in termini di risultato e rapidità d\'azione. Inoltre, Genié è assolutamente innocuo per gli esseri viventi: l\'induzione magnetica generata è inferiore a quella di una lampadina."
    },
    "immagini": {
        "immagineDescrittiva1": "imgdb/Genie0.png",
        "immagineDescrittiva2": "imgdb/Genie1.jpg",
        "immagineDescrittiva3": "imgdb/Genie2.png",
        "immagineDescrittiva4": "imgdb/Genie3.png",
        "immagineDescrittiva5": "imgdb/Genie4.png"
    }
}'
);

INSERT INTO schedaProdotti (
    prodotto_id,
    contenuto
) VALUES (
    4,
    '{
    "titoli": {
        "TitoloPrincipale": "Gemini: unità di ventilazione per prevenire ed eliminare l\'umidità da condensa",
        "Titolo1": "Come funziona",
        "Titolo2": "Miglior comfort abitativo",
        "Titolo3": "Applicazioni e installazione"
    },
    "paragrafi": {
        "ParagrafoPrincipale": "Abitare un ambiente lavorativo o domestico dove l\'aria è salubre dovrebbe essere prerogativa di tutti gli edifici moderni e non. Un ambiente sano ad esempio è un ambiente dove non si formano condense e dove quindi si evita la formazione di muffe, il conseguente deterioraramento delle pareti e dove soprattutto si preserva la salute delle persone che lo abitano. La buona norma dice che un ambiente debba essere frequentemente aerato attraverso l\'azione manuale di apertura delle finestre. Ciò sicuramente risolve il problema del ricambio d\'aria in un ambiente, ma è controtendenza rispetto al concetto di controllo della dispersione del calore, elemento imprescindibile del risparmio energetico. Se non possiamo aprire le finestre per permettere l\'aerazione dei locali dobbiamo necessariamente prevedere un sistema di aerazione che consenta di farlo in automatico. Per questo motivo sono nati i sistemi di ventilazione meccanica controllata, che da soli gestiscono il ricambio d\'aria tra l\'interno e l\'esterno di un ambiente. Gemini è il sistema di ventilazione meccanica controllata commercializzato da Tecnova Group.",
        "ParagrafoDescrittivo1": "Il sistema di aerazione per la casa Gemini è un\'unità di ventilazione controllata che garantisce il ricambio d\'aria e contemporaneamente il recupero di calore, evitando così ogni dispersione del calore. Gemini permette all\'aria che è all\'interno degli edifici di circolare e di rinnovarsi scambiandosi con l\'aria che è all\'esterno. In questo modo l\'aria interna viziata viene espulsa e contemporaneamente l\'aria esterna viene prelevata ed immessa all\'interno dell\'edificio. Questo scambio avviene con recupero di calore interno per non perdere il grado di efficienza energetica e di isolamento termico.",
        "ParagrafoDescrittivo2": "La sana aerazione di Gemini contribuisce a mantenere l\'equilibrio di umidità e temperatura aumentando il comfort abitativo e prevenendo danni all\'immobile (muffe, macchie, ecc.) e alle persone (problemi all\'apparato respiratorio e a quello muscolo-scheletrico). L\'aria espulsa rilascia la propria energia termica allo scambiatore ceramico che la trasmette all\'aria in entrata, dopo averla accuratamente filtrata. L\'aria che viene immessa all\'interno risulta quindi essere della stessa temperatura di quella uscita.",
        "ParagrafoDescrittivo3": "Gemini si integra in qualsiasi ambiente grazie al suo design minimalista. È un\'unità di ventilazione con recupero di calore per singolo locale e pertanto rappresenta la soluzione ideale per garantire il ricambio d\'aria e il recupero del calore in edifici residenziali, uffici, locali pubblici e commerciali. Si installa su muro perimetrale con spessore dai 25 ai 47 cm. Grazie al funzionamento modulabile sulle singole esigenze è pratico e comodo."
    },
    "immagini": {
        "immagineDescrittiva1": "imgdb/Gemini0.png",
        "immagineDescrittiva2": "imgdb/Gemini1.jpg",
        "immagineDescrittiva3": "imgdb/Gemini2.jpg",
        "immagineDescrittiva4": "imgdb/Gemini3.jpg"
    }
}'
);

INSERT INTO schedaProdotti (
    prodotto_id,
    contenuto
) VALUES (
    5,
    '{
    "titoli": {
        "TitoloPrincipale": "Geniair: sistema per garantire il ricambio dell\'aria e il recupero del calore",
        "Titolo1": "La ventilazione meccanica controllata VMC",
        "Titolo2": "Geniair, il miglior sistema VMC",
        "Titolo3": "Caratteristiche",
        "Titolo4": "Benefici"
    },
    "paragrafi": {
        "ParagrafoPrincipale": "L\'attenzione che oggi riponiamo verso il comfort delle nostre abitazioni è rappresentata generalmente da un buon livello di automazione domestica, quindi dai più moderni sistemi di climatizzazione, di sicurezza, di comunicazione con gli elettrodomestici della casa. In altre parole, la casa ideale è tecnologica e funzionale, ricca di innovazioni che rendono la vita più facile. Il comfort abitativo però non deriva soltanto dall’utilizzo di sistemi di automazione domestica: l’aria che respiriamo nelle nostre case è inquinata, forse più di quella esterna. Le fonti di inquinamento indoor che rilasciano gas o particelle nell’ambiente sono la causa primaria dei problemi di qualità dell’aria nelle abitazioni domestiche e di conseguenza dei danni alla nostra salute. Per migliorare il comfort abitativo è necessario dunque proteggere e migliorare anche la qualità dell’aria interna.",
        "ParagrafoDescrittivo1": "Aprire le finestre per arieggiare sembrerebbe la soluzione più ovvia e semplice ma non è certo la migliore, poichè l’aria esterna, soprattutto in città, è satura di smog e di polveri sottili, agenti molto pericolosi per la salute di tutti, ma anche di pollini che invece rappresentano un problema per le persone che soffrono di allergie. Per questo motivo sono nati i sistemi di ventilazione meccanica controllata (VMC), che da soli gestiscono il ricambio d’aria tra l’interno e l’esterno di un ambiente, estraendo quella interna da una parte e immettendo aria nuova dall’esterno, dopo averla sanificata per mezzo di potenti filtri che bloccano smog, pollini e agenti inquinanti. L’aria interna, finalmente pulita e sana, permette di creare un ambiente salubre e confortevole dove si vive meglio.",
        "ParagrafoDescrittivo2": "Geniair rappresenta la soluzione ideale per garantire il ricambio dell’aria ad altissima filtrazione e il recupero del calore in edifici residenziali, uffici, locali pubblici e commerciali. Geniair permette all’aria che è all’interno degli edifici di circolare e di rinnovarsi scambiandosi con l’aria che è all’esterno. In questo modo l’aria interna ricca di inquinanti viene espulsa al di fuori dell’appartamento e al tempo stesso il sistema preleva l’aria esterna, la purifica e la immette all’interno dell’abitazione. Questo scambio avviene nel rispetto dei livelli di efficienza energetica dell’abitazione attraverso il recupero del calore.",
        "ParagrafoDescrittivo3": "È silenziosissimo: la pressione sonora è di soli 18 dB. Per le camere da letto c’è la funzione notturna. La funzione iperventilazione consente di cambiare l’aria velocemente, soprattutto nelle occasioni in cui sono presenti nell’ambiente molte persone e l’aria si fa pesante. Si integra in tutti gli ambienti della tua casa grazie suo design moderno, garantito anche dall’inserimento dell’alimentatore all’interno della macchina. Disponibile su richiesta anche nella versione tinteggiabile, personalizzabile in base ai gusti. Grazie alla semplicità e rapidità di installazione non richiede lavori di muratura invasivi. È facile da utilizzare: la funzione free-cooling consente di raffrescare l’interno della casa durante le ore notturne estive e le mezze stagioni, mentre il sensore igrometrico integrato regola in automatico il funzionamento del sistema, per mantenere sempre il giusto livello di umidità, senza condense e muffa. La Smart App dedicata consente una gestione semplificata della macchina, direttamente dal tuo smartphone.È dotato di indicatore IAQ, dispositivo luminoso che indica la qualità dell’aria indoor tramite il colore delle luci, per avere sempre sotto controllo il livello di inquinanti.",
        "ParagrafoDescrittivo4": "Risparmio sui costi di riscaldamento e di climatizzazione, grazie al sistema entalpico di recupero di calore ad alta efficienza a doppio flusso Ottimizzazione degli investimenti sostenuti per l’isolamento termico (infissi, cappotto, tetto), inutili con un’areazione tradizionale Miglioramento della qualità di vita e del sonno grazie all’aria ambiente sempre pulita, sana e alla giusta temperatura Elimina polvere, pollini, spore, batteri e altre sostanze inquinanti che causano allergie grazie al filtro antipolline Impedisce la proliferazione di allergeni, muffa, umidità e cattivi odori, favorendo l’eliminazione degli agenti inquinanti Impedisce agli inquinanti esterni di entrare in casa Evita la svalutazione dell’immobile nel tempo, proteggendolo dai danni causati da umidità e condensa e dalla formazione di muffe È di facile utilizzo grazie al suo telecomando Si installa su muro perimetrale con qualunque spessore in modo facile e veloce Recupera il calore dell’ambiente fino all’86% continuo È silenzioso, a basso consumo e di facile utilizzo"
    },
    "immagini": {
        "immagineDescrittiva1": "imgdb/Geniair0.png",
        "immagineDescrittiva2": "imgdb/Geniair.jpg",
        "immagineDescrittiva3": "imgdb/Geniair1.jpg",
        "immagineDescrittiva4": "imgdb/Geniair2.jpg",
        "immagineDescrittiva5": "imgdb/Geniair3.jpg"
    }
}'
);

INSERT INTO schedaProdotti (
    prodotto_id,
    contenuto
) VALUES (
    6,
    '{
    "titoli": {
        "TitoloPrincipale": "ClimateCoating: migliora l’efficienza termica delle pareti",
        "Titolo1": "Minimo Spessore",
        "Titolo2": "Migliore Trasmittanza",
        "Titolo3": "Certificazioni",
        "Titolo4": "La tecnologia alla base di ClimateCoating",
        "Titolo5": "Per le pareti interne:ThermoVital",
        "Titolo6": "Per le pareti esterne:ThermoProtect",
        "Titolo7": "Per le coperture:ThermoActive"
    },
    "paragrafi": {
        "ParagrafoPrincipale": "Il risparmio energetico è una priorità dei nostri giorni e tutti gli operatori del mondo edile sono impegnati costantemente per proporre al mercato prodotti, sistemi e soluzioni in grado di ridurre i costi di riscaldamento in inverno e di climatizzazione in estate. Un fattore chiave per ottenere risparmio energetico è quello dell’efficientamento termico delle pareti in un edificio, il cui raggiungimento permette di risparmiare sui costi di climatizzazione e di riscaldamento, oltre che consentire un maggior comfort ambientale. Sono tanti i sistemi che in un appartamento o in un edificio permettono di isolare una parete e di mantenere una temperatura ambiente confortevole: pannelli, cappotti, intercapedini. ClimateCoating è l’unica membrana di rivestimento endotermica attiva MEA® presente sul mercato capace di migliorare le caratteristiche termoigrometriche delle pareti incrementando il risparmio energetico con grande efficacia.",
        "ParagrafoDescrittivo1": "A differenza di un classico isolante termico a spessore ClimateCoating è in grado di garantire risparmio energetico con un minimo spessore, grazie alla speciale tecnologia termo-ceramica. Questa caratteristica permette a Tecnova Group di proporre una gamma completa di rivestimenti multifunzionali per pareti esterne, tetti, pareti interne, coperture piane e per diversi materiali (intonaci, legno, metalli). Inoltre, ClimateCoating è pronto all’uso, si applica come una normale finitura ed è disponibile in 4.000 tonalità di colori, lavabili, resistenti, luminosi e brillanti nel tempo, come dimostra la garanzia di 5+5 anni.",
        "ParagrafoDescrittivo2": "Milioni di mq di pareti interne ed esterne trattate negli ultimi anni in tutto il mondo con ClimateCoating e numerosi test scientifici condotti da Enti di Ricerca esterni e indipendenti, dimostrano un miglioramento medio della trasmittanza del 30%, variabile in funzione dei materiali e degli spessori del pacchetto murario, nonostante questa membrana endotermica attiva non sia un isolante termico. Un apposito sistema di calcolo, elaborato dall’Università di Berlino, consente di quantificare preventivamente quale sarà il miglioramento della trasmittanza termica delle pareti verticali trattate con Climate Coating, in base alle caratteristiche del supporto esistente. Questo è uno dei Plus che permette a Climate Coating di essere scelto in tutto il mondo per la riqualificazione energetica degli edifici.",
        "ParagrafoDescrittivo3": "I prodotti ClimateCoating sono assolutamente innocui: non rilasciano alcuna sostanza riconosciuta nociva per l’uomo e sono indicati anche per soggetti allergici. Hanno infatti conseguito la certificazione Greenguard Gold, un’attestazione qualitativa che garantisce il rispetto degli standard più completi e rigorosi al mondo per le basse emissioni di VOC, la Certificazione A+ e sono certificati per il Protocollo Bio-Safe®. Molti enti, come l’Università di Catania e l’Aeronautica Militare, hanno voluto testare l’efficacia di ClimateCoating con sperimentazioni sul lungo termine.",
        "ParagrafoDescrittivo4": "Il cuore della tecnologia ClimateCoating, derivata da alcuni studi per le missioni spaziali della NASA, è rappresentato dalle microsfere vacue in ceramica. ClimateCoating è una membrana attiva che varia il proprio comportamento in funzione delle condizioni esterne. Essa è costituita per oltre il 50% da microsfere vacuizzate di ceramica immerse in uno speciale legante a base di acqua. Dopo l’asciugatura la membrana di rivestimento polimerizza in una struttura elastica, resistente, traspirante e con una distribuzione uniforme di microsfere. In 1 m2, la membrana contiene una superficie equivalente di 150 m2 di microsfere. Inoltre la struttura capillare della membrana favorisce l’evaporazione dell’umidità presente nel supporto, raffreddando così le pareti in estate e mantenendole calde e asciutte in inverno. A differenza degli isolanti termici più comuni che misurano la loro efficacia essenzialmente sul parametro della resistenza termica, ClimateCoating garantisce risparmio energetico tramite altri fenomeni fisici: la traspirazione variabile, il trasporto dell’umidità e l’aumento di superficie sono alcune delle proprietà, certificate da oltre 60 Enti e Centri di Ricerca nel mondo, che rendono uniche al mondo le membrane endotermiche attive (MEA®) ClimateCoating.",
        "ParagrafoDescrittivo5": "L’azione di ClimateCoating ThermoVital applicato alle pareti interne di una stanza regola il tasso di umidità mantenendolo intorno al valore del 55%, riduce i tempi di riscaldamento e/o raffrescamento dell’ambiente e distribuisce uniformemente il calore su tutta la superficie, abbattendo i ponti termici e prevenendo la formazione di condense e muffe. Grazie alla sua particolare composizione, è possibile avere effetti di risparmio energetico sia in estate sia in inverno.",
        "ParagrafoDescrittivo6": "ClimateCoating ThermoProtect, grazie alle sua elevata elasticità, previene la formazione di microfessurazioni nelle pareti esterne di un edificio, evitando infiltrazioni e conseguenti degradazioni e/o ammaloramenti dei supporti. Inoltre, asciuga le pareti trasportando l’umidità dall’interno verso l’esterno e isola completamente dagli agenti atmosferici come pioggia, smog, aerosol marino, mantenendo la traspirabilità, a differenza dei comuni cappotti in EPS.",
        "ParagrafoDescrittivo7": "ClimateCoating ThermoActive è un rivestimento per tetti, già pronto per l’uso, che, dopo l’applicazione, si presenta come una membrana termoceramica. È un rivestimento protettivo e molto resistente adatto per quasi tutte le superfici a tetto. La pendenza del tetto non deve essere inferiore al 6%. Grazie alla sua composizione speciale, dopo l’applicazione si manifestano tutte le sue proprietà di membrana endotermica che garantiscono soprattutto un buon risparmio energetico estivo."
    },
    "immagini": {
        "immagineDescrittiva1": "imgdb/ClimateCoating0.png",
        "immagineDescrittiva2": "imgdb/ClimateCoating1.png",
        "immagineDescrittiva3": "imgdb/ClimateCoating2.png",
        "immagineDescrittiva4": "imgdb/ClimateCoating3.png",
        "immagineDescrittiva5": "imgdb/ClimateCoating4.png",
        "immagineDescrittiva6": "imgdb/Thermovital.png",
        "immagineDescrittiva7": "imgdb/Thermoprotect.png",
        "immagineDescrittiva8": "imgdb/Thermoactive.png"
    }
}'
);


INSERT INTO schedaProdotti (
    prodotto_id,
    contenuto
) VALUES (
    9,
    '{
    "titoli": {
        "TitoloPrincipale": "La ionizzazione dell’aria indoor con Tecnovair",
        "Titolo1": "NTP: una forma evoluta di ionizzazione",
        "Titolo2": "La ionizzazione: un fenomeno naturale",
        "Titolo3": "Come funzionano i dispositivi Tecnovair",
        "Titolo4": "La tecnologia Tecnovair testata su virus, batteri, spore, muffe",
        "Titolo5": "La tecnologia Tecnovair sui Composti Organici Volatili (VOC)",
        "Titolo6": "Aria purificata al 100%"
    },
    "paragrafi": {
        "ParagrafoPrincipale": "Nell’aria di casa o in quella del luogo in cui lavori e i tuoi figli vanno a scuola non ci sono etichette: così non puoi scegliere, purtroppo, gli ingredienti di ciò che respiri. Come una golosa fetta di torta che stai per addentare prima di sapere che contiene quantità di zuccheri raffinati, grassi e additivi così anche l’aria può contenere molte più sostanze non proprio salutari di quello che puoi immaginare. E sì: anche l’aria di casa tua. Sostanze inquinanti che provengono dall’esterno, sostanze volatili emesse dagli arredi, dai prodotti per pulire e dai materiali edilizi (venirci, colle, malte), le micotossine emesse dalle muffe, per non parlare di virus e batteri portati da persone o semplicemente presenti nell’aria: gli “ingredienti” dell’aria di casa sono davvero tanti e spesso non ne siamo consapevoli.  Se vuoi iniziare subito a migliorare l’aria di casa, in questa pagina ti diamo alcuni suggerimenti. Ti spieghiamo come renderla più “green” grazie alle piante,  anche se per essere davvero certi di respirare aria pulita ci vuole qualcosa in più! Oggi ti vogliamo spiegare perché e come la tecnologia che noi utilizziamo nei nostri dispositivi per sanificare e depurare l’aria degli spazi indoor sia quella che a oggi è riconosciuta come la più efficace e sicura.",
        "ParagrafoDescrittivo1": "La ionizzazione dell’aria è un fenomeno naturale che interviene spontaneamente ogni qualvolta una molecola è sottoposta all’azione di un processo energetico in cui la quantità totale di energia è superiore a quella della molecola stessa. In pratica quando additiviamo di energia una molecola questa “estrae” un elettrone dall’orbita più esterna della molecola, e a causa dello squilibrio elettrico la molecola (atomo) assume la carica elettrica positiva. La tecnologia NTP (Non Thermal Plasma) realizza artificialmente la ionizzazione dell’aria attraverso il cosiddetto “Plasma Freddo”. È considerato il processo più sicuro per ossidare e scomporre sostanze inquinanti ed è dimensionabile in base alle esigenze di sanitizzazione. L’NTP è quindi un fenomeno fisico generato a temperatura ambiente, utilizza l’aria come miscela gassosa trasformandola in un gas ionizzato costituito da varie particelle caricate elettricamente: elettroni, ioni, atomi e molecole che scontrandosi tra loro producono specie ossidanti, la reattività delle particelle provoca fenomeni di ossidazione in grado di disaggregare i composti organici volatili, batteri, microorganismi, odori. L’elettrone “liberato” dall’orbita esterna si fissa immediatamente su altro tomo che assume carica elettrica negativa. Ogni atomo ha una probabilità ben definita di diventare atomo negativo e positivo in funzione della saturazione della corona periferica. Gli ioni in natura vengono prodotti dalle radiazioni solari, dallo sfregamento dei venti sulla superficie terrestre, da temporali, piogge ed eventi atmosferici, dall’assorbimento dei raggi cosmici, dalle collisioni dei corpuscoli dotati di energia cinetica.",
        "ParagrafoDescrittivo2": "I dispositivi Tecnovair rientrano nella categoria dei cosiddetti “ionizzatori d’aria”, ossia sistemi che rilasciano nell’aria da trattare particelle caricate negativamente e/o positivamente. La ionizzazione non l’ha inventata l’uomo, ma è uno dei sistemi che la natura usa per purificare l’aria. Hai notato come l’aria sia più leggera e frizzante dopo un temporale? Questo accade perché  la scarica elettrica dei fulmini ha liberato particelle caricate elettricamente, le quali, scontrandosi, producono specie ossidanti che scompongono le sostanze inquinanti presenti nell’aria. I dispositivi Tecnovair  sono in grado di ricreare artificialmente il fenomeno della ionizzazione per purificare, disinfettare e sanificare ambienti e oggetti.",
        "ParagrafoDescrittivo3": "Tutti i dispositivi Tecnovair, da quelli per uso domestico a quelli per uso industriale, medico, alberghiero e business, utilizzano la stessa tecnologia: attivano la ionizzazione delle particelle presenti nell’aria grazie al sistema a plasma freddo. Questo tipo di tecnologia, per svolgere la propria azione di sanificazione, non utilizza né sostanze chimiche potenzialmente dannose e inquinanti, né elevate temperature, perché attiva il fenomeno della ionizzazione con processi che generano un plasma (una miscela gassosa) a temperatura ambiente. Le particelle presenti nel plasma, tra le quali le più importanti sono le specie reattive dell’ossigeno, trasportano cariche elettriche che si concentrano sulla superficie delle membrane di composti organici volatili, batteri, microorganismi, odori, disgregandole e causandone così  la distruzione per ossidazione.",
        "ParagrafoDescrittivo4": "Per garantire la loro efficacia e sicurezza abbiamo fatto testare i dispositivi. I test hanno dimostrato che il trattamento con il Non Thermal Plasma (plasma a bassa temperatura) ha un ottimo effetto disinfettante e sanitizzante contro virus, batteri, spore, muffe ed  altri patogeni, tra i più pericolosi e  comuni come la Salmonella spp., Escherichia Coli, Listeria monocytogenes, Staphylococcus aureus, Pseudomonas aeruginosa. Dai test effettuati risulta evidente come già a brevi tempi di contatto (2 minuti), l’attività biocida dell’aria NTP sia in grado di eliminare il 100% dei microrganismi: le piastre esposte a aria NTP non mostrano alcuna crescita dei ceppi microbici testati, che invece si sono normalmente sviluppati sulle piastre esposte semplicemente all’aria. E dopo appena 5 minuti, tutte le specie testate sono completamente sradicate dalla superficie delle piastre.",
        "ParagrafoDescrittivo5": "Uno fra i campi più indagati è quello dell’abbattimento dei VOC (o COV, Composti Organici Volatili – Volatile Organic Compounds) che costituiscono una vasta gamma di inquinanti in fase gas. Il processo di ionizzazione comporta la formazione di particelle ossidanti che  reagiscono rapidamente con i VOC, scomponendoli e portandoli così alla distruzione. La ionizzazione tramite NTP  è in grado di agire anche sugli inquinanti inorganici, come quelli provenienti dai gas di scarico dei motori degli autoveicoli.",
        "ParagrafoDescrittivo6": "In poche parole: gli ioni positivi e negativi emessi dai dispositivi Tecnovair attaccano la struttura molecolare di tutte le sostanze inquinanti ( virus, allergeni, batteri, muffe, composti organici volatili, odori, ) presenti nell’aria dei vostri spazi indoor, attivando un processo di ossidazione che le disgrega ed abbatte. Le particelle attive del non thermal plasma aggregano il particolato aerodisperso (PM10; PN2,5 ecc) e lo fanno precipitare al suolo, riducendo così la possibilità di inalarlo attraverso la respirazione.   I dispositivi Tecnovair purificano e sanificano l’aria che respiri portando sollievo in presenza di disturbi legati alle vie respiratorie o allergie, possono contribuire  al miglioramento in modo naturale di tosse e raffreddore anche in bambini e anziani, aumentano l’assorbimento di ossigeno da parte dell’organismo, con un  complessivo benessere del tuo organismo."
    },
    "immagini": {
        "immagineDescrittiva1": "imgdb/tecnovaair0.jpg",
        "immagineDescrittiva2": "imgdb/tecnovaair1.jpg",
        "immagineDescrittiva3": "imgdb/tecnovair.jpg",
        "immagineDescrittiva4": "imgdb/tecnovaair2.jpg",
        "immagineDescrittiva5": "imgdb/tecnovaair3.jpg",
        "immagineDescrittiva6": "imgdb/tecnovaair4.jpg",
        "immagineDescrittiva7": "imgdb/tecnovaair5.jpg"
    }
}'
);


CREATE TABLE Carrello (
    id_carrello INT PRIMARY KEY AUTO_INCREMENT,
    id_utente INT,
	index idxutente (id_utente),
    FOREIGN KEY (id_utente) REFERENCES registrazioni(id)
);

CREATE TABLE Prodotti_Carrello (
	id int auto_increment primary key,
    id_carrello INT,
    id_prodotto INT,
    quantita_totale INT DEFAULT 0,
    prezzo_totale FLOAT,
	index idxcarrello (id_carrello),
	index idxidprodotto (id_prodotto),
    FOREIGN KEY (id_carrello) REFERENCES Carrello(id_carrello),
    FOREIGN KEY (id_prodotto) REFERENCES prodotti(id)
);





CREATE TABLE Ordini (
    id_ordine INT AUTO_INCREMENT PRIMARY KEY,
    id_utente INT,
    data_ordine DATETIME DEFAULT CURRENT_TIMESTAMP,
    nome VARCHAR(255),
    cognome VARCHAR(255),
    indirizzo VARCHAR(255),
    codice_postale VARCHAR(10),
    numero_telefono VARCHAR(20),
    note TEXT,
    index idx_utente (id_utente),
    FOREIGN KEY (id_utente) REFERENCES registrazioni(id)
);

CREATE TABLE Ordini_Prodotti (
	id int auto_increment primary key,
    id_ordine INT,
    id_prodotto INT,
    quantità INT,
    prezzo_totale FLOAT,
    index idxordine (id_ordine),
    index idxprodotto (id_prodotto),
    FOREIGN KEY (id_ordine) REFERENCES Ordini(id_ordine),
    FOREIGN KEY (id_prodotto) REFERENCES prodotti(id)
);


CREATE TABLE Soluzioni (
    soluzioni_id integer primary key,
    contenuto json
);


INSERT INTO Soluzioni (
    soluzioni_id,
    contenuto	
) VALUES (
    1,
    '{
    "titoli": {
        "TitoloPrincipale": "Il tuo edificio consuma troppa energia? Migliora la sua efficienza termica.",
        "Titolo1": "Pittura multifunzionale per rivestire le pareti interne ed esterne",
        "Titolo2": "Fibra di cellulosa per inserimento nelle intercapedini dell’edificio",
        "Titolo3": "Azione combinata della pittura multifunzionale e della fibra di cellulosa"
    },
    "paragrafi": {
        "ParagrafoPrincipale": "Offrire la possibilità di incrementare l’efficienza termica di un edificio, sia esso un’abitazione, un condominio, una struttura commerciale o altro ancora, significa contribuire a difendere l’ambiente migliorando anche il comfort abitativo e allo stesso tempo riducendo i costi di riscaldamento e climatizzazione. Uno degli elementi che costituiscono la sfera del risparmio energetico è quello del miglioramento dell’efficienza termica delle pareti in un edificio, il cui raggiungimento permette di risparmiare sui costi di climatizzazione e di riscaldamento, oltre che consentire un maggior comfort ambientale. Sono tanti i sistemi che permettono di migliorare l’efficienza termica delle pareti di un edificio (pannelli, cappotti, intercapedini). Tecnova Group propone sistemi innovativi che consentono di migliorare l’isolamento termico degli edifici senza comportare investimenti troppo onerosi.",
		"Paragrafo1": "Il cuore della tecnologia ThermoShield è rappresentato dalle microsfere in ceramica. ThermoShield è una membrana attiva che varia il proprio comportamento in funzione delle condizioni esterne. Essa è costituita per oltre il 50% da microsfere vacuizzate di ceramica immerse in uno speciale legante a base di acqua.",
        "Paragrafo2": "Enerpaper è una fibra di cellulosa di legno purissima attraverso la quale vengono riempite le intercapedini delle pareti esistenti tra il muro esterno e la tamponatura internadegli edifici. Il riempimento avviene per mezzo della tecnica dell’insuflaggio, una delle tecniche migliori per isolare termicamente le pareti di un edificio.",
        "Paragrafo3": "TermoZero Kit rappresenta oggi la soluzione più efficace per migliorare l’isolamento termico attraverso la combinazione dei due sistemi proposti da Tecnova Group: Thermoshield ed Enerpaper. L’azione isolante, antipolvere e antimuffa di Enerpaper viene infatti rafforzata dall’azione protettiva e regolatrice di ThermoShield."
        },
    "immagini": {
        "immagineDescrittiva1": "imgdb/Consumi_energetici.jpg",
        "immagineDescrittiva2": "imgdb/thermoshield-1.png",
        "immagineDescrittiva3": "imgdb/logo-enerpaper.png",
        "immagineDescrittiva4": "imgdb/termoZero.png"
    }
}'
);

INSERT INTO Soluzioni (
    soluzioni_id,
    contenuto
) VALUES (
    2,
    '{
    "titoli": {
        "TitoloPrincipale": "La tua casa è attaccata dall\’umidità? Sconfiggila con i nostri sistemi di deumidificazione",
        "Titolo1": "Sistema di deumidificazione elettrofisica per sconfiggere l\’umidità da risalita",
        "Titolo2": "Unità di ventilazione per prevenire ed eliminare l\’umidità da condensa",
        "Titolo3": "Sistema di ventilazione meccanica controllata per garantire il ricambio dell\’aria e il recupero del calore"
    },
    "paragrafi": {
        "ParagrafoPrincipale": "L’acqua è innanzitutto un bene prezioso ma può anche diventare una minaccia per gli edifici e per l’uomo. Se presente in eccesso, sotto forma di umidità, diventa uno dei principali responsabili di degrado delle strutture edili e di insalubrità ambientale. Condense, muffe, macchie all’intonaco, fioriture di sali sono solo alcuni degli aspetti che evidenziano la necessità di adottare un intervento di deumidificazione per la salute dell’edificio e non solo, ma anche di chi lo abita. L’umidità e i sali contenuti in essa possono causare seri danni quando sono presenti all’interno delle murature (umidità da risalita) oppure quando la loro presenza persiste negli ambienti (formazione di condense). In entrambi i casi e con il passare del tempo le murature subiscono un degrado sistematico e determinano condizioni ambientali molto pericolose per la salute dell’uomo. Al fine di evitare il degrado degli edifici e problematiche alla nostra salute, diventa dunque necessario intervenire con sistemi in grado di eliminare l’umidità all’interno delle murature e negli ambienti e con prodotti studiati appositamente per risanare i muri colpiti dalla formazione di fioriture di sali.",
        "Paragrafo1": "L’umidità da risalita è la prima responsabile della formazione di muffe sui muri, ma anche di efflorescenze saline e dunque di conseguente distacco dell’intonaco. Per sconfiggerla, Tecnova Group ha realizzato Genié, il sistema di deumidificazione elettrofisica muraria con tecnologia a impulsi in multifrequenza. Genié interviene invertendo il processo fisico della capillarità, secondo il quale le molecole dell’acqua risalgono dal terreno all’interno delle murature.",
        "Paragrafo2": "L’umidità da condensa che si forma negli ambienti è la responsabile della formazione di muffe e macchie sui muri, che col passare del tempo possono causare seri problemi alla nostra salute. Per sconfiggerla, Tecnova Group ha realizzato Gemini, l’unità di ventilazione ad incasso che controlla e gestisce lo scambio dell’aria tra interno ed esterno e dunque garantisce il recupero del calore, evitando così ogni dispersione termica ed energetica. La sana aerazione di Gemini contribuisce quindi a mantenere in equilibrio l’umidità e la temperatura aumentando il comfort abitativo.",
        "Paragrafo3": "Aprire le finestre per garantire una qualità dell’aria all’interno degli ambienti domestici non è la soluzione ideale. Per ottenere un costante ricambio dell’aria, evitare la proliferazione di allergeni e favorire l’eliminazione degli agenti inquinanti sono nati appositamente i sistemi di ventilazione meccanica controllata (VMC). Geniair rappresenta la soluzione ideale per garantire il ricambio dell’aria ad altissima filtrazione e il recupero del calore in edifici residenziali, uffici, locali pubblici e commerciali, permettendo all’aria interna agli edifici di circolare e di rinnovarsi scambiandosi con l’aria che è all’esterno."
    },
    "immagini": {
        "immagineDescrittiva1": "imgdb/umidità.jpg",
        "immagineDescrittiva2": "imgdb/Genie-logo.png",
        "immagineDescrittiva3": "imgdb/gemini-logo.png",
        "immagineDescrittiva4": "imgdb/Geniair-logo.png"
    }
}'
);

INSERT INTO Soluzioni (
    soluzioni_id,
    contenuto
) VALUES (
    3,
    '{
    "titoli": {
        "TitoloPrincipale": "La tua casa è attaccata dagli agenti esterni? Rinnovala e proteggila con i nostri prodotti cementizi",
        "Titolo1": "Sigillante a penetrazione profonda per la protezione e l\'impermeabilizzazione",
        "Titolo2": "Prodotto cementizio per il risanamento del calcestruzzo",
        "Titolo3": "Pittura multifunzionale per rivestire le pareti interne ed esterne"
    },
    "paragrafi": {
        "ParagrafoPrincipale": "Saper rendere un\'opera edile più resistente e duratura è per Tecnova Group una sfida ben accetta, affrontata a colpi di tecnologia. Per il risanamento del calcestruzzo e la protezione definitiva di diverse superfici, dal ripristino del calcestruzzo alla pietra, dal legno alla muratura, le risposte di Tecnova Group dichiarano guerra ai comuni agenti di degrado, sia naturali che chimici, capaci di mettere a repentaglio la durabilità delle strutture edili. Le parole d\'ordine sono impermeabilizzare, rinforzare, indurire, sigillare, proteggere, consolidare: perché il patrimonio edilizio va innanzitutto difeso, con la forza della tecnologia.",
        "Paragrafo1": "Per la protezione e l\'impermeabilizzazione definitiva del calcestruzzo c\'è Evercem DPS, un sigillante a penetrazione profonda che allunga la vita utile delle superfici cementizie proteggendole, impermeabilizzandole e indurendole in maniera permanente. Evercem DPS è in grado di esprimere tutte le sue proprietà sulla superficie cementizia trattata, senza alterarne minimamente l\'aspetto.",
        "Paragrafo2": "L\'azione costante di agenti atmosferici e sostanze inquinanti può essere la causa, con il passare del tempo, di danneggiamenti e deterioramenti del calcestruzzo. Questo fenomeno può avvenire sia per le superfici esterne sia per quelle interne degli edifici. Per il risanamento del cemento armato ammalorato e la protezione delle opere in calcestruzzo, anche danneggiato o deteriorato, c\'è una soluzione a bassissimo spessore e di facile applicazione: Evercem Easy, la polvere premiscelata monocomponente polimero-cementizia, costituita da inerti selezionati, leganti ad elevatissima resistenza, e speciali copolimeri.",
        "Paragrafo3": "ThermoShield Exterieur, oltre a essere una finitura di altissima qualità disponibile in più di 4000 colori diversi, grazie alle sua elevata elasticità, previene la formazione di microfessurazioni nelle pareti esterne di un edificio, evitando infiltrazioni e conseguenti degradazioni e/o ammaloramenti dei supporti. Inoltre, asciuga le pareti trasportando l\'umidità dall\'interno verso l\'esterno e isola completamente dagli agenti atmosferici come pioggia, smog, aerosol marino, mantenendo la traspirabilità, a differenza dei comuni cappotti in EPS"
    },
    "immagini": {
        "immagineDescrittiva1": "imgdb/Agenti-esterni.jpg",
        "immagineDescrittiva2": "imgdb/evercem0.png",
        "immagineDescrittiva3": "imgdb/evercem-cementizi.png",
        "immagineDescrittiva4": "imgdb/thermoshield-1.png"
    }
}'
);

INSERT INTO Soluzioni (
    soluzioni_id,
    contenuto
) VALUES (
    4,
    '{
    "titoli": {
        "TitoloPrincipale": "L’aria che respiri nella tua casa non è salubre? Rendila migliore con i nostri sistemi innovativi",
        "Titolo1": "L’azione sinergica di 6 prodotti per la salute della casa",
        "Titolo2": "Unità di ventilazione per prevenire ed eliminare l’umidità da condensa",
        "Titolo3": "Sistema di ventilazione meccanica controllata per garantire il ricambio dell’aria e il recupero del calore",
        "Titolo4": "Dispositivo di ionizzazione per purificare l’aria indoor"
    },
    "paragrafi": {
        "ParagrafoPrincipale": "Abitare, vivere e lavorare in un ambiente salubre è quello di cui ogni persona ha diritto a difesa della propria salute. Molte invece sono le situazioni indoor nelle quali il comfort abitativo delle persone viene meno a causa della presenza di umidità, muffe, inquinanti nocivi, ma anche cariche batteriche e aria insalubre. A Tecnova Group sta particolarmente a cuore la questione del comfort abitativo, tanto da aver predisposto diversi prodotti capaci di integrarsi vicendevolmente per un risultato di massima efficacia.",
        "Paragrafo1": "Grazie alla sinergia di 6 prodotti ad alto contenuto tecnologico, SanHabitat agisce contemporaneamente su tre fondamentali aspetti: monitorizza l’inquinamento indoor, elimina l’umidità in eccesso e purifica l’aria interna rendendo gli ambienti di vita più sani e confortevoli.",
        "Paragrafo2": "L’umidità da condensa che si forma negli ambienti è la responsabile della formazione di muffe e macchie sui muri, che col passare del tempo possono causare seri problemi alla nostra salute. Per sconfiggerla, Tecnova Group ha realizzato Gemini, l’unità di ventilazione ad incasso che controlla e gestisce lo scambio dell’aria tra interno ed esterno e dunque garantisce il recupero del calore, evitando così ogni dispersione termica ed energetica. La sana aerazione di Gemini contribuisce quindi a mantenere in equilibrio l’umidità e la temperatura aumentando il comfort abitativo.",
        "Paragrafo3": "Aprire le finestre per garantire una qualità dell’aria all’interno degli ambienti domestici non è la soluzione ideale. Per ottenere un costante ricambio dell’aria, evitare la proliferazione di allergeni e favorire l’eliminazione degli agenti inquinanti sono nati appositamente i sistemi di ventilazione meccanica controllata (VMC). Geniair rappresenta la soluzione ideale per garantire il ricambio dell’aria ad altissima filtrazione e il recupero del calore in edifici residenziali, uffici, locali pubblici e commerciali, permettendo all’aria interna agli edifici di circolare e di rinnovarsi scambiandosi con l’aria che è all’esterno.",
        "Paragrafo4": "Jonix Cube è un dispositivo di purificazione dell’aria basato sulla tecnologia di ionizzazione a plasma freddo. Generando ioni, molecole normalmente presenti in natura, Jonix è in grado di neutralizzare fino al 99% di virus, batteri, muffe, composti organici (VOC) e odori."
    },
    "immagini": {
        "immagineDescrittiva1": "imgdb/ionizzazione-dell-aria.jpg",
        "immagineDescrittiva2": "imgdb/san-habitat.png",
        "immagineDescrittiva3": "imgdb/gemini-logo.png",
        "immagineDescrittiva4": "imgdb/Geniair0.png",
        "immagineDescrittiva5": "imgdb/jonix.png"
    }
}'
);


INSERT INTO Soluzioni (
    soluzioni_id,
    contenuto
) VALUES (
    5,
    '{
    "titoli": {
        "TitoloPrincipale": "La tua casa ha bisogno di un restyling? Rinnovala con il nostro prodotto cementizio",
        "Titolo1": "Polvere premiscelata per un trattamento bello da vedere, ma anche resistente e protettivo"
    },
    "paragrafi": {
        "ParagrafoPrincipale": "Il mondo dei rivestimenti decorativi è davvero molto vasto e chiunque abbia intenzione di rendere più gradevole il proprio ambito lavorativo o l’ambiente in cui vive difficilmente riesce a farsi un’idea chiara tra le tante soluzioni presenti sul mercato. Quella di Tecnova Group è senz’altro quella più innovativa…",
        "Paragrafo1": "Evercem Texture è un prodotto cementizio realizzato con una polvere premiscelata monocomponente che consente un’elevata adesione al supporto, elevate prestazioni meccaniche e un’ottima resistenza all’usura. Miscelato con acqua e pigmentabile con appositi coloranti, il prodotto diventa una malta superfluida agevolmente applicabile a spatola, anche con uso di stencil e stampi, con uno spessore di circa 2 mm. La successiva rifinitura a carteggio o a spatola conferisce alla superficie l’effetto estetico desiderato, con leggeri giochi di sfumature."
	},
    "immagini": {
        "immagineDescrittiva1": "imgdb/Casa_restauro-1.jpg",
        "immagineDescrittiva2": "imgdb/evercem-texture.png"
    }
}'
);



