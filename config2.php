<?php
/**
 * Build a configuration array to pass to `Hybridauth\Hybridauth`
 */

$config2 = [
  /**
   * Set the Authorization callback URL to https://path/to/hybridauth/examples/example_06/callback.php.
   * Understandably, you need to replace 'path/to/hybridauth' with the real path to this script.
   */
  'callback' => 'https://showroomin.com/',
  'providers' => [
	 
    'Facebook' => [
      'enabled' => true,
      'keys' => [
         "keys"    => array ( "id" => "196822354435093", "secret" => "8149de4e4ef7157aa0217d009772d716" ),
      ],
    ],
  ],
];
?>