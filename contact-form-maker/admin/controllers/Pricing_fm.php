<?php
/**
 * Class FMControllerPricing_fmc
 */
class FMControllerPricing_fmc extends CFMAdminController {
  /**
	* @var $model
	*/
	private $model;
	/**
	* @var $view
	*/
	private $view;
	/**
	* @var string $page
	*/
	private $page;
	
	public function __construct() {
		$this->page 	= WDW_FM_Library(self::PLUGIN)->get('page');
		$this->page_url = add_query_arg( array (
										'page' => $this->page,
										WDFMInstance(self::PLUGIN)->nonce => wp_create_nonce(WDFMInstance(self::PLUGIN)->nonce),
									  ), admin_url('admin.php')
								  );
		require_once WDFMInstance(self::PLUGIN)->plugin_dir . "/admin/views/Pricing_fm.php";
		$this->view = new FMViewpricing_fmc();		
	}
	
	/**
	* Execute.
	*/
	public function execute() {
		$task = WDW_FM_Library(self::PLUGIN)->get('task');
		$id = (int) WDW_FM_Library(self::PLUGIN)->get('current_id', 0);
		if (method_exists($this, $task)) {
		  $this->$task($id);
		}
		else {
		  $this->display();
		}
	}

	/**
	* Display.
	*/
	public function display() {
    // Set params for view.
    $params = array();
    $params['page'] 		= $this->page;
    $params['page_url']		= $this->page_url;
    $this->view->display( $params );
  }
}