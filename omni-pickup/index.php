<?php
/*
Plugin Name: Omnirio Click and Collect
Plugin URI: pick up plugin with settings page.
Description:Omnirio Click and Collect allows WooCommerce Store Owners to provide option to their customer to also collect their orders from a specific location - either a store or a warehouse or other pick-up locations as well as link it up to Omnirio where they can manage both click and collect orders and delivery orders with real time inventory across all the locations to provide frictionless shopping experience to their clients.
Version: 1.0.0
Author: Vipul Barhate
Author URI: 
License: GPL2
*/


function create_omniposttype() {
 
    register_post_type( 'omni_pickup_location',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Pick Up Locations' ),
                'singular_name' => __( 'Pick Up Location' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'omni_pickup_location'),
            'show_in_rest' => true,
 
        )
    );

    $post_type = 'omni_pickup_location';
    remove_post_type_support( $post_type, 'editor');

}


function member_add_meta_box() {
//this will add the metabox for the member post type
$screens = array( 'omni_pickup_location' );

foreach ( $screens as $screen ) {








    add_meta_box(
        'member_sectionid',
        __( 'Pick Up Locations', 'uniquecode' ),
        'member_meta_box_callback',
        $screen
    );
    add_meta_box(
        'member_sectionid',
        __( 'Pick Up Locations', 'country' ),
        'member_meta_box_callback',
        $screen
    );
    add_meta_box(
        'member_sectionid',
        __( 'Pick Up Locations', 'state' ),
        'member_meta_box_callback',
        $screen
    );
    add_meta_box(
        'member_sectionid',
        __( 'Pick Up Locations', 'address1' ),
        'member_meta_box_callback',
        $screen
    );
    add_meta_box(
        'member_sectionid',
        __( 'Pick Up Locations', 'address2' ),
        'member_meta_box_callback',
        $screen
    );
    add_meta_box(
        'member_sectionid',
        __( 'Pick Up Locations', 'city' ),
        'member_meta_box_callback',
        $screen
    );
    add_meta_box(
        'member_sectionid',
        __( 'Pick Up Locations', 'pincode' ),
        'member_meta_box_callback',
        $screen
    );
     add_meta_box(
        'member_sectionid',
        __( 'Pick Up Locations', 'phone' ),
        'member_meta_box_callback',
        $screen
    );
 }
}
add_action( 'add_meta_boxes', 'member_add_meta_box' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function member_meta_box_callback( $post ) {

// Add a nonce field so we can check for it later.
wp_nonce_field( 'member_save_meta_box_data', 'member_meta_box_nonce' );

/*
 * Use get_post_meta() to retrieve an existing value
 * from the database and use the value for the form.
 */
$uniquecode = get_post_meta( $post->ID, 'uniquecode', true );
$country = get_post_meta( $post->ID, 'country', true );
$state = get_post_meta( $post->ID, 'state', true );
$address1 = get_post_meta( $post->ID, 'address1', true );
$address2 = get_post_meta( $post->ID, 'address2', true );
$city = get_post_meta( $post->ID, 'city', true );
$pincode = get_post_meta( $post->ID, 'pincode', true );
$phone = get_post_meta( $post->ID, 'phone', true );

$storeID = get_post_meta( $post->ID, 'storeID', true );
$uid = get_post_meta( $post->ID, 'uid', true );



?>
<div class="inside acf-fields -top">
<div class="acf-field acf-field-text acf-field-609e494b339af" data-name="uniquecode" data-type="text" data-key="field_609e494b339af">
<div class="acf-label">
<label for="acf-field_609e494b339af">Store Id</label></div>
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="os-uniquecode" name="uniquecode" value="<?php echo $uniquecode;?>"></div></div>
</div>
<div class="acf-field acf-field-text acf-field-609cf58edba6e is-required" data-name="country" data-type="text" data-key="field_609cf58edba6e" data-required="1">
<div class="acf-label">
<label for="acf-field_609cf58edba6e">Country <span class="acf-required">*</span></label></div>
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="os-country" name="country" value="<?php echo $country;?>" required="required"></div></div>
</div>
<div class="acf-field acf-field-text acf-field-609cf59ddba6f" data-name="state" data-type="text" data-key="field_609cf59ddba6f">
<div class="acf-label">
<label for="acf-field_609cf59ddba6f">State</label></div>
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="os-state" name="state" value="<?php echo $state;?>"></div></div>
</div>
<div class="acf-field acf-field-text acf-field-609cf5a3dba70" data-name="address1" data-type="text" data-key="field_609cf5a3dba70">
<div class="acf-label">
<label for="acf-field_609cf5a3dba70">Address1</label></div>
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="os-address1" name="address1" value="<?php echo $address1;?>"></div></div>
</div>
<div class="acf-field acf-field-text acf-field-609cf5a8dba71" data-name="address2" data-type="text" data-key="field_609cf5a8dba71">
<div class="acf-label">
<label for="acf-field_609cf5a8dba71">Address2</label></div>
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="os-address2" name="address2" value="<?php echo $address2; ?>"></div></div>
</div>
<div class="acf-field acf-field-text acf-field-609cf5addba72" data-name="city" data-type="text" data-key="field_609cf5addba72">
<div class="acf-label">
<label for="acf-field_609cf5addba72">City</label></div>
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="os-city" name="city" value="<?php echo $city;?>"></div></div>
</div>
<div class="acf-field acf-field-text acf-field-609cf5b3dba73" data-name="pincode" data-type="text" data-key="field_609cf5b3dba73">
<div class="acf-label">
<label for="acf-field_609cf5b3dba73">Pincode</label></div>
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="os-pincode" name="pincode" value="<?php echo $pincode;?>"></div></div>
</div>
<div class="acf-field acf-field-text acf-field-609cf5b8dba74" data-name="phone" data-type="text" data-key="field_609cf5b8dba74">
<div class="acf-label">
<label for="acf-field_609cf5b8dba74">Phone</label></div>
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="os-phone" name="phone" value="<?php echo $phone;?>"></div></div>
</div>

<div class="acf-field acf-field-text acf-field-609cf5b8dba74" data-name="phone" data-type="text" data-key="field_609cf5b8dba74">
<div class="acf-label">
<label for="acf-field_609cf5b8dba74">UID</label></div>
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="os-ui" name="uid" value="<?php echo $uid;?>"></div></div>
</div>


<div class="acf-field acf-field-text acf-field-609cf5b8dba74" data-name="phone" data-type="text" data-key="field_609cf5b8dba74">
<div class="acf-label">
<label for="acf-field_609cf5b8dba74">Store Id</label></div>
<div class="acf-input">
<div class="acf-input-wrap"><input type="text" id="os-storeID" name="storeID" value="<?php echo $storeID;?>"></div></div>
</div>


</div>



<?php


}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
 function member_save_meta_box_data( $post_id ) {

 if ( ! isset( $_POST['member_meta_box_nonce'] ) ) {
    return;
 }

 if ( ! wp_verify_nonce( $_POST['member_meta_box_nonce'], 'member_save_meta_box_data' ) ) {
    return;
 }

 if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
 }

 // Check the user's permissions.
 if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
    }

 } else {

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
 }

 if ( ! isset( $_POST['member_new_field'] ) ) {
    //return;
 }

 $uniquecode = sanitize_text_field( $_POST['uniquecode'] );
 $country = sanitize_text_field( $_POST['country'] );
 $state = sanitize_text_field( $_POST['state'] );
 $address1 = sanitize_text_field( $_POST['address1'] );
 $address2 = sanitize_text_field( $_POST['address2'] );
 $city = sanitize_text_field( $_POST['city'] );
 $pincode = sanitize_text_field( $_POST['pincode'] );
 $phone = sanitize_text_field( $_POST['phone'] );

  $storeID = sanitize_text_field( $_POST['storeID'] );

   $uid = sanitize_text_field( $_POST['uid'] );


 update_post_meta( $post_id, 'uniquecode', $uniquecode );
 update_post_meta( $post_id, 'country', $country );
 update_post_meta( $post_id, 'address1', $address1 );
 update_post_meta( $post_id, 'address2', $address2 );
 update_post_meta( $post_id, 'city', $city );
 update_post_meta( $post_id, 'state', $state );
 update_post_meta( $post_id, 'pincode', $pincode );
  update_post_meta( $post_id, 'phone', $phone );

  update_post_meta( $post_id, 'storeID', $storeID );
  update_post_meta( $post_id, 'uid', $uid );


  
  
}
add_action( 'save_post', 'member_save_meta_box_data' );





