<?php
/**
 * Plugin Name: Alphabetical Index Without Accent for Glossary by Codeat
 * Plugin URI: https://njohnson.pro/plugins/aiwa-glossary
 * Description: Provides the shortcode [aiwa-list] for Glossary by Codeat to display alphabetical index without the characters with accent.
 * Version: 1.0
 * Author: Nicolas Johnson
 * Author URI: https://njohnson.pro
 * License: GPL2
 */

 // Add Shortcode that displays the alphabetical index without the accents
function aiwa_sc_alphabetical_index() {
    $characters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $param = $_GET['az'];
    ?>

    <div class="glossary-alphabetical-index">
        <ul>
            <?php foreach ($characters as $value) { ?>
                <li <?php if ($param == $value) { echo 'class="aiwa__active--term"'; } ?>>
                    <a href="<?php echo get_post_type_archive_link( 'glossary' ); ?>?az=<?php echo $value; ?>"><?php echo $value; ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php }
add_shortcode( 'aiwa-list', 'aiwa_sc_alphabetical_index' );

// Enqueue stylesheet
function enqueue_main_styles() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'main-style',  $plugin_url . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_main_styles' );
