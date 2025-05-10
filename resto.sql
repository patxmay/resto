

CREATE TABLE critiquer (
  idC bigint UNSIGNED NOT NULL,
  content text COLLATE utf8mb4_unicode_ci NOT NULL,
  status enum('Non modere','Valide','Invalide') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Non modere',
  rating int DEFAULT NULL,
  idU bigint UNSIGNED NOT NULL,
  idR bigint UNSIGNED NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  FOREIGN KEY (idU) REFERENCES utilisateur(IdU),
  FOREIGN KEY (idR) REFERENCES restaurant(IdR)
)

CREATE TABLE moderateur (
  idM bigint UNSIGNED NOT NULL,
  idU bigint UNSIGNED NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  FOREIGN KEY (idU) REFERENCES utilisateur(IdU)
)


CREATE TABLE restaurant (
  idR bigint UNSIGNED NOT NULL,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  address varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  cuisine varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  rating double(8,2) DEFAULT NULL
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
)

CREATE TABLE utilisateur (
  idU bigint UNSIGNED NOT NULL,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  password varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  address varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  phone varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  logitude double,
  latitude double,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
)

CREATE TABLE typecuisine(
idT bigint UNSIGNED NOT NULL,
libelle varchar(255))

CREATE TABLE proposer(
idP bigint UNSIGNED NOT NULL,
idT bigint UNSIGNED NOT NULL,
idR bigint UNSIGNED NOT NULL,
FOREIGN KEY (idR) REFERENCES restaurant(IdR),
FOREIGN KEY (idT) REFERENCES typecuisine(IdT))

CREATE TABLE photo(
idPH bigint UNSIGNED NOT NULL,
chemin varchar(255),
idR bigint UNSIGNED NOT NULL,
FOREIGN KEY (idR) REFERENCES restaurant(IdR))

CREATE TABLE aimer(
idA bigint UNSIGNED NOT NULL,
idU bigint UNSIGNED NOT NULL,
idR bigint UNSIGNED NOT NULL,
FOREIGN KEY (idR) REFERENCES restaurant(IdR),
FOREIGN KEY (idU) REFERENCES utilisateur(IdU)
)

CREATE TABLE preferer(
idPR bigint UNSIGNED NOT NULL,
idU  bigint UNSIGNED NOT NULL,
FOREIGN KEY (idU) REFERENCES utilisateur(IdU))
