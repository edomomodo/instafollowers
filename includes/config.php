<?php

//set timezone
date_default_timezone_set('Europe/London');

//your Web App
define("APP_NAME", "InstaFollower");

//your URL address (change below) format https:// or http://yoururl.com/ <= there is slash at last url
define("BASE_URL", "http://instafollowers.com/");

//is on production set equal true
define('IS_PRODUCTION', false);

//database credentials (change below)
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','earn_dollar');

//api key from www.paypal.com - if live or real payment then set PRO_PayPal equal true
define('PRO_PayPal', false);
if(PRO_PayPal){
    define("PayPal_BASE_URL", "https://api.paypal.com/v1/"); // DO NOT CHANGE THIS LINE

    //for live or real (change id or secret key below)
    define("PayPal_CLIENT_ID", "#########################");
    define("PayPal_SECRET", "###################");

}else{
    define("PayPal_BASE_URL", "https://api.sandbox.paypal.com/v1/"); // DO NOT CHANGE THIS LINE

    //for sandbox or test (optional: you can change bellow)
    define("PayPal_CLIENT_ID", "AQwoZAAHsmA5vBLj_mZffS3NWJjNJODewuV2WakPm-BQilgsawTtnbLvWHNC73idcfiaHBOjaeTDkAS8");
    define("PayPal_SECRET", "EB3Ozp20s6yHcQFijDOhBV_4k0tt1UL8z4o7sXsmQ2WFCLW3K0vf9pyVdTi70M2x_6kKVKCBYQ1o_o9u");
}

//Email (change email below)
define('MAIL_FROM','noreply@instafollowers.com');
define('MAIL_FROM_NAME', 'instafollowers.com');
define('MAIL_CONTACT_US','edo.momodo@gmail.com');

//this mail sender use sendgrid (you can may be try sendinblue or mailchimp)
define('MAIL_MAILER','smtp');
define('MAIL_HOST','smtp.sendgrid.net');
define('MAIL_PORT', 587);
define('MAIL_USERNAME','apikey'); // if you use sendgrid then do not change this line
define('MAIL_PASSWORD','SG.0TqzbAOtgfhfgsdfhcA.Eh4zdfbxfghfsdfp3JknsAsY'); // change its value 
define('MAIL_SMTP_SECURE','tls');
define('MAIL_SMTP_AUTH', true);

//api key from www.plentyfollower.com (change api key below)
define("Plenty_API_KEY", "s0fZNgWpL2i5uwm6XRfhfWsdf2V5tidfgsQyw");

//Price
define('PRICE_CURRENCY', 'USD');
$PRICE_LIST = [
    ['pid'=> 0, 'price'=> 0, 'qty'=> 0, 'price_off'=> 0], // DO NOT CHANGE THIS LINE

    //price list (change price below)
    ['pid'=> 1, 'price'=> 2.89, 'qty'=> 100, 'price_off'=> 3.69],
    ['pid'=> 2, 'price'=> 6.99, 'qty'=> 500, 'price_off'=> 8.79],
    ['pid'=> 3, 'price'=> 13.99, 'qty'=> 1000, 'price_off'=> 16.99]
];