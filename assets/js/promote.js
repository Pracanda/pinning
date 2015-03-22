$(document).ready( function() {
              var form = $('#promote_form');
              var base_url=$('#base_url').val();
              $("#ajaxsend").click(function() {
                var check = checkForm();
                if(!check){               
                  return false;
                }
                            $.ajax( {
                              type: "POST",
                              url: base_url+'home/promote_post',
                              data: form.serialize(),
                              success: function( response ) {
                                $('#load').html("");
                                if (response) {
                                    $("#msg_send").html('Your message was sent successfully!');
                                    $('#promote_form').trigger('reset');
                                 } 
                                 else{
                                    $("#msg_send").html('Error! Please try again!');
                                 }
                              },
                              beforeSend : function (){
                                         $('#load').html("<img src='"+base_url+"assets/images/load.gif'>");
                                    },
                              error: function(jqba,hshsh,jsjsj){
                                  alert(jqba.responseText);
                              }
                            } );
                  });

  $("#close-promote").on("click", function(){
    $('#promote_form').trigger('reset');
  });
  
  function checkForm(){
   var count = 0;
   $('.with-errors').html('');
   $('#promote_form input').each(function(){
      var thisinput = $(this);
      if(!thisinput.attr('required')){
        // continue;
      }else{
        if($.trim(thisinput.val()) == ''){
          count++;
          thisinput.closest('.col-sm-12').find('.with-errors').html('Please Fill this field.');
          thisinput.closest('.col-sm-12').find('.with-errors').css('color', 'red');
        }

        if(thisinput.attr('name') == 'email'){
          
          //validate email if in format or not
          if(!IsEmail(thisinput.val())){
            thisinput.closest('.col-sm-12').find('.with-errors').html('Invalid Email');
            thisinput.closest('.col-sm-12').find('.with-errors').css('color', 'red');
           count++;
          }
        }
         if(thisinput.attr('name') == 'contact'){
         
          //validate contact if int or not
          if(!checknum(thisinput.val())){
            thisinput.closest('.col-sm-12').find('.with-errors').html('Invalid Contact');
            thisinput.closest('.col-sm-12').find('.with-errors').css('color', 'red');
            count++;
          }
        }
      }
   });
   if(count == 0){
    return true;
   }else{
    return false;
   }
  }

  $('#promote_form input').keyup(function(){
    var thisinput = $(this);
    if(thisinput.attr('name') == 'email'){
      //validate email if in format or not
      if(!IsEmail(thisinput.val())){

        thisinput.closest('.col-sm-12').find('.with-errors').html('Invalid Email');
        thisinput.closest('.col-sm-12').find('.with-errors').css('color', 'red');
        return false;
      }
    }
     if(thisinput.attr('name') == 'contact'){
      //validate contact if int or not
      if(!checknum(thisinput.val())){
        thisinput.closest('.col-sm-12').find('.with-errors').html('Invalid Contact');
        thisinput.closest('.col-sm-12').find('.with-errors').css('color', 'red');
        return false;
      }
    }
    if($.trim(thisinput.val()) != ''){
      thisinput.closest('.col-sm-12').find('.with-errors').html('');
    }
  });
  function IsEmail(email){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }

  function checknum(n){
   // var ph= ^\+\d{3}-\d{3}-\d{6}|\+\d{3}-\d{5}-\d{5}$;
    if(!isNaN(parseInt(n)) && isFinite(n)){
      var t = n.split('.');
      if(t.length == 2){
        return false;
      }
      return true;
    }
  }
});