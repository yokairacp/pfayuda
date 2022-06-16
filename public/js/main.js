$(document).ready(function(){

    CargarImagenEdit();

});

$('.btn-sidebar').click(function(){
    $(this).toggleClass("click-side");
    $('.sidebar').toggleClass("show-sidebar");
    $('.sidebar').removeClass('close-sidebar');
    $('.btn-sidebar-close').toggleClass("show-close");
});

$('.btn-sidebar-close').click(function(){
    $(this).toggleClass("click");
    $(this).removeClass('click');
    $(this).removeClass('show-close');
    $('.sidebar').toggleClass("close-sidebar");
    $('.sidebar').removeClass('show-sidebar');
    $('.btn-sidebar').toggleClass("show");
});

$('#checkbox').click(function () {
    var check = document.getElementById("checkbox").checked;
    var input = document.getElementById("file");
    if (check) {
        input.style.display = "block";
    }else{
        input.style.display = "none";
    }
})

function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-ip-1-preview");
      preview.src = src;
      preview.style.display = "block";
    }
}

function CargarImagenEdit() {
    var file = document.getElementById('file');
    var img = file.dataset.imagen;
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = '../../../img/products/'+img;
    preview.style.display = "block";
}