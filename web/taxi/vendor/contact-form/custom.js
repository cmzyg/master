jQuery(document).ready(function(){
	
	if(jQuery("#contact-site-form").length > 0){
        // Validate the contact form
        jQuery('#contact-site-form').validate({
	
            // Add requirements to each of the fields
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 10
                }
            },
		
            messages: {
                name: {
                    required: "Please enter your name.",
                    minlength: jQuery.format("At least {0} characters required.")
                },
                email: {
                    required: "Please enter your email.",
                    email: "Please enter a valid email."
                },
                message: {
                    required: "Please enter a message.",
                    minlength: jQuery.format("At least {0} characters required.")
                }
            },
		
            submitHandler: function(form) {
                jQuery("#submit-contact").attr("value", "Sending...");
                jQuery(form).ajaxSubmit({
                    success: function(responseText, statusText, xhr, $form) {
                        jQuery("#response").html(responseText).hide().slideDown("fast");
                        jQuery("#submit-contact").attr("value", "Send it");
                        jQuery(form).find("input[type=text]").val('');
                        jQuery(form).find("input[type=email]").val('');
                        jQuery(form).find("input[type=url]").val('');
                        jQuery(form).find("textarea").val('');
                    }
                });
                return false;
            }
        });
    }
});