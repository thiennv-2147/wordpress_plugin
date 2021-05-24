<?php

/**
 * Class FMViewPricing_fmc
 */
class FMViewPricing_fmc extends FMAdminView_fmc {

	/**
	* FMViewpricing_fm constructor.
	*/
	public function __construct() {
		wp_enqueue_style(WDFMInstance(self::PLUGIN)->handle_prefix . '-tables');
		wp_enqueue_style(WDFMInstance(self::PLUGIN)->handle_prefix . '-pricing');
		wp_enqueue_script(WDFMInstance(self::PLUGIN)->handle_prefix . '-admin');
	}

  /**
   * Display page.
   *
   * @param array $params
   */
	public function display ( $params = array() ) {
		$page = $params['page'];
		$page_url = $params['page_url'];
		ob_start();
		echo $this->body($params);
		// Pass the content to form.
		$form_attr = array(
			'id' => WDFMInstance(self::PLUGIN)->prefix . '_pricing',
			'name' => WDFMInstance(self::PLUGIN)->prefix . '_pricing',
			'class' => WDFMInstance(self::PLUGIN)->prefix . '_pricing wd-form',
			'action' => add_query_arg( array('page' => $page, 'task' => 'display'), $page_url),
		);
		echo $this->form(ob_get_clean(), $form_attr);
  }

