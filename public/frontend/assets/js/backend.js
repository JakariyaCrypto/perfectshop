///csrf token cache out
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

// choose size before add to card
	function show_color(size){
		$('#size_id').val(size);
    $('.product_attr_color').hide();
    $('.size_'+size).show();
		$('.product_attr_size').css('border','1px solid #ddd');
		$('#size_'+size).css('border','2px solid red');
	}

// choose color before add to card
	function chage_product_color_image(img,color){
		$('#color_id').val(color);
		$('.product_attr_color').css('border','1px solid #ddd'); ///all color border none
		$('#color_'+color).css('border','2px solid red'); //only selected color border show
    jQuery('.color_by_img').html('<div class="single-image-item">\
                      <img src="'+img+'" alt="" srcset="">\
                    </div>');
	}

// single page add to cart

///home add to cart
  function home_add_to_cart(id,size_attr_id,color_attr_id)
    {
      jQuery('#size_id').val(size_attr_id);
      jQuery('#color_id').val(color_attr_id);
      add_to_cart(id,size_attr_id,color_attr_id);
    }
    
function add_to_cart(product_id,attr_size_id,attr_color_id){
	$('.waiting_msg').html('adding to cart...');
	var size_id = $('#size_id').val();
      var color_id = $('#color_id').val();
      //color and size blank
      if (attr_size_id==0 && attr_color_id==0) {
        size_id = 'no';
        color_id = 'no';
      }else{

      }
      // alert(color_id);
      if (color_id =='' && color_id !== 'no') {
        jQuery('#add_to_card_msg').html('<div class="alert alert-danger" role="alert"><h6>Please Choose Size !</h6></div>');
      }else if (size_id == '' && size_id != 'no') {
        jQuery('#add_to_card_msg').html('<div class="alert alert-danger" role="alert"><h6>Please Choose Color !</h6></div>');
      }else{
        jQuery('#product_id').val(product_id);
        jQuery('#pqty').val(jQuery('#qty').val());

        jQuery.ajax({
          url:'/addto-cart',
          data:jQuery('#addToCartForm').serialize(),
          type:'post',
          // contentType:false,
          // processData:false,
          cache:false,
          success:function(result){
            var totalPrice = 0;
            var sum = 0;
            // disply cart product when click addto cart button
             const addToCart = document.getElementById('add_to_cart'),
              cartContent = document.getElementById('cart-product-show')

              if(addToCart){
                addToCart.addEventListener('click', () => {
                  cartContent.classList.toggle('active-cart-product')
                })
              }


            // succes alert modal
            if (result.status == 'success') {
              $('#success_modal').modal('show')
            }
            if (result.status == 'update') {
              $('#update_modal').modal('show');
               jQuery('.cart_page_msg').html('<div class="alert alert-success" role="alert"><h6>'+result.msg+' !</h6></div>');
             
            }
            if (result.status == 'delete') {
               jQuery('.cart_page_msg').html('<div class="alert alert-danger" role="alert"><h6>'+result.msg+' !</h6></div>');
             
            }


            // end alert message

            if (result.TotalItem == 0) {
              $('.cart_item').html('0');
              $('#cart-product-show').remove();
            }else{
              if (result.TotalItem == 1) {
                $('.cart_item').html('<span>'+result.TotalItem+' Item</span>');
              }else{
                $('.cart_item').html('<span>'+result.TotalItem+' Items</span>');
              }
              

              var html = '<div class="cart-body-content"> <div class="product-cart-body">';
              jQuery.each(result.data, function(arrKey,arrVal){
                totalPrice=(parseInt(arrVal.attr_mrp) * parseInt(arrVal.qty));
                 sum = sum + totalPrice;
                // alert(totalPrice);
               html+='<div class="cart-products">\
                  <div class="cart-qty">\
                   <span>'+arrVal.attr_mrp+' * '+arrVal.qty+'</span>\
                  </div>\
                  <div class="cart-product-image">\
                    <img src="../'+arrVal.attr_image+'" alt="" srcset="">\
                  </div>\
                  <div class="cart-product-title"><span>'+arrVal.name+'</span></div>\
                  <div class="cart-product-price">\
                    <span> '+totalPrice+' tk</span>\
                  </div>\
                </div>'
                });
              html+='</div>';
              // icon total
              $('.cart_total').html('<span>'+sum+' tk</span>');
              // sessin_id coming from header file
              if(session_id !== null){
                  html+='<div class="product-cart-footer no-reload">\
                  <div class="cart-order-btn">\
                    <a href="/cart-product" class="similar-btn-2 cart-order-btn">Check Cart</a>\
                    <span class="cart-total-price">'+sum+' tk</span>\
                  </div>\
                </div>';
                $('.reloaded').hide();
              }else{
                html+='<div class="product-cart-footer">\
                  <div class="cart-order-btn">\
                    <a href="/registration" class="similar-btn-2 cart-order-btn">Check Cart</a>\
                    <span class="cart-total-price">'+sum+' tk</span>\
                  </div>\
                </div>';
                $('.reloaded').hide();
              }
              
              }
             $('.cart_total_price').html('<strong>'+sum+' tk</strong>');
               jQuery('#product_cart_show').html(html);
            }
        });
      }
}





