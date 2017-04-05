<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => '/hauth/endpoint',

		"providers" => array (
			// openid providers
			"OpenID" => array (
				"enabled" => true
			),

			"Yahoo" => array (
				"enabled" => true,
                "keys"    => array ( "key" => "dj0yJmk9am95UE81UXJQcFFSJmQ9WVdrOVJYbGFjV0ZDTTJVbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD01OQ--", "secret" => "ab66f783f93132a8c7349ebd4e8d1e6d993889e5" ),
            ),

			"AOL"  => array (
				"enabled" => true
			),

			"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "518640069149-4oivleg579q1celed5ooqogb2o6g1a9b.apps.googleusercontent.com", "secret" => "SVhcHZvVO62BpP812IPhrXfx" ),
			),

			"Facebook" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "744655055637026", "secret" => "935f4fbe6d8ed6a9fdea7cee2b8edb1e" ),
                                 "scope"   => "email, user_about_me, user_birthday, user_hometown",
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "HxMFYI0NBsANaX4Te4ZEQqtnh", "secret" => "ap4guBfMowjiRUh0F8s3nb6SR1vS4FvmRE8zxiVKVwfqobNWbP" )
			),

			// windows live
			"Live" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"MySpace" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"LinkedIn" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "75blw6tuiaom3x", "secret" => "rJMdMWsbpe2ixl9d" )
			),

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => (ENVIRONMENT == 'development'),

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */