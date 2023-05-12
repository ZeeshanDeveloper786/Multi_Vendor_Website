// 
function DeleteBrand(id) {
    var brand_id = id;
 
     swal({
       title: "Are you sure?",
       text: "Once deleted, you will not be able to recover this Section!",
       icon: "warning",
       buttons: true,
       dangerMode: true,
     })
     .then((willDelete) => {
       if (willDelete) {
     
         // TODO: Handle your delete url by ajax
         $.ajax({
             type:'post',
             url:'/admin/admin/delete-brand',
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             data:{
                 brand_id: brand_id
             },
             success:function(resp){
                 if(resp.success == true){
                     
                     $('#brand'+resp.data).remove();
                     
                 }
                
             },
             error:function(err){
                 alert(err);
             }
         }); 
 
 
 
     
         swal("Section has been deleted successfully!", {
           icon: "success",
         });
       } else {
         swal("Section is safe!");
       }
     });
 }

// update brand status
$('.updatebrandStatus').click(function(){
    var status = $(this).children('i').attr('status');
    var brand_id = $(this).attr('id');
    // alert(brand_id);

    $.ajax({
        type:'post',
        url: '/admin/admin/update-brand-status' ,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            brand_id: brand_id,
            Status:status
        },
        success:function(response){
            // console.log(response.adminID);
            if(response.status == 0){
                $('#'+response.id).html(
                   '<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>' 
                );
            }else if(response.status == 1){

                $('#'+response.id).html(
                  '<i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i>'  
                );
            }
        },
        error:function(err){
            alert(err);
        }
    });
});



// delete Images 
function DeleteImage(id) {
    var img_id = id;
    // alert(img_id);
     swal({
       title: "Are you sure?",
       text: "Once deleted, you will not be able to recover category image!",
       icon: "warning",
       buttons: true,
       dangerMode: true,
     })
     .then((willDelete) => {
       if (willDelete) {
     
         // TODO: Handle your delete url by ajax
         $.ajax({
             type:'post',
             url:'/admin/admin/delete-category-image',
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             data:{
                img_id: img_id
             },
             success:function(resp){
                 if(resp.success == true){
                    //  $('#category'+resp.id).remove();
                 }
                
             },
             error:function(err){
                 alert(err);
             }
         }); 
 
 
 
     
         swal("Category image has been deleted successfully!", {
           icon: "success",
         });
       } else {
         swal("Category image is safe!");
       }
     });
 }




// append categories level
$('#section_id').change(function (){
    
    var section_id = $(this).val();
    // alert(section_id);

    $.ajax({
        type: 'get' ,
        url: '/admin/append-categories-level',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{
            section_id : section_id
        },
        success:function(response){
            // alert(response);
            $('#appendCatLevel').html(response);
        },
        error:function(error){
            // alert(error);
            console.log(error);
        }

    })
});

function confirmation(id) {
   var Sec_id = id;

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Section!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
    
        // TODO: Handle your delete url by ajax
        $.ajax({
            type:'post',
            url:'/admin/admin/delete-section',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                Sec_id: Sec_id
            },
            success:function(resp){
                if(resp.success == true){
                    
                    $('#section'+resp.data).remove();
                    
                }
               
            },
            error:function(err){
                alert(err);
            }
        }); 



    
        swal("Section has been deleted successfully!", {
          icon: "success",
        });
      } else {
        swal("Section is safe!");
      }
    });
}



function DeleteCatCfm(id) {
    var cat_id = id;
    // alert(cat_id);
     swal({
       title: "Are you sure?",
       text: "Once deleted, you will not be able to recover this Section!",
       icon: "warning",
       buttons: true,
       dangerMode: true,
     })
     .then((willDelete) => {
       if (willDelete) {
     
         // TODO: Handle your delete url by ajax
         $.ajax({
             type:'post',
             url:'/admin/admin/delete-category',
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             data:{
                cat_id: cat_id
             },
             success:function(resp){
                 if(resp.success == true){
                     $('#category'+resp.id).remove();
                 }
                
             },
             error:function(err){
                 alert(err);
             }
         }); 
 
 
 
     
         swal("Section has been deleted successfully!", {
           icon: "success",
         });
       } else {
         swal("Section is safe!");
       }
     });
 }







$(document).ready(function(){
    // call datatables
        $('#sections').DataTable();
        $('#categories').DataTable();
        $('#brands').DataTable();


        
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
            url: '/admin/admin/update-admin-status' ,
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

   
    // update section status
      $('.updateSectionStatus').click(function(){
        var status = $(this).children('i').attr('status');
        var Sec_id = $(this).attr('id');
        // alert(Sec_id);

        $.ajax({
            type:'post',
            url: '/admin/admin/update-section-status' ,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                section_id: Sec_id,
                Status:status
            },
            success:function(response){
                // console.log(response.adminID);
                if(response.status == 0){
                    $('#'+response.id).html(
                       '<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>' 
                    );
                }else if(response.status == 1){

                    $('#'+response.id).html(
                      '<i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i>'  
                    );
                }
            },
            error:function(err){
                alert(err);
            }
        });
    });


    //update category status 
    $('.updatecategoryStatus').click(function(){
        var status = $(this).children('i').attr('status');
        var cat_id = $(this).attr('id');
        
        $.ajax({
            type:'post',
            url: '/admin/admin/update-category-status' ,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                cat_id: cat_id,
                status:status
            },
            success:function(response){
                console.log(response);
                // console.log(response.adminID);
                if(response.status == 0){
                    $('#'+response.id).html(
                       '<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>' 
                    );
                }else if(response.status == 1){

                    $('#'+response.id).html(
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