add_filter( 'wpt_field_options', 'func_dynamic_populate', 10, 3);
function func_dynamic_populate( $options, $title, $type ){
    switch( $title ){
        case 'country':
            $options = array();
           
           
                $options[] = array(
                    '#value' => "9",
                    '#title' => 'India',
                );
            
            break;
    }
    return $options;
}



// Hooking up our function to theme setup
add_action( 'init', 'create_omniposttype' );



// add Pickup Locations to the Shipping tab sections in WooCommerce settings
	// 	add_filter( 'woocommerce_get_sections_shipping','add_pickup_locations_omni_section' );
		
		
		
	// 	public function add_pickup_locations_omni_section( array $sections ) {

	// 	$sections['pickup_store_locations'] = 'Pickup Locations' );

	// 	return $sections;
	// }
	
	
	
		







      


add_action( 'wp_enqueue_scripts', 'my_plugin_assets' );
function my_plugin_assets() {

if ( is_cart() || is_checkout() ) {
  //  wp_register_style( 'custom-gallery', plugins_url( '/css/gallery.css' , __FILE__ ) );
    wp_register_script( 'custom-pickup', plugins_url( '/config.js' , __FILE__ ),'','', true );

   // wp_enqueue_style( 'custom-gallery' );
    wp_enqueue_script( 'custom-pickup' );
}

  }




