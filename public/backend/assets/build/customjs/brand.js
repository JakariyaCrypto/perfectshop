$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
 $(document).ready( function () {
    $('#datatable').DataTable();
} );
//show category table data
	show_brands();
    function show_brands()
        {
            $.ajax({
                url:'/dashboard/brand/shows',
                type:'get',
                dataType:'JSON',
                success:function(data){
                    var i = 1;
                    $('.brand_show').html('');
                    jQuery.each(data.brands,function(key,item){
                        if (item.status == 'active') {
									

                        var checked = '<input type="checkbox" value="'+item.id+'" id="brand_inactive" checked>';
                        }else if(item.status == 'inactive'){
                            var checked = '<input type="checkbox" value="'+item.id+'" id="brand_active">';
                        }
                        // alert('uploads'+'/'+item.image);
                        $('.brand_show').append(
                           '<tr>\
                                  <td>#</td>\
                                  <td>\
                                    <a>'+item.name+'</a>\
                                    <br />\
                                  </td>\
                                  <td>\
                                    <a>'+item.slug+'</a>\
                                    <br />\
                                  </td>\
                                  <td>\
                                    <img style="width:50%;height:50px" src="../'+item.image+'" alt="Avatar">\
                                    </ul>\
                                  </td>\
                                  <td>\
                                    <div class="main_switch">\
                                      '+checked+'\
                                    </div>\
                                  </td>\
                                  <td>\
                                    <button value="'+item.id+'" class="btn btn-primary brand_edit_btn"><i class="fa fa-pencil"></i> Edit </button>\
                                    <button value="'+item.id+'" class="btn btn-danger btn-sm brand_del_btn"><i class="fa fa-trash-o"></i> Delete </button>\
                                  </td>\
                                </tr>'
	                    );
                    });
                }
            });

        } //end activity table data

$('#brandForm').submit(function(e){
	e.preventDefault();

	let formData = new FormData($('#brandForm')[0]);
	$.ajax({
		type:'POST',
		url:'/dashboard/brand/store',
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
				$('#brandForm').find('input:text').val('');
				$('#brandForm').find('input:file').val('');
					 $('#brandModal').modal('hide');
					 show_brands();
				$('#succes').html('<div class="alert alert-success"><span>'+success.msg+'</span></div>');
			}
		}
	}); // brand insert

});

// brand edit
	$(document).on('click','.brand_edit_btn',function(e){
		e.preventDefault();
		var id = $(this).val();
		// alert(cat_id);
		$('#brandEditModal').modal('show');
		$.ajax({
			url:'/dashboard/edit/brand/'+id,
			type:'get',
			success:function(data){
				// console.log(data);
				if (data.status == 'success') {

					$('#update_id').val(data.brandEdit.id);
					$('#name').val(data.brandEdit.name);
					// $('#desc').val(data.activityEdit.desc);
					if (data.brandEdit.image) {
						$('#image').attr('src','../'+data.brandEdit.image );
					}
					
				}else{
					// alert(data.msg);
					$('#brandEditModal').modal('hide');
				}
			}
		});
	}); // end edit activity


//brand update 
$('#brandUpdateForm').submit(function(e){
	e.preventDefault();
	var id = $('#update_id').val();
	let updatFormData = new FormData($('#brandUpdateForm')[0]);

	$.ajax({
		type:'post',
		url:'/dashboard/brand/update/'+id,
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
				$('#brandUpdateForm').find('input:text').val('');
				$('#brandUpdateForm').find('input:file').val('');
				$('#brandEditModal').modal('hide');
				show_brands();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
			}	
		}
	});
});//brand update


// brand delete modal show
$(document).on('click','.brand_del_btn', function(e){
	e.preventDefault();
	var id = $(this).val();
	$('#brand_del_id').val(id);
	$('#brandDelModal').modal('show');
});
//end brand delete modal show



//brand delete 
$(document).on('click','#conform_del_btn',function(e){
	e.preventDefault();
	var id = $('#brand_del_id').val();

	$.ajax({
		type:'get',
		url:'/dashboard/del/brand/'+id,
		dataType:'JSON',
		success:function(data){
			// console.log(data);
			if (data.status == 'success') {
				$('#brandDelModal').modal('hide');
				show_brands();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
			}
		}
	});
}); // end brand delete

//brand Inactive
 $(document).on('click','#brand_inactive',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/inactive/brand/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_brands();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end brand Inactive


//brand Inactive
 $(document).on('click','#brand_active',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/active/brand/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_brands();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end brand Inactive