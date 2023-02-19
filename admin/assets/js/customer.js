
$(document).ready(function () {


    $('.delete_product_btn').click(function (e) {
        e.preventDefault();

        var ids=$(this).val();
           
      // alert(ids);
        swal({
            title="Etes-vous sûr ?",
            text="Suppression produit",
            icon="warning",
            buttons:true,
            dangerMode:true,
        })
        .then((willDelete)=>{
            if(willDelete){
                $.ajax({
                    type:"POST",

                    url:"categorieAction.php",
                    data:{
                        'product_id':ids,
                        'delete_product_btn': true
                    },
                    success: function (response) {
                        console.log(response);
                        if (response==200) {
                            swal("success!","produit supprimer avec succes","success")
                            $("#products_table").load(location.href+"#product_table")
                        }else if (response=500) {
                            swal("Error !","Something went wrong","error")
                        }
                    }
                });

            }
        })
        
    });

/*

$('.increment_btn').click(function (e) {
    e.preventDefault();

    var qty=$('.input_qty').val();
    //alert(qty);
   var qty=$(this).closest('.product_data').find('.input_qty').val();
    var value= parseInt(qty,10);
    value= isNaN(value)? 0 : value;
    if (value < 10) {
        value++;
        $(this).closest('.product_data').find('.input_qty').val(value);

    }
});


$('.decrement_btn').click(function (e) {
    e.preventDefault();
    //var qty=$('.input-qty').val();
    var qty=$(this).closest('.product_data').find('.input_qty').val();
    var value= parseInt(qty,10);
    value= isNaN(value)? 0 : value;
    if (value >0) {
        value--;
        $(this).closest('.product_data').find('.input_qty').val(value);
        
    }
});*/

//Pour ajouter à la carte 
$('.addToCartBtn').click(function (e) {
    e.preventDefault();
    //var qty=$('.input-qty').val();
    var qty=$(this).closest('.product_data').find('.input_qty').val();
    var prodId= $(this).val();
    //alert(qty);

    $.ajax({
        type:"POST",
     
        url: "handlecart.php",
      
       data:{
            "prod_id": prodId,
            "prod_qty": qty,
            "scope":"add"
        },
        
        success: function(response){
            
            if (response == 201) {
                alertify.success("Insertion effecutué avec success");
            }
            else if (response == 501) {
                alertify.success("Impossible d'ajouter à la carte sans etre connectée. connecte-vous d'abord pour continuer");
            }
            else if (response == 500) {
                alertify.success("Quelques chose s'est mal passée");
            }
            /*else{
                alertify.success("Something went wrong");
            }*/
        }
    });
  
    
    
});


});
