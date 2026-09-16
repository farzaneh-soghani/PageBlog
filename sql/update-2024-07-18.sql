alter table Artikel
    add BilderID int null;

alter table Artikel
    add Text text null;

alter table Artikel
    add AutorID int null;

alter table Artikel
    add Datum date null;

alter table Artikel
    add Carousel tinyint(1) null;

create table Autoren
(
    AutorID int auto_increment
        primary key,
    Name    varchar(200) null
);

create table Bilder
(
    BilderID int auto_increment
        primary key,
    Pfad     varchar(200) null,
    AltText  varchar(200) null
);

alter table Artikel
    add constraint Artikel_Bilder_BilderID_fk
        foreign key (BilderID) references Bilder (BilderID);

create table Kategorien
(
    KategorieID int auto_increment
        primary key,
    Bezeichnung varchar(200) null
);

create table Kategorie_Artikel
(
    KategorieID int not null,
    ArtikelID   int not null,
    primary key (KategorieID, ArtikelID),
    constraint Kategorie_Artikel_Artikel_ArtikelID_fk
        foreign key (ArtikelID) references Artikel (ArtikelID),
    constraint Kategorie_Artikel_Kategorien_KategorieID_fk
        foreign key (KategorieID) references Kategorien (KategorieID)
);