function OmniPlus_Shipping_Method() {

if ( ! class_exists( 'OmniPlus_Shipping_Method' ) ) {

class OmniPlus_Shipping_Method extends WC_Shipping_Method {



public function __construct() {

$this->id                 = 'omniplus';

$this->method_title       = __( 'Pick Up Store Plus', 'omniplus' );

$this->method_description = __( 'Custom Shipping Method for Store Pick Up', 'omniplus' );

$this->init();

//$this->enabled = isset( $this->settings['enabled'] ) ? $this->settings['enabled'] : 'yes';
$this->enabled = 'yes';

$this->title = isset( $this->settings['title'] ) ? $this->settings['title'] : __( 'Pick Up Store Plus', 'omniplus' );



//...

$this->method_description = __( 'Custom Shipping Method for Store Pick Up', 'omniplus' );



$this->init();

//...


}

/**
* Init your settings
*
* @access public

* @return void

*/

function init() {

// Load the settings API

$this->init_form_fields();

$this->init_settings();

// Save settings in admin if you have any defined

add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );

}


/**

* Define settings field for this shipping

* @return void

*/


public function calculate_shipping( $package = array() ) {
    $this->add_rate( array(
        'id'    => $this->id . $this->instance_id,
        'label' => $this->title,
        'cost'  => 0,
    ) );
}


function init_form_fields() {

$this->form_fields = array(

'enabled' => array(

'title' => __( 'Enable', 'omniplus' ),

'type' => 'checkbox',

'description' => __( 'Enable this shipping.', 'omniplus' ),

'default' => 'yes'

),




'title' => array(

'title' => __( 'Title', 'omniplus' ),

'type' => 'text',

'description' => __( 'Title to be display on site', 'omniplus' ),

'default' => __( 'Omnirio Shipping', 'omniplus' )

),



'omni_secrete_token' => array(

'title' => __( 'Omnirio Secrete Token', 'omni_secrete_token' ),

'type' => 'text',

'description' => __( 'Required for Omnirio API', 'omni_secrete_token' ),

'default' => __( 'Omnirio Shipping', 'omni_secrete_token' )

),


'omni_api_key' => array(

'title' => __( 'Omnirio API Key', 'omni_api_key' ),

'type' => 'text',

'description' => __( 'Required for Omnirio API', 'omni_api_key' ),

'default' => __( 'Omnirio Shipping', 'omni_api_key' )

),


// 'weight' => array(

// 'title' => __( 'Weight (kg)', 'omniplus' ),

// 'type' => 'number',

// 'description' => __( 'Maximum allowed weight', 'omniplus' ),

// 'default' => 100

// ),


);

}

/**
* This function is used to calculate the shipping cost. Within this function, we can check for weights, dimensions, and other parameters.
*
* @access public
* @param mixed $package
 @return void
*/



}

}

}






add_action( 'woocommerce_shipping_init', 'OmniPlus_Shipping_Method' );

function add_omniplus_shipping_method( $methods ) {

$methods[] = 'OmniPlus_Shipping_Method';
return $methods;
}

add_filter( 'woocommerce_shipping_methods', 'add_omniplus_shipping_method' );



