$("#contactUsForm").on('submit', function(event){
	
    event.preventDefault();
	
	var serialized = $(this).serialize();

    $("#contactUsForm").css('opacity', 0.5);
    $(".btn-type").attr("disabled", true);
    jQuery.ajax({
        type : "post",
        dataType : "json",
        url : ajaxurl,
        data : serialized,
        success: function(response) {

            $("#contactUsForm").css('opacity', 1);
            $(".btn-type").removeAttr("disabled");

            if(response.status == 200){
				$('#contactUsForm')[0].reset();
			}

            $('.feedback-message').html(response.message);

        }
    });

});