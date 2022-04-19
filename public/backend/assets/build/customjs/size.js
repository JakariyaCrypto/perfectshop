$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
 $(document).ready( function () {
    $('#datatable').DataTable();
} );
//show size table data
	show_sizes();
    function show_sizes()
        {
            $.ajax({
                url:'/dashboard/size/shows',
                type:'get',
                dataType:'JSON',
                success:function(data){
                    var i = 1;
                    $('.size_show').html('');
                    jQuery.each(data.sizes,function(key,item){
                        if (item.status == 'active') {
									

                        var checked = '<input type="checkbox" value="'+item.id+'" id="size_inactive" checked>';
                        }else if(item.status == 'inactive'){
                            var checked = '<input type="checkbox" value="'+item.id+'" id="size_active">';
                        }
                        // alert('uploads'+'/'+item.image);
                        $('.size_show').append(
                           '<tr>\
	                          <td>#</td>\
	                          <td>\
	                            <a>'+item.size+'</a>\
	                            <br />\
	                          </td>\
	                          <td>\
	                            <div class="main_switch">\
	                              '+checked+'\
	                            </div>\
	                          </td>\
	                          <td>\
	                            <button value="'+item.id+'" class="btn btn-primary btn-sm size_edit_btn"><i class="fa fa-pencil"></i> Edit </button>\
	                            <button value="'+item.id+'" class="btn btn-danger btn-sm size_del_btn"><i class="fa fa-trash-o"></i> Delete </button>\
	                          </td>\
                        </tr>'
	                    );
                    });
                }
            });

        } //end size table data

$('#sizeForm').submit(function(e){
	e.preventDefault();

	let formData = new FormData($('#sizeForm')[0]);
	$.ajax({
		type:'POST',
		url:'/dashboard/size/store',
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
				$('#sizeForm').find('input:text').val('');
				$('#sizeForm').find('input:file').val('');
					 $('#sizeModal').modal('hide');
					 show_sizes();
				$('#succes').html('<div class="alert alert-success"><span>'+success.msg+'</span></div>');
			}
		}
	}); // size insert

});

// size edit
	$(document).on('click','.size_edit_btn',function(e){
		e.preventDefault();
		var id = $(this).val();
		// alert(cat_id);
		$('#sizeEditModal').modal('show');
		$.ajax({
			url:'/dashboard/edit/size/'+id,
			type:'get',
			success:function(data){
				// console.log(data);
				if (data.status == 'success') {

					$('#size_id').val(data.sizeEdit.id);
					$('#size').val(data.sizeEdit.size);
					
				}else{
					// alert(data.msg);
					$('#sizeEditModal').modal('hide');
				}
			}
		});
	}); // end edit size


//size update 
$('#sizeUpdateForm').submit(function(e){
	e.preventDefault();
	var id = $('#size_id').val();
	let updatFormData = new FormData($('#sizeUpdateForm')[0]);

	$.ajax({
		type:'post',
		url:'/dashboard/size/update/'+id,
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
				$('#sizeUpdateForm').find('input:text').val('');
				$('#sizeEditModal').modal('hide');
				show_sizes();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
			}	
		}
	});
});//size update


// size delete modal show
$(document).on('click','.size_del_btn', function(e){
	e.preventDefault();
	var id = $(this).val();
	$('#size_del_id').val(id);
	$('#sizeDelModal').modal('show');
});
//end size delete modal show



//size delete 
$(document).on('click','#size_conform_del_btn',function(e){
	e.preventDefault();
	var id = $('#size_del_id').val();

	$.ajax({
		type:'get',
		url:'/dashboard/del/size/'+id,
		dataType:'JSON',
		success:function(data){
			// console.log(data);
			if (data.status == 'success') {
				$('#sizeDelModal').modal('hide');
				show_sizes();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
			}
		}
	});
}); // end size delete

//size Inactive
 $(document).on('click','#size_inactive',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/inactive/size/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_sizes();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end size Inactive


//size Inactive
 $(document).on('click','#size_active',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/active/size/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_sizes();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end size Inactive