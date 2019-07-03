<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

/**
 * set for you base_url
 */
$config['base_url'] = 'http://localhost:8889/NayoUpload/';


/**
 * default language for application resource
 */
$config['language'] = 'en';

/**  
 * Migration 
 * 
 * if $config['enable_auto_migration'] set True Then you can use Nayo_migration function
 * 
 * create file in App/Database , ex : create_user.sql
 * user query to execute query
*/
$config['enable_auto_migration'] = TRUE;
