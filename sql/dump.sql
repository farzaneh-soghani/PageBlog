create table Artikel
(
    ArtikelID int auto_increment
        primary key,
    Titel     varchar(200) null
);

create table Kommentierende
(
    KommentierenderID int auto_increment
        primary key,
    Name              varchar(120) not null,
    Email             varchar(120) null,
    Homepage          varchar(120) null
);

create table Kommentare
(
    KommentarID       int auto_increment
        primary key,
    KommentierenderID int          null,
    Betreff           varchar(200) null,
    Kommentar         text         null,
    Datum             date         null,
    constraint Kommentare_Kommentierende_KommentierenderID_fk
        foreign key (KommentierenderID) references Kommentierende (KommentierenderID)
);

create table Kommentare_Artikel
(
    KommentarID int not null,
    ArtikelID   int not null,
    primary key (ArtikelID, KommentarID),
    constraint Kommentare_Artikel_Artikel_ArtikelID_fk
        foreign key (ArtikelID) references Artikel (ArtikelID),
    constraint Kommentare_Artikel_Kommentare_KommentarID_fk
        foreign key (KommentarID) references Kommentare (KommentarID)
);


