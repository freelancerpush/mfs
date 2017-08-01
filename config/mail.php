<?php

return array(
 
    'driver' => 'smtp',
 
    'host' => 'smtp.gmail.com',
 
    'port' => 587,
 
    'from' => array('address' => 'g.f5buddy@gmail.com', 'name' => 'My Fund Saver'),
 
    'encryption' => 'tls',
 
    'username' => 'g.f5buddy@gmail.com',
 
    'password' => 'f5buddy@123',
 
    'sendmail' => '/usr/sbin/sendmail -bs',
 
    'pretend' => false,
 
);