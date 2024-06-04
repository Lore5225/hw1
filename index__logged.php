<?php
require_once 'LoggedCheck.php';
if (!$username = checkAuth()) {
  header("Location: index.php");
  exit;
}
?>


<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="HW.js" defer></script>
  <title>HW</title>
  <link rel="stylesheet" href="HW.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Press+Start+2P&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

</head>

<body>
  <header>

    <div class="inner__header__container">
      <img src="images/tecnova-group.png" alt="" />
      <div id="login__header">
        <img src="images/menu.png" id="hamburger__icon" alt="">
        <h1> Benvenuto <?php echo $_SESSION["username"]; ?>!</h1>
        <a href="profile.php"> <img src="images/profile-user.png" id="profile__image" alt=""> </a>
        <div class="login__registration__wrapper">
          <a href="logout__section.php">Logout</a>
        </div>
      </div>
    </div>

    <nav>
      <a> Home</a>
      <h1>Problemi & Soluzioni</h1>
      <div class="nav-text">
        <form action="ProblemAndSolution.php" method="post">
          <button type="submit" name="Problem" value="1">Il tuo edificio consuma troppa energia?</button>
          <button type="submit" name="Problem" value="2">La tua casa è attaccata dall'umidità?</button>
          <button type="submit" name="Problem" value="3">La tua casa è attaccata da agenti esterni?</button>
          <button type="submit" name="Problem" value="4">L'aria che respiri nella tua casa non è più salubre?</button>
          <button type="submit" name="Problem" value="5">La tua casa ha bisogno di un restyling?</button>
        </form>
      </div>
      <h1>Prodotti</h1>
      <div class="nav-text">
        <form action="DescriptionProducts.php" method="post" class="">
          <button type="submit" name="product" value="Genié">Genié</button>
          <button type="submit" name="product" value="Gemini">Gemini</button>
          <button type="submit" name="product" value="ThermoVital">Climate Coating</button>
          <button type="submit" name="product" value="Geniair">Geniair</button>
          <button type="submit" name="product" value="Tecnovair">Tecnovair</button>
          <button type="submit" name="product" value="Evercem Easy">Evercem Easy</button>
          <button type="submit" name="product" value="Evercem Top Seal">Evercem Protettivi</button>
        </form>
      </div>
      </div>


      <a href="ShoppingPage.php"> <img id="shopping-cart" src="images/carrello.png" alt="" /></a>

    </nav>

  </header>

  <div class="cointainer_tecnova_cover hidden_transition_FadeIn">
    <img src="images/tecnova_group_cover.jpeg" alt="">
  </div>
  <div class="container-slideshow hidden_transition_FadeIn">
    <img src="images/slideshow.jpg" alt="" />
  </div>
  <div class="grid_solution_1x2 hidden_transition_LeftToRight">
    <div class="solution_item">
      <h1>Il tuo edificio consuma troppa energia? </h1>
      <img src="images/Consumi.png" alt="" />
      <p>
        Scopri le nostre soluzioni per il
        risparmo energetico, in grado di
        ridurre i costi di riscaldamento e
        climatizzazione migliorando
        l’efficienza energetica
      </p>
      <form action="ProblemAndSolution.php" method="post">
        <button type="submit" name="Problem" value="1" id="solution__button"> Scopri di più</button>
      </form>

    </div>
    <div class="solution_item">
      <h1>La tua casa è attaccata dall’umidità?</h1>
      <img src="images/umidita.png" alt="" />
      <p>
        Abbiamo le soluzioni per proteggerla sia dall’umidità di risalita
        all’interno dei muri, sia dall’umidità che si forma
        sulle pareti domestiche
      </p>
      <form action="ProblemAndSolution.php" method="post">
        <button type="submit" name="Problem" value="2" id="solution__button"> Scopri di più</button>
      </form>

    </div>
  </div>

  <div class="grid_solution_1x3 hidden_transition_LeftToRight">
    <div class="solution_item">
      <h1>La tua casa è attaccata da agenti esterni?</h1>
      <img src="images/Agenti_esterni.png" alt="" />
      <p>
        Scopri le nostre soluzioni per
        proteggerla dal degrado causato dagli
        agenti atmosferici, tra cui
        acqua,freddo e calore solare
      </p>
      <form action="ProblemAndSolution.php" method="post">
        <button type="submit" name="Problem" value="3" id="solution__button"> Scopri di più</button>
      </form>


    </div>

    <div class="solution_item">
      <h1>L’aria che respiri nella tua casa non è salubre?</h1>
      <img src="images/Inquinamento_indoor.png" alt="" />
      <p>
        Abbiamo le soluzioni per
        eliminare il problema dell’aria insalubre negli
        ambienti domestici, purificarla e
        prenderci cura del tuo benessere
      </p>
      <form action="ProblemAndSolution.php" method="post">
        <button type="submit" name="Problem" value="4" id="solution__button"> Scopri di più</button>
      </form>


    </div>

    <div class="solution_item">
      <h1>La tua casa ha bisogno di un restyling?</h1>
      <img src="images/Restyling.png" alt="" />
      <p>
        Rendiamo più bello l’ambiente di casa attraverso un
        unico rivestimento decorativo per diverse tipologie
        di superfici e pareti .
      </p>
      <form action="ProblemAndSolution.php" method="post">
        <button type="submit" name="Problem" value="5" id="solution__button"> Scopri di più</button>
      </form>


    </div>
  </div>

  <div class="tablist__wrapper">
    <div class="tablist__item">
      <h1>Qual è il tuo problema?</h1>
      <p>
        Identifica tra i seguenti il problema che presenta il tuo edificio o
        l’ambiente in cui vivi e scopri la soluzione che ti proponiamo
      </p>
      <div class="tablist">
        <div class="row__problem">
          <h3>
            <img src="images/plus-white.png" alt="" />Umidità da risalita
          </h3>
          <div class="solution-text">
            Al fine di evitare il degrado degli edifici e problematiche alla
            nostra salute dovute alla conseguente formazione di muffe, diventa
            necessario intervenire contro l’umidità da risalita con sistemi in
            grado di bloccarla all’interno delle murature.
            <form action="DescriptionProducts.php" method="post" class="learn-about hidden">

              <button type="submit" name="product" value="Genié"> <img src="images/arrow.png" alt="" /> Scopri come risolvere il problema</button>
            </form>
          </div>
        </div>

        <div class="row__problem">
          <h3>
            <img src="images/plus-white.png" alt="" />Umidità e condensa nelle
            stanze
          </h3>
          <div class="solution-text">
            Un ambiente sano è un ambiente dove non si formano condense e dove
            quindi si evita la formazione di muffe, il conseguente
            deterioraramento delle pareti e dove soprattutto si preserva la
            salute delle persone che lo abitano.
            <form action="DescriptionProducts.php" method="post" class="learn-about hidden">
              <button type="submit" name="product" value="Gemini"> <img src="images/arrow.png" alt="" /> Scopri come risolvere il problema</button>
            </form>
          </div>
        </div>

        <div class="row__problem">
          <h3>
            <img src="images/plus-white.png" alt="" />Muffa sulle pareti
          </h3>
          <div class="solution-text">
            Il più delle volte, la presenza di muffa sulle pareti è una
            conseguenza diretta di un ambiente non correttamente aerato, dove
            la presenza di condensa determina la nascita e il proliferarsi del
            problema
            <form action="DescriptionProducts.php" method="post" class="learn-about hidden">
              <button type="submit" name="product" value="Gemini"> <img src="images/arrow.png" alt="" /> Scopri come risolvere il problema</button>
            </form>
          </div>
        </div>

        <div class="row__problem">
          <h3>
            <img src="images/plus-white.png" alt="" />Aria viziata nelle
            stanze
          </h3>
          <div class="solution-text">
            Abitare un ambiente sano significa garantire la propria salute e
            quella dei propri cari. Per migliorare il comfort abitativo è
            necessario proteggere e migliorare anche la qualità dell’aria
            interna, che spesso è viziata a causa di una insufficiente
            aerazione
            <form action="DescriptionProducts.php" method="post" class="learn-about hidden">
              <button type="submit" name="product" value="Geniair"> <img src="images/arrow.png" alt="" /> Scopri come risolvere il problema</button>
            </form>
          </div>
        </div>
        <div class="row__problem">
          <h3>
            <img src="images/plus-white.png" alt="" />Aria inquinata nelle
            stanze
          </h3>
          <div class="solution-text">
            L’aria che respiriamo nelle nostre case è inquinata, forse più di
            quella esterna: le fonti di inquinamento indoor che rilasciano gas
            o particelle nell’ambiente sono la causa primaria dei problemi di
            qualità dell’aria nelle abitazioni domestiche e di conseguenza dei
            danni alla nostra salute
            <form action="DescriptionProducts.php" method="post" class="learn-about hidden">
              <button type="submit" name="product" value="Thermovital"> <img src="images/arrow.png" alt="" /> Scopri come risolvere il problema</button>
            </form>
          </div>
        </div>
        <div class="row__problem">
          <h3>
            <img src="images/plus-white.png" alt="" />Consumi energetici
            Elevati
          </h3>
          <div class="solution-text">
            Un fattore chiave per ottenere risparmio energetico è quello
            dell’efficientamento termico delle pareti in un edificio, il cui
            raggiungimento permette di risparmiare sui costi di
            climatizzazione e di riscaldamento, oltre che consentire un
            maggior comfort ambientale
            <form action="DescriptionProducts.php" method="post" class="learn-about hidden">
              <button type="submit" name="product" value="Thermovital"> <img src="images/arrow.png" alt="" /> Scopri come risolvere il problema</button>
            </form>
          </div>
        </div>
        <div class="row__problem">
          <h3>
            <img src="images/plus-white.png" alt="" />Degrado delle pareti
            dell'edificio
          </h3>
          <div class="solution-text">
            Il calcestruzzo non è assolutamente esente da deterioramento
            causato da agenti atmosferici: sali dell’acqua, acidi, variazioni
            di temperatura, ecc. esercitano ogni giorno una costante usura
            delle costruzioni edili e pertanto è necessario ricorrere a
            trattamenti specifici per mantenerle stabili ed efficienti.
            <form action="DescriptionProducts.php" method="post" class="learn-about hidden">
              <button type="submit" name="product" value="Evercem Top Seal"> <img src="images/arrow.png" alt="" /> Scopri come risolvere il problema</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="tablist__item">
      <h1>Case History</h1>
      <div class="case-history-image">
        <img src="images/solution.jpeg" id="solution-img" alt="">
      </div>
      <p>
        Scopri di più sulla nostra azienda di edilizia, Tecnova Group, leader nel
        settore delle soluzioni per problemi edilizi. Con anni di esperienza e una
        comprovata esperienza di successo, offriamo soluzioni efficaci e certificate
        per problemi come umidità, condensa, muffa, aria viziata e degrado delle
        pareti.
      </p>

      <p>
        Siamo orgogliosi di essere certificati per:
      </p>
      <ul class="certification-list">
        <li>Risparmio Energetico</li>
        <li>Comfort Abitativo</li>
        <li>Protezione Edifici</li>
        <li>Deumidificazione</li>


      </ul>

    </div>
  </div>
  <div class="question-tecnova">Perchè affidarsi a Tecnova Group?</div>
  <div class="grid__trust hidden_transition_LeftToRight">
    <div class="grid__trust__item">
      <h1>Un Unico Interlocutore per tutte le Soluzioni </h1>
      <img src="images/Unico_referente (1).png" alt="" />
      <p>
        Tecnova Group non si limita a offrire
        soluzioni
        tecnologicamente innovative e
        moderne, ma si propone come
        unico interlocutore in grado di prendersi carico di
        tutte le attività che iniziano dal
        sopralluogo e terminano con il servizio
        post-vendita.
      </p>
    </div>

    <div class="grid__trust__item">
      <h1>Innovazione e Condivisione</h1>
      <img src="images/Innovazione.png" alt="" />
      <p>
        Le scelte tecniche che Tecnova Group compie ogni
        giorno rappresentano lo
        stato dell’arte dell’innovazione
        e la condivisione di ciò che è stato appreso,
        attraverso attività di formazione e
        crescita professionale dei propri
        interlocutori tecnici.
      </p>
    </div>

    <div class="grid__trust__item">
      <h1>Sostenibilità Ambientale in primo piano</h1>
      <img src="images/Sostenibile.png" alt="" />
      <p>
        Le risorse del pianeta non possono essere
        utilizzate e sfruttate all’infinito: ogni
        scelta progettuale che Tecnova Group compie
        quotidianamente è rivolta al concetto di
        sostenibilità ambientale, al fine di
        rispettare e
        utilizzare qualsiasi risorsa in
        maniera oculata.
      </p>
    </div>
  </div>

  <div class="button-wrap-cell3">
    <div class="button-cell3">
      <a>Sfoglia il nostro Company Profile</a>
    </div>
  </div>

  <div class="testimonials__wrapper">
    <p>Testimonianze</p>
  </div>

  <div class="grid-testimonianze">
    <div class="grid-item-testimonianze">
      <h1>
        Marino Saliprandi
        Salsomaggiore Terme (PR)
      </h1>

      <img src="images/pers1.jpg" alt="" />

      <p>
        Durante la ristrutturazione nel mio immobile ho notato che
        l’intonaco si scrostava. Era evidente che tale problema si sarebbe
        potuto ripresentare anche in futuro e pertanto l’architetto che ha
        seguito la ristrutturazione mi ha messo in contatto con Tecnova
        Group. Il tecnico che ha effettuato il sopralluogo mi ha proposto
        l’installazione del prodotto Genié, convincendomi immediatamente con
        la formula “soddisfatto o rimborsato”. L’installazione è stata
        semplice, senza la necessità di opere murarie, e i risultati si sono
        visti dopo breve tempo. Una soluzione efficace che consiglierei a
        tutti.
      </p>
    </div>
    <div class="grid-item-testimonianze">
      <h1>
        Monica Campagnoli Campogalliano (MO)
      </h1>

      <img src="images/pers2.jpg" alt="" />


      <p>
        Dopo aver ristrutturato la tavernetta della mia villetta singola, mi
        sono accorta che il muro “fioriva” e che l’aria era diventata
        insalubre, con un odore persistente di umidità. Ho provato a
        installare qualche elemento in più ai termosifoni, per permettere un
        maggior riscaldamento in inverno, ma niente da fare. Ho trovato la
        soluzione Genié di Tecnova Group su internet e la spiegazione
        pubblicata sul sito mi ha convinto da subito. Il tecnico che ha
        fatto il sopralluogo mi ha proposto la formula “soddisfatto o
        rimborsato” e mi ha garantito che non avrei dovuto fare lavori di
        muratura. Ho deciso allora di farlo installare e oggi sono
        soddisfatta: dopo pochi giorni l’umidità è scesa di una ventina di
        centimetri e non avverto più alcun odore di umidità.
      </p>

    </div>
    <div class="grid-item-testimonianze">
      <h1>
        Spiridione Miccoli
        Noicattaro (BA)
      </h1>

      <img src="images/pers3.jpg" alt="" />


      <p>
        Nella mia villa bifamiliare, situata in campagna, ho notato che
        l’umidità cominciava a prendere il sopravvento: si scrostavano i
        muri e le fughe della pavimentazione si presentavano sempre
        macchiate di umidità. Ho provato a risolvere il problema con delle
        vaschette contenenti sali e successivamente con un deumidificatore
        elettrico: niente da fare, il problema persisteva. Ho scoperto il
        sistema Genié di Tecnova Group grazie alla segnalazione del mio
        elettricista. Mi sono fidato e sono rimasto molto soddisfatto: lo
        consiglierei a tutti perché risolve il problema dell’umidità da
        risalita con una semplice installazione, senza il bisogno di
        spaccare muri.
      </p>

    </div>
    <div class="grid-item-testimonianze">
      <h1>
        Pierluigi Piumi
        Serramazzoni (MO)
      </h1>

      <img src="images/pers4.jpg" alt="" />


      <p>
        Mi sono accorto che il mio immobile aveva qualche problema quando ho
        notato uno sfarinamento della vernice alla base delle pareti, con il
        distacco di porzioni di intonaco e la presenza di efflorescenze. Ho
        incontrato un tecnico di Tecnova Group nel mio studio e da subito si
        è contraddistinto per la sua competenza in materia. Il problema era
        dovuto all’umidità che risaliva nei muri e la soluzione proposta è
        stata quella di installare Genié, un sistema che genera un campo
        elettromagnetico in multifrequenza: in poco tempo sono scomparse le
        efflorescenze e si è fermato il distacco dell’intonaco.
      </p>

    </div>
  </div>
  <div class="certification__wrapper">
    <div>
      <p>Le Certificazioni di Tecnova Group</p>
    </div>
  </div>

  <div class="certification__wrapper">
    <img src="images/cert1.png" alt="" />
    <img src="images/cert2.png" alt="" />
  </div>

  <div class="articles__wrapper">

    Approfondisci le tue conoscenze sul comfort abitativo e sulla protezione
    degli edifici

    <p>Scopri gli articoli dei nostri esperti nel Blog di Tecnova Group</p>
  </div>

  <div class="ArticleContainer">
    <img class="cert-img" src="images/art1.jpg" alt="" data-index="0" />
    <img class="cert-img" src="images/art2.jpg" alt="" data-index="1" />
    <img class="cert-img" src="images/art3.jpg" alt="" data-index="2" />
  </div>

  <div class="blog__wrapper">
    <button>
      <img src="images/plus.png" alt="" />
      <p>Vai al blog</p>
    </button>
  </div>



  <div class="help__wrapper">
    <p class="help">Come possiamo aiutarti?</p>
  </div>
  <div class="container-border">
    <div class="contacts-container">
      <div class="contacts-item">
        <p>Contattaci su Whatsapp</p>
        <a href="#" class="contacts-button">
          <img src="images/cornetta.png" alt="">Clicca qui
        </a>
      </div>
      <div class="contacts-item">
        <p>Scrivici per ogni esigenza</p>
        <a href="#" class="contacts-button">
          <img src="images/pngwing.com (1).png" alt="">Clicca qui
        </a>
      </div>
    </div>
  </div>

  <div class="flex-divider">
    <p>Seguici anche su YouTube!</p>
  </div>

  <div class="video__container"></div>

  <div class="container-endpage">
    <div class="item-endpage">
      <h3>Tecnova Group</h3>
      <p>
        Sede legale e operativa:<br>
        Via Al Idrisi, 2T 95041 Caltagirone (CT)<br>
        Tel. 0933 31224 / 0933 25621<br>
        Fax: 0933 25621<br>
        Email: <a href="mailto:info@tecnovagroup.com">info@tecnovagroup.com</a><br>
        Pec: <a href="mailto:tecnovagroup@pec.it">tecnovagroup@pec.it</a><br>
        P.IVA: IT05086260873
      </p>

      <img src="images/enel.png" alt="Enel" />

    </div>

    <div class="item-endpage">
      <div id="dubai-format">
        <p>Representative office: 48 Burj Gate, 10th Floor, room #1001, Downtown, Dubai (EAU)</p>
        <p>Representative office: 7th Floor – CI Tower – Khalidiya Area – Abu Dhabi</p>
        <a href="#">Lavora con noi</a>
        <a href="#">Privacy e trattamento dei dati</a>
        <a href="#">Uso dei cookie</a>
      </div>
    </div>

    <div class="item-endpage">
      <p>Iscriviti alla nostra Newsletter</p>
      <div class="email_bar">
        <input type="email" placeholder="Email" />
      </div>
      <button class="send-button">Invia</button>
      <div class="accept-button-container">
        <input type="checkbox" name="" id="checkbox" />
        <label for="checkbox">Ho letto e accettato l’info sulla privacy</label>
      </div>
    </div>
  </div>

  <footer>
    <div class="footer-container">
      <p>© Copyright Tecnova Group Srl - P.IVA IT05086260873</p>
      <div>
        <img src="images/facebook.png" alt="" />
        <img src="images/pngegg (1).png" alt="" />
      </div>
    </div>
  </footer>
</body>

</html>