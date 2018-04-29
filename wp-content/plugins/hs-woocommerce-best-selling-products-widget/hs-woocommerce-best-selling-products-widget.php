<?php
/**
*Plugin Name: hs woocommerce Best Selling Products widget 
*Plugin URI: 
*Description: hs woocommerce Best Selling Products side bar Widget Shows the No of Heighest sell Product On the front end side bar,Get ‘Best Selling Products’ Widget & Optimize Sales .
*Author: heliossolutions
*Author URI: http://heliossolutions.in/
*Version: 1.0
*Compatible with woo commerce: 2.3.3 
*/

/**
 * Adds Highest_product_selling_Widget widget.
 */
class Best_selling_products_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'best_selling_product_widget', // Base ID
			esc_html__( 'WWoocommerce Best Selling Products widget', 'best_selling_product' ), // Name
			array( 'description' => esc_html__( 'A Display Woocommerce Best Selling Products side bar Widget', 'best_selling_product' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		global $wpdb;
		global $woocommerce ;
		
		
		$number_of_product_display = '';
		if(isset($instance['product_display'])){
				$number_of_product_display = $instance['product_display'];
		}
		 
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $number_of_product_display,
			'meta_key' => 'total_sales',
			'orderby' => 'meta_value_num',
			);

		$top_product_loop = new WP_Query( $args );	
		?>
	  
<?php if ( $top_product_loop->have_posts() ) { ?>
<div id="woocommerce_top_selling_products" class="widget woocommerce widget_recently_viewed_products">
	<div class="heading">
		<h4 class="top-product-selling-widget-title"><?php echo $instance['title']; ?></h4>
	</div>
		<ul class="top_selling_product_list_widget product_list_widgets">
		<?php 
		while ( $top_product_loop->have_posts() ) : $top_product_loop->the_post();
			?>
			<?php $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
			<li>
			<a href="<?php echo get_permalink() ; ?>" >
				<img src="<?php echo $url; ?>" height="300" width="222"/>
				</a>
				<a href="<?php echo get_permalink() ; ?>" ><span class="product-title"><?php the_title() ; ?></span></a>
				<?php 
					$price = get_post_meta( get_the_ID(), '_regular_price');
					$sale = get_post_meta( get_the_ID(), '_sale_price');
					
				
					
					if($sale[0] !=""){
						$product_currency_symbol = get_woocommerce_currency_symbol();
						$product_price = number_format($sale[0]);
					}else{
						$product_currency_symbol = get_woocommerce_currency_symbol();
						$product_price = number_format($price[0]);
					}
					
					if(empty($product_price)){
							$min_variation_price  = get_post_meta(get_the_ID(),'_min_variation_price');
							$max_variation_price  = get_post_meta(get_the_ID(),'_max_variation_price');
					}
				
				?>
					<ul class="top_product_price">
					  <li><span class="woocommerce-Price-amount amount">
					       <?php if(!empty($product_price)) { ?>
                               <span class="woocommerce-Price-currencySymbol">
                                   <?php _e($product_price,'best_selling_product'); ?>
                               </span> <?php  _e($product_currency_symbol,'best_selling_product'); ?>
                               <?php
					       }
								else{
									?>
									<span class="woocommerce-Price-currencySymbol"> <?php _e($product_currency_symbol,'best_selling_product'); ?></span>&nbsp;<?php _e($min_variation_price[0],'best_selling_product'); ?>&nbsp;<?php _e("-",'best_selling_product'); ?><?php _e($product_currency_symbol,'best_selling_product');?> &nbsp;<?php _e($max_variation_price[0],'best_selling_product'); ?> 
									<?php
								}
 						  ?>
						  </span>	
					 </li>
					</ul>
					  
					
					
					
			</li>
			<?php endwhile;  ?>
		</ul>
	</div>
</div>
<?php 
//echo $args['after_widget'];
	}
		
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'best_selling_product' );
		$product_display = ! empty( $instance['product_display'] ) ? $instance['product_display'] : esc_html__( '3', 'best_selling_product' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'best_selling_product' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<p>
		 <label>No Of Product to Display : </label>
         <Input type ='text' id ="<?php echo esc_attr( $this->get_field_id( 'product_display' ) ); ?>" name ='<?php echo esc_attr( $this->get_field_name( 'product_display' ) ); ?>' value="<?php echo esc_attr( $product_display ); ?>"/>
        </p>
					    
                   
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['product_display'] = ( ! empty( $new_instance['product_display'] ) ) ? strip_tags( $new_instance['product_display'] ) : '';

		return $instance;
	}

} 
/* Load CSS and Javascript for plugin */

function best_selling_products_widget_frontend_scripts_and_styles() {
    wp_enqueue_style('best-selling-product-style', plugins_url('hs-woocommerce-best-selling-products-widget/css/style_hs.css'));
}

add_action('wp_enqueue_scripts', 'best_selling_products_widget_frontend_scripts_and_styles');

//class Highest_product_selling_Widget
// Register register_product_selling_Widget widget
function register_product_selling_Widget() {
    register_widget( 'best_selling_products_Widget' );
}
add_action( 'widgets_init', 'register_product_selling_Widget' );
?>