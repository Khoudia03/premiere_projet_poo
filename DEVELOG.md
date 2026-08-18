Journal de Développement (DEVLOG)
Nom & Prénom : [Khoudia Cisse]  
**Projet** : StoreManager Pro (ERP PHP/POO) 

### 🌃 [Vendredi - Phase 1] : Conception & BDD Fallback
- **Heure de réalisation** : 16H - 20H40
- **Ce qui a été fait** : j'ai réalisé les diagrammes de useCases et diagramme de classe selon ma comprehension
- **Difficultés / Obstacles** : j'ai quelques problemes par rapport au usecases et classe mais finalement j'ai raisonné de ma façon de comprehension 



- **Heure de réalisation** : 20H50 - 22H40
- **Ce qui a été fait** : j'ai créé une base de donnéé nommée gestion_approvisionnement_dette dans Postgres et j'ai créé les tables avec les clés étrangers (schéma relationnel). J'ai aussi installé sqlite3 ensuite créé une connexion nommée ConnexionStep1.2 et comme DATABASE PATH gestion_appro_dette et ensuite créer toutes les tables que j'avais dans ma base gestion_approvisionnement_dette(Postgres).

- **Difficultés / Obstacles** : Je n'arrivais pas à créer une autre connexion dans postgres parceque j'ai atteint le nombre limit de connexion dans l'extension DataBase Client . Du coup j'ai créé ma base gestion_approvisionnement_dette(Postgres) à partir d'une connexion déjà existant.


- **Heure de réalisation** : 22H20 - 23H30
- **Ce qui a été fait** : J'ai créé dans mon projet un dossier src et Core dans src et un fichier Database.php pour créer une classe connexion singleton avec fallback
- **Difficultés / Obstacles** : Je comprenais pas carrément le mot singleton mais apres avoir faire des recherches j'ai compris l'importance et le sens du singleton


- **Heure de réalisation** : 00H30 - 00H50
- **Ce qui a été fait** : J'ai ajouter les captures d'ecran des diagrammes de usecase et diagramme de classe et aussi j'ai modifié je nom de la base de donnée de postgres car j'avais pas bien écrit le nom de la base.
- **Difficultés / Obstacles** : Votre message disant de mettre les captures des diagrammes dans le dossier je ne l'ai tarement vue et aussi j'ai sue que dans la classe Database j'avais mis le même nom de base de données dans postgres et sqlite alors que c'était pas le même alors que la classe DataBase doit essayé la connexion avac la base dans postgres et s'il y'a erreur il essaie avec sqlite.




### ☀️ [Samedi - Phase 2] : POO, Repositories & Ventes POS
- **Heure de réalisation** : 09H-10H30
- **Ce qui a été fait** : J'ai créé dans le dossier src un autre dossier appelé Model et dans Model un autre dossier Entity où j'ai des fichiers Approvisionnement.php, Client.php, Commande.php, Fournisseur.php, LigneAppro.php, LigneCommande.php, ModePaiement.php, Produit.php, Reglement.php, Role.php, StatutAppro.php, Utilisateur.php .
- **Difficultés / Obstacles** : Pour ici j'avais pas de difficulté juste que je savais pas comment représenter les types DATE dans les entités aprés j'ai fais des recherches et j'ai vue que c'est DateTime et aussi pour les méthodes je sais pas encore les méthodes que j'aurai besoin pour mon projet c'est pour cela que simplement mis dans toutes les entités la methode getId() pour l'instant qui permettra de recupérer un objet d'une entité à partir de son id .

- **Heure de réalisation** : 11H-13H
- **Ce qui a été fait** : J'ai créé dans le dossier Model un autre dossier appelé Repositories et dans Repositories j'ai 3 fichiers ClientRepository.php, FournisseurRepository.php et ProduitRepository.php pour de communiquer avec les tables fournisseurs, clients, produits de la base de données gestion_approvisionnement_dette pour recupérer tout les produits,fournisseurs et clients. J'ai aussi ajouter des namespace dans les classes Fournisseur, Produit et Client pour que les Repository que j'ai créé peuvent y accéder et connaitre la description pour chaque objet.Et aussi j'ai transformé le resultat de pdo qui retourne un tableau associatif en objet pour chaque ligne.
- **Difficultés / Obstacles** : Pour ici j'avais pas de difficulté.


