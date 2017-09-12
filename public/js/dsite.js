$( function() {
	$( "#appointment_date_edit" ).datepicker();
	$( "#appointment_date" ).datepicker();
    $("#pickup_date").datepicker({
    	dateFormat: 'dd-mm-yy'
    });
   

 $('.replydoctor').click(function(){

 	$(".replydoctorSetting").css('display', 'block');
 	
 });

});

