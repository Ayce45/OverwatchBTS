
ALTER TABLE RAPLA_RESOURCE DROP PRIMARY KEY CASCADE;
DROP TABLE RAPLA_RESOURCE CASCADE CONSTRAINTS;

CREATE TABLE RAPLA_RESOURCE
(
  ID               INTEGER                     NOT NULL,
  TYPE_KEY         VARCHAR2(100 BYTE)          NOT NULL,
  IGNORE_CONFLICTS INTEGER                     NOT NULL,
  OWNER_ID         INTEGER                     ,
  CREATION_TIME    TIMESTAMP(6)                 ,
  LAST_CHANGED     TIMESTAMP(6)                 ,
  LAST_CHANGED_BY  INTEGER
) ;



DROP TABLE ALLOCATION CASCADE CONSTRAINTS;

CREATE TABLE ALLOCATION
(
  APPOINTMENT_ID  INTEGER                       NOT NULL,
  RESOURCE_ID     INTEGER                       NOT NULL,
  OPTIONAL       INTEGER                       
) ;


ALTER TABLE APPOINTMENT DROP PRIMARY KEY CASCADE;
DROP TABLE APPOINTMENT CASCADE CONSTRAINTS;

CREATE TABLE APPOINTMENT
(
  ID                   INTEGER                  NOT NULL,
  EVENT_ID             INTEGER                  NOT NULL,
  APPOINTMENT_START    TIMESTAMP(6)             NOT NULL,
  APPOINTMENT_END      TIMESTAMP(6)             NOT NULL,
  REPETITION_TYPE      VARCHAR2(255 BYTE),
  REPETITION_NUMBER    INTEGER,
  REPETITION_END       TIMESTAMP(6),
  REPETITION_INTERVAL  INTEGER
) ;


DROP TABLE APPOINTMENT_EXCEPTION CASCADE CONSTRAINTS;

CREATE TABLE APPOINTMENT_EXCEPTION
(
  APPOINTMENT_ID  INTEGER                       NOT NULL,
  EXCEPTION_DATE  TIMESTAMP(6)                  NOT NULL
) ;


ALTER TABLE CATEGORY DROP PRIMARY KEY CASCADE;
DROP TABLE CATEGORY CASCADE CONSTRAINTS;

CREATE TABLE CATEGORY
(
  ID            INTEGER                         NOT NULL,
  PARENT_ID     INTEGER,
  CATEGORY_KEY  VARCHAR2(100 BYTE)               NOT NULL,
  LABEL         VARCHAR2(255 BYTE),
  DEFINITION    CLOB,
  PARENT_ORDER  INTEGER 
) ;


ALTER TABLE DYNAMIC_TYPE DROP PRIMARY KEY CASCADE;
DROP TABLE DYNAMIC_TYPE CASCADE CONSTRAINTS;

CREATE TABLE DYNAMIC_TYPE
(
  ID          INTEGER                           NOT NULL,
  TYPE_KEY    VARCHAR2(100 BYTE)                 NOT NULL,
  DEFINITION  CLOB                              NOT NULL
) ;


ALTER TABLE EVENT DROP PRIMARY KEY CASCADE;
DROP TABLE EVENT CASCADE CONSTRAINTS;

CREATE TABLE EVENT
(
  ID               INTEGER                      NOT NULL,
  TYPE_KEY         VARCHAR2(100 BYTE)            NOT NULL,
  OWNER_ID         INTEGER                      NOT NULL,
  CREATION_TIME    TIMESTAMP(6)                 ,
  LAST_CHANGED     TIMESTAMP(6)                 ,
  LAST_CHANGED_BY  INTEGER
) ;


DROP TABLE EVENT_ATTRIBUTE_VALUE CASCADE CONSTRAINTS;

CREATE TABLE EVENT_ATTRIBUTE_VALUE
(
  EVENT_ID       INTEGER                        NOT NULL,
  ATTRIBUTE_KEY  VARCHAR2(100 BYTE)              NOT NULL,
  ATTRIBUTE_VALUE          VARCHAR2(15000 BYTE)
) ;


ALTER TABLE PERIOD DROP PRIMARY KEY CASCADE;
DROP TABLE PERIOD CASCADE CONSTRAINTS;

CREATE TABLE PERIOD
(
  ID            INTEGER                         NOT NULL,
  NAME          VARCHAR2(255 BYTE)              NOT NULL,
  PERIOD_START  TIMESTAMP(6)                    NOT NULL,
  PERIOD_END    TIMESTAMP(6)                    NOT NULL
) ;


DROP TABLE PERMISSION CASCADE CONSTRAINTS;

CREATE TABLE PERMISSION
(
  RESOURCE_ID   INTEGER                         NOT NULL,
  USER_ID       INTEGER,
  GROUP_ID      INTEGER,
  ACCESS_LEVEL  INTEGER                         NOT NULL,
  MIN_ADVANCE   INTEGER,
  MAX_ADVANCE   INTEGER,
  START_DATE    TIMESTAMP(6),
  END_DATE      TIMESTAMP(6)
) ;


ALTER TABLE RAPLA_USER DROP PRIMARY KEY CASCADE;
DROP TABLE RAPLA_USER CASCADE CONSTRAINTS;

CREATE TABLE RAPLA_USER
(
  ID        INTEGER                             NOT NULL,
  USERNAME  VARCHAR2(100 BYTE)                   NOT NULL,
  PASSWORD  VARCHAR2(100 BYTE),
  NAME      VARCHAR2(255 BYTE),
  EMAIL     VARCHAR2(255 BYTE),
  ISADMIN   INTEGER
) ;


DROP TABLE RAPLA_USER_GROUP CASCADE CONSTRAINTS;

CREATE TABLE RAPLA_USER_GROUP
(
  USER_ID      INTEGER                          NOT NULL,
  CATEGORY_ID  INTEGER                          NOT NULL
) ;


DROP TABLE RESOURCE_ATTRIBUTE_VALUE CASCADE CONSTRAINTS;

CREATE TABLE RESOURCE_ATTRIBUTE_VALUE
(
  RESOURCE_ID    INTEGER                        NOT NULL,
  ATTRIBUTE_KEY  VARCHAR2(100 BYTE),
  ATTRIBUTE_VALUE          VARCHAR2(15000 BYTE)
) ;


DROP TABLE PREFERENCE CASCADE CONSTRAINTS;

CREATE TABLE PREFERENCE
(
  USER_ID       INTEGER,
  ROLE          VARCHAR2(255 BYTE)              NOT NULL,
  STRING_VALUE  VARCHAR2(15000 BYTE),
  XML_VALUE     CLOB
) ;


ALTER TABLE RAPLA_RESOURCE ADD (
  PRIMARY KEY (ID));


ALTER TABLE APPOINTMENT ADD (
  PRIMARY KEY (ID));


ALTER TABLE CATEGORY ADD (
  PRIMARY KEY (ID));


ALTER TABLE DYNAMIC_TYPE ADD (
  PRIMARY KEY (ID));


ALTER TABLE EVENT ADD (
  PRIMARY KEY (ID));


ALTER TABLE PERIOD ADD (
  PRIMARY KEY (ID));


ALTER TABLE RAPLA_USER ADD (
  PRIMARY KEY (ID));



