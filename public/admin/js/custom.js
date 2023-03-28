$(document).ready(function(){
    //check admin password is correct or not
    $('#current_password').mouseout(function(){
        var current_password = $('#current_password').val();
        // alert(current_password);
        $.ajax({
            type:'post',
            url:'check-admin-password',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                current_password: current_password
            },
            success:function(resp){
                // alert(resp);
                if (resp == 'false') {
                    $('#check_pass').html('<font color="red">current password is incorrect!</font>');
                }else if(resp == 'true'){
                    $('#check_pass').html('<font color="green">current password is correct!</font>');
                }
            },
            error:function(err){
                console.log(err);
            }
        }); 
    })
});