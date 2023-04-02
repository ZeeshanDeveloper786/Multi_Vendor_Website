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
    });

    // update Admin status
    $('.updateAdminStatus').click(function(){
        var status = $(this).children('i').attr('status');
        var admin_id = $(this).attr('id');
        // alert(admin_id);

        $.ajax({
            type:'post',
            url: 'admin/update-admin-status' ,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                Admin_id: admin_id,
                Status:status
            },
            success:function(response){
                // console.log(response.adminID);
                if(response.status == 0){
                    $('#'+response.adminID).html(
                       '<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>' 
                    );
                }else if(response.status == 1){

                    $('#'+response.adminID).html(
                      '<i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i>'  
                    );
                }
            },
            error:function(err){
                alert(err);
            }
        });
    });

});