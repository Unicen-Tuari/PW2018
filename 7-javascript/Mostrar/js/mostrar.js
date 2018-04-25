"uses strict";

document.querySelector('button').addEventListener('click', function(){
  document.querySelector('div').classList.toggle('hide');
})


function cuentaRegresiva(tiempo){
  let intervalo = setInterval(function() {
    document.querySelector('h1').innerHTML = tiempo;
    if (tiempo === 0){
        clearInterval(intervalo);
        alert('BOOOM');
    }
    else{
      tiempo--;
    }
  }, 1000);
}

let espera = setInterval(function() {
  clearInterval(espera);
  cuentaRegresiva(5);
}, 5000);



alert('En 5 se activa la bomba');
