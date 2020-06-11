<?php
/**
 * BLOCK: WP Live Chat Support Chat box
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'enqueue_block_editor_assets', 'wplc_inline_chat_box_block_editor_assets' );

function wplc_inline_chat_box_block_editor_assets() {
	global $get_gutenberg_options;
	if($get_gutenberg_options['wplc_gutenberg_enable']) {
		$agent_data['id'] = get_current_user_id();
		$agent_data['info'] = get_userdata( $agent_data['id'] );
		$agent_data['name'] = $agent_data['info']->display_name;
		$agent_data['email'] = md5($agent_data['info']->user_email);

		$wplc_settings = wplc_get_options();
		$style_settings['settings'] = wplc_get_options();
		$style_settings['color_1'] = $wplc_settings['wplc_settings_color1'];

		$wplc_images['background_image'] = wplc_plugins_url('/images/bg/' . $wplc_settings['wplc_settings_bg'], __FILE__ );
		$wplc_images['open_icon'] = wplc_plugins_url('/images/iconRetina.png', __FILE__ );
		$wplc_images['close_icon'] = wplc_plugins_url('/images/iconCloseRetina.png', __FILE__ );

		// Scripts
		wp_enqueue_script( 'wplc_inline_chat_box',
			wplc_plugins_url('/includes/blocks/wplc-inline-chat-box/block.js', __FILE__ ),
			array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
			WPLC_PLUGIN_VERSION
		);

		wp_localize_script( 'wplc_inline_chat_box', 'wplc_agent_info', $agent_data );
		wp_localize_script( 'wplc_inline_chat_box', 'wplc_styles', $style_settings );
		wp_localize_script( 'wplc_inline_chat_box', 'wplc_images', $wplc_images );

		 wp_enqueue_script( 'wplc_chat_box_functions',
			 wplc_plugins_url('/includes/blocks/wplc-inline-chat-box/wplc_functions.js', __FILE__ ),
      array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
      WPLC_PLUGIN_VERSION
		);


		// Styles
		wp_enqueue_style( 'wplc_inline_chat_box-editor',
			wplc_plugins_url('/includes/blocks/wplc-inline-chat-box/editor.css', __FILE__ ),
			array( 'wp-edit-blocks' ),
			WPLC_PLUGIN_VERSION
		);
	}
}

add_action( 'enqueue_block_assets', 'wplc_inline_chat_box_block_block_assets' );

function wplc_inline_chat_box_block_block_assets() {
	global $get_gutenberg_options;
	if($get_gutenberg_options!=null && $get_gutenberg_options['wplc_gutenberg_enable']) {
		// Styles for front-end
		wp_enqueue_style( 'wplc_inline_chat_box_front_end',
			wplc_plugins_url('/includes/blocks/wplc-inline-chat-box/style.css', __FILE__ ),
			array( 'wp-blocks' ),
			WPLC_PLUGIN_VERSION
		);
	}
}