//product quantity update

function updateQty(pid,size,color,attr_id,price){
  jQuery('#size_id').val(size);
      jQuery('#color_id').val(color);
      var qty = jQuery('#qty'+attr_id).val();
      $('#update_modal').modal('show')
      jQuery('#qty').val(qty);
      jQuery('#row_total_price'+attr_id).html(qty*price);
      add_to_cart(pid,size,color);

}

// delete cart product 
function del_cart_product(pid,color,size,attr_id){
   jQuery('#size_id').val(size);
    jQuery('#color_id').val(color);
    $('#poduct_del_modal').modal('show');
    jQuery('#qty').val(0);
    jQuery('#remove_cart_item'+attr_id).remove();

    add_to_cart(pid,size,color);
}
// customer registration
//registration
  jQuery('#RegistrationForm').submit(function(e){
    e.preventDefault();
    $('#success_msg').html('Please Waiting....');
    jQuery('.field_error').html('');
    jQuery.ajax({
      url:'/customer/registration',
      data:jQuery('#RegistrationForm').serialize(),
      type:'post',
      success:function(result){
        if (result.status == 'errors') {
          jQuery.each(result.errors,function(key,val){
            $('#'+key+'_error').html('<div class="alert alert-danger" role="alert"><span>'+val[0]+'</span></div>');
          });
        }
        if (result.status == 'success') {
          window.location.href = '/';
          jQuery('#RegistrationForm')[0].reset();
        }
      }
    });
  });

// login customer
$("#LoginForm").submit(function(e){
  e.preventDefault();
  $('#login_btn').html('Login....');

  jQuery.ajax({
      url:'/customer/login',
      data:jQuery('#LoginForm').serialize(),
      type:'post',
      success:function(result){
        if (result.status == 'errors') {
          jQuery.each(result.errors,function(key,val){
            $('#'+key+'_error').html('<div class="alert alert-danger" role="alert"><span>'+val[0]+'</span></div>');
          });
        }

        if (result.status == 'success') {
          window.location.href = window.location.href;
          jQuery('#LoginForm')[0].reset();
        }else if(result.status == 'warning'){
        $('#warning').html('<div class="alert alert-danger" role="alert"><span>'+result.msg+'</span></div>');
        }
      }
    });


});

// check payment method
function select_pay_method(mobile){
  $('#border_image').css('border','5px solid orange');
  $('#cod_pay_method').val('CasOnDelivery');
  // alert(mobile);
}

// checkout 
$('#CheckoutForm').submit(function(e){
  e.preventDefault();
  $('.order-waiting').html('waiting....');

  jQuery.ajax({
      url:'/conform/order',
      data:jQuery('#CheckoutForm').serialize(),
      type:'post',
      success:function(result){
        if (result.status == 'errors') {
          jQuery.each(result.errors,function(key,val){
            $('#'+key+'_error').html('<div class="alert alert-danger" role="alert"><span>'+val[0]+'</span></div>');
          });
        }

        if (result.status == 'success') {
          window.location.href = '/order-success'
        }else if(result.status == 'warning'){
        $('#warning').html('<div class="alert alert-danger" role="alert"><span>'+result.msg+'</span></div>');
        }

        if(result.status == 'cod_warning'){
          $('#pay_warning').html('<div class="alert alert-danger" role="alert"><span>'+result.msg+'</span></div>');
        }
      }
    });


  // alert('ok');
});



// search products
function searchProduct(){
  var search_str = $('#search').val();
      if (search_str != '') {
        window.location.href='/search/'+search_str;
      }
}