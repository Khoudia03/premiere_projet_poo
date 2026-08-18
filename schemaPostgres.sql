DROP TABLE IF EXISTS reglements CASCADE;
DROP TABLE IF EXISTS ligne_commande CASCADE;
DROP TABLE IF EXISTS ligne_appro CASCADE;
DROP TABLE IF EXISTS commandes CASCADE;
DROP TABLE IF EXISTS approvisionnements CASCADE;
DROP TABLE IF EXISTS produits CASCADE;
DROP TABLE IF EXISTS clients CASCADE;
DROP TABLE IF EXISTS fournisseurs CASCADE;
DROP TABLE IF EXISTS utilisateurs CASCADE;
DROP TABLE IF EXISTS roles CASCADE;
DROP TABLE IF EXISTS modes_paiement CASCADE;
DROP TABLE IF EXISTS statuts_appro CASCADE;


CREATE TABLE roles (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE utilisateurs (
    id SERIAL PRIMARY KEY,
    nom_complet VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    mot_passe VARCHAR(255) NOT NULL,
    adresse VARCHAR(255),
    tel VARCHAR(30),
    role_id INT NOT NULL REFERENCES roles(id)
);

CREATE TABLE clients (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE,
    tel VARCHAR(30),
    limite_credit NUMERIC(12,2) DEFAULT 0
);

CREATE TABLE modes_paiement (
    id SERIAL PRIMARY KEY,
    mode VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE produits (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(150) NOT NULL,
    prix_vente NUMERIC(12,2) NOT NULL CHECK (prix_vente >= 0),
    stock_initial INT NOT NULL DEFAULT 0 CHECK (stock_initial >= 0)
);

CREATE TABLE statuts_appro (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE fournisseurs (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(150) NOT NULL,
    email VARCHAR(150),
    tel VARCHAR(30),
    adresse VARCHAR(255)
);

CREATE TABLE commandes (
    id SERIAL PRIMARY KEY,
    date_commande DATE NOT NULL DEFAULT CURRENT_DATE,
    montant_initial NUMERIC(12,2) NOT NULL DEFAULT 0,
    avance NUMERIC(12,2) NOT NULL DEFAULT 0,
    client_id INT NOT NULL REFERENCES clients(id),
    mode_paiement_id INT NOT NULL REFERENCES modes_paiement(id),
    utilisateur_id INT NOT NULL REFERENCES utilisateurs(id),
    CONSTRAINT chk_commande_montant
        CHECK (montant_initial >= 0),
    CONSTRAINT chk_commande_avance
        CHECK (avance >= 0)
);

CREATE TABLE ligne_commande (
    id SERIAL PRIMARY KEY,
    qte_commande INT NOT NULL CHECK (qte_commande > 0),
    prix_reel NUMERIC(12,2) NOT NULL CHECK (prix_reel >= 0),
    commande_id INT NOT NULL REFERENCES commandes(id) ON DELETE CASCADE,
    produit_id INT NOT NULL REFERENCES produits(id)
);

CREATE TABLE approvisionnements (
    id SERIAL PRIMARY KEY,
    ref_bl VARCHAR(100) NOT NULL UNIQUE,
    date_appro DATE NOT NULL DEFAULT CURRENT_DATE,
    fournisseur_id INT NOT NULL REFERENCES fournisseurs(id),
    statut_appro_id INT NOT NULL REFERENCES statuts_appro(id),
    utilisateur_id INT NOT NULL REFERENCES utilisateurs(id)
);

CREATE TABLE ligne_appro (
    id SERIAL PRIMARY KEY,
    qte_appro INT NOT NULL CHECK (qte_appro > 0),
    qte_recu INT NOT NULL DEFAULT 0 CHECK (qte_recu >= 0),
    prix_reel NUMERIC(12,2) NOT NULL CHECK (prix_reel >= 0),
    appro_id INT NOT NULL REFERENCES approvisionnements(id) ON DELETE CASCADE,
    produit_id INT NOT NULL REFERENCES produits(id)
);


CREATE TABLE reglements (
    id SERIAL PRIMARY KEY,
    date DATE NOT NULL DEFAULT CURRENT_DATE,
    montant NUMERIC(12,2) NOT NULL CHECK (montant > 0),
    commande_id INT NOT NULL REFERENCES commandes(id) ON DELETE CASCADE
);
ALTER TABLE reglements
ADD COLUMN dette_id INT REFERENCES dettes(id) ON DELETE CASCADE;
ALTER TABLE reglements
ADD COLUMN mode_paiement_id INT REFERENCES modes_paiement(id);

CREATE TABLE dettes (
    id SERIAL PRIMARY KEY,
    montant_initial NUMERIC(12,2) NOT NULL,
    montant_restant NUMERIC(12,2) NOT NULL,
    date_creation DATE NOT NULL DEFAULT CURRENT_DATE,
    date_echeance DATE,
    statut VARCHAR(30) NOT NULL,
    commande_id INT NOT NULL UNIQUE,

    FOREIGN KEY (commande_id)
        REFERENCES commandes(id)
        ON DELETE CASCADE,

    CHECK (montant_initial >= 0),
    CHECK (montant_restant >= 0),
    CHECK (montant_restant <= montant_initial)
);
ALTER TABLE dettes
ADD CONSTRAINT check_statut_dette
CHECK (statut IN ('Solde', 'Non solde'));
 SELECT id,libelle,prix_vente,stock_initial FROM produits ORDER BY id DESC;