  /**
	* Generate page body.
	*
	* @return string Body html.
	*/
	public function body( $params = array() ) {
	  ?>
	<div class="fm-pricestable-container">
		<div class="fm-pricestable">
      <div class="ptFree">
        <span class="price product_info"><span>$</span>30</span>
        <p><?php _e('Personal', WDFMInstance(self::PLUGIN)->prefix); ?></p>
        <span class="supp">
          <strong><?php _e('6 Months', WDFMInstance(self::PLUGIN)->prefix); ?></strong>
          <span class="desc_span"><?php _e('You’ll have access to new releases during this period and update plugin to include new features without additional charges.', WDFMInstance(self::PLUGIN)->prefix); ?></span><br>
          <?php _e('Access to Updates', WDFMInstance(self::PLUGIN)->prefix); ?>
        </span>
        <span class="supp">
          <strong><?php _e('6 Months', WDFMInstance(self::PLUGIN)->prefix); ?></strong>
          <span class="desc_span"><?php _e('Get quick answers to all product related questions from our support team.', WDFMInstance(self::PLUGIN)->prefix); ?></span><br>
          <?php _e('Premium Support', WDFMInstance(self::PLUGIN)->prefix); ?>
        </span>
        <span class="supp product_info">
          <strong><?php _e('1 Domain', WDFMInstance(self::PLUGIN)->prefix); ?></strong><br>
          <?php _e('Support', WDFMInstance(self::PLUGIN)->prefix); ?>
        </span>
        <ul class="circles">
          <li><div></div></li>
          <li><div></div></li>
          <li><div></div></li>
        </ul>
        <span class="supp product_info"><?php _e('Unlimited Forms/Fields', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('40+ Field Types', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('Multi-Page Forms', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('Paypal Integration', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('File Upload field', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('Fully Customizable Themes', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span>
          <a href="https://web-dorado.com/index.php?option=com_wdsubscriptions&view=checkoutpage&tmpl=component&id=69&offerId=117" target="_blank"><?php _e('Buy now', WDFMInstance(self::PLUGIN)->prefix); ?></a>
        </span>
      </div>
      <div class="ptPersonal">
        <span class="price product_info"><span>$</span>45</span>
        <p><?php _e('Business', WDFMInstance(self::PLUGIN)->prefix); ?></p>
        <span class="supp">
          <strong><?php _e('1 Year', WDFMInstance(self::PLUGIN)->prefix); ?></strong>
          <span class="desc_span"><?php _e('You’ll have access to new releases during this period and update plugin to include new features without additional charges.', WDFMInstance(self::PLUGIN)->prefix); ?></span><br>
          <?php _e('Access to Updates', WDFMInstance(self::PLUGIN)->prefix); ?>
        </span>
        <span class="supp">
          <strong><?php _e('1 Year', WDFMInstance(self::PLUGIN)->prefix); ?></strong>
          <span class="desc_span"><?php _e('Get quick answers to all product related questions from our support team.', WDFMInstance(self::PLUGIN)->prefix); ?></span><br>
          <?php _e('Premium Support', WDFMInstance(self::PLUGIN)->prefix); ?>
        </span>
        <span class="supp product_info">
          <strong><?php _e('3 Domains', WDFMInstance(self::PLUGIN)->prefix); ?></strong><br>
          <?php _e('Support', WDFMInstance(self::PLUGIN)->prefix); ?>
        </span>
        <ul class="circles">
          <li><div></div></li>
          <li><div></div></li>
          <li><div></div></li>
        </ul>
        <span class="supp product_info"><?php _e('Unlimited Forms/Fields', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('40+ Field Types', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('Multi-Page Forms', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('Paypal Integration', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('File Upload field', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('Fully Customizable Themes', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span>
          <a href="https://web-dorado.com/index.php?option=com_wdsubscriptions&view=checkoutpage&tmpl=component&id=70&offerId=117" target="_blank"><?php _e('Buy now', WDFMInstance(self::PLUGIN)->prefix); ?></a>
        </span>
      </div>
      <div class="ptBusiness">
        <span class="price product_info"><span>$</span>60</span>
        <p><?php _e('Developer', WDFMInstance(self::PLUGIN)->prefix); ?></p>
        <span class="supp">
          <strong><?php _e('1 Year', WDFMInstance(self::PLUGIN)->prefix); ?></strong>
          <span class="desc_span"><?php _e('You’ll have access to new releases during this period and update plugin to include new features without additional charges.', WDFMInstance(self::PLUGIN)->prefix); ?></span><br>
          <?php _e('Access to Updates', WDFMInstance(self::PLUGIN)->prefix); ?>
        </span>
        <span class="supp"><strong><?php _e('1 Year', WDFMInstance(self::PLUGIN)->prefix); ?></strong>
          <span class="desc_span"><?php _e('Get quick answers to all product related questions from our support team.', WDFMInstance(self::PLUGIN)->prefix); ?></span><br>
          <?php _e('Premium Support', WDFMInstance(self::PLUGIN)->prefix); ?>
        </span>
        <span class="supp product_info">
          <strong><?php _e('Unlimited Domains', WDFMInstance(self::PLUGIN)->prefix); ?></strong><br>
          <?php _e('Support', WDFMInstance(self::PLUGIN)->prefix); ?>
        </span>
        <ul class="circles">
          <li><div></div></li>
          <li><div></div></li>
          <li><div></div></li>
        </ul>
        <span class="supp product_info"><?php _e('Unlimited Forms/Fields', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('40+ Field Types', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('Multi-Page Forms', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('Paypal Integration', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('File Upload field', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="supp product_info"><?php _e('Fully Customizable Themes', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span>
          <a href="https://web-dorado.com/index.php?option=com_wdsubscriptions&view=checkoutpage&tmpl=component&id=71&offerId=117" target="_blank"><?php _e('Buy now', WDFMInstance(self::PLUGIN)->prefix); ?></a>
        </span>
      </div>
      <div class="ptDeveloper">
        <span class="special_offer"><?php _e('Special offer', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span class="price product_info"><span>$</span>99</span>
        <p class="save_money"><span><?php _e('Save', WDFMInstance(self::PLUGIN)->prefix); ?> $735</span></p>
        <p><?php _e('Form Maker Premium', WDFMInstance(self::PLUGIN)->prefix); ?></p>
        <span class="supp">
          <strong><?php _e('+12 Add-ons', WDFMInstance(self::PLUGIN)->prefix); ?></strong>
          <span class="desc_span"><?php _e('Tune up Form Maker with powerful add-ons: PDF Integration, Mailchimp, Export/Import, Conditional Emails, Registration,etc.', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        </span>
        <span class="supp product_info">
          <strong><?php _e('+ All Our 50 WordPress Premium Plugins', WDFMInstance(self::PLUGIN)->prefix); ?></strong>
        </span>
        <span class="supp product_info"><?php _e('Photo Gallery, Slider, Event Calendar &amp; etc.', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <ul class="circles">
          <li><div></div></li>
          <li><div></div></li>
          <li><div></div></li>
        </ul>
        <span class="supp">
          <?php _e('6 Months Access to Updates', WDFMInstance(self::PLUGIN)->prefix); ?>
          <span class="desc_span"><?php _e('You’ll have access to new releases during this period and update plugins to include new features without additional charges.', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        </span>
        <span class="supp"><?php _e('6 Months Premium Support', WDFMInstance(self::PLUGIN)->prefix); ?>
          <span class="desc_span"><?php _e('Get quick answers to all product related questions from our support team.', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        </span>
        <span class="supp product_info"><?php _e('Unlimited Domains Support', WDFMInstance(self::PLUGIN)->prefix); ?></span>
        <span>
          <a href="https://web-dorado.com/index.php?option=com_wdsubscriptions&task=buy&id=117&from_id=71&wd_button_clicks=insert_into" target="_blank"><?php _e('Buy now', WDFMInstance(self::PLUGIN)->prefix); ?></a>
        </span>
      </div>
    </div>
		<div class="fm-prices-more">
			<div>
				<?php _e('Learn more about Form Maker plugin.', WDFMInstance(self::PLUGIN)->prefix); ?> <a href="https://web-dorado.com/files/fromContactForm.php" target="_blank"><?php _e('Learn More', WDFMInstance(self::PLUGIN)->prefix); ?></a>
			</div>
		</div>
	</div>
	  <?php
	}
}
