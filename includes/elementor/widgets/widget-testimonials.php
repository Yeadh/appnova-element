<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class appnova_Widget_Testimonials extends Widget_Base {
 
   public function get_name() {
      return 'testimonials';
   }
 
   public function get_title() {
      return esc_html__( 'Testimonials', 'appnova' );
   }
 
   public function get_icon() { 
        return 'eicon-testimonial';
   }
 
   public function get_categories() {
      return [ 'appnova-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'testimonial_section',
         [
            'label' => esc_html__( 'Testimonials', 'appnova' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'appnova' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ]
         ]
      );
      
      $repeater->add_control(
         'name',
         [
            'label' => __( 'Name', 'appnova' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            
         ]
      );

      $repeater->add_control(
         'designation',
         [
            'label' => __( 'Designation', 'appnova' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $repeater->add_control(
         'testimonial',
         [
            'label' => __( 'Testimonial', 'appnova' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
         ]
      );

      $this->add_control(
         'testimonial_list',
         [
            'label' => __( 'Testimonial List', 'appnova' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{name}}',

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="row testimonial-active">
        <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
          <div class="col-xl-4">
              <div class="t-single-testimonial text-center">
                  <div class="t-testimonial-img mb-30">
                      <img src="<?php echo esc_url( $testimonial_single['image']['url'] ); ?>" alt="icon">
                  </div>
                  <div class="t-testimonial-content">
                      <h5><?php echo esc_html($testimonial_single['testimonial']); ?></h5>
                      <div class="testi-avatar">
                          <h6><?php echo esc_html($testimonial_single['name']); ?></h6>
                          <span><?php echo esc_html($testimonial_single['designation']); ?></span>
                      </div>
                  </div>
              </div>
          </div>
        <?php endforeach; ?>
      </div>

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new appnova_Widget_Testimonials );