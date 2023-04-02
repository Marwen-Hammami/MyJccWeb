<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230402195939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire CHANGE ID_Auteur ID_Auteur INT DEFAULT NULL, CHANGE id_blog ID_blog INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC832471EB FOREIGN KEY (ID_blog) REFERENCES blog (id_blog)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC5F46E16E FOREIGN KEY (ID_Auteur) REFERENCES user (ID_User)');
        $this->addSql('CREATE INDEX IDX_67F068BC832471EB ON commentaire (ID_blog)');
        $this->addSql('CREATE INDEX IDX_67F068BC5F46E16E ON commentaire (ID_Auteur)');
        $this->addSql('ALTER TABLE contratsponsoring DROP FOREIGN KEY fk_contrat_photographe');
        $this->addSql('ALTER TABLE contratsponsoring DROP FOREIGN KEY fk_contrat_sponsor');
        $this->addSql('ALTER TABLE contratsponsoring DROP FOREIGN KEY fk_contrat_photographe');
        $this->addSql('ALTER TABLE contratsponsoring DROP FOREIGN KEY fk_contrat_sponsor');
        $this->addSql('ALTER TABLE contratsponsoring CHANGE TermesPDF termespdf VARCHAR(65535) NOT NULL, CHANGE ID_Sponsor ID_Sponsor INT DEFAULT NULL, CHANGE ID_Photographe ID_Photographe INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contratsponsoring ADD CONSTRAINT FK_22C273E35D00D84B FOREIGN KEY (ID_Sponsor) REFERENCES user (ID_User)');
        $this->addSql('ALTER TABLE contratsponsoring ADD CONSTRAINT FK_22C273E3B04B3B86 FOREIGN KEY (ID_Photographe) REFERENCES user (ID_User)');
        $this->addSql('DROP INDEX fk_contrat_sponsor ON contratsponsoring');
        $this->addSql('CREATE INDEX IDX_22C273E35D00D84B ON contratsponsoring (ID_Sponsor)');
        $this->addSql('DROP INDEX fk_contrat_photographe ON contratsponsoring');
        $this->addSql('CREATE INDEX IDX_22C273E3B04B3B86 ON contratsponsoring (ID_Photographe)');
        $this->addSql('ALTER TABLE contratsponsoring ADD CONSTRAINT fk_contrat_photographe FOREIGN KEY (ID_Photographe) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contratsponsoring ADD CONSTRAINT fk_contrat_sponsor FOREIGN KEY (ID_Sponsor) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX fk_film_producteur ON film');
        $this->addSql('ALTER TABLE film CHANGE Resume resume VARCHAR(65535) NOT NULL, CHANGE Acteur acteur VARCHAR(65535) NOT NULL');
        $this->addSql('ALTER TABLE galerie DROP FOREIGN KEY fk_galerie_photographe');
        $this->addSql('DROP INDEX fk_galerie_photographe ON galerie');
        $this->addSql('ALTER TABLE galerie CHANGE Description description VARCHAR(65535) NOT NULL, CHANGE ID_Photographe id_photographe INT DEFAULT NULL');
        $this->addSql('ALTER TABLE galerie ADD CONSTRAINT FK_9E7D159048CD877C FOREIGN KEY (id_photographe) REFERENCES user (ID_User)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9E7D159048CD877C ON galerie (id_photographe)');
        $this->addSql('ALTER TABLE hotel CHANGE description description VARCHAR(65535) NOT NULL');
        $this->addSql('ALTER TABLE location_vehicule DROP FOREIGN KEY location_vehicule_ibfk_1');
        $this->addSql('ALTER TABLE location_vehicule DROP FOREIGN KEY location_vehicule_ibfk_2');
        $this->addSql('ALTER TABLE location_vehicule DROP FOREIGN KEY location_vehicule_ibfk_1');
        $this->addSql('ALTER TABLE location_vehicule DROP FOREIGN KEY location_vehicule_ibfk_2');
        $this->addSql('ALTER TABLE location_vehicule CHANGE matricule matricule VARCHAR(20) DEFAULT NULL, CHANGE id_User ID_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE location_vehicule ADD CONSTRAINT FK_F87ADDFF12B2DC9C FOREIGN KEY (matricule) REFERENCES vehicule (matricule)');
        $this->addSql('ALTER TABLE location_vehicule ADD CONSTRAINT FK_F87ADDFFCEA2F6E1 FOREIGN KEY (ID_user) REFERENCES user (ID_User)');
        $this->addSql('DROP INDEX matricule ON location_vehicule');
        $this->addSql('CREATE INDEX IDX_F87ADDFF12B2DC9C ON location_vehicule (matricule)');
        $this->addSql('DROP INDEX id_user ON location_vehicule');
        $this->addSql('CREATE INDEX IDX_F87ADDFFCEA2F6E1 ON location_vehicule (ID_user)');
        $this->addSql('ALTER TABLE location_vehicule ADD CONSTRAINT location_vehicule_ibfk_1 FOREIGN KEY (id_User) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_vehicule ADD CONSTRAINT location_vehicule_ibfk_2 FOREIGN KEY (matricule) REFERENCES vehicule (matricule) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX ID_User ON logs');
        $this->addSql('ALTER TABLE logs CHANGE ID_User id_user INT NOT NULL');
        $this->addSql('ALTER TABLE photographie DROP FOREIGN KEY fk_photo_galerie');
        $this->addSql('ALTER TABLE photographie DROP FOREIGN KEY fk_photo_galerie');
        $this->addSql('ALTER TABLE photographie CHANGE Description description VARCHAR(65535) NOT NULL, CHANGE ID_Galerie ID_galerie INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photographie ADD CONSTRAINT FK_3955B0B48D4C3D93 FOREIGN KEY (ID_galerie) REFERENCES galerie (ID_Galerie)');
        $this->addSql('DROP INDEX fk_photo_galerie ON photographie');
        $this->addSql('CREATE INDEX IDX_3955B0B48D4C3D93 ON photographie (ID_galerie)');
        $this->addSql('ALTER TABLE photographie ADD CONSTRAINT fk_photo_galerie FOREIGN KEY (ID_Galerie) REFERENCES galerie (ID_Galerie) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planningfilmsalle DROP FOREIGN KEY fk_ID_film1');
        $this->addSql('ALTER TABLE planningfilmsalle DROP FOREIGN KEY fk_ID_salle1');
        $this->addSql('ALTER TABLE planningfilmsalle DROP FOREIGN KEY fk_ID_film1');
        $this->addSql('ALTER TABLE planningfilmsalle DROP FOREIGN KEY fk_ID_salle1');
        $this->addSql('ALTER TABLE planningfilmsalle CHANGE ID_film ID_film INT DEFAULT NULL, CHANGE ID_salle ID_Salle INT DEFAULT NULL');
        $this->addSql('ALTER TABLE planningfilmsalle ADD CONSTRAINT FK_6FD8F78957184BA2 FOREIGN KEY (ID_Salle) REFERENCES salle (ID_salle)');
        $this->addSql('ALTER TABLE planningfilmsalle ADD CONSTRAINT FK_6FD8F789C1759E8A FOREIGN KEY (ID_film) REFERENCES film (ID_Film)');
        $this->addSql('DROP INDEX fk_id_salle1 ON planningfilmsalle');
        $this->addSql('CREATE INDEX IDX_6FD8F78957184BA2 ON planningfilmsalle (ID_Salle)');
        $this->addSql('DROP INDEX fk_id_film1 ON planningfilmsalle');
        $this->addSql('CREATE INDEX IDX_6FD8F789C1759E8A ON planningfilmsalle (ID_film)');
        $this->addSql('ALTER TABLE planningfilmsalle ADD CONSTRAINT fk_ID_film1 FOREIGN KEY (ID_film) REFERENCES film (ID_film) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planningfilmsalle ADD CONSTRAINT fk_ID_salle1 FOREIGN KEY (ID_salle) REFERENCES salle (ID_salle) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prix DROP FOREIGN KEY fk_prix_film');
        $this->addSql('ALTER TABLE prix DROP FOREIGN KEY fk_prix_film');
        $this->addSql('ALTER TABLE prix CHANGE ID_Film ID_film INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prix ADD CONSTRAINT FK_F7EFEA5EC1759E8A FOREIGN KEY (ID_film) REFERENCES film (ID_Film)');
        $this->addSql('DROP INDEX fk_prix_film ON prix');
        $this->addSql('CREATE INDEX IDX_F7EFEA5EC1759E8A ON prix (ID_film)');
        $this->addSql('ALTER TABLE prix ADD CONSTRAINT fk_prix_film FOREIGN KEY (ID_Film) REFERENCES film (ID_film) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY fk_id_plan');
        $this->addSql('DROP INDEX fk_id_plan ON reservation');
        $this->addSql('ALTER TABLE reservation ADD ID_Planningfilmsalle INT DEFAULT NULL, DROP id_plan');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849558C348B7B FOREIGN KEY (ID_Planningfilmsalle) REFERENCES planningfilmsalle (ID_Planning)');
        $this->addSql('CREATE INDEX IDX_42C849558C348B7B ON reservation (ID_Planningfilmsalle)');
        $this->addSql('ALTER TABLE reservation_hotel DROP FOREIGN KEY reservation_hotel_ibfk_1');
        $this->addSql('ALTER TABLE reservation_hotel DROP FOREIGN KEY reservation_hotel_ibfk_2');
        $this->addSql('ALTER TABLE reservation_hotel DROP FOREIGN KEY reservation_hotel_ibfk_1');
        $this->addSql('ALTER TABLE reservation_hotel DROP FOREIGN KEY reservation_hotel_ibfk_2');
        $this->addSql('ALTER TABLE reservation_hotel CHANGE id_user ID_user INT DEFAULT NULL, CHANGE id_hotel ID_hotel INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation_hotel ADD CONSTRAINT FK_402C8E7EDB1D4423 FOREIGN KEY (ID_hotel) REFERENCES hotel (ID_Hotel)');
        $this->addSql('ALTER TABLE reservation_hotel ADD CONSTRAINT FK_402C8E7ECEA2F6E1 FOREIGN KEY (ID_user) REFERENCES user (ID_User)');
        $this->addSql('DROP INDEX reservation_hotel_ibfk_1 ON reservation_hotel');
        $this->addSql('CREATE INDEX IDX_402C8E7EDB1D4423 ON reservation_hotel (ID_hotel)');
        $this->addSql('DROP INDEX reservation_hotel_ibfk_2 ON reservation_hotel');
        $this->addSql('CREATE INDEX IDX_402C8E7ECEA2F6E1 ON reservation_hotel (ID_user)');
        $this->addSql('ALTER TABLE reservation_hotel ADD CONSTRAINT reservation_hotel_ibfk_1 FOREIGN KEY (id_hotel) REFERENCES hotel (ID_Hotel) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_hotel ADD CONSTRAINT reservation_hotel_ibfk_2 FOREIGN KEY (id_user) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE PhotoB64 photob64 VARCHAR(65535) NOT NULL, CHANGE NumTel numtel INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON vote');
        $this->addSql('ALTER TABLE vote ADD ID_UserVote INT NOT NULL, ADD ID_FilmVote INT NOT NULL, DROP ID_User, DROP ID_Film');
        $this->addSql('ALTER TABLE vote ADD PRIMARY KEY (ID_UserVote, ID_FilmVote)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC832471EB');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC5F46E16E');
        $this->addSql('DROP INDEX IDX_67F068BC832471EB ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BC5F46E16E ON commentaire');
        $this->addSql('ALTER TABLE commentaire CHANGE ID_blog id_blog INT NOT NULL, CHANGE ID_Auteur ID_Auteur INT NOT NULL');
        $this->addSql('ALTER TABLE contratsponsoring DROP FOREIGN KEY FK_22C273E35D00D84B');
        $this->addSql('ALTER TABLE contratsponsoring DROP FOREIGN KEY FK_22C273E3B04B3B86');
        $this->addSql('ALTER TABLE contratsponsoring DROP FOREIGN KEY FK_22C273E35D00D84B');
        $this->addSql('ALTER TABLE contratsponsoring DROP FOREIGN KEY FK_22C273E3B04B3B86');
        $this->addSql('ALTER TABLE contratsponsoring CHANGE termespdf TermesPDF TEXT NOT NULL, CHANGE ID_Sponsor ID_Sponsor INT NOT NULL, CHANGE ID_Photographe ID_Photographe INT NOT NULL');
        $this->addSql('ALTER TABLE contratsponsoring ADD CONSTRAINT fk_contrat_photographe FOREIGN KEY (ID_Photographe) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contratsponsoring ADD CONSTRAINT fk_contrat_sponsor FOREIGN KEY (ID_Sponsor) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_22c273e3b04b3b86 ON contratsponsoring');
        $this->addSql('CREATE INDEX fk_contrat_photographe ON contratsponsoring (ID_Photographe)');
        $this->addSql('DROP INDEX idx_22c273e35d00d84b ON contratsponsoring');
        $this->addSql('CREATE INDEX fk_contrat_sponsor ON contratsponsoring (ID_Sponsor)');
        $this->addSql('ALTER TABLE contratsponsoring ADD CONSTRAINT FK_22C273E35D00D84B FOREIGN KEY (ID_Sponsor) REFERENCES user (ID_User)');
        $this->addSql('ALTER TABLE contratsponsoring ADD CONSTRAINT FK_22C273E3B04B3B86 FOREIGN KEY (ID_Photographe) REFERENCES user (ID_User)');
        $this->addSql('ALTER TABLE film CHANGE resume Resume TEXT NOT NULL, CHANGE acteur Acteur TEXT NOT NULL');
        $this->addSql('CREATE INDEX fk_film_producteur ON film (ID_producteur)');
        $this->addSql('ALTER TABLE galerie DROP FOREIGN KEY FK_9E7D159048CD877C');
        $this->addSql('DROP INDEX UNIQ_9E7D159048CD877C ON galerie');
        $this->addSql('ALTER TABLE galerie CHANGE id_photographe ID_Photographe INT NOT NULL, CHANGE description Description TEXT NOT NULL');
        $this->addSql('ALTER TABLE galerie ADD CONSTRAINT fk_galerie_photographe FOREIGN KEY (ID_Photographe) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX fk_galerie_photographe ON galerie (ID_Photographe)');
        $this->addSql('ALTER TABLE hotel CHANGE description description TEXT NOT NULL');
        $this->addSql('ALTER TABLE location_vehicule DROP FOREIGN KEY FK_F87ADDFF12B2DC9C');
        $this->addSql('ALTER TABLE location_vehicule DROP FOREIGN KEY FK_F87ADDFFCEA2F6E1');
        $this->addSql('ALTER TABLE location_vehicule DROP FOREIGN KEY FK_F87ADDFF12B2DC9C');
        $this->addSql('ALTER TABLE location_vehicule DROP FOREIGN KEY FK_F87ADDFFCEA2F6E1');
        $this->addSql('ALTER TABLE location_vehicule CHANGE matricule matricule VARCHAR(20) NOT NULL, CHANGE ID_user id_User INT NOT NULL');
        $this->addSql('ALTER TABLE location_vehicule ADD CONSTRAINT location_vehicule_ibfk_1 FOREIGN KEY (id_User) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_vehicule ADD CONSTRAINT location_vehicule_ibfk_2 FOREIGN KEY (matricule) REFERENCES vehicule (matricule) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_f87addffcea2f6e1 ON location_vehicule');
        $this->addSql('CREATE INDEX id_User ON location_vehicule (id_User)');
        $this->addSql('DROP INDEX idx_f87addff12b2dc9c ON location_vehicule');
        $this->addSql('CREATE INDEX matricule ON location_vehicule (matricule)');
        $this->addSql('ALTER TABLE location_vehicule ADD CONSTRAINT FK_F87ADDFF12B2DC9C FOREIGN KEY (matricule) REFERENCES vehicule (matricule)');
        $this->addSql('ALTER TABLE location_vehicule ADD CONSTRAINT FK_F87ADDFFCEA2F6E1 FOREIGN KEY (ID_user) REFERENCES user (ID_User)');
        $this->addSql('ALTER TABLE logs CHANGE id_user ID_User INT DEFAULT NULL');
        $this->addSql('CREATE INDEX ID_User ON logs (ID_User)');
        $this->addSql('ALTER TABLE photographie DROP FOREIGN KEY FK_3955B0B48D4C3D93');
        $this->addSql('ALTER TABLE photographie DROP FOREIGN KEY FK_3955B0B48D4C3D93');
        $this->addSql('ALTER TABLE photographie CHANGE description Description TEXT NOT NULL, CHANGE ID_galerie ID_Galerie INT NOT NULL');
        $this->addSql('ALTER TABLE photographie ADD CONSTRAINT fk_photo_galerie FOREIGN KEY (ID_Galerie) REFERENCES galerie (ID_Galerie) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_3955b0b48d4c3d93 ON photographie');
        $this->addSql('CREATE INDEX fk_photo_galerie ON photographie (ID_Galerie)');
        $this->addSql('ALTER TABLE photographie ADD CONSTRAINT FK_3955B0B48D4C3D93 FOREIGN KEY (ID_galerie) REFERENCES galerie (ID_Galerie)');
        $this->addSql('ALTER TABLE planningfilmsalle DROP FOREIGN KEY FK_6FD8F78957184BA2');
        $this->addSql('ALTER TABLE planningfilmsalle DROP FOREIGN KEY FK_6FD8F789C1759E8A');
        $this->addSql('ALTER TABLE planningfilmsalle DROP FOREIGN KEY FK_6FD8F78957184BA2');
        $this->addSql('ALTER TABLE planningfilmsalle DROP FOREIGN KEY FK_6FD8F789C1759E8A');
        $this->addSql('ALTER TABLE planningfilmsalle CHANGE ID_Salle ID_salle INT NOT NULL, CHANGE ID_film ID_film INT NOT NULL');
        $this->addSql('ALTER TABLE planningfilmsalle ADD CONSTRAINT fk_ID_film1 FOREIGN KEY (ID_film) REFERENCES film (ID_film) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planningfilmsalle ADD CONSTRAINT fk_ID_salle1 FOREIGN KEY (ID_salle) REFERENCES salle (ID_salle) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_6fd8f789c1759e8a ON planningfilmsalle');
        $this->addSql('CREATE INDEX fk_ID_film1 ON planningfilmsalle (ID_film)');
        $this->addSql('DROP INDEX idx_6fd8f78957184ba2 ON planningfilmsalle');
        $this->addSql('CREATE INDEX fk_ID_salle1 ON planningfilmsalle (ID_salle)');
        $this->addSql('ALTER TABLE planningfilmsalle ADD CONSTRAINT FK_6FD8F78957184BA2 FOREIGN KEY (ID_Salle) REFERENCES salle (ID_salle)');
        $this->addSql('ALTER TABLE planningfilmsalle ADD CONSTRAINT FK_6FD8F789C1759E8A FOREIGN KEY (ID_film) REFERENCES film (ID_Film)');
        $this->addSql('ALTER TABLE prix DROP FOREIGN KEY FK_F7EFEA5EC1759E8A');
        $this->addSql('ALTER TABLE prix DROP FOREIGN KEY FK_F7EFEA5EC1759E8A');
        $this->addSql('ALTER TABLE prix CHANGE ID_film ID_Film INT NOT NULL');
        $this->addSql('ALTER TABLE prix ADD CONSTRAINT fk_prix_film FOREIGN KEY (ID_Film) REFERENCES film (ID_film) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_f7efea5ec1759e8a ON prix');
        $this->addSql('CREATE INDEX fk_prix_film ON prix (ID_Film)');
        $this->addSql('ALTER TABLE prix ADD CONSTRAINT FK_F7EFEA5EC1759E8A FOREIGN KEY (ID_film) REFERENCES film (ID_Film)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849558C348B7B');
        $this->addSql('DROP INDEX IDX_42C849558C348B7B ON reservation');
        $this->addSql('ALTER TABLE reservation ADD id_plan INT NOT NULL, DROP ID_Planningfilmsalle');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT fk_id_plan FOREIGN KEY (id_plan) REFERENCES planningfilmsalle (ID_Planning)');
        $this->addSql('CREATE INDEX fk_id_plan ON reservation (id_plan)');
        $this->addSql('ALTER TABLE reservation_hotel DROP FOREIGN KEY FK_402C8E7EDB1D4423');
        $this->addSql('ALTER TABLE reservation_hotel DROP FOREIGN KEY FK_402C8E7ECEA2F6E1');
        $this->addSql('ALTER TABLE reservation_hotel DROP FOREIGN KEY FK_402C8E7EDB1D4423');
        $this->addSql('ALTER TABLE reservation_hotel DROP FOREIGN KEY FK_402C8E7ECEA2F6E1');
        $this->addSql('ALTER TABLE reservation_hotel CHANGE ID_hotel id_hotel INT NOT NULL, CHANGE ID_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_hotel ADD CONSTRAINT reservation_hotel_ibfk_1 FOREIGN KEY (id_hotel) REFERENCES hotel (ID_Hotel) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_hotel ADD CONSTRAINT reservation_hotel_ibfk_2 FOREIGN KEY (id_user) REFERENCES user (ID_User) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_402c8e7edb1d4423 ON reservation_hotel');
        $this->addSql('CREATE INDEX reservation_hotel_ibfk_1 ON reservation_hotel (id_hotel)');
        $this->addSql('DROP INDEX idx_402c8e7ecea2f6e1 ON reservation_hotel');
        $this->addSql('CREATE INDEX reservation_hotel_ibfk_2 ON reservation_hotel (id_user)');
        $this->addSql('ALTER TABLE reservation_hotel ADD CONSTRAINT FK_402C8E7EDB1D4423 FOREIGN KEY (ID_hotel) REFERENCES hotel (ID_Hotel)');
        $this->addSql('ALTER TABLE reservation_hotel ADD CONSTRAINT FK_402C8E7ECEA2F6E1 FOREIGN KEY (ID_user) REFERENCES user (ID_User)');
        $this->addSql('ALTER TABLE user CHANGE photob64 PhotoB64 TEXT NOT NULL, CHANGE numtel NumTel INT DEFAULT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON vote');
        $this->addSql('ALTER TABLE vote ADD ID_User INT NOT NULL, ADD ID_Film INT NOT NULL, DROP ID_UserVote, DROP ID_FilmVote');
        $this->addSql('ALTER TABLE vote ADD PRIMARY KEY (ID_User, ID_Film)');
    }
}
