/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  16/05/2020 15:30:11                      */
/*==============================================================*/
CREATE DATABASE app_vols;
USE app_vols;

drop table if exists Client;

drop table if exists Reservation;

drop table if exists Vols;

/*==============================================================*/
/* Table : Client                                               */
/*==============================================================*/
create table Client
(
   id_client            int not null,
   nom                  varchar(254),
   prenom               varchar(254),
   phone                int,
   email                varchar(254),
   num_passport         int,
   primary key (id_client)
);

/*==============================================================*/
/* Table : Reservation                                          */
/*==============================================================*/
create table Reservation
(
   id_reservation       int not null,
   id_client            int not null,
   id_vol               int not null,
   date_reservation     int,
   primary key (id_reservation)
);

/*==============================================================*/
/* Table : Vols                                                 */
/*==============================================================*/
create table Vols
(
   id_vol               int not null,
   nom_vol              varchar(254),
   departure            varchar(254),
   arrival              varchar(254),
   d_depart             datetime,
   d_arrival            datetime,
   prix                 int,
   place                int,
   primary key (id_vol)
);

alter table Reservation add constraint FK_Association_1 foreign key (id_vol)
      references Vols (id_vol) on delete restrict on update restrict;

alter table Reservation add constraint FK_Association_2 foreign key (id_client)
      references Client (id_client) on delete restrict on update restrict;

