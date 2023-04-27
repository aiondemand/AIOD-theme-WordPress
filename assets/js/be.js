function submitCampaigns(){
    var formData=new FormData(document.getElementById("newsletterForm"));
    $.ajax({
        url: "processor.php",
        type: "POST",
        data: formData,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if(data.success==true){
                $(".warning-success p").html(data.message)
                $(".warning-success").show();
                $("#newsletterForm").hide();
            }else{
                $(".warning-error p").html(data.message)
                $(".warning-error").show();
            }
        }
    });

    return false;
}
