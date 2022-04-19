///csrf token cache out
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

//registration
  jQuery('#contactForm').submit(function(e){
    e.preventDefault();
    $('#success_msg').html('Please Waiting....');
    jQuery('.field_error').html('');
    jQuery.ajax({
      url:'/contact-store',
      data:jQuery('#contactForm').serialize(),
      type:'post',
      success:function(result){
        if (result.status == 'errors') {
          jQuery.each(result.errors,function(key,val){
            $('.'+key+'_error').html('<div class="alert alert-danger" role="alert"><span>'+val[0]+'</span></div>');
          });
        }
        if (result.status == 'success') {
          jQuery('#contactForm')[0].reset();
            $('.success').html('<div class="alert alert-success" role="alert"><span>'+result.msg+'</span></div>');

        }
      }
    });
  });