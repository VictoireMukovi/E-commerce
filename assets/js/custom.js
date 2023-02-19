$(document).ready(function(){

    $('.delete_product_btn').click(function (e) {
         e.preventDefault();
 
         var id=$(this).val();
         alert("Hello");
 
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
                     method:"POST",
                     url:"categorieAction.php",
                     data:{
                         'product_id':id,
                         'delete_product_btn':true
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
 
 
 
 
 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 
 
 
 
   /*  $('.increment_btn').click(function (e) {
         e.preventDefault();
 
         var qty=$('.input_qty').val();
         alert(qty);
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
     $('.addToCartBtn').click(function (e) {
         e.preventDefault();
         //var qty=$('.input-qty').val();
         var qty=$(this).closest('.product_data').find('.input_qty').val();
         var prodId= $(this).val();
        // alert(prodId);
 
         $.ajax({
             method:"POST",
             url:"functions/handlecart.php",
             data:{
                 "prod_id":prodId,
                 "prod_qty":qty,
                 "scope":"add"
             },
             
             //datType="dataType",
             success:function(response){
                 if (response == 201) {
                     alert("Insertion effecutué avec success");
                 }
                 else if (response == 401) {
                     alert("Faite l'Inscription pour continuer");
                 }
                 else if (response == 501) {
                     alert("Quelques chose s'est mal passée");
                 }
             }
         });
         
     });
     
 
 });