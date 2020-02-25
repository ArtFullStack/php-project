$(function(){

	$('#sing').on('click', function(){
		$('.register').fadeToggle(200);
		$('.login').hide();
		$('.forgot_password_form').hide();
	})

	$('#login').on('click', function(){
		$('.login').fadeToggle(200);
		$('.register').hide();
		$('.forgot_password_form').hide();
	})
	
	$('.forgot').on('click', function(){
		$('.forgot_password_form').fadeToggle(200);
		$('.login').hide();
	})

	if ($('.error_msg').html() || $('.send_msg').html()) {
		$('.forgot_password_form').fadeIn()
	}

	$(".close").on('click', function(){
		$(this).parent().fadeOut(200);
	})


	if (!$('.error_email').html()) {
		$('.login').hide();
	}
	else{
		$('.login').show();
	}

	if (!$('.error1').html() && !$('.error2').html() && !$('.error3').html() && !$('.error4').html() && !$('.error5').html() && !$('.info').html()) {
		$('.register').hide();
	}
	else{
		$('.register').show();
	}

	$('.delete_button').on('click', function(){
		var data = $(this).next('a').children('img').attr('data');
		$(this).parent('.extra').addClass('delete');
		$('.yes').on('click', function(){
			$.ajax({
				'url': '../upload_image_gallery.php',
				'type': 'get',
				'dataType': 'html',
				'data': {img:data},
				success: function(response){
					console.log(response)
				}
			})
			$('.delete').remove();
		})
		$('.no').on('click',function(){
			$('.delete').removeClass('delete');
		})
	})


	$('.add').on('click', function(){
		$('.form_blog').slideToggle(600);
	})
	$('.update').on('click', function(){
		$(this).next('.form_update_blog').slideToggle(600);
	})

	$('.toggle_user_info').on('click', function(){
		$('.user_info').slideToggle(500);
	})
	$('.photo_info').on('click', function(){
		$('.user_photo').slideToggle(500);
	})

	$('#search').on('input', function(){
		$('.box_result').remove();
		var value = $(this).val();

		$.ajax({
			url: 'search.php',
			type: 'get',
			dataType: 'html',
			data: {value:value},
			success: function(response){
				$('.search_result').append(response);

				$('.box_result').on('click', function(){
					var data = $(this).attr('data');
					$(this).children('a').attr('href', 'view_user_page.php?id='+data);
				})
			}
		})

	})

	$('.change_password').on('click', function(){
		$('.change_password_form').slideToggle(500);
		
	})
	if ($('.error_match').html() || $('.done_change').html()){
			$('.change_password_form').fadeIn();
		}




})
