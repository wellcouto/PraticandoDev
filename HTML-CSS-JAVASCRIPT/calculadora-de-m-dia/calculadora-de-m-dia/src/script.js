function Calcular() {
  var valorElemento1 = document.getElementById("nota1");
  var nota1 = valorElemento1.value;
  var valorElemento2 = document.getElementById("nota2");
  var nota2 = valorElemento2.value;
  var valorElemento3 = document.getElementById("nota3");
  var nota3 = valorElemento3.value;
  var valorElemento4 = document.getElementById("nota4");
  var nota4 = valorElemento4.value;
  var notaTotal = parseFloat(nota1)+parseFloat(nota2)+parseFloat(nota3)+parseFloat(nota4);

  var notaFinal = notaTotal /4;
  console.log(notaFinal);

  var elementoResultado = document.getElementById("Resultado");
  var mediaFinal = "A media final é " + notaFinal;
  elementoResultado.innerHTML = mediaFinal;
}