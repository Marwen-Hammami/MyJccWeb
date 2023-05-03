<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230501195937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contratsponsoring DROP FOREIGN KEY fk_contrat_photographe');
        $this->addSql('ALTER TABLE contratsponsoring DROP FOREIGN KEY fk_contrat_sponsor');
        $this->addSql('ALTER TABLE galerie DROP FOREIGN KEY fk_galerie_photographe');
        $this->addSql('ALTER TABLE location_vehicule DROP FOREIGN KEY location_vehicule_ibfk_1');
        $this->addSql('ALTER TABLE location_vehicule DROP FOREIGN KEY location_vehicule_ibfk_2');
        $this->addSql('ALTER TABLE photographie DROP FOREIGN KEY fk_photo_galerie');
        $this->addSql('ALTER TABLE planningfilmsalle DROP FOREIGN KEY fk_ID_film1');
        $this->addSql('ALTER TABLE planningfilmsalle DROP FOREIGN KEY fk_ID_salle1');
        $this->addSql('ALTER TABLE prix DROP FOREIGN KEY fk_prix_film');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY fk_id_plan');
        $this->addSql('ALTER TABLE reservation_hotel DROP FOREIGN KEY reservation_hotel_ibfk_2');
        $this->addSql('ALTER TABLE reservation_hotel DROP FOREIGN KEY reservation_hotel_ibfk_1');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE contratsponsoring');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE galerie');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE location_vehicule');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP TABLE photographie');
        $this->addSql('DROP TABLE planningfilmsalle');
        $this->addSql('DROP TABLE prix');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_hotel');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('DROP TABLE vote');
        $this->addSql('ALTER TABLE logs MODIFY ID_Logs INT NOT NULL');
        $this->addSql('DROP INDEX ID_User ON logs');
        $this->addSql('DROP INDEX `primary` ON logs');
        $this->addSql('ALTER TABLE logs DROP ID_User, DROP Date, DROP Action, CHANGE ID_Logs id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE logs ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', DROP Role, CHANGE username username VARCHAR(255) NOT NULL, CHANGE Genre genre VARCHAR(255) NOT NULL, CHANGE Email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE PhotoB64 photob64 VARCHAR(255) NOT NULL, CHANGE NumTel numtel INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog (id_blog INT AUTO_INCREMENT NOT NULL, titre VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, ID_Auteur INT NOT NULL, date_publication DATE NOT NULL, contenu VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, etiquette VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, image VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_blog)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commentaire (id_commentaire INT AUTO_INCREMENT NOT NULL, ID_Auteur INT NOT NULL, date_commentaire DATE NOT NULL, contenu VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, id_blog INT NOT NULL, INDEX fk_commentaire_auteur (ID_Auteur), INDEX fk_coment (id_blog), PRIMARY KEY(id_commentaire)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contratsponsoring (ID_Contrat INT AUTO_INCREMENT NOT NULL, DateDebut DATE NOT NULL, DateFin DATE NOT NULL, Type VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Etat VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, SalaireDt DOUBLE PRECISION NOT NULL, TermesPDF TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, ID_Sponsor INT NOT NULL, SignatureSponsor VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, ID_Photographe INT NOT NULL, SignaturePhotographe VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_contrat_photographe (ID_Photographe), INDEX fk_contrat_sponsor (ID_Sponsor), PRIMARY KEY(ID_Contrat)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, nom_event VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date_et_heure DATETIME NOT NULL, lieu VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, type_event VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE film (ID_film INT AUTO_INCREMENT NOT NULL, Titre VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, DateRealisation VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Genre VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Resume TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Duree VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Prix DOUBLE PRECISION NOT NULL, ID_producteur VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Acteur TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, FilmImage VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_film_producteur (ID_producteur), PRIMARY KEY(ID_film)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE galerie (ID_Galerie INT AUTO_INCREMENT NOT NULL, couleurHtml VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Nom VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, ID_Photographe INT NOT NULL, INDEX fk_galerie_photographe (ID_Photographe), PRIMARY KEY(ID_Galerie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE hotel (ID_Hotel INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, adresse VARCHAR(254) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, nbre_chambres INT NOT NULL, telephone INT NOT NULL, description TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(ID_Hotel)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE location_vehicule (matricule VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, ID_location INT AUTO_INCREMENT NOT NULL, dateReservation DATE NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, TarifTotal DOUBLE PRECISION NOT NULL, QrPath VARCHAR(254) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, id_User INT NOT NULL, INDEX matricule (matricule), INDEX id_User (id_User), PRIMARY KEY(ID_location)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, headers LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, queue_name VARCHAR(190) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE photographie (ID_Photographie INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PhotographiePath VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, ID_Galerie INT NOT NULL, INDEX fk_photo_galerie (ID_Galerie), PRIMARY KEY(ID_Photographie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE planningfilmsalle (ID_Planning INT AUTO_INCREMENT NOT NULL, ID_film INT NOT NULL, ID_salle INT NOT NULL, Datediffusion DATE NOT NULL, Heurediffusion VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_ID_film1 (ID_film), INDEX fk_ID_salle1 (ID_salle), PRIMARY KEY(ID_Planning)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE prix (ID_Prix INT AUTO_INCREMENT NOT NULL, ID_Film INT NOT NULL, TypePrix VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_prix_film (ID_Film), PRIMARY KEY(ID_Prix)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservation (id_res INT AUTO_INCREMENT NOT NULL, id_plan INT NOT NULL, id_user INT NOT NULL, INDEX fk_id_plan (id_plan), PRIMARY KEY(id_res)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservation_hotel (id_user INT NOT NULL, id_hotel INT NOT NULL, ID_ReservationH INT AUTO_INCREMENT NOT NULL, dateReservation DATE NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, tarifTotale DOUBLE PRECISION NOT NULL, QrPath VARCHAR(254) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, INDEX reservation_hotel_ibfk_1 (id_hotel), INDEX reservation_hotel_ibfk_2 (id_user), PRIMARY KEY(ID_ReservationH)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE salle (ID_salle INT AUTO_INCREMENT NOT NULL, NomSalle VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Adresse VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Capacite INT NOT NULL, NumTel_salle VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Email_Salle VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Temps_Ouverture VARCHAR(6) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Temps_Fermuture VARCHAR(6) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Avis DOUBLE PRECISION NOT NULL, PRIMARY KEY(ID_salle)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vehicule (matricule VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, type VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, marque VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, couleur VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(matricule)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vote (Valeur INT NOT NULL, ID_User INT NOT NULL, ID_Film INT NOT NULL, Commentaire VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Date_Vote DATE NOT NULL, Vote_Film INT NOT NULL, PRIMARY KEY(ID_User, ID_Film)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE contratsponsoring ADD CONSTRAINT fk_contrat_photographe FOREIGN KEY (ID_Photographe) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contratsponsoring ADD CONSTRAINT fk_contrat_sponsor FOREIGN KEY (ID_Sponsor) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE galerie ADD CONSTRAINT fk_galerie_photographe FOREIGN KEY (ID_Photographe) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_vehicule ADD CONSTRAINT location_vehicule_ibfk_1 FOREIGN KEY (id_User) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_vehicule ADD CONSTRAINT location_vehicule_ibfk_2 FOREIGN KEY (matricule) REFERENCES vehicule (matricule) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photographie ADD CONSTRAINT fk_photo_galerie FOREIGN KEY (ID_Galerie) REFERENCES galerie (ID_Galerie) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planningfilmsalle ADD CONSTRAINT fk_ID_film1 FOREIGN KEY (ID_film) REFERENCES film (ID_film) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planningfilmsalle ADD CONSTRAINT fk_ID_salle1 FOREIGN KEY (ID_salle) REFERENCES salle (ID_salle) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prix ADD CONSTRAINT fk_prix_film FOREIGN KEY (ID_Film) REFERENCES film (ID_film) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT fk_id_plan FOREIGN KEY (id_plan) REFERENCES planningfilmsalle (ID_Planning)');
        $this->addSql('ALTER TABLE reservation_hotel ADD CONSTRAINT reservation_hotel_ibfk_2 FOREIGN KEY (id_user) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_hotel ADD CONSTRAINT reservation_hotel_ibfk_1 FOREIGN KEY (id_hotel) REFERENCES hotel (ID_Hotel) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE logs MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON logs');
        $this->addSql('ALTER TABLE logs ADD ID_User INT DEFAULT NULL, ADD Date DATE NOT NULL, ADD Action VARCHAR(254) NOT NULL, CHANGE id ID_Logs INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE INDEX ID_User ON logs (ID_User)');
        $this->addSql('ALTER TABLE logs ADD PRIMARY KEY (ID_Logs)');
        $this->addSql('ALTER TABLE user ADD Role VARCHAR(30) NOT NULL, DROP roles, CHANGE email Email VARCHAR(50) NOT NULL, CHANGE username username VARCHAR(30) NOT NULL, CHANGE password password VARCHAR(100) NOT NULL, CHANGE photob64 PhotoB64 TEXT NOT NULL, CHANGE genre Genre VARCHAR(30) NOT NULL, CHANGE numtel NumTel INT DEFAULT NULL');
    }
}
