<?php 
/*
 * (c) YOUR NAME <willycotes.dev>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WP_CLI\CLITest;

use WP_CLI;

/**
 * Class Test
 */
class Test
{
	protected $message;

	public function __construct( string $message = 'Default log' ) {
		$this->message = $message;
	}

  public function log( $argumento ) {
    WP_CLI::success( sprintf( 'Executing command: %s, %s', $this->message, $argumento[0] ) );
		// WP_CLI::log( $this->message );
  }
}