

$('#tipo').on('change',function(){
   if(this.checked){
       $('#categorias').show();
   }else{
       $('#categorias').hide();
   }
});