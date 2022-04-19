$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


// admin login
$('#admin_login').submit(function(e){
	e.preventDefault()
	let formData = $("#admin_login").serialize();
	// alert(formData);
	$.ajax({
		type: 'post',
		url:'/auth/check-login',
		data: formData,
		success:function(result){
			if(result.status == 'errors'){
				$.each(result.errors, function(key,val){
					$('#'+key+'_error').html('<div class="alert alert-danger"><span>'+val[0]+'</span></div>');
				});
			}
			if(result.status == 'danger'){
				$('#danger').html('<div class="alert alert-danger"><span>'+result.msg+'</span></div>')
			}

			if(result.status == 'admin'){
				window.location.href = '/admin/dashboard'
			}
			if(result.status == 'genaral_admin'){
				window.location.href = '/general-admin/dashboard'
			}
			if(result.status == 'developer'){
				window.location.href = '/developer/dashboard'
			}
			

		}

	});

})	