add_action('woocommerce_review_order_after_shipping', 'my_custom_funtionww');
function my_custom_funtionww()
{
//echo $_POST['shipping_method'][0];
    //echo "<pre>";print_r($_POST);
    if($_POST['shipping_method'][0] == 'omniplus0' || $_POST['shipping_method'][0] == 'omniplus')
    {
      

 //$shipping_methods = WC()->shipping->get_shipping_methods();


//echo "<pre>";print_r($shipping_methods);

$omni_shipping = get_option( 'woocommerce_omniplus_settings' ); 
//echo WC_Shipping_Method::get_option("omni_api_key");
      //$website_options = WC_Settings_API::get_form_fields();
     //print_r($free_shipping);
add_filter( 'woocommerce_ship_to_different_address_checked',  '__return_false' );
      
$cart = WC()->cart->get_cart();
 // echo get_field('omni_api_key', 'option');
   $omni_api_key = $omni_shipping['omni_api_key'];
  $omni_secrete_token = $omni_shipping['omni_secrete_token'];
 $omni_title = $omni_shipping['title'];
  $data = array();
foreach( $cart as $cart_item_key => $cart_item ){
  
    $product = $cart_item['data'];
  



  //print_r($product);
    // Now you have access to (see above)...
  
    $product->get_type();
    $product->get_name();
 $product_id = $product->get_sku();
 //$product_quantity = $product->get_quantity();

 $product_quantity =  $cart_item['quantity'];

  $data['skus'][$product_id] = $product_quantity;
    // etc.
    // etc.
  
}
 //print_r($data);
   $payload = json_encode($data);
 



 $url = "https://stg-enabler.omnirio.com/api/v1/marketplaces/get_available_locations";
// Prepare new cURL resource
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
 
// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload),
 'api-token: ' . $omni_secrete_token,
 'smp-id: ' . $omni_api_key)
);
 
// Submit the POST request
   $result = curl_exec($ch);
$resultdata = json_decode($result);
//print_r($resultdata);exit;
 //print_r($resultdata->data->storeOrderDetails);

$addressdata = $resultdata->data->storeOrderDetails;
$uidArray = array();
$k=0;
while($k<count($addressdata))
{


$sellerAddress = $addressdata[$k]->sellerAddress;
 $country = $sellerAddress->addressCountry->name;
$state = $sellerAddress->state;
$address1 = $sellerAddress->address1;
$address2 = $sellerAddress->address2;
$city = $sellerAddress->city;
$zipcode = $sellerAddress->zipcode;
$phone = $sellerAddress->phone;
$uid = $addressdata[$k]->uid;
$storeID = $addressdata[$k]->storeID;
$uidArray[$k] = $uid;

    $existposts = get_posts(array(
    'numberposts'   => -1,
    'post_type'     => 'omni_pickup_location',
    'meta_key'      => 'uid',
    'meta_value'    => $uid
));

   // print_r($existposts);
  $locId = $existposts[0]->ID;

if($locId == '')
{


//print_r($myquery);exit;
//echo "exist?";
    $my_post = array(
  'post_title'    => wp_strip_all_tags( $storeID ),
  'post_content'  => '',
  'post_status'   => 'publish',
  'post_type' => 'omni_pickup_location',
  'post_author'   => 1
);
 
// Insert the post into the database
$locId = wp_insert_post( $my_post );

if (is_wp_error($locId)) {
    $errors = $locId->get_error_messages();
    foreach ($errors as $error) {
        echo "- " . $error . "<br />";
    }
}


}

//echo $locId;
//echo "Id ".$locId;
 $uniquecode = sanitize_text_field( $uid );
 $country = sanitize_text_field( $country );
 $state = sanitize_text_field( $state );
 $address1 = sanitize_text_field( $address1 );
 $address2 = sanitize_text_field( $address2 );
 $city = sanitize_text_field( $city );
 $pincode = sanitize_text_field( $zipcode );
 $phone = sanitize_text_field( $phone );
 $uid = sanitize_text_field($uid);
$storeID = sanitize_text_field($storeID);
 update_post_meta( $locId, 'uniquecode', $uniquecode );
 update_post_meta( $locId, 'country', $country );
 update_post_meta( $locId, 'address1', $address1 );
 update_post_meta( $locId, 'address2', $address2 );
 update_post_meta( $locId, 'city', $city );
 update_post_meta( $locId, 'state', $state );
 update_post_meta( $locId, 'pincode', $pincode );
  update_post_meta( $locId, 'phone', $phone );
update_post_meta( $locId, 'uid', $uid );
update_post_meta($locId,'storeID',$storeID);

 $k++;
}


//print_r($existposts);exit;
    ?>
    <tr><th>Select you store location*</th><td>

<?php


