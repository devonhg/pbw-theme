<?php 
/*
	Paradise Body Works Additions
*/

function dhg_list_cats_f($atts){
 	$args = shortcode_atts(array(
		'parent' => "",
		'hide_empty' => 0,
	), $atts);
	
	$output = "";

	$product_categories = get_terms( 'product_cat', $args );
	$product_titles = get_terms('product_cat', "include=".$args['parent']);
	
	foreach($product_titles as $pt){
		//echo "<h3><a href='" . get_term_link($pt) ."'>" . $pt->name . "</a></h3>";
		$output .= "<h3><a href='" . get_term_link($pt) ."'>" . $pt->name . "</a></h3>";
	}

	$count = count($product_categories);
	 if ( $count > 0 ){
	     //echo "<ul>";
		$output .= "<ul>";
	     foreach ( $product_categories as $product_category ) {
	       //echo '<li><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a> (' . $product_category->count . ') </li>';
         	$output .= '<li><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a> (' . $product_category->count . ') </li>';
	     }
	     //echo "</ul>";
		$output .= "</ul>";
	 } 
	return $output; 
}

add_shortcode("dhg_list_cats", "dhg_list_cats_f");

add_action('wp_head','add_to_cart_script');
function add_to_cart_script(){
  if(is_product()){
    wp_enqueue_script('wc-add-to-cart-variation');
  }
}

/*Hande Price Range Difficulties*/

add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );
function wc_wc20_variation_price_format( $price, $product ) {
	// Main Price
		$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
		$price = $prices[0] !== $prices[1] ? sprintf( __( 'From: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
	// Sale Price
		$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
		sort( $prices );
		$saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'From: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
		if ( $price !== $saleprice ) {
			$price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
		}
		return $price;
}
