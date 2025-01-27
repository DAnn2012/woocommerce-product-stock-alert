<?php

namespace StockManager;

defined( 'ABSPATH' ) || exit;

class Utill {

    /**
     * Function to console and debug errors.
     */
    public static function log( $str ) {
        $file = SM()->plugin_path . 'log/woo-stock-manager.log';

        if ( file_exists( $file ) ) {
            // Open the file to get existing content
            $str = var_export( $str, true );

            // Wp_remote_gate replacement required
            $current = file_get_contents( $file );

            if ( $current ) {
                // Append a new content to the file
                $current .= "$str" . "\r\n";
                $current .= "-------------------------------------\r\n";
            } else {
                $current = "$str" . "\r\n";
                $current .= "-------------------------------------\r\n";
            }
            
            // Write the contents back to the file
            file_put_contents( $file, $current );
        }
    }

    /**
     * Get the settings arry. Non set value is replaced with default value.
     * @return array
     */
    public static function get_form_settings_array() {
        // Initialize the settings keys with default values
        $setting_keys = [
            'double_opt_in_success' => 'Kindly check your inbox to confirm the subscription.',
            'shown_interest_text' => 'Thank you for your interest.',
            'alert_success' => 'Thank you for expressing interest in %product_title%. We will notify you once it is back in stock.',
            'alert_email_exist' => '%customer_email% is already registered for %product_title%.',
            'valid_email' => 'Please enter a valid email address.',
            'alert_unsubscribe_message' => '%customer_email% is successfully unsubscribed.',
            'email_placeholder_text' => 'Enter your email',
            'alert_text' => 'Receive notifications when back in stock.',
            'unsubscribe_button_text' => 'Unsubscribe',
            'alert_text_color' => '', // Default value
            'customize_btn' => [
                'button_text' => 'Notify me',
                'button_background_color' => '', // Default value
                'button_border_color' => '', // Default value
                'button_text_color' => '', // Default value
                'button_background_color_onhover' => '', // Default value
                'button_text_color_onhover' => '', // Default value
                'button_border_color_onhover' => '', // Default value
                'button_font_size' => '', // Default value
                'button_border_size' => '', // Default value
                'button_border_radious' => '', // Default value
            ],
            'ban_email_domain_text' => 'This email domain is not allowed.',
            'ban_email_address_text' => 'This email address is banned.'
        ];
    
        $form_settings = [];
    
        foreach ( $setting_keys as $setting_key => $default_value ) {
            // Overwrite with actual settings from the database first
            $setting_value = SM()->setting->get_setting( $setting_key, $default_value );

            // Handle arrays separately
            if ( is_array( $setting_value ) ) {
                $form_settings[ $setting_key ] = $setting_value;
            } else {
                // Register string using WPML's icl_register_string function if available
                if ( function_exists( 'icl_register_string' ) ) {
                    icl_register_string( 'woocommerce-stock-manager', $setting_key, $setting_value );
                }

                // Translate string if WPML is active
                if ( function_exists( 'icl_t' ) ) {
                    $setting_value = icl_t( 'woocommerce-stock-manager', $setting_key, $setting_value );
                }

                // Store the processed string value
                $form_settings[ $setting_key ] = $setting_value;
            }
        }
        return $form_settings;
    }
    /**
     * Check pro plugin is acrive or not
     * @return bool
     */
    public static function is_khali_dabba() {
        if ( defined( 'STOCK_MANAGER_PRO_PLUGIN_VERSION' ) ) {
			return SM_PRO()->license->is_active();
		}
    }
}