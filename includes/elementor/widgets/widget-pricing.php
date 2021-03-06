<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class appnova_Widget_Pricing extends Widget_Base {
 
   public function get_name() {
      return 'pricing';
   }
 
   public function get_title() {
      return esc_html__( 'Pricing', 'appnova' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'appnova-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'pricing_section',
         [
            'label' => esc_html__( 'Pricing', 'appnova' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->add_control(
         'title',
         [
            'label' => __( 'title', 'appnova' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard Plan'
         ]
      );

      $this->add_control(
         'desc',
         [
            'label' => __( 'Description', 'appnova' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'condition' => ['style' => 'style2']
         ]
      );

      $this->add_control(
         'icon',
         [
            'label' => __( 'icon', 'appnova' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]
      );

      $this->add_control(
         'price',
         [
            'label' => __( 'Price', 'appnova' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '70'
         ]
      );
      
      $this->add_control(
         'package',
         [
            'label' => __( 'Package', 'appnova' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'Yealry',
            'options' => [
               'Daily'  => __( 'Daily', 'appnova' ),
               'Weekly'  => __( 'Weekly', 'appnova' ),
               'Monthly' => __( 'Monthly', 'appnova' ),
               'Yealry' => __( 'Yealry', 'appnova' ),
               'none' => __( 'None', 'appnova' )
            ],
         ]
      );

      $feature = new \Elementor\Repeater();

      $feature->add_control(
         'feature',
         [
            'label' => __( 'Feature', 'appnova' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '10 Free Domain Names', 'appnova' )
         ]
      );

      $this->add_control(
         'feature_list',
         [
            'label' => __( 'Feature List', 'appnova' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature->get_controls(),
            'default' => [
               [
                  'feature' => __( '5GB Storage Space', 'appnova' )
               ],
               [
                  'feature' => __( '20GB Monthly Bandwidth', 'appnova' )
               ],
               [
                  'feature' => __( 'My SQL Databases', 'appnova' )
               ],
               [
                  'feature' => __( '100 Email Account', 'appnova' )
               ],
               [
                  'feature' => __( '10 Free Domain Names', 'appnova' )
               ]
            ],
            'title_field' => '{{{ feature }}}',
         ]
      );

      $this->add_control(
         'btn_text',
         [
            'label' => __( 'button text', 'appnova' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'subscribe',
         ]
      );

      $this->add_control(
         'btn_url',
         [
            'label' => __( 'button URL', 'appnova' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'recommended',
         [
            'label' => __( 'Recommended', 'appnova' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'appnova' ),
            'label_off' => __( 'Off', 'appnova' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>
      

      <div class="single-pricing <?php if ( 'on' == $settings['recommended'] ){ echo"active"; }?> text-center">
         <div class="pricing-head mb-30">
             <span><?php echo esc_html( $settings['title'] ); ?></span>
             <h2>$<?php echo esc_html( $settings['price'] ); ?><span>/<?php echo esc_html( $settings['package'] ); ?></span></h2>
         </div>
         <div class="pricing-list mb-35">
             <ul>
               <?php foreach( $settings['feature_list'] as $index => $feature ) { ?>
                  <li><?php echo $feature['feature'] ?></li>
               <?php } ?>
             </ul>
         </div>
         <div class="pricing-btn">
            <a href="<?php echo esc_attr( $settings['btn_url'] ) ?>" class="btn"><?php echo esc_html( $settings['btn_text'] ) ?></a>
         </div>
      </div>

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new appnova_Widget_Pricing );