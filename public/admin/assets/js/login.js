$(document).ready(function(){
    $('#loginform').submit(function(e){
     e.preventDefault()
     var form_data = new FormData(this);
     var action_url = $('#loginform').attr('action');
     $.ajax({
         url		: action_url,
         type		: 'post',
         data		: form_data,
         dataType	: 'json',
         processData : false,
         contentType : false,
         cache		: false,
         beforeSend: function () {
             $(".login_btn").html('Please wait...');
             $(".login_btn").prop('disabled', true);
         },
         success : function(response) 
         {
             console.log(response);
             $("#error_msg").show();
             $("#error_msg").addClass(response.alert_class);
             $("#error_msg").text(response.message);
             setTimeout(function(){
                 $('#error_msg').fadeOut();
                 if(response.alert_class == 'alert-success'){
                     window.location.href = response.redirect_url;
                 }else{
                     location.reload();
                 }
             },3000);
         },
         error:	function(data) 
         {
             console.log(response);
         }
     }); 
   });
 });
 