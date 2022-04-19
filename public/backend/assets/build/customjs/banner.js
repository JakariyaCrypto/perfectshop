$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
 $(document).ready( function () {
    $('#datatable').DataTable();
} );
//show category table data
	show_banners();
    function show_banners()
        {
            $.ajax({
                url:'/dashboard/banner/shows',
                type:'get',
                dataType:'JSON',
                success:function(data){
                    var i = 1;
                    $('.banner_show').html('');
                    jQuery.each(data.banners,function(key,item){
                        if (item.status == 'active') {
									

                        var checked = '<input type="checkbox" value="'+item.id+'" id="banner_inactive" checked>';
                        }else if(item.status == 'inactive'){
                            var checked = '<input type="checkbox" value="'+item.id+'" id="banner_active">';
                        }
                        // alert('uploads'+'/'+item.image);
                        $('.banner_show').append(
                           '<tr>\
                                  <td>#</td>\
                                  <td>\
                                    <a>'+item.title+'</a>\
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
                                    <button value="'+item.id+'" class="btn btn-primary btn-sm banner_edit_btn"><i class="fa fa-pencil"></i> Edit </button>\
                                    <button value="'+item.id+'" class="btn btn-danger btn-sm banner_del_btn"><i class="fa fa-trash-o"></i> Delete </button>\
                                  </td>\
                                </tr>'
	                    );
                    });
                }
            });

        } //end activity table data

$('#bannerForm').submit(function(e){
	e.preventDefault();

	let formData = new FormData($('#bannerForm')[0]);
	$.ajax({
		type:'POST',
		url:'/dashboard/banner/store',
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
				$('#bannerForm').find('input:text').val('');
				$('#bannerForm').find('input:file').val('');
				document.getElementById('short_desc').value = "";
					 $('#bannerModal').modal('hide');
					 show_banners();
				$('#succes').html('<div class="alert alert-success"><span>'+success.msg+'</span></div>');
			}
		}
	}); // banner insert

});

// banner edit
	$(document).on('click','.banner_edit_btn',function(e){
		e.preventDefault();
		var id = $(this).val();
		// alert(cat_id);
		$('#bannerEditModal').modal('show');
		$.ajax({
			url:'/dashboard/edit/banner/'+id,
			type:'get',
			success:function(data){
				// console.log(data);
				if (data.status == 'success') {

					$('#update_id').val(data.bannerEdit.id);
					$('#title').val(data.bannerEdit.title);
					$('#btn_name').val(data.bannerEdit.btn_name);
					if (data.bannerEdit.image) {
						$('#update_image').attr('src','../'+data.bannerEdit.image );
						$('#update_image').css('width','40%','height','100px');
					}
					$('#short_desc').val(data.bannerEdit.short_desc);
					$('#short_desc').val(data.bannerEdit.short_desc);
					// $('#desc').val(data.activityEdit.desc);
				}else{
					// alert(data.msg);
					$('#bannerEditModal').modal('hide');
				}
			}
		});
	}); // end edit activity


//banner update 
$('#bannerUpdateForm').submit(function(e){
	e.preventDefault();
	var id = $('#update_id').val();
	let updatFormData = new FormData($('#bannerUpdateForm')[0]);

	$.ajax({
		type:'post',
		url:'/dashboard/banner/update/'+id,
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
				$('#bannerUpdateForm').find('input:text').val('');
				$('#bannerUpdateForm').find('input:file').val('');
				document.getElementById('clear-id').value = "";
				$('#bannerEditModal').modal('hide');
				show_banners();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
			}	
		}
	});
});//banner update


// banner delete modal show
$(document).on('click','.banner_del_btn', function(e){
	e.preventDefault();
	var id = $(this).val();
	$('#banner_del_id').val(id);
	$('#bannerDelModal').modal('show');
});
//end banner delete modal show



//banner delete 
$(document).on('click','#banner_conform_del_btn',function(e){
	e.preventDefault();
	var id = $('#banner_del_id').val();

	$.ajax({
		type:'get',
		url:'/dashboard/del/banner/'+id,
		dataType:'JSON',
		success:function(data){
			// console.log(data);
			if (data.status == 'success') {
				$('#bannerDelModal').modal('hide');
				show_banners();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
			}
		}
	});
}); // end banner delete

//banner Inactive
 $(document).on('click','#banner_inactive',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/inactive/banner/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_banners();
				$('.danger').html('<div class="alert alert-warning" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end banner Inactive


//banner Inactive
 $(document).on('click','#banner_active',function(e){
 	e.preventDefault();

 	var id = $(this).val();

 	$.ajax({
 		type:'get',
 		url:'/dashboard/active/banner/'+id,
 		dataType:'JSON',
 		success:function(data){
 			if (data.status == 'success') {
 				show_banners();
				$('#succes').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
 			}
 		}
 	});
 }); //end banner Inactive