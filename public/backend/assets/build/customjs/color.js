$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
 $(document).ready( function () {
    $('#datatable').DataTable();
} );
//show color table data
	show_colors();
    function show_colors()
        {
            $.ajax({
                url:'/dashboard/color/shows',
                type:'get',
                dataType:'JSON',
                success:function(data){
                    var i = 1;
                    $('.color_show').html('');
                    jQuery.each(data.colors,function(key,item){
                        if (item.status == 'active') {
									

                        var checked = '<input type="checkbox" value="'+item.id+'" id="color_inactive" checked>';
                        }else if(item.status == 'inactive'){
                            var checked = '<input type="checkbox" value="'+item.id+'" id="color_active">';
                        }
                        // alert('uploads'+'/'+item.image);
                        $('.color_show').append(
                           '<tr>\
	                          <td>#</td>\
	                          <td>\
	                            <a>'+item.color+'</a>\
	                            <br />\
	                          </td>\
	                          <td>\
	                            <div class="main_switch">\
	                              '+checked+'\
	                            </div>\
	                          </td>\
	                          <td>\
	                            <button value="'+item.id+'" class="btn btn-primary btn-sm color_edit_btn"><i class="fa fa-pencil"></i> Edit </button>\
	                            <button value="'+item.id+'" class="btn btn-danger btn-sm color_del_btn"><i class="fa fa-trash-o"></i> Delete </button>\
	                          </td>\
                        </tr>'
	                    );
                    });
                }
            });

        } //end color table data
// insert color
$('#colorForm').submit(function(e){
	e.preventDefault();

	let formData = new FormData($('#colorForm')[0]);
	$.ajax({
		type:'POST',
		url:'/dashboard/color/store',
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
				$('#colorForm').find('input:text').val('');
				$('#colorModal').modal('hide');
					 show_colors();
				$('#succes').html('<div class="alert alert-success"><span>'+success.msg+'</span></div>');
			}
		}
	}); // color insert

});

// color edit
	$(document).on('click','.color_edit_btn',function(e){
		e.preventDefault();
		var id = $(this).val();
		// alert(cat_id);
		$('#colorEditModal').modal('show');
		$.ajax({
			url:'/dashboard/edit/color/'+id,
			type:'get',
			success:function(data){
				// console.log(data);
				if (data.status == 'success') {

					$('#color_id').val(data.colorEdit.id);
					$('#color').val(data.colorEdit.color);
					
				}else{
					// alert(data.msg);
					$('#colorEditModal').modal('hide');
				}
			}
		});
	}); // end edit color


//color update 
$('#colorUpdateForm').submit(function(e){
	e.preventDefault();
	var id = $('#color_id').val();
	let updatFormData = new FormData($('#colorUpdateForm')[0]);

	$.ajax({
		type:'post',
		url:'/dashboard/color/update/'+id,
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
				$('#colorUpdateForm').find('input:text').val('');
				$('#colorEditModal').modal('hide');
				show_colors();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
			}	
		}
	});
});//color update


// color delete modal show
$(document).on('click','.color_del_btn', function(e){
	e.preventDefault();
	var id = $(this).val();
	$('#color_del_id').val(id);
	$('#colorDelModal').modal('show');
});
//end color delete modal show



//color delete 
$(document).on('click','#color_conform_del_btn',function(e){
	e.preventDefault();
	var id = $('#color_del_id').val();

	$.ajax({
		type:'get',
		url:'/dashboard/del/color/'+id,
		dataType:'JSON',
		success:function(data){
			// console.log(data);
			if (data.status == 'success') {
				$('#colorDelModal').modal('hide');
				show_colors();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
			}
		}
	});
}); // end color delete

//color Inactive
 $(document).on('click','#color_inactive',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/inactive/color/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_colors();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end color Inactive


//color Inactive
 $(document).on('click','#color_active',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/active/color/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_colors();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end color Inactive