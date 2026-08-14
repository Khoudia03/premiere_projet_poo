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