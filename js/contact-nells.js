
	// CONTACT FORM
	$('#nellsContactForm').on('submit', function(e){
		e.preventDefault();
		var ajaxurl = my_ajax_object.ajax_url;// from enqueue.php
		var name = $('#name').val();
		var email = $('#email').val();
		var message = $('#message').val();

		if(name=="" || email=="" || message=="")
		{
			console.log('fields required~!');	
			return;
		}
		var form = $('#nellsContactForm');
		form.find('input, button, textarea').attr('disabled','disabled');
		$('.js-form-submit').addClass('js-show-feedback');
		$.ajax({
			url : my_ajax_object.ajax_url,
			type : 'post',
			data : {
				action : "submit_nells_contact",
				name : name, 
				email : email,
				message : message
			}, 
			error : function( response ){
				console.log(response);
				setTimeout(function(){
					$('.js-form-error').addClass('js-show-feedback');
					$('.js-form-submit').removeClass('js-show-feedback');
					form.find('input, button, textarea').removeAttr('disabled','disabled');
				},2000);
			},
			success : function( response ){
				console.log(response);
				if(response ==0)
				{
					setTimeout(function(){
						$('.js-form-error').addClass('js-show-feedback');
						$('.js-form-submit').removeClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled','disabled');
					},2000);
				}
				else{
					setTimeout(function(){
						$('.js-form-success').addClass('js-show-feedback');
						$('.js-form-submit').removeClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled','disabled').val('');
					},2000);
				}
				
			}	
		});
	});