var temp = document.getElementById("ventanaEmergente").innerHTML;

console.log(temp.length);

function contacto() {
    var html = document.getElementById("ventanaEmergente").innerHTML = 
    '<div class="ventana">'+
        '<form class="ventanaEmergente2">'+
            '<div class="tituloVentana">Formulario de contacto</div>'+
            '<div class="inputsVentana">'+
                '<div>'+
                    '<p >Nombre</p>'+
                    '<input type="text" id="">'+
                '</div>'+
                '<div>'+
                    '<p>Email</p>'+
                    '<input type="email" id="">'+
                '</div>'+
                '<textarea name="" id="" cols="30" rows="10"></textarea>'+
                '<button type="submit" onclick="" class="boton">Enviar</button>'+
                '<button onclick="cerrar()" class="boton">Cerrar</button>'+
            '</div>'+
        '</form>'+
    '</div>';
    if(temp.length == 0){
        return html;
    }
}

function cerrar() {
    var temp2 = document.getElementById("ventanaEmergente").innerHTML;
    if(temp2.length > 0){
        return document.getElementById("ventanaEmergente").innerHTML = "";
    }
}

