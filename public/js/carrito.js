$(document).ready(function () {
    
    CargarPago();

});

function CambiaCantidad(id, precio) {
    var cantidad_id = 'cantidadProducto'+id;
    var monto_id = 'monto'+id;
    var monto = document.getElementById(`${monto_id}`);
    var monto_input = document.getElementById(`monto_input${id}`);
    var cantidad = document.getElementById(`${cantidad_id}`).value;
    var subtotal = precio * cantidad;
    var number = subtotal.toLocaleString('en-US');

    monto.innerHTML = `RD$ ${number}`;  
    monto_input.value = number; 
    var _token = $('#token').val();

    $.ajax({
        url: `carrito/${id}/update/c=${cantidad}`,
        method: "PUT",
        data: { 
            id : id , cantidad : cantidad, _token
        },
        async:true,
        succes:function(response) {
            
        },
        erorr: function(error) {
            console.error(error);
        }
    });

    CargarPago();
}

function CargarPago() {

    var montos = document.getElementsByClassName("monto");
    var elemnt_subtotal = document.getElementById('subtotal');
    var elemnt_itbis = document.getElementById('itbis');
    var elemnt_total = document.getElementById('total');
    var elemnt_totalt = document.getElementById('totalt');
    var subtotal = 0;
    var itbis = 0;
    var total = 0;

    for (let i = 0; i < montos.length; i++) {
        var n = montos[i].value;
        n = n.replace(/,/g, '');
        subtotal = (subtotal) + (parseInt(n));
    }

    itbis = subtotal * 0.18;
    total = subtotal + itbis;
    subtotal = subtotal.toLocaleString('en-US');
    itbis = itbis.toLocaleString('en-US');
    total = total.toLocaleString('en-US');

    elemnt_subtotal.innerHTML = `RD$ ${subtotal}`;
    elemnt_itbis.innerHTML = `RD$ ${itbis}`;
    elemnt_total.innerHTML = `RD$ ${total}`;
    elemnt_totalt.innerHTML = `RD$ ${total}`;
    
}