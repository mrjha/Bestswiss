<?php
 /*
 * Custom class to manage weight wise shipping
 *
 */

 class BST_Weight_Based_Shipping extends WC_Weight_Based_Shipping{

        const PLUGIN_PREFIX = 'woowbs_';

        public $plugin_id = self::PLUGIN_PREFIX;

        public $sttingarra =array();

        /*public function __construct($profileId = null)
        {

            $manager = WBS_Profile_Manager::instance();

            // Force loading profiles when called from WooCommerce 2.3.9- save handler
            // to activate process_admin_option() with appropriate hook
            if (!isset($profileId)) {
                $manager->profiles();
            }

            //$this->id = $manager->find_suitable_id($profileId);
            //$this->profile_id = $profileId;

            //$this->method_title = __('Weight Based', 'woowbs');

            //$this->sttingarra = new WbsSettingsHtmlTools($this);

            //$this->init();
        }*/

    
 	    public function htmlform()
        {
            $woocommerce = WC();

            $htmlformval = array(
                ### Meta ###
                array(
                    'type' => 'title',
                    'title' => __('Rule Settings', 'woowbs'),
                ),
                    'enabled'    => array(
                        'title'   => __('Enable/Disable', 'woowbs'),
                        'type'    => 'checkbox',
                        'label'   => __('Enable this rule', 'woowbs'),
                        'default' => 'yes',
                    ),
                    'tax_status' => array(
                        'title'       => __('Tax Status', 'woowbs'),
                        'type'        => 'select',
                        'default'     => 'taxable',
                        'class'		  => 'availability wc-enhanced-select',
                        'options'     => array(
                            'taxable'   => __('Taxable', 'woowbs'),
                            'none'      => __('None', 'woowbs'),
                        ),
                    ),
                ### Conditions ###
                array(
                    'type' => 'title',
                    'title' => __('Conditions', 'woowbs'),
                    'description' => __('Define when the delivery option should be shown to the customer. All the following conditions must be met to activate the rule.', 'woowbs'),
                ),
                    'weight' => array(
                        'title'       => __('Order Weight', 'woowbs'),
                        'type'        => 'wbs_range',
                    ),
                    'subtotal' => array(
                        'title'       => __('Order Subtotal', 'woowbs'),
                        'type'              => 'wbs_custom',
                        'wbs_real_type'     => 'wbs_range',
                        'wbs_row_class'     => 'wbs-subtotal',
                    ),
                    'subtotal_with_tax' => array(
                        'title'             => __('Subtotal With Tax', 'woowbs'),
                        'type'              => 'checkbox',
                        'label'             => __('After tax included', 'woowbs'),
                    ),

                ### Calculations ###
                array(
                    'type' => 'title',
                    'title' => __('Costs', 'woowbs'),
                    'description' => __('This controls shipping price when this rule is active.', 'woowbs'),
                ),
                    'fee'        => array(
                        'title'       => __('Base Cost', 'woowbs'),
                        'type'        => 'decimal',
                        'description' => __('Leave empty or zero if your shipping price has no flat part.', 'woowbs'),
                    ),
                    'weight_rate' => array(
                        'title'       => __('Weight Rate', 'woowbs'),
                        'type'        => 'wbs_weight_rate',
                        'description' =>
                            __('Leave <code class="wbs-code">charge</code> field empty if your shipping price is flat.', 'woowbs').'<br>'.
                            __('Use <code class="wbs-code">over</code> field to skip weight part covered with Base Cost or leave it empty to charge for entire order weight.', 'woowbs'),
                    ),
                    'shipping_class_rates' => array(
                        'title'       => __('Shipping Classes', 'woowbs'),
                        'type'        => 'shipping_class_rates',
                        'description' => __('You can override some options for specific shipping classes', 'woowbs'),
                    ),

                ### Modificators ###
                array(
                    'type' => 'title',
                    'title' => __('Modificators', 'woowbs'),
                    'description' => __('With the following you can modify resulting shipping price', 'woowbs'),
                ),
                    'price_clamp' => array(
                        'title'           => __('Limit Total Cost', 'woowbs'),
                        'type'            => 'wbs_range',
                        'wbs_range_type'  => 'simple',
                        'description'     => __('If shipping price exceeds specified range it will be changed to either lower or upper bound appropriately.', 'woowbs'),
                    ),
            );

            $placeholders = array
            (
                'weight_unit' => __(get_option('woocommerce_weight_unit'), 'woowbs'),
                'currency' => get_woocommerce_currency_symbol(),
            );

            foreach ($htmlformval as &$field)
            {
                $field['description'] = wbst(@$field['description'], $placeholders);
            }

            $htmlformval = apply_filters('wbs_profile_settings_form', $this->form_fields, $this);
            return $htmlformval;
        }

 }


?>