// $rd_args = array(
//  'numberposts'     => -1, // -1 is for all
//   'post_type'       => 'omni_pickup_location', // or 'post', 'page'
//   'orderby'         => 'title', // or 'date', 'rand'
//   'order'       => 'ASC', // or 'DESC'
//     'meta_query' => array(
//         array(
//             'key' => 'uid',
//             'value' => $uidArray,
//             'compare' => 'IN'
//         )
//     )
// );
 
//  $myposts = new WP_Query( $rd_args );


$args = array( 
  'numberposts'     => -1, // -1 is for all
  'post_type'       => 'omni_pickup_location', // or 'post', 'page'
  'orderby'         => 'title', // or 'date', 'rand'
  'order'       => 'ASC', // or 'DESC'
   'meta_query' => array(
        array(
            'key' => 'uid',
            'value' => $uidArray,
            'compare' => 'IN'
        )
    )

);

// Get the posts
$myposts = get_posts($args);
//print_r($uidArray);
//print_r($myposts);
if($myposts && count($uidArray) > 0)   
{
?>
 
<select id="ospickup_location_id" name="ospickup_location_id" style="width:100%;">
 <?php

 


 foreach ($myposts as $mypost):
$postId =  $mypost->ID;
    ?>
<option value="<?php  echo $postId;?>">
    
                <p><?php 

                $uniquecode = get_post_meta( $postId, 'uniquecode', true );
$country = get_post_meta( $postId, 'country', true );
$state = get_post_meta( $postId, 'state', true );
$address1 = get_post_meta( $postId, 'address1', true );
$address2 = get_post_meta( $postId, 'address2', true );
 $city = get_post_meta( $postId, 'city', true );
$pincode = get_post_meta( $postId, 'pincode', true );
$phone = get_post_meta( $postId, 'phone', true );

echo $address1;

                              //  print_r($ospickupstore_city);
                              //echo "<br/>".$address1,", ".$address2.", ".$city.", ".$state.", ".$country.", ".$phone."";?></p></option>
    <?php endforeach; wp_reset_postdata(); ?>
    
 
</select>
 
 <?php
 }
 else
 {
    echo "No location available.";

 }
 ?>  
 




    </td></tr>
    <?php
}
   // echo "vipul";
}
/*
add_action('woocommerce_checkout_before_order_review', 'my_custom_funtion');
function my_custom_funtion(){
    ?>
        <h2>vipul Purchase Disclaimer2</h2>
    <?php
}

*/

add_action('woocommerce_checkout_update_order_meta', 'omni_custom_checkout_field_update_order_meta');

function omni_custom_checkout_field_update_order_meta($order_id)
{
//echo $_POST['shipping_method'][0];
//echo $order_id;print_r($_POST);exit;
    // echo $_POST['ospickup_location_id']; print_r($_POST);

        if($_POST['shipping_method'] != '')
        {

            // echo $_POST['ospickup_location_id']; print_r($_POST);
            if($_POST['shipping_method'] == 'omniplus0' || $_POST['shipping_method'][0] == 'omniplus' || $_POST['shipping_method'] == 'omniplus' || $_POST['shipping_method'][0] == 'omniplus0')
        {
            

            if($_POST['ospickup_location_id'])
            {
                $locationId= $_POST['ospickup_location_id'];
               // $uniquecode =  get_field( "uniquecode", $locationId );
               // $country =  get_field( "country", $locationId );
               // $state =  get_field( "state", $locationId );
               // $address1 =  get_field( "address1", $locationId );
               // $address2 =  get_field( "address2", $locationId );
               // $city =  get_field( "city", $locationId );
               // $pincode =  get_field( "pincode", $locationId );
               // $phone =  get_field( "phone", $locationId );
               // $storeID =  get_field( "storeID", $locationId );
               // $uid =  get_field( "uid", $locationId );



                $uniquecode = get_post_meta( $locationId, 'uniquecode', true );
$country = get_post_meta( $locationId, 'country', true );
$state = get_post_meta( $locationId, 'state', true );
$address1 = get_post_meta( $locationId, 'address1', true );
$address2 = get_post_meta( $locationId ,'address2', true );
 $city = get_post_meta( $locationId, 'city', true );
$pincode = get_post_meta( $locationId, 'pincode', true );
$phone = get_post_meta( $locationId, 'phone', true );

$storeID = get_post_meta( $locationId, 'storeID', true );
$uid = get_post_meta( $locationId, 'uid', true );




                //$uniquecode = '';
                 // exit;
                update_post_meta($order_id, 'ospickupstore_uniquecode', $uniquecode);
                update_post_meta($order_id, 'ospickupstore_country', $country);
                update_post_meta($order_id, 'ospickupstore_state', $state);
                update_post_meta($order_id, 'ospickupstore_address1', $address1);
                update_post_meta($order_id, 'ospickupstore_address2', $address2);
                update_post_meta($order_id, 'ospickupstore_city', $city);
                update_post_meta($order_id, 'ospickupstore_pincode', $pincode);
                update_post_meta($order_id, 'ospickupstore_phone', $phone);
                update_post_meta($order_id, 'ospickupstore_ordertype', 'pickup');
                update_post_meta($order_id, 'ospickupstore_storeID', $storeID);
                update_post_meta($order_id, 'ospickupstore_shippingmethod', 'omniplus');
                update_post_meta($order_id, 'ospickupstore_uid', $uid);

            }
        }
}
//exit;
   // echo "<pre>";print_r($_POST);exit;
        //update_post_meta($order_id, 'pick_up_city', "NYC");
}


