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