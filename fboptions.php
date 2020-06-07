<?php
//add check for updates and type an alert
  function check_update($string){
  	return'display:none;';
  }




// create custom plugin settings menu
add_action('admin_menu', 'FASTLIB_plugin_create_menu');

function FASTLIB_plugin_create_menu() {

	//create new top-level menu
	add_menu_page('FASTLIB Plugin Settings', 'FASTLIB Settings', 'administrator', __FILE__, 'FASTLIB_plugin_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_FASTLIB_plugin_settings' );
}


function register_FASTLIB_plugin_settings() {
	//register our settings
	register_setting( 'FASTLIB-plugin-settings-group', 'bootstrap' );
	register_setting( 'FASTLIB-plugin-settings-group', 'jquery' );
	register_setting( 'FASTLIB-plugin-settings-group', 'FontAwesome' );
}

function FASTLIB_plugin_settings_page() {
?>
<div class="wrap">
<h1>FASTLIB:</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'FASTLIB-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'FASTLIB-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">bootstrap </th>
        <td><?
echo $html = '<input type="checkbox" id="checkbox_example" name="bootstrap" value="1"' . checked( 1, get_option('bootstrap'), false ) . '/>';
?>

        </td>
        </tr>
         
        <tr valign="top">
        <th scope="row">jquery</th>
        <td><?
echo $html = '<input type="checkbox" id="checkbox_example" name="jquery" value="1"' . checked( 1, get_option('jquery'), false ) . '/>';
?>
        </tr>
        
        <tr valign="top">
        <th scope="row">Font Awesome
</th>

        <td><input type="checkbox" name="FontAwesome" style="" value="<?
echo $html = '<input type="checkbox" id="checkbox_example" name="FontAwesome" value="1"' . checked( 1, get_option('FontAwesome'), false ) . '/>';
?></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php
  } ?>