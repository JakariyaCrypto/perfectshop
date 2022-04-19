$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
 $(document).ready( function () {
    $('#datatable').DataTable();
} );
//show category table data
	show_categorys();
    function show_categorys()
        {
            $.ajax({
                url:'/dashboard/category/shows',
                type:'get',
                dataType:'JSON',
                success:function(data){
                    var i = 1;
                    $('.category_show').html('');
                    jQuery.each(data.categorys,function(key,item){
                        if (item.status == 'active') {
									

                        var checked = '<input type="checkbox" value="'+item.id+'" id="category_inactive" checked>';
                        }else if(item.status == 'inactive'){
                            var checked = '<input type="checkbox" value="'+item.id+'" id="category_active">';
                        }
                        // alert('uploads'+'/'+item.image);
                        $('.category_show').append(
                           '<tr>\
                                  <td>'+item.id+'</td>\
                                  <td>\
                                    <a>'+item.category+'</a>\
                                    <br />\
                                  </td>\
                                  <td>\
                                    <a>'+item.parent_id+'</a>\
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
                                    <button value="'+item.id+'" class="btn btn-primary btn-sm category_edit_btn"><i class="fa fa-pencil"></i> Edit </button>\
                                    <button value="'+item.id+'" class="btn btn-danger btn-sm category_del_btn"><i class="fa fa-trash-o"></i> Delete </button>\
                                  </td>\
                                </tr>'
	                    );
                    });
                }
            });

        } //end activity table data

$('#categoryForm').submit(function(e){
	e.preventDefault();

	let formData = new FormData($('#categoryForm')[0]);
	$.ajax({
		type:'POST',
		url:'/dashboard/category/store',
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
				$('#categoryForm').find('input:text').val('');
				$('#categoryForm').find('input:file').val('');
				$('#categoryModal').modal('hide');
					 show_categorys();
				$('#succes').html('<div class="alert alert-success"><span>'+success.msg+'</span></div>');
			}
		}
	}); // category insert

});

// category edit
	$(document).on('click','.category_edit_btn',function(e){
		e.preventDefault();
		var id = $(this).val();
		// alert(cat_id);
		$('#categoryEditModal').modal('show');
		$.ajax({
			url:'/dashboard/edit/category/'+id,
			type:'get',
			success:function(data){
				// console.log(data);
				if (data.status == 'success') {

					$('#update_id').val(data.categoryEdit.id);
					$('#category').val(data.categoryEdit.category);
					if (data.categoryEdit.image) {
						$('#update_image').attr('src','../'+data.categoryEdit.image );
						$('#update_image').css('width','40%','height','100px');
					}
					// $('#desc').val(data.activityEdit.desc);
				}else{
					// alert(data.msg);
					$('#categoryEditModal').modal('hide');
				}
			}
		});
	}); // end edit category


//category update 
$('#categoryUpdateForm').submit(function(e){
	e.preventDefault();
	var id = $('#update_id').val();
	let updatFormData = new FormData($('#categoryUpdateForm')[0]);

	$.ajax({
		type:'post',
		url:'/dashboard/category/update/'+id,
		data: updatFormData,
		contentType:false,
		processData:false,
		success:function(data){
			// console.log(data);
			if (data.status == 'errors') {
				jQuery.each(data.errors,function(key,val){
					$('#'+key+'_update_error').html('<div class="alert alert-warning" role="alert">'+val[0]+'</div>');
				});
			}else if (data.status == 'success') {
				$('#categoryUpdateForm').find('input:text').val('');
				$('#categoryUpdateForm').find('input:file').val('');
				$('#categoryEditModal').modal('hide');
				show_categorys();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
			}	
		}
	});
});//category update


// category delete modal show
$(document).on('click','.category_del_btn', function(e){
	e.preventDefault();
	var id = $(this).val();
	$('#category_del_id').val(id);
	$('#categoryDelModal').modal('show');
});
//end category delete modal show



//category delete 
$(document).on('click','#category_conform_del_btn',function(e){
	e.preventDefault();
	var id = $('#category_del_id').val();

	$.ajax({
		type:'get',
		url:'/dashboard/del/category/'+id,
		dataType:'JSON',
		success:function(data){
			// console.log(data);
			if (data.status == 'success') {
				$('#categoryDelModal').modal('hide');
				show_categorys();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
			}
		}
	});
}); // end category delete

//category Inactive
 $(document).on('click','#category_inactive',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/inactive/category/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_categorys();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end category Inactive


//category Inactive
 $(document).on('click','#category_active',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/active/category/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_categorys();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end category Inactive