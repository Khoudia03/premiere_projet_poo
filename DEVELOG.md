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