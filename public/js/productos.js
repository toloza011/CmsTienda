
console.log("asdasd");
$('.tags').select2({
    tokenSeparators: [',', ' '],
    theme: "classic",
    language: "es",
    placeholder: "Selecciona alguna categoria"
});
$('.subs').select2({
    tokenSeparators: [',', ' '],
    theme: "classic",
    language: "es",
    placeholder: "Selecciona alguna subcategoria"
});

$('.tags').change(function(){
    var id_categoria = $(this).val();
    $('.subs').empty();
    $.each(id_categoria,function(key,categoria){
        $.get('/productos/crear/subcategorias/'+categoria,(data)=>{
            console.log(data);
            $('.subs').append('<option disabled class="bg-danger"><b>'+data[1].nombre+'</b></option>')
           $.each(data[0],function(key,data){
            $('.subs').append('<option style="background-color: #000" value='+data.id+'>'+data.nombre+'</option>');
           });
        });
}); 
});
$('.subcategorias').hide();
$('#btn-sub').click(function(e){
    e.preventDefault();
    if ($('.subcategorias').is(':visible')) {
      
        $('.subcategorias').hide();
    } else {
        $('.subcategorias').css("display:block");
        $('.subcategorias').show();
    }
        
});

window.addEventListener('load', init, false);
function init() {

    var inputFile = document.getElementById('inputFile1');

    inputFile.addEventListener('change', mostrarImagen, false);
}

function mostrarImagen(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function (event) {
        var img = document.getElementById('img1');
        var cont_img = $('.imageref');
        img.src = event.target.result;
        cont_img.css("display", "block");

    }
    reader.readAsDataURL(file);
}





