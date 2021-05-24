<?php
/**
 * Class FMViewAddons_fmc
 */
class FMViewAddons_fmc extends FMAdminView_fmc {
  /**
	* FMViewAddons_fm constructor.
	*/
	public function __construct() {
		wp_enqueue_style(WDFMInstance(self::PLUGIN)->handle_prefix . '-tables');
		wp_enqueue_style(WDFMInstance(self::PLUGIN)->handle_prefix . '-pricing');
		wp_enqueue_script(WDFMInstance(self::PLUGIN)->handle_prefix . '-admin');
	}

  /**
   * Display.
   *
   * @param array $params
   */
	public function display( $params = array() ) {
		$page = $params['page'];
		$page_url = $params['page_url'];
		ob_start();
		echo $this->body($params);
		// Pass the content to form.
		$form_attr = array(
			'id' => WDFMInstance(self::PLUGIN)->prefix . '_addons',
			'name' => WDFMInstance(self::PLUGIN)->prefix . '_addons',
			'class' => WDFMInstance(self::PLUGIN)->prefix . '_addons wd-form',
			'action' => add_query_arg( array('page' => $page, 'task' => 'display'), $page_url),
		);
		echo $this->form(ob_get_clean(), $form_attr);
	}

	/**
	* Generate page body.
	*
  * @param array $params
	* @return string Body html.
	*/
	public function body( $params = array() ) {
		$addons = $params['addons'];
		echo '<div class="fm-add-ons">';
			if ( $addons ) {
				foreach ($addons as $value) {
					foreach ( $value as $addon ) {
						$activated = false;
						if ( is_plugin_active( $addon['dir'] ) ) {
							$activated = true;
						}
						$premium_version = ( WDFMInstance(self::PLUGIN)->is_free && $addon['pro'] ) ? true : false;
						?>
						<div class="fm-add-on<?php echo (!$premium_version) ? ' fm-not-premium-version' : ''; echo ( $activated ) ? ' fm-add-on-activated': ''?>">
							<div class="fm-add-on-img">
							<?php if ( $activated ) { ?><a href="<?php echo $addon['url'] ?>" target="_blank"><?php } ?>
									<img src="<?php echo $addon['icon'] ?>" alt="<?php echo $addon['name'] ?>"/>
							<?php if ( $activated ) { ?></a><?php } ?>
							</div>
							<h2 class="fm-add-on-name">
								<?php if ( $activated ) { ?>
								<a href="<?php echo $addon['url'] ?>" target="_blank"><?php echo $addon['name'] ?></a>
								<?php }
								else { echo $addon['name']; } ?>
							</h2>
							<p class="fm-add-on-premium-version">
								<?php echo $premium_version ? __('Compatible with Premium version only', WDFMInstance(self::PLUGIN)->prefix) : '&nbsp;'; ?>
							</p>
							<div class="fm-add-on-desc-more-wrap">
								<div class="fm-add-on-desc">
									<?php echo ( strlen($addon['description']) > 83 ) ? mb_substr($addon['description'], 0, 83, "utf-8") .' ...' : $addon['description']; ?>
								</div>
								<?php if ( strlen($addon['description']) > 83 ) { ?>
								<div class="fm-add-on-desc-more"><?php echo $addon['description']; ?></div>
								<?php } ?>
							</div>
							<?php if ( $activated ) { ?>
								<span class="fm-add-on-buy" target="_blank"><?php _e('Activated', WDFMInstance(self::PLUGIN)->prefix); ?></span>
							<?php } else { ?>
								<a href="<?php echo $addon['url'] ?>" class="fm-add-on-buy" target="_blank"><?php _e('Get this add on', WDFMInstance(self::PLUGIN)->prefix); ?></a>
							<?php } ?>
							<a href="<?php echo $addon['url'] ?>" target="_blank" class="fm-add-on-learn-more"><?php _e('Learn More', WDFMInstance(self::PLUGIN)->prefix); ?></a>
						</div>
						<?php
					}
				}
			}
		echo '</div>';
	}
}
