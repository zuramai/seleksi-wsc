<?php
/**
 * Plugin Name: Plugin Works!
 * Description: The plugin is working
 * 
 */

add_action('admin_menu', 'init_menu');
function init_menu() {
    add_menu_page("Plugin Works",'Plugin Works', 'manage_options','plugin-works','settings_html');
}
function notification() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?= "Plugin Works!" ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'notification' );
function date_callback() {
    $date = esc_attr(get_option('the_date'));
    ?>
  <input type="date" name="the_date" value="<?= $date ?>">  
<?php }

function settings_html() { ?>
<?php }
?>