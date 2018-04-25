"uses strict";

let productos = [];
let precios = [];

function mostrarProductos() {
  let filas = '';
  document.querySelector('tbody').innerHTML = '';
  for (var i = 0; i < productos.length; i++) {
    // filas +=`
    //     <tr>
    //       <td>${productos[i]}</td>
    //       <td>$${precios[i]}</td>
    //     </tr>
    // `;

      let tr = document.createElement("tr");
      let tdProducto = document.createElement("td");
      tdProducto.innerHTML = productos[i];
      let tdPrecio = document.createElement("td");
      tdPrecio.innerHTML = precios[i];
      tr.appendChild(tdProducto);
      tr.appendChild(tdPrecio);
      document.querySelector('tbody').appendChild(tr);
  }
  //document.querySelector('tbody').innerHTML = filas;
  mostrarTotal();
}

function mostrarTotal() {
  document.querySelector('tfoot tr td:nth-child(2)').innerHTML = calcular();
}

function agregar(e){
  debugger;
  let producto = document.getElementById('producto').value;
  let precio = document.getElementById('precio').value;
  productos.push(producto);
  precios.push(parseInt(precio));
  console.log(productos);
  console.log(precios);
  mostrarProductos();
}

function calcular() {
  let suma = 0;
  for (var i = 0; i < precios.length; i++) {
    suma += precios[i];
  }
  return suma;
}

document.getElementById('btn-agregar').onclick = agregar;
document.getElementById('btn-calcular').onclick = calcular;
