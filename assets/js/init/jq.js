$(document).on('click', '.addService', function(){
	var html = '<div><select class="form-control" name="buku" required><button type="button" class="addService">Add More</button></div>';
  $(this).parent().append(html);
});

    $(document).ready(function(){       
        $('.form-checkbox').click(function(){
            if($(this).is(':checked')){
                $('.form-password').attr('type','text');
            }else{
                $('.form-password').attr('type','password');
            }
        });
    });