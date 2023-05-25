function Converter() {
  var real = document.getElementById("real").value;
  var dolar = document.getElementById("dolar").value;
  var euro = document.getElementById("euro").value;
  var iene = document.getElementById("iene").value;

  if (isNaN(real) || isNaN(dolar) || isNaN(euro) || isNaN(iene)) {
    alert("Digite um valor válido!");
    return;
  } else if (real === "") {
    real = parseFloat(dolar) * 5.16;
  }
  if (dolar === "") {
    dolar = parseFloat(real) * 0.19;
  }
  if (euro === "") {
    euro = parseFloat(real) * 0.18;
  }
  if (iene === "") {
    iene = parseFloat(real) * 22.91;
  }

  document.getElementById("real").value = parseFloat(real);
  document.getElementById("dolar").value = parseFloat(dolar);
  document.getElementById("euro").value = parseFloat(euro);
  document.getElementById("iene").value = parseFloat(iene);
}
