create database pedrozajay;

use pedrozajay;

CREATE TABLE `tbl name:tbl_student` (
  `studentid (PK)` int(11) NOT NULL auto_increment,
  `ProductLname` varchar(100) NOT NULL,
  `ProductLname` varchar(200) NOT NULL,
  `Productgender` int(10) NOT NULL,
  `Productbirthdate` int(10) NOT NULL,
  `Productaddress` int(10) NOT NULL,
  `Productcontact` int(10) NOT NULL,

  PRIMARY KEY  (`id`)
);
CREATE TABLE `table name:tbl_class` (
  `id` int(11) NOT NULL auto_increment,
  `ProductId` varchar(100) NOT NULL,
  `Productclasscode` varchar(200) NOT NULL,
  `Productstudentid(fk)` int(10) NOT NULL,
  `Productsubjectcode` int(10) NOT NULL,
  `Producttime` int(10) NOT NULL,
  `Productreacher` int(10) NOT NULL,

  PRIMARY KEY  (`id`)