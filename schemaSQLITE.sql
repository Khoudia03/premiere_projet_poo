DROP TABLE IF EXISTS reglements;
DROP TABLE IF EXISTS ligne_commande;
DROP TABLE IF EXISTS ligne_appro;
DROP TABLE IF EXISTS commandes;
DROP TABLE IF EXISTS approvisionnements;
DROP TABLE IF EXISTS produits;
DROP TABLE IF EXISTS clients;
DROP TABLE IF EXISTS fournisseurs;
DROP TABLE IF EXISTS utilisateurs;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS modes_paiement;
DROP TABLE IF EXISTS statuts_appro;

CREATE TABLE roles (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE utilisateurs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom_complet VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    mot_passe VARCHAR(255) NOT NULL,
    adresse VARCHAR(255),
    tel VARCHAR(30),
    role_id INT NOT NULL REFERENCES roles(id)
);

CREATE TABLE clients (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE,
    tel VARCHAR(30),
    limite_credit DECIMAL(12,2) DEFAULT 0
);

CREATE TABLE modes_paiement (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    mode VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE produits (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    libelle VARCHAR(150) NOT NULL,
    prix_vente DECIMAL(12,2) NOT NULL CHECK (prix_vente >= 0),
    stock_initial INTEGER NOT NULL DEFAULT 0 CHECK (stock_initial >= 0)
);

CREATE TABLE statuts_appro (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE fournisseurs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom VARCHAR(150) NOT NULL,
    email VARCHAR(150),
    tel VARCHAR(30),
    adresse VARCHAR(255)
);

CREATE TABLE commandes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    date_commande DATE NOT NULL DEFAULT CURRENT_DATE,
    montant_initial DECIMAL(12,2) NOT NULL DEFAULT 0,
    avance DECIMAL(12,2) NOT NULL DEFAULT 0,
    client_id INT NOT NULL REFERENCES clients(id),
    mode_paiement_id INT NOT NULL REFERENCES modes_paiement(id),
    utilisateur_id INT NOT NULL REFERENCES utilisateurs(id),
    CHECK (montant_initial >= 0),
    CHECK (avance >= 0)
);

CREATE TABLE ligne_commande (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    qte_commande INTEGER NOT NULL CHECK (qte_commande > 0),
    prix_reel DECIMAL(12,2) NOT NULL CHECK (prix_reel >= 0),
    commande_id INT NOT NULL REFERENCES commandes(id) ON DELETE CASCADE,
    produit_id INT NOT NULL REFERENCES produits(id)
);

CREATE TABLE approvisionnements (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ref_bl VARCHAR(100) NOT NULL UNIQUE,
    date_appro DATE NOT NULL DEFAULT CURRENT_DATE,
    fournisseur_id INT NOT NULL REFERENCES fournisseurs(id),
    statut_appro_id INT NOT NULL REFERENCES statuts_appro(id),
    utilisateur_id INT NOT NULL REFERENCES utilisateurs(id)
);

CREATE TABLE ligne_appro (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    qte_appro INTEGER NOT NULL CHECK (qte_appro > 0),
    qte_recu INTEGER NOT NULL DEFAULT 0 CHECK (qte_recu >= 0),
    prix_reel DECIMAL(12,2) NOT NULL CHECK (prix_reel >= 0),
    appro_id INT NOT NULL REFERENCES approvisionnements(id) ON DELETE CASCADE,
    produit_id INT NOT NULL REFERENCES produits(id)
);

CREATE TABLE reglements (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    date DATE NOT NULL DEFAULT CURRENT_DATE,
    montant DECIMAL(12,2) NOT NULL CHECK (montant > 0),
    commande_id INT NOT NULL REFERENCES commandes(id) ON DELETE CASCADE
);
