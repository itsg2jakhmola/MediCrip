function swapConfig(x) {
	var medCrip = '';
    var medCrip = document.getElementsByName(x.name);
    for(i = 0 ; i < medCrip.length; i++){
     document.getElementById(medCrip[i].id.concat("Settings")).style.display="none";
    }
    document.getElementById(x.id.concat("Settings")).style.display="initial";
  }

 function show(event) {
 	document.getElementById(event.target.id.concat("Setting")).style.display = 'block'; 
 }

 function hide(event) { 
 	document.getElementById(event.target.id.concat("Setting")).style.display = 'none'; 
 }


 function showLogin(event) {
 	
 	var elems = document.getElementsByClassName(event.target.className.concat("Setting"));
 	for (var i=0;i<elems.length;i+=1){
	  elems[i].style.display = 'block';
	} 
 }
   $("#address, #doctor_address, #pharmacy_address").geocomplete({
              details: ".geo-details",
              detailsAttribute: "data-geo",
            });   


	  $("#address, #doctor_address, #pharmacy_address")
	    .geocomplete()
	    .bind("geocode:result", function (event, result) {            
	      $("#latitude, #doctor_latitude, #pharmacy_latitude").val(result.geometry.location.lat());
	      $("#longitude, #doctor_longitude, #pharmacy_longitude").val(result.geometry.location.lng());
	      /*console.log(result);*/
	  });

	$('#dob').datepicker({
	    dateFormat: 'dd-mm-yy', 
	    autoclose: true,
	    todayHighlight: true
	}); 

	$('#scan_dt').datepicker({
	    dateFormat: 'dd-mm-yy', 
	    autoclose: true,
	    todayHighlight: true
	}); 


	// CSRF protection
$.ajaxSetup({
	headers : {
		'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
	}
});

// Handle notification bell
$(".nlist").on('click', function(e) {
	e.stopPropagation();
	var $ncount = $('a.ncount');

	if ($ncount.data('ncount') > 0)
	{
		$.post(base_url + '/api/user/shownotifications', function(response)
		{
			if (response.code == 0)
			{
				$ncount.data('ncount', 0);
				$ncount.find('span').text(0);
			}
		});
	}
	var $this = $(this), $nscroll = $this.find('.nscroll');
	if (!$nscroll.is(':visible'))
	{
		$nscroll.show();
	} else
	{
		$nscroll.hide();
	}
	$('.nscroll').addClass('nw-nscroll');
});

$(document).on('click', function(e) {
	e.stopPropagation();
	if (!$(e.target).closest('.nw-nscroll').length)
	{
		$('.nw-nscroll').hide();
	}
});

// Notifications list
$.getJSON(base_url + '/api/user/notifications?page=1', function(data) {
	$ul = $('ul.nscroll');
	$ul.append(data.notificationsHTML);
	$ul.data({
		'total' : data.total,
		'nextPage' : data.nextPage,
	});
	$('a.ncount').data('ncount', data.unread);
	$('a.ncount > span').text(data.unread);
});

// Handle notification list scroll
$('ul.nscroll').scroll(function(e) {
	if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
		var $this = $(this), url = $this.data('nextPage');

		if (url == null)
			return;

		$.getJSON(url, function(data) {
			$ul = $this;
			$ul.append(data.notificationsHTML);
			$ul.data({
				'total' : data.total,
				'nextPage' : data.nextPage,
			});
		});
	}
});

// Handle click on a single notification
$('ul.nscroll').on('click', 'li', function(e) {
	var $this = $(this), nid = $this.data('nid');
	$.post(base_url + '/api/user/readnotification', {
		nid : nid
	}, function(response) {
		if (response.code == 0) {
			// mark as read
			if ($this.hasClass('unread'))
				$this.removeClass('unread');

			// handle message read
			var data = response.data;
			if (data.callback == 'url') {
				window.location.href = data.url;
			} else {
				var content = '<div class="wpopup" style="position: relative; background: #FFF; padding: 30px; width: auto; max-width: 620px; margin: 20px auto; text-align: center;">' + data.content + '</div>';
				$.magnificPopup.open({
					items : {
						src : content,
						type : 'inline'
					}
				});
			}
		}
	});
});