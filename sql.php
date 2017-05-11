<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

CREATE TABLE `user` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(55) NOT NULL,
 `password` varchar(100) NOT NULL,
 `type` char(4) NOT NULL default 'U' comment 'User/Doctor/Pharmacist',
 `phone` int(11) NOT NULL,       
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
    

CREATE TABLE `medical_record` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(55) NOT NULL,
 `user_id` int(11) NOT NULL,
 `description` varchar(1000) NOT NULL,       
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
    
CREATE TABLE `prescription` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(55) NOT NULL,
 `user_id` int(11) NOT NULL,
 `description` varchar(1000) NOT NULL,       
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
    
    
    CREATE TABLE `prescription_acl` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `prescriptoin_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL,
  `status` char(1) NOT NULL default 'P' comment 'A/P/D/I',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
    
    
    insert into prescription (title,user_id,medical_record_id,description) values('Diabetes',1,null,'medicine list for diabetes');
    insert into prescription (title,user_id,medical_record_id,description) values('Viral fever medicine',1,null,'medicine list of viral fever');
    insert into prescription (title,user_id,medical_record_id,description) values('Eye Test',1,null,'Eye test report and medicine');
    insert into medical_record (title,user_id,description) values('Eye Problem',1,'Eye problem diagnosis');
    
    insert into prescription (title,user_id,medical_record_id,description) values('headache',4,null,'medicine list for headache');
        






###################################################################################

$result = $this->User_model->getAllUsersAllPrescriptions($currentUserInfo['id']);

Array
(
    [0] => Array
        (
            [id] => 1
            [title] => Diabetes
            [medical_record_id] => 
            [medical_titile] => 
        )

    [1] => Array
        (
            [id] => 2
            [title] => Viral fever medicine
            [medical_record_id] => 
            [medical_titile] => 
        )

    [2] => Array
        (
            [id] => 3
            [title] => Eye Test
            [medical_record_id] => 
            [medical_titile] => 
        )

)