- **Heure de réalisation** : 13H-19H40
- **Ce qui a été fait** : J'ai ajouter un dossier nommé service dans src ou j'ai créé un fichier VenteService.php pour implementation de VenteService avec transaction SQL. Pour éffectue une vente complète: j'ai Récupérer les produits et vérifier les stocks, ensuite vérifier que le client existe, aprés vérifier l'utilisateur, vérifier le mode de paiement, vérifier l'avance, calculer le reste à payer, vérifier la limite de crédit, si le client ne paie pas tout immédiatement, le reste devient une dette, insérer la commande, insérer les lignes de commande, décrémenter le stock, enregistrer le règlement, créé un règlement uniquement si une avance a réellement été versée et si tout s'est bien passé on enregistre sinon on annule tout.
- **Difficultés / Obstacles** : Pour ici j'ai pas bien compris parceque j'ai toujous pas fait des insertions pour mes tables et je comprend pas carrément le principes si je dois faire comme avant inserer des lignes dans les tables ou je dois les faire dans les classeModel c'est un peu mélanger dans ma tête.



- **Heure de réalisation** : 16H-19H30 Dim. 16 Août
- **Ce qui a été fait** : J'ai ajouter un dossier nommé Controller dans src et un fichier POSController.php pour qu'il recupere les données envoyés par VenteService.php pour gérer la vue . J'ai aussi modifer les entités Client.php, Produit.php et ModePaiement.php en ajoutant des methodes pour pouvoir recupérer les données pour l'affichage et aussi j'ai ajouter ModePaiementRepository.php dans Repositories pour recupérer tout les mode de paiement. J'ai aussi ajouter un dossier Views dans src, un dossier pos dans Views et un fichier StoreManager.html.php dans pos pour afficher la vue.
- **Difficultés / Obstacles** : Pour ici j'ai finalement fait des insertions pour chaque table dans la base de donnée mais c'est toujours pas trop claire dans ma tête. Et aussi j'arrive pas à chargé la vue car c'est un peu trop mélange pour moi. 


### 🚀 [Dimanche - Phase 3] : Dettes, Approvisionnements & Rôles
- **Heure de réalisation** : 19H - 00H
- **Explication de VenteService.php : La classe `VenteService` contient la logique métier permettant d’effectuer une vente complète. Elle commence par récupérer la connexion à la base de données grâce à `Database::getInstance()->getConnection()`. La méthode `effectuerVente()` reçoit l’identifiant du client, l’identifiant de l’utilisateur, l’identifiant du mode de paiement, le panier et l’avance éventuelle. Elle vérifie d’abord que le panier n’est pas vide et que l’avance n’est pas négative. Ensuite, elle démarre une transaction SQL avec `beginTransaction()` afin de garantir que toutes les opérations de la vente seront réalisées ensemble ou annulées en cas d’erreur. Pour chaque produit du panier, elle récupère son identifiant et sa quantité, vérifie que la quantité est valide, recherche le produit avec une requête préparée et utilise `FOR UPDATE` afin de verrouiller la ligne du produit pendant la transaction. Elle vérifie ensuite que le produit existe et que son stock est suffisant, puis récupère son prix et calcule le montant de la ligne. Le montant de chaque ligne est ajouté au montant total de la commande et les informations des produits vérifiés sont conservées dans le tableau `$produits`. Le service vérifie ensuite que le client existe et récupère sa limite de crédit, puis vérifie également que l’utilisateur et le mode de paiement existent. Il contrôle que l’avance ne dépasse pas le montant total de la commande et calcule le reste à payer. Ce reste est comparé à la limite de crédit du client afin de refuser la vente si le crédit autorisé est dépassé. Une fois toutes ces vérifications effectuées, le service crée la commande dans la table `commandes` avec une requête `INSERT`. L'instruction `RETURNING id` permet de récupérer immédiatement l’identifiant de la commande créée. Ensuite, chaque produit du panier est enregistré dans la table `ligne_commandes` avec son identifiant, sa quantité et son prix réel. Le service diminue ensuite le stock de chaque produit grâce à une requête `UPDATE`, tout en vérifiant que la quantité disponible est suffisante. Si une avance a été versée, elle est enregistrée dans la table `reglements` et associée à la commande. Lorsque toutes les opérations réussissent, `commit()` valide définitivement la transaction et la méthode retourne l’identifiant de la commande. En revanche, si une exception se produit à n’importe quelle étape, le bloc `catch` vérifie qu’une transaction est active, puis exécute `rollBack()` afin d’annuler toutes les modifications effectuées pendant la vente avant de relancer l’exception avec `throw $e`. Ainsi, le service garantit qu’une vente est enregistrée entièrement ou qu’aucune modification liée à cette vente n’est conservée.

**Explication de Database.php : La classe `Database` est responsable de gérer la connexion à la base de données de l’application. Elle utilise le pattern **Singleton**, ce qui permet de garantir qu’une seule instance de la classe `Database` est créée et utilisée dans toute l’application. Le namespace `App\Core` indique que la classe appartient au cœur de l’application. Les instructions `use PDO` et `use PDOException` permettent respectivement d’utiliser PDO pour communiquer avec la base de données et de gérer les erreurs liées à la connexion.

