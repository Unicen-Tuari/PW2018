"use strict";

function tirar1000Dados(){
  let salio7 = 0;
  let contador7 = 0;
  for (let i = 0; i < 1000; i++) {
      salio7 = tirarDados();
      if (salio7){
        contador7++;
      }
  }
  console.log(`El 7 salió ${contador7} veces`);
}

function tirarDados(){
  let d1 = Math.floor((Math.random() * 6) + 1);
  let d2 = Math.floor((Math.random() * 6) + 1);
  mostrarDados(d1, d2);
  return (d1 + d2 === 7);
}

function mostrarDados(dado1, dado2){
  document.getElementById('img-dado1').src = `img/dado${dado1}.png`;
  document.getElementById('img-dado2').src = `img/dado${dado2}.png`;
}

document.getElementById('btn-tirar').onclick = tirar1000Dados;
