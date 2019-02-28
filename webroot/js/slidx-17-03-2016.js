$(document).ready(function(){
var button       = '#slidx-button'; //Elemento en el que pulsamos para abrir y cerrar el menú.
var menu         = '.slidx-menu'; //Elemento que contiene el menú responsive.
var mode         = 'click' //Escribe 'click' o 'hover' si quieres que se abra en menú al pulsar el botón o al pasar por encima de él.
var side         = 'left' //Indica de que lado está el menú ('right' o 'left')
var shadow       = 'yes' //Indica si se crea una sombra en el resto de la página, cuando se abre el menú ('yes' o 'no')
var opacity      = 0.6; //Opacidad de la sombra que se crea en el resto de la página con el menú abierto. (0=transparente 1=opaco)
var size         = 250; //Ancho del menú.
var speed        = 0.5; //Velocidad de apertura y cierre (en s.)
var normalTime   = 0; //Tiempo que tarda el menú en abrirse/cerrarse cuando pulsamos el botón (en ms. recomendable dejar en 0).
var menuTime     = 300; //Tiempo que tarda el menú en cerrarse cuando pulsamos un elemento dentro del menu (en ms.).
var speedM = speed * 1000;

$(menu).css({
'position'   : 'fixed',
'top'        : '0px',
'width'      : size + 'px',
'max-width'  : '100%',
'height'     : '100%',
'overflow-y' : 'auto',
'transition' : speed + 's',
'z-index'    : 1040,
});
if (side == 'right') {
$(menu).css({'right': '-' + size + 'px',})
}

if (side !== 'right') {
$(menu).css({'left': '-' + size + 'px',})
}


if (side == 'right') {
$(button).css({'right': '0px',})
}

if (side !== 'right') {
$(button).css({'left': '0px',})
}


function open(){
if (side == 'right') {
$(menu).animate({
right: '0',
}, normalTime );
if (mode == 'click') {
	
$(button).animate({
right: size,
}, normalTime );
}
}

if (side !== 'right') {
$(menu).animate({
left: '0',
}, normalTime );
if (mode == 'click') {
	if($('#slidx-shadow').length==1){
		$( "#slidx-shadow" ).remove();
		}
$(button).animate({
left: size,
}, normalTime );
}
}

if (shadow == 'yes') {
$("<div>",{
id: "slidx-shadow", //atributo directo, igual que si fuéramos con attr(“id”)
css: //propiedad de jQuery
{
"position": "fixed",
"top": "0px",
"width": "100%",
"height": "100%",
"background-color": "#000000",
"opacity": "0",
"z-index": "1033",
},
}).appendTo('html');
$('#slidx-shadow').fadeTo(speedM, opacity);
}
};
//Ésta es la función que cierra el menú. (Hay dos versiones en función del tiempo de cierre)
function close(delayTime){
if (side == 'right') {
$(menu).animate({
right: '-' + size,
}, delayTime)

if (mode == 'click') {
$(button).animate({
right: 0,
}, delayTime);
}
}

if (side !== 'right') {
$(menu).animate({
left: '-' + size,
}, delayTime)

if (mode == 'click') {
$(button).animate({
left: 0,
}, delayTime);
}
}

$(menu).removeClass('');
$('#slidx-shadow').fadeOut(speedM);
};

//----------  ACTIVADORES  -----------//
//----- Modo CLICK -----//
if (mode == 'click') {
// Al pulsar el button abrimos el menú si está cerrado, o lo cerramos si está abierto.
$(button).click(function() {
if (!$(menu).hasClass('')) {
open();
}
else {
close(normalTime);
} 
}); 

$(menu).click(function() {
//close(menuTime);
});
}
$(document).on('click', '#slidx-shadow', function() {
close(normalTime);
});
});