<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Newsletter
class appnova_Widget_newsletter extends Widget_Base {
 
   public function get_name() {
      return 'newsletter';
   }
 
   public function get_title() {
      return esc_html__( 'Newsletter', 'appnova' );
   }
 
   public function get_icon() { 
        return 'eicon-envelope';
   }
 
   public function get_categories() {
      return [ 'appnova-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'newsletter_section',
         [
            'label' => esc_html__( 'Newsletter', 'appnova' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title', [
            'label' => __( 'Title', 'appnova' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Get reguler updates', 'appnova' ),
         ]
      );

      $this->add_control(
         'shortcode', [
            'label' => __( 'Mailchimp Shortcode', 'appnova' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'placeholder' => __( '[mc4wp_form id="123"]', 'appnova' ),
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>


      <!-- newsletter-area -->
      <div class="newsletter-area">
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-8 col-lg-10">
                  <div class="section-title text-center border-none mb-50">
                      <h2><?php echo $settings['title']; ?></h2>
                  </div>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-xl-7">
                <div class="newsletter-form">  
                  <?php echo do_shortcode( $settings['shortcode'] ); ?>
                </div>
              </div>
          </div>
          </div>
      </div>

<?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new appnova_Widget_newsletter );