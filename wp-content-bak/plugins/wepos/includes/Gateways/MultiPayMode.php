<?php
namespace WeDevs\WePOS\Gateways;

/**
* MultiPayMode gateway payment for POS
*/
class MultiPayMode extends \WC_Payment_Gateway {

    /**
     * Constructor for the gateway.
     */
    public function __construct() {
        // Setup general properties.
        $this->setup_properties();

        // Load the settings.
        $this->init_form_fields();
        $this->init_settings();

        // Get settings.
        $this->title              = $this->get_option( 'title' );
        $this->description        = $this->get_option( 'description' );
        $this->instructions       = $this->get_option( 'instructions' );
        $this->enable_for_methods = $this->get_option( 'enable_for_methods', array() );
        $this->enable_for_virtual = $this->get_option( 'enable_for_virtual', 'yes' ) === 'yes';

        add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
    }

    /**
     * Setup general properties for the gateway.
     */
    protected function setup_properties() {
        $this->id                 = 'wepos_multipaymode';
        $this->icon               = apply_filters( 'wepos_multipaymode_icon', '' );
        $this->method_title       = __( 'MultiPayMode', 'wepos' );
        $this->method_description = __( 'Have your customers pay with mixed pay modes', 'wepos' );
        $this->has_fields         = false;
    }

    /**
     * Initialise Gateway Settings Form Fields.
     */
    public function init_form_fields() {

        $this->form_fields = array(
            'enabled'            => array(
                'title'       => __( 'Enable/Disable', 'wepos' ),
                'label'       => __( 'Enable multi pay mode gateway', 'wepos' ),
                'type'        => 'checkbox',
                'description' => '',
                'default'     => 'yes',
            ),
            'title'              => array(
                'title'       => __( 'Title', 'wepos' ),
                'type'        => 'text',
                'description' => __( 'Payment method description that the marchent see in pos checkout', 'wepos' ),
                'default'     => __( 'Mixed Pay', 'wepos' ),
                'desc_tip'    => true,
            ),
            'description'        => array(
                'title'       => __( 'Description', 'wepos' ),
                'type'        => 'textarea',
                'description' => __( 'Payment method description that marchent see in pos checkout page', 'wepos' ),
                'default'     => __( 'Pay with multiple pay mode', 'wepos' ),
                'desc_tip'    => true,
            )
        );
    }

    /**
     * Check If The Gateway Is Available For Use.
     *
     * @return bool
     */
    public function is_available() {
        $order          = null;
        $needs_shipping = false;

        // Test if shipping is needed first.
        if ( is_page( wc_get_page_id( 'checkout' ) ) ) {
            return true;
        }

        return parent::is_available();
    }

    /**
     * Process the payment and return the result.
     *
     * @param int $order_id Order ID.
     * @return array
     */
    public function process_payment( $order_id ) {
        $order = wc_get_order( $order_id );
        // Mark as processing or on-hold (payment won't be taken until delivery).
        $order->payment_complete();

        $balAmtMeta = $order->get_meta( 'wepos_order_balance_amount', true );
        
        if (empty($balAmt) == true || isset($balAmt) == false) {
            $balAmt = 0;
        }
        $balAmtArry = explode(" ", $balAmtMeta);
        $balAmt = $balAmtArry[count($balAmtArry)-1];
        
        if ($balAmt > 0) {
            $order->update_status( 'pending', __( 'Payment collected via mixed payment mode', 'wepos' ) );
        }
        else {
            $order->update_status( 'completed', __( 'Payment collected via mixed payment mode', 'wepos' ) );
        }
        $order->add_order_note( sprintf( __( 'Mixed Pay Mode Balance Amount %1$s', 'wepos' ), $balAmt ) );
        $order->set_created_via( 'wepos' );
        $order->save();

        // Return thankyou redirect.
        return array(
            'result'   => 'success',
        );
    }

 }