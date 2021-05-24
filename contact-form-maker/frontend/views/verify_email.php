<?php

/**
 * Class FMViewVerify_email_fmc
 */
class FMViewVerify_email_fmc {
  /**
   * PLUGIN = 2 points to Contact Form Maker
   */
  const PLUGIN = 2;

  /**
   * Display message.
   *
   * @param string $message
   */
	public function display( $message = '' ) {
		echo WDW_FM_Library(self::PLUGIN)->message($message, 'fm-notice-success');
	}
}
