<?php

/*Define constant to connect to database */
DEFINE('DATABASE_USER', 'id10811468_teamdelta');
DEFINE('DATABASE_PASSWORD', 'delta6');
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_NAME', 'id10811468_useraccount');
/*Default time zone ,to be able to send mail */
date_default_timezone_set('UTC');

/*You might not need this */
//ini_set('SMTP', "mail.myt.mu"); // Overide The Default Php.ini settings for sending mail


//This is the address that will appear coming from ( Sender )
//define('EMAIL', 'teamdelta.hng6.0@gmail.com');

/*Define the root url where the script will be found such as http://website.com or http://website.com/Folder/ */
DEFINE('WEBSITE_URL', 'http://localhost');


// Make the connection:
$dbc = @mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD,
    DATABASE_NAME);

if (!$dbc) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}

?>
