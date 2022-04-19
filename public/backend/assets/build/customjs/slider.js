$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
 $(document).ready( function () {
    $('#datatable').DataTable();
} );
//show category table data
	show_sliders();
    function show_sliders()
        {
            $.ajax({
                url:'/dashboard/slider/shows',
                type:'get',
                dataType:'JSON',
                success:function(data){
                    var i = 1;
                    $('.slider_show').html('');
                    jQuery.each(data.sliders,function(key,item){
                        if (item.status == 'active') {
									

                        var checked = '<input type="checkbox" value="'+item.id+'" id="slider_inactive" checked>';
                        }else if(item.status == 'inactive'){
                            var checked = '<input type="checkbox" value="'+item.id+'" id="slider_active">';
                        }
                        // alert('uploads'+'/'+item.image);
                        $('.slider_show').append(
                           '<tr>\
                                  <td>#</td>\
                                  <td>\
                                    <a>'+item.title+'</a>\
                                    <br />\
                                  </td>\
                                  <td>\
                                    <a>'+item.price+'</a>\
                                    <br />\
                                  </td>\
                                  <td>\
                                    <a>'+item.short_desc+'</a>\
                                    <br />\
                                  </td>\
                                  <td>\
                                    <img style="width:100%;height:50px" src="../'+item.image+'" alt="Avatar">\
                                    </ul>\
                                  </td>\
                                  <td>\
                                    <div class="main_switch">\
                                      '+checked+'\
                                    </div>\
                                  </td>\
                                  <td>\
                                    <a>'+item.btn_name+'</a>\
                                    <br />\
                                  </td>\
                                  <td>\
                                    <button value="'+item.id+'" class="btn btn-primary slider_edit_btn"><i class="fa fa-pencil"></i> Edit </button>\
                                    <button value="'+item.id+'" class="btn btn-danger btn-sm slider_del_btn"><i class="fa fa-trash-o"></i> Delete </button>\
                                  </td>\
                                </tr>'
	                    );
                    });
                }
            });

        } //end activity table data

$('#sliderForm').submit(function(e){
	e.preventDefault();

	let formData = new FormData($('#sliderForm')[0]);
	$.ajax({
		type:'POST',
		url:'/dashboard/slider/store',
		data:formData,
		contentType:false,
		processData:false,
		cache:false,
		success: function(success){
			if (success.status == 'errors') {
				$.each(success.errors,function(key,val){
					$('#'+key+'_error').html('<div class="alert alert-warning"><span>'+val[0]+'</span></div>');
				});
			}else if (success.status == 'success') {
				$('#sliderForm').find('input:text').val('');
				$('#sliderForm').find('input:file').val('');
					 $('#sliderModal').modal('hide');
					 show_sliders();
				$('#succes').html('<div class="alert alert-success"><span>'+success.msg+'</span></div>');
			}
		}
	}); // slider insert

});

// slider edit
	$(document).on('click','.slider_edit_btn',function(e){
		e.preventDefault();
		var id = $(this).val();
		// alert(cat_id);
		$('#sliderEditModal').modal('show');
		$.ajax({
			url:'/dashboard/edit/slider/'+id,
			type:'get',
			success:function(data){
				// console.log(data);
				if (data.status == 'success') {

					$('#update_id').val(data.sliderEdit.id);
					$('#title').val(data.sliderEdit.title);
					$('#btn_name').val(data.sliderEdit.btn_name);
					if (data.sliderEdit.image) {
						$('#update_image').attr('src','../'+data.sliderEdit.image );
						$('#update_image').css('width','40%','height','100px');
					}
					$('#short_desc').val(data.sliderEdit.short_desc);
					
					$('#price').val(data.sliderEdit.price);

					$('#short_desc').val(data.sliderEdit.short_desc);
					
					
					// $('#desc').val(data.activityEdit.desc);
					
					
				}else{
					// alert(data.msg);
					$('#sliderEditModal').modal('hide');
				}
			}
		});
	}); // end edit activity


//slider update 
$('#sliderUpdateForm').submit(function(e){
	e.preventDefault();
	var id = $('#update_id').val();
	let updatFormData = new FormData($('#sliderUpdateForm')[0]);

	$.ajax({
		type:'post',
		url:'/dashboard/slider/update/'+id,
		data: updatFormData,
		contentType:false,
		processData:false,
		success:function(data){
			// console.log(data);
			if (data.status == 'error') {
				jQuery.each(data.error,function(key,val){
					$('#'+key+'_update_error').html('<div class="alert alert-danger" role="alert">'+val[0]+'</div>');
				});
			}else if (data.status == 'success') {
				$('#sliderUpdateForm').find('input:text').val('');
				$('#sliderUpdateForm').find('input:file').val('');
				$('#sliderEditModal').modal('hide');
				show_sliders();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
			}	
		}
	});
});//slider update


// slider delete modal show
$(document).on('click','.slider_del_btn', function(e){
	e.preventDefault();
	var id = $(this).val();
	$('#slider_del_id').val(id);
	$('#sliderDelModal').modal('show');
});
//end slider delete modal show



//slider delete 
$(document).on('click','#slider_conform_del_btn',function(e){
	e.preventDefault();
	var id = $('#slider_del_id').val();

	$.ajax({
		type:'get',
		url:'/dashboard/del/slider/'+id,
		dataType:'JSON',
		success:function(data){
			// console.log(data);
			if (data.status == 'success') {
				$('#sliderDelModal').modal('hide');
				show_sliders();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
			}
		}
	});
}); // end slider delete

//slider Inactive
 $(document).on('click','#slider_inactive',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/inactive/slider/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_sliders();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end slider Inactive


//slider Inactive
 $(document).on('click','#slider_active',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/active/slider/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_sliders();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end slider Inactive