add_action( 'woocommerce_before_order_itemmeta',  'outputodershippingpickupdate', 1, 2 );



function outputodershippingpickupdate($item_id, $item)
{

global $post;

$order = wc_get_order( $post );
$orderId = $order->get_id();

//print_r($order);
        if ( empty( $order ) && ! empty( $_POST['order_id'] ) && is_ajax() ) {
            $order = wc_get_order( $_POST['order_id'] );
        }
$options = get_option('plugin_options');

    $shipping_method = isset( $item['method_id'] ) ? $item['method_id'] : null;
    if( 'omniplus' === $shipping_method )
    {
    ?>
    <div
                id="wc-local-pickup-plus-order-shipping-item-pickup-data-<?php echo $item_id; ?>"
                class="wc-local-pickup-plus wc-local-pickup-plus-order-shipping-item-pickup-data view">
                <table
                    class="display_meta">

                    <tbody>

                        <tr>
                            <th><label for="<?php echo 'wc-local-pickup-plus-pickup-location-search-for-item-' . $item_id; ?>"><?php esc_html_e( 'Pickup location:', 'woocommerce-shipping-local-pickup-plus' ); ?></label></th>
                            <td class="pickup-location">
                                <div class="value">
                                    <?php 


                

                                    $ospickupstore_country =  get_post_meta($orderId,"ospickupstore_country");
                                    $ospickupstore_state =  get_post_meta($orderId,"ospickupstore_state");
                                    $ospickupstore_city =  get_post_meta($orderId,"ospickupstore_city");
                                    $ospickupstore_address1 =  get_post_meta($orderId,"ospickupstore_address1");
                                    $ospickupstore_address2 =  get_post_meta($orderId,"ospickupstore_address2");
                                    $ospickupstore_pincode =  get_post_meta($orderId,"ospickupstore_pincode");
                                    $ospickupstore_phone =  get_post_meta($orderId,"ospickupstore_phone");
                                    //print_r($city);
                                    echo $ospickupstore_address1[0].",<br/>";
                                    echo $ospickupstore_address2[0].",<br/>";
                                    echo $ospickupstore_city[0].",<br/>";
                                    echo $ospickupstore_state[0].",<br/>";
                                    echo $ospickupstore_country[0].",<br/>";
                                    echo $ospickupstore_phone[0]."<br/>";
                                   
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
    </div>
    <?php

}
}
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('City').':</strong> <br/>' . get_post_meta( $order->get_id(), 'pick_up_city', true ) . '</p>';
}



add_filter( 'manage_edit-shop_order_columns',  "add_pickupstore_locations_column_header", 20 );
        add_action( 'manage_shop_order_posts_custom_column',  'add_pickupstore_locations_column_content' );

 function add_pickupstore_locations_column_header( $columns ) {

        $new_columns = array();

        foreach ( $columns as $column_name => $column_info ) {

            $new_columns[ $column_name ] = $column_info;

            if ( 'shipping_address' === $column_name ) {

                $new_columns['storepickup_locations'] = "Pick Up at store";
            }
        }

        return $new_columns;
    }


     function add_pickupstore_locations_column_content($column )
    {
        global $post;
        //echo $column;
        if ( 'storepickup_locations' === $column ) {

            $pickup_location_names = [];
            $order                 = wc_get_order( $post->ID );

            //echo $post->ID;
           // echo "pick up";
           $ospickupstore_ordertype =  get_post_meta($post->ID,"ospickupstore_ordertype");
           echo $ospickupstore_ordertype[0];

        }

    }

