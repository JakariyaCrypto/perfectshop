//update product staus

$('#chageOrderStatus').submit(function(e){
	e.preventDefault();
	
	$.ajax({
      url:'/update/order-status',
      data:jQuery('#chageOrderStatus').serialize(),
      type:'post',
      success:function(result){
      	window.location.href = window.location.href; 
        if (result.status == 'success') {
          jQuery('#chageOrderStatus')[0].reset();
            $('#success_msg').html('<div class="alert alert-success" role="alert"><span>'+result.msg+'</span></div>');
        }
      }
    });
});