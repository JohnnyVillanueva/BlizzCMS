<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Recaptcha (V2)
|--------------------------------------------------------------------------
|
| Write the necessary keys to enable recaptcha in the register
| Use the following page to create the necessary keys.
| https://www.google.com/recaptcha/admin#list
|
*/
$config['recaptcha_sitekey'] = '6LfJFEAUAAAAAKBrGYQaX-TeWGBG1vTNlqUuNyNA';

/*
|--------------------------------------------------------------------------
| SMTP
|--------------------------------------------------------------------------
|
| Write the necessary information for use SMTP to use in recovery password
| and account activation.
|
*/
$config['smtp_host'] = 'cp162176.hpdns.net';
$config['smtp_user'] = 'dzy@dzywolf.me';
$config['smtp_pass'] = 'r5hxfIazAXmn';
$config['smtp_port'] = '465';
$config['smtp_crypto'] = 'ssl';

/*
|--------------------------------------------------------------------------
| Email Settings
|--------------------------------------------------------------------------
|
| Write the necessary information to use in sending emails.
|
*/
$config['email_settings_sender'] = 'dzy@dzywolf.me';
$config['email_settings_sender_name'] = 'BlizzCMS';

/*
|--------------------------------------------------------------------------
| Account Activation
|--------------------------------------------------------------------------
|
| Enable or Disable the option to activate accounts by email.
| 
| TRUE  = Enable
| FALSE = Disable
|
*/
$config['account_activation_required'] = FALSE;

/*
|--------------------------------------------------------------------------
| Administrator Access Level
|--------------------------------------------------------------------------
|
| Minimum gmlevel to access to admin sections.
|
*/
$config['admin_access_level'] = '3';

/*
|--------------------------------------------------------------------------
| Moderator Access Level
|--------------------------------------------------------------------------
|
| Minimum gmlevel to access to mod sections.
|
*/
$config['mod_access_level'] = '2';