La propriété `private static ?Database $instance = null` contient l’unique instance de la classe `Database`. Elle est `static` car elle appartient à la classe elle-même et non à un objet particulier. Le `?Database` signifie qu’elle peut contenir soit un objet `Database`, soit `null`. Au départ, elle vaut `null` car aucune instance n’a encore été créée.

La propriété `private PDO $pdo` permet de stocker l’objet PDO qui représente la connexion à la base de données. Le type `PDO` indique que cette propriété doit contenir une connexion PDO.

Le constructeur `private function __construct()` est privé afin d’empêcher la création directe d'un objet avec `new Database()` depuis l’extérieur de la classe. C’est une caractéristique importante du Singleton : la création de l’instance est contrôlée par la méthode `getInstance()`.

À l’intérieur du constructeur, un bloc `try` tente d’abord d’établir une connexion à PostgreSQL avec `new PDO()`. La chaîne `pgsql:host=localhost;port=5432;dbname=gestion_approvisionnement_dette` indique que l’application utilise PostgreSQL, que le serveur se trouve sur la machine locale, qu’il utilise le port `5432` et que la base de données utilisée s’appelle `gestion_approvisionnement_dette`. Les deux paramètres suivants correspondent respectivement au nom d’utilisateur PostgreSQL `postgres` et au mot de passe fourni.

Après la création de la connexion, `setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)` configure PDO afin que les erreurs SQL soient signalées sous forme d’exceptions. Cela permet au bloc `catch` de détecter les problèmes de connexion ou les erreurs PDO.

Si la connexion PostgreSQL échoue, l’exception `PDOException $e` est récupérée par le bloc `catch`. Le programme utilise alors une connexion de secours vers SQLite. La variable `$sqlitePath` construit le chemin vers le fichier `gestion_appro_dette.db`. `dirname(__DIR__, 2)` permet de remonter de deux niveaux à partir du dossier contenant `Database.php`, puis `"/gestion_appro_dette.db"` indique le nom du fichier SQLite.

La ligne `new PDO("sqlite:" . $sqlitePath)` crée alors une connexion vers cette base SQLite. Comme pour PostgreSQL, `PDO::ATTR_ERRMODE` est configuré avec `PDO::ERRMODE_EXCEPTION` afin que les erreurs de la connexion SQLite soient également signalées sous forme d’exceptions.

La méthode `public static function getInstance(): Database` permet d’obtenir l’instance unique de `Database`. Elle vérifie d’abord si `self::$instance` vaut `null`. Si c’est le cas, aucune instance n’existe encore, donc la méthode crée une nouvelle instance avec `new Database()`. Comme le constructeur est privé, cette création ne peut être effectuée qu’à l’intérieur de la classe. Une fois l’instance créée, elle est stockée dans `self::$instance`. Lors des appels suivants à `getInstance()`, l’instance existe déjà et la méthode retourne directement la même instance au lieu d’en créer une nouvelle.

Enfin, la méthode `getConnection()` permet de récupérer l’objet PDO contenu dans `$this->pdo`. Elle retourne donc la connexion actuellement utilisée par l’application, qu’il s’agisse de PostgreSQL ou, si PostgreSQL n’a pas pu être utilisé, de SQLite.

Ainsi, le fonctionnement général de cette classe est : **l’application demande une instance de `Database`, le Singleton vérifie si elle existe déjà, puis une connexion PostgreSQL est tentée. Si PostgreSQL échoue, une connexion SQLite de secours est utilisée. La connexion PDO obtenue peut ensuite être récupérée avec `getConnection()` et utilisée par les Repositories et les Services.**


**Explication POSController.php : La classe POSController sert de liaison entre la vue, les Repositories et le Service de vente.

Le constructeur crée les objets VenteService, ProduitRepository, ClientRepository et ModePaiementRepository.
index() récupère les produits, clients et modes de paiement, puis charge la vue de la caisse.
vendre() récupère les données envoyées par le formulaire : client, produits, quantités, montant versé et mode de paiement.
Il construit ensuite le $panier et récupère l'utilisateur connecté avec $_SESSION.
Il transmet toutes ces informations à VenteService->effectuerVente(), qui réalise réellement la vente et la transaction SQL.
Si la vente réussit, il redirige vers /pos avec l'identifiant de la commande.
Si une erreur survient, le catch récupère le message d'erreur et recharge la vue avec les données nécessaires.


J'ai aussi modifier un peu ma diagramme de classe en ajoutant une table dette et ajouter deux colonnes dans reglements.
