  $( function() {
  	// var $add_disease = ;
    $( "#datepicker" ).datepicker();
    $('#disease').click(function(){
    	$(this).before($('<input type="text" class="form-control dis" name="diseases[]" required="required" placeholder="Enter a disease" multiple="multiple">'));
    });
    $('#remove_disease').click(function(){
    	$('.dis:last').remove();
    });
    $('.remove').click(function(){
        if($('.diseases').length > 1){
            $(this).remove();
        }else{
            alert('disease is a required field.');
        }
    });
  });

