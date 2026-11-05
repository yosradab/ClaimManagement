# ClaimManagement — Module Réclamations & Avis (Symfony)

Module web **Symfony** de gestion des **réclamations** clients et des **avis** sur les articles, avec un espace client (front office) et un espace d'administration (back office).

Projet académique réalisé à ESPRIT (projet intégré PIDEV). Il fonctionne avec le client de bureau JavaFX : [Symfony-javafx-Project](https://github.com/yosradab/Symfony-javafx-Project).

> Ce dépôt contient les fichiers sources du module (contrôleurs, entités, formulaires). Les templates Twig ne sont pas inclus. Pour l'exécuter, il faut intégrer ces fichiers dans une application Symfony existante (voir [Installation](#installation)).

## Fonctionnalités

### Réclamations
- Dépôt d'une réclamation par le client : nom, prénom, e-mail, numéro mobile, description, service concerné
- **Capture d'écran en pièce jointe** (upload d'image avec VichUploaderBundle)
- Choix du service concerné : *Service Article*, *Service de Vente*, *Service Communication*, *Service Avis*
- Suivi du statut (*En cours* / *Traitée*) et de la date de traitement
- **Réponse par e-mail** au client depuis le back office (Swift Mailer)

### Avis
- Ajout d'un avis sur un article avec une note sur le service
- Consultation, modification et suppression des avis

### Front office / back office
- Contrôleurs côté client : `ReclaamtionFController`, `AviFController`
- Contrôleurs côté admin : `ReclamationController`, `AvisController`
- CRUD complet avec protection CSRF sur les suppressions

## Stack technique

| Élément | Technologie |
|---|---|
| Framework | Symfony 5.4 (routes en attributs PHP 8) |
| ORM | Doctrine (entités `Reclamation`, `Avis`) |
| Formulaires | Symfony Form (`ReclamationType`, `Reclamation1Type`, `AvisType`, `Avis1Type`) |
| Upload | VichUploaderBundle |
| E-mail | Swift Mailer |
| Base de données | MySQL |

## Routes principales

| Route | Rôle |
|---|---|
| `/reclamation` | Back office : liste, détail, édition et suppression des réclamations |
| `/reclamation/mail` | Envoi d'une réponse par e-mail |
| `/reclaamtion/f` | Front office : dépôt et suivi des réclamations |
| `/avis` | Back office : gestion des avis |
| `/avi/f` | Front office : avis des clients |
| `/home` | Page d'accueil |

## Installation

1. Créer ou ouvrir un projet Symfony 5.4 :
   ```bash
   composer create-project symfony/skeleton:"5.4.*" claim-app
   cd claim-app
   composer require webapp vich/uploader-bundle symfony/swiftmailer-bundle
   ```
2. Copier les fichiers :
   - `*Controller.php` → `src/Controller/`
   - `Reclamation.php`, `Avis.php` → `src/Entity/`
   - `*Type.php` → `src/Form/`
3. Configurer la base de données et le mailer dans `.env` (`DATABASE_URL`, `MAILER_DSN`).
4. Créer le schéma puis lancer le serveur :
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:schema:update --force
   symfony serve
   ```

## Auteur

**Yosra Dab** — Ingénieure logiciel Full Stack · [Portfolio](https://yosradab.vercel.app) · [GitHub](https://github.com/yosradab) · [LinkedIn](https://linkedin.com/in/yosradab)
