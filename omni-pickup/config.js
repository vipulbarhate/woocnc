
jQuery( document ).ready(function() {


jQuery(document).on("click", ".shipping_method" , function() {

	if(jQuery(this).val() == 'omniplus0' || jQuery(this).val() == 'omniplus')
{
	jQuery('#omni-shipping-pickup-store').show();
	
	jQuery('#shipping_city').val('Manila');
}
else
{
	jQuery('#omni-shipping-pickup-store').hide();
}

	
           // alert(jQuery(this).val());
        });


	
});






/*
    jQuery( function($){
        var a = 'input[name^="shipping_method"]', b = a+':checked',
            c = 'distance_rate_shipping',
            d = '#e_deliverydate_field,#time_slot_field';

        // Utility function that show or hide the delivery date
        function showHideDeliveryDate(){
            if( $(b).val() == c )
                $(d).show();
            else
                $(d).hide('fast');
            console.log('Chosen shipping method: '+$(b).val()); // <== Just for testing (to be removed)
        }

        // 1. On start
        showHideDeliveryDate();

        // 2. On live event "change" of chosen shipping method
        $('form.checkout').on('change', a, function(){
            showHideDeliveryDate();
        });
    });

*/

