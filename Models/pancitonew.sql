/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     01/07/2019 14:25:40                          */
/*==============================================================*/


drop table if exists CAJERO;

drop table if exists CLIENTE;

drop table if exists DETALLE;

drop table if exists FACTURA;

drop table if exists INGREDIENTES;

drop table if exists MATERIAPRIMA;

drop table if exists MEDIDA;

drop table if exists PRODUCTO;

drop table if exists PROVEEDORES;

drop table if exists RECETA;

/*==============================================================*/
/* Table: CAJERO                                                */
/*==============================================================*/
create table CAJERO
(
   VNDCEDULA            varchar(10) not null,
   VNDNOMBRE            varchar(50) not null,
   VNDAPELLIDO          varchar(50) not null,
   VNDUSUARIO           varchar(50) not null,
   VNDCONTRA            varchar(500) not null,
   VNDCORREO            varchar(100) not null,
   VNDESTADO            int,
   primary key (VNDCEDULA)
);

/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
create table CLIENTE
(
   CLIECEDULA           varchar(10) not null,
   CLIENOMBRE           varchar(50) not null,
   CLIEAPELLIDO         varchar(50) not null,
   CLIENACIMIENTO       varchar(50),
   CLIECORREO           varchar(100) not null,
   CLIEDIRECCION        varchar(500) not null,
   CLIECIUDAD           varchar(60),
   CLIEPROVINCIA        varchar(60),
   CLIETELEFONO         varchar(10),
   CLIEESTADO           int,
   primary key (CLIECEDULA)
);

/*==============================================================*/
/* Table: DETALLE                                               */
/*==============================================================*/
create table DETALLE
(
   DETID                int not null,
   PRODID               int,
   FACTNUM              int,
   DETCANTIDAD          int not null,
   DETPRECIOVENTA       decimal not null,
   primary key (DETID)
);

/*==============================================================*/
/* Table: FACTURA                                               */
/*==============================================================*/
create table FACTURA
(
   FACTNUM              int not null,
   CLIECEDULA           varchar(10),
   VNDCEDULA            varchar(10),
   FACTFECHA            date not null,
   FACTTOTAL            decimal,
   FACTESTADO           int,
   primary key (FACTNUM)
);

/*==============================================================*/
/* Table: INGREDIENTES                                          */
/*==============================================================*/
create table INGREDIENTES
(
   INGID                int not null,
   MPID                 int,
   RECID                int,
   INGCANTIDAD          decimal not null,
   INGCOSTO             int not null,
   INGESTADO            int,
   primary key (INGID)
);

/*==============================================================*/
/* Table: MATERIAPRIMA                                          */
/*==============================================================*/
create table MATERIAPRIMA
(
   MPID                 int not null,
   MEDID                int,
   PROVRUC              char(10),
   MPDECIPCION          varchar(100) not null,
   MPCOSTO              decimal not null,
   MPCANTIDAD           decimal not null,
   MPESTADO             int,
   primary key (MPID)
);

/*==============================================================*/
/* Table: MEDIDA                                                */
/*==============================================================*/
create table MEDIDA
(
   MEDID                int not null,
   MEDTIPO              varchar(10) not null,
   primary key (MEDID)
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO
(
   PRODID               int not null,
   RECID                int,
   PRODFECHA            date not null,
   PRODCANTIDAD         int not null,
   PRODESTADO           int,
   primary key (PRODID)
);

/*==============================================================*/
/* Table: PROVEEDORES                                           */
/*==============================================================*/
create table PROVEEDORES
(
   PROVRUC              char(10) not null,
   PROVNOMBRE           char(10) not null,
   PROVCORREO           char(10) not null,
   PROVDIRECCION        char(10) not null,
   PROVESTADO           char(10),
   primary key (PROVRUC)
);

/*==============================================================*/
/* Table: RECETA                                                */
/*==============================================================*/
create table RECETA
(
   RECID                int not null,
   RECNOMBRE            varchar(100) not null,
   RECCOSTO             decimal not null,
   RECESTADO            int,
   RECPRECIO            decimal,
   primary key (RECID)
);

alter table DETALLE add constraint FK_RELATIONSHIP_4 foreign key (PRODID)
      references PRODUCTO (PRODID) on delete restrict on update restrict;

alter table DETALLE add constraint FK_RELATIONSHIP_5 foreign key (FACTNUM)
      references FACTURA (FACTNUM) on delete restrict on update restrict;

alter table FACTURA add constraint FK_RELATIONSHIP_6 foreign key (CLIECEDULA)
      references CLIENTE (CLIECEDULA) on delete restrict on update restrict;

alter table FACTURA add constraint FK_RELATIONSHIP_7 foreign key (VNDCEDULA)
      references CAJERO (VNDCEDULA) on delete restrict on update restrict;

alter table INGREDIENTES add constraint FK_RELATIONSHIP_1 foreign key (MPID)
      references MATERIAPRIMA (MPID) on delete restrict on update restrict;

alter table INGREDIENTES add constraint FK_RELATIONSHIP_2 foreign key (RECID)
      references RECETA (RECID) on delete restrict on update restrict;

alter table MATERIAPRIMA add constraint FK_RELATIONSHIP_8 foreign key (MEDID)
      references MEDIDA (MEDID) on delete restrict on update restrict;

alter table MATERIAPRIMA add constraint FK_RELATIONSHIP_9 foreign key (PROVRUC)
      references PROVEEDORES (PROVRUC) on delete restrict on update restrict;

alter table PRODUCTO add constraint FK_RELATIONSHIP_3 foreign key (RECID)
      references RECETA (RECID) on delete restrict on update restrict;

