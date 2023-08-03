/* let lpbc=[
    {'value' : 'Lomas','condo' : 'Lomas 1'},
    {'value' : 'Lomas','condo' : 'Lomas 2'},
    {'value' : 'Lomas','condo' : 'Lomas 3'},
    {'value' : 'Lomas','condo' : 'Lomas 4'},
];

let pbc=[ 
    // {'value' : 'Estepa','condo' : 'Estepa 1'},
    // {'value' : 'Estepa','condo' : 'Estepa 2'},
    // {'value' : 'Estepa','condo' : 'Estepa 3'},
    {'value' : 'Desierto','condo' : 'Desierto 1'},
    {'value' : 'Desierto','condo' : 'Desierto 2'},
    {'value' : 'Desierto','condo' : 'Desierto 3'},
    {'value' : 'Taiga','condo' : 'Taiga 1'},
    {'value' : 'Taiga','condo' : 'Taiga 2'},
    {'value' : 'Taiga','condo' : 'Taiga 3'},
    {'value' : 'Paramo','condo' : 'Paramo 1'},
    {'value' : 'Paramo','condo' : 'Paramo 2'},
    {'value' : 'Paramo','condo' : 'Paramo 3'},
    {'value' : 'Paramo','condo' : 'Paramo 1'},
    {'value' : 'Paramo','condo' : 'Paramo 2'},
    {'value' : 'Paramo','condo' : 'Paramo 3'},
    {'value' : 'Selva','condo' : 'Selva 1'},
    {'value' : 'Selva','condo' : 'Selva 2'},
    {'value' : 'Selva','condo' : 'Selva 3'},
    {'value' : 'Selva','condo' : 'Selva 4'},
    {'value' : 'Bosque','condo' : 'Bosque 1'},
    {'value' : 'Bosque','condo' : 'Bosque 2'},
    {'value' : 'Bosque','condo' : 'Bosque 3'},
    {'value' : 'Bosque','condo' : 'Bosque 4'},
    {'value' : 'Lago','condo' : 'Lago 1'},
    {'value' : 'Lago','condo' : 'Lago 2'}, // este es el que se lanza el sabado 18 Febrero
    {'value' : 'Langlar','condo' : 'Manglar 1'},
    {'value' : 'Langlar','condo' : 'Manglar 2'}, 

];

let pbb=[
    {'value' : 'Amatista','condo' : 'Amatista 1'},
    {'value' : 'Amatista','condo' : 'Amatista 2'}, 
    {'value' : 'Zafiro','condo' : 'Zafiro 1'},
    {'value' : 'Zafiro','condo' : 'Zafiro 2'}, 
    {'value' : 'Malaquita','condo' : 'Malaquita 1'},
    {'value' : 'Malaquita','condo' : 'Malaquita 2'}, 
];

let $desarrollo = document.getElementById("desarrollo");
let $condominium = document.getElementById("condominium");

logo.setAttribute("src","img/logos/porttoblanco.svg");
function opcCondo(dev){
    let element ='<option selected disabled>--Condominium--</option>'
    for(let i = 0; i < dev.length;  i++){
        element += '<option value="'+ dev[i].value +'">'+ dev[i].condo+'</option>';
    }
    $condominium.innerHTML = element
}

document.addEventListener('DOMContentLoaded', function() {
    let valor = $desarrollo.value
    switch (valor) {
        case 'Lomas de Porttoblanco Cimatario':
            opcCondo(lpbc);
            logo.setAttribute("src","img/logos/" + valor + ".svg");
            break;
        case 'Porttoblanco Cimatario':
            opcCondo(pbc);
            logo.setAttribute("src","img/logos/" + valor + ".svg");
            break;
        case 'Porttoblanco Bernal':
                opcCondo(pbb);
                logo.setAttribute("src","img/logos/" + valor + ".svg");
            break;   

    }
})

$(function() {
    $('#desarrollo').change(function() {
        localStorage.setItem('dev', this.value);
    });
    
    if(localStorage.getItem('dev')){
        $('#desarrollo').val(localStorage.getItem('dev'));
    }
});

$(function() {
    $('#date').change(function() {
        localStorage.setItem('fecha', this.value);
    });
    
    if(localStorage.getItem('fecha')){
        $('#date').val(localStorage.getItem('fecha'));
    }
}); 


$(function() {
    $('#exampleFormControlSelect1').change(function() {
        localStorage.setItem('type', this.value);
    });

    if(localStorage.getItem('type')){
        $('#exampleFormControlSelect1').val(localStorage.getItem('type'));
        var t = localStorage.getItem('type');
    }
});


const select = document.getElementById("condominium");
const calcularBtn = document.getElementById("calcular");

// Obtener el valor y el texto de la opción seleccionada y almacenarlos en el localStorage
calcularBtn.addEventListener("click", () => {
  const selectedOption = select.options[select.selectedIndex];
  const selectedValue = selectedOption.value;
  const selectedText = selectedOption.text;
  localStorage.setItem("selectedCondoValue", selectedValue);
  localStorage.setItem("selectedCondoText", selectedText);
});

// Mostrar el valor y el texto almacenados en el localStorage en el elemento select al cargar la página
window.addEventListener("load", () => {
  const selectedValue = localStorage.getItem("selectedCondoValue");
  const selectedText = localStorage.getItem("selectedCondoText");
  if (selectedValue && selectedText) {
    const option = document.createElement("option");
    option.value = selectedValue;
    option.text = selectedText;
    select.appendChild(option);
    select.value = selectedValue;
    mostrarPremio(); 
  
  }else {
  ocultarPremio() 
   ;
    }
  
});


function mostrarPremio() {
prueba=document.getElementById('premio');
console.log(prueba) 
prueba.style.display = 'block';
console.log('prueba');
   
}

function ocultarPremio() {
   prueba2=document.getElementById('premio');
   prueba2.style.display= 'none';
    
}

function LimpiarStorage()
    {
        localStorage.clear();
        window.addEventListener();
            
    }
BorrarDatos.addEventListener("click", LimpiarStorage);


function guardarStorage()
    {
       
            
    }
 

 






 */