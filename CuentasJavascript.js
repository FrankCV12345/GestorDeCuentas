function Abrir(Myobjeto) {
   document.getElementById(Myobjeto).style.top = "20%";
   
}
function Cerrar(Myobjeto) {
    document.getElementById(Myobjeto).style.top = "-100%";   
}
function Fech() {
    var fecha = new Date();
    document.getElementById('fecha').value = fecha.getFullYear()+ '/' + '0' + ( fecha.getMonth() + 1 )+ '/' + fecha.getDate();
      
}
function CambiaFondo(TheBtn){
    var Btn = document.getElementsByClassName('BtnCont');
    Btn[TheBtn].style.background = 'white'; 
    Btn[TheBtn].style.color = '#191919';   
}
function ReiniciaFondo(TheBtn){
    var Btn = document.getElementsByClassName('BtnCont');
    Btn[TheBtn].style.background = '#191919';
     Btn[TheBtn].style.color = 'white';    
}