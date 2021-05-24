<?php

/**
 * Class Cookie_fm
 */
class Cookie_fm {
  protected static $_instance = NULL;
  public static $cookie_name = '';
  public static $cookie_id = '';
  public static $cookie_data = array();

  public function __construct( $args = array() ) {
    self::$cookie_name = 'fm_cookie_' . self::get_hash();
    self::setCookieId((!empty($_COOKIE[self::$cookie_name]) ? $_COOKIE[self::$cookie_name] : ''));
    if ( empty($_COOKIE[self::$cookie_name]) ) {
      self::init_cookie();
    }
    self::getCookie();
  }

  /**
   * @return Cookie_fm|null
   */
  public static function instance() {
    if ( is_null(self::$_instance) ) {
      self::$_instance = new self();
    }

    return self::$_instance;
  }

  /**
   * @param string $cookie_id
   */
  public static function setCookieId( $cookie_id ) {
    self::$cookie_id = $cookie_id;
  }

  /**
   * @return string
   */
  public static function getCookieId() {
    return self::$cookie_id;
  }

  /**
   * Get hash.
   *
   * @return string
   */
  public static function get_hash() {
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $site_url = get_bloginfo('url');
    $to_hash = md5($site_url . $user_ip . $user_agent);

    return $to_hash;
  }

  /**
   * Set fm_cookie_id.
   */
  private static function init_cookie() {
    $cookie_value = self::get_hash();
    self::setCookieId($cookie_value);
    $save = self::save_cookie_db();
      $parse = parse_url(site_url());
      $cookie_expires = time() + (86400 * 30); // 86400 = 1 day
      $cookie_path = '/';
      $cookie_domain = ''; // $parse['host'];
      $cookie_secure = FALSE;
      $cookie_httponly = TRUE;
      setcookie(self::$cookie_name, $cookie_value, $cookie_expires, $cookie_path, $cookie_domain, $cookie_secure, $cookie_httponly);
  }

  /**
   * Set cookie DB.
   *
   * @return false|int
   */
  private static function save_cookie_db() {
    global $wpdb;
    // @TODO. "strpos" was used to stop WP cron running.
    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'WordPress') === FALSE ) {
      $cookie_id = $wpdb->get_row($wpdb->prepare('SELECT `id` FROM ' . $wpdb->prefix . 'formmaker_cookies WHERE cookie_id = %s', self::get_hash()));
      if ( !$cookie_id ) {
        $insert = $wpdb->insert($wpdb->prefix . 'formmaker_cookies', array( 'cookie_id' => self::getCookieId() ), array( '%s' ));

        return $insert;
      }
    }

    return FALSE;
  }

  /**
   * Get Cookie.
   *
   * @return array|object|void|null
   */
  public static function getCookie() {
    if ( empty(self::$cookie_data) ) {
      global $wpdb;
      $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM `' . $wpdb->prefix . 'formmaker_cookies` WHERE `cookie_id` = "%s"', self::getCookieId()));
      if ( !empty($row) ) {
        if ( !empty($row->value) ) {
          $row->value = json_decode($row->value, TRUE);
        }
        else {
          $row->value = array();
        }
      }
      self::$cookie_data = $row;
    }
  }

  /**
   * Get Cookie By Key.
   * @param int    $form_id
   * @param string $key
   * @param bool   $reset
   *
   * @return string|bool
   */
  public static function getCookieByKey( $form_id = 0, $key = '', $reset = FALSE ) {
    if ( !empty($key) ) {
      if ( !empty(self::$cookie_data) && !empty(self::$cookie_data->value) ) {
        if ( isset(self::$cookie_data->value[$form_id][$key]) ) {
          $value = self::$cookie_data->value[$form_id][$key];
          if ( $reset ) {
            unset(self::$cookie_data->value[$form_id][$key]);
          }

          return $value;
        }
      }
    }

    return FALSE;
  }

  /**
   * Set Cookie Value By Key.
   * @param int    $form_id
   * @param string $key
   * @param string $value
   */
  public static function setCookieValueByKey( $form_id = 0, $key = '', $value = '' ) {
    if ( !empty($key) && !empty($value) && !empty(self::$cookie_data)) {
      // @TODO. sanitize is not organized
      self::$cookie_data->value[$form_id][$key] = $value;
    }
  }

  /**
   * Save Cookie Value By Key.
   * @param int    $form_id
   * @param string $key
   * @param string $value
   */
  public static function saveCookieValueByKey( $form_id = 0, $key = '', $value = '' ) {
    if ( $form_id && !empty($key) && !empty($value) ) {
      self::$cookie_data->value[$form_id][$key] = $value;
      self::saveCookieValue();
    }
  }

  /**
   * Save Cookie Value.
   * @param string $value
   *
   * @return mixed
   */
  public static function saveCookieValue() {
    global $wpdb;
    if ( !empty(self::$cookie_data) ) {
	 $update = $wpdb->update($wpdb->prefix . 'formmaker_cookies', array( 'value' => json_encode(self::$cookie_data->value) ), array( 'cookie_id' => self::getCookieId() ), array( '%s' ), array( '%s' ));
	 return $update;
    }
  }
}