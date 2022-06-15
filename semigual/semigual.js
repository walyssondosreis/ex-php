function limpa_formulario() {
  let categoria = document.getElementById("inputGroupSelect02");
  let resumo = document.getElementById('floatingTextarea01');
  for (i = 1; i <= 12; i++) {
    let sistemas = document.getElementById(`sistema` + i);
    //console.log(`sistema`+i);
    sistemas.checked = false;
  }

  resumo.value = "";
  // caategoria.value="";
  categoria.getElementsByTagName('option')[0].selected = 'selected';
  //console.log(categoria);

}
