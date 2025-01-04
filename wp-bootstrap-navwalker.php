<?php
/**
 * WP Bootstrap Navwalker
 *
 * @package WP-Bootstrap-Navwalker
 * @wordpress-plugin
 * Plugin Name: WP Bootstrap Navwalker
 * Plugin URI:  https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 5 navigation style in a custom theme using the WordPress built-in menu manager.
 * Author: Edward McIntyre - @twittem, WP Bootstrap, William Patton - @pattonwebz, IanDelMar - @IanDelMar
 * Version: 5.0.0
 * Author URI: https://github.com/wp-bootstrap
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! class_exists( 'WP_Bootstrap_Navwalker' ) ) :
	
	class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
		
		/**
		 * Starts the list before the elements are added.
		 *
		 * @param string $output Used to append additional content (passed by reference).
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param array $args An array of arguments. @see wp_nav_menu()
		 */
		public function start_lvl( &$output, $depth = 0, $args = null ) {
			$indent = str_repeat( "\t", $depth );
			$classes = array( 'dropdown-menu' );
			$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$output .= "\n$indent<ul$class_names>\n";
		}
		
		/**
		 * Starts the element output.
		 *
		 * @param string $output Used to append additional content (passed by reference).
		 * @param WP_Post $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param array $args An array of arguments. @see wp_nav_menu()
		 * @param int $id Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'nav-item'; // Add nav-item to all li elements
			
			if ( $args->walker->has_children ) {
				$classes[] = 'dropdown'; // Add dropdown for parent items
			}
			
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			
			$output .= $indent . '<li' . $id . $class_names . '>';
			
			$atts = array();
			$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			$atts['class'] = 'nav-link'; // Add nav-link to all anchor tags
			
			if ( $args->walker->has_children ) {
				$atts['class'] .= ' dropdown-toggle';
				$atts['data-bs-toggle'] = 'dropdown'; // Add Bootstrap toggle
				$atts['aria-expanded'] = 'false';
			}
			
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
			
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
				}
			}
			
			$title = apply_filters( 'the_title', $item->title, $item->ID );
			
			$item_output = $args->before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
		
		/**
		 * Ends the element output, if needed.
		 *
		 * @param string $output Used to append additional content (passed by reference).
		 * @param WP_Post $item Page data object. Not used.
		 * @param int $depth Depth of menu item. Not Used.
		 * @param array $args An array of arguments. @see wp_nav_menu()
		 */
		public function end_el( &$output, $item, $depth = 0, $args = null ) {
			$output .= "</li>\n";
		}
	}

endif;
