<?php
$titulo_pag = 'Vox: Cadastrar chamado';
include "header.php";

?>

<body class="text-center">

  <main class="form-signin rounded-3 border border-2 form-control w-100 m-auto">
    <form method="POST" class="rounded border" style="padding: 20px;">
      <img class="mb-4" src="assets/picture/logox1.png" alt="" width="60" height="40">
      <!-- <img class="mb-4" src="assets/picture/marcavox.png" alt="" width="110" height="50"> -->
      <h1 class="fs-6">REGISTRAR CHAMADO <br> PARA SETOR DE TECNOLOGIA </h1>

      <!-- Campo nome de usuário -->
      <div class="form-floating rounded mt-3">
        <input readonly name="usuario" type="text" class="form-control" id="floatingInput" placeholder="name" value="<?php echo $usuario['userid'] ?>">
        <label for="floatingInput">Chamado aberto pelo usuário</label>
      </div>

      <!-- Campo setor -->
      <div class="input-group form-floating">
        <select name="setor" class="form-select" id="inputGroupSelect01">
          <!-- <option value="0" selected></option> -->
          <?php foreach ($setores as $setor) : ?>
            <option value="<?php echo $setor['id'] ?>" <?php if ($setor['id'] == $usuario['setorid']) : echo 'selected'; endif; ?>>
              <?php echo $setor['nome'] ?> </option>
          <?php endforeach ?>
        </select>
        <label for="inputGroupSelect01">Selecione o setor da solicitação</label>
      </div>

      <!-- Campo categoria -->
      <div class="input-group mb-3 form-floating">
        <select name="categoria" class="form-select" id="inputGroupSelect02" style=<?php if (isset($lista_erros['categoria'])) : echo '"background-color: #F63C53; color: white;"';endif ?>>
          <option value="0"></option>
          <?php foreach ($categorias as $categoria_list) : ?>
            <option value="<?php echo $categoria_list['id'] ?>" <?php if(isset($_POST['categoria']) && ($_POST['categoria']==$categoria_list['id'])): echo 'selected';endif?>> 
            <?php echo $categoria_list['nome'] ?> </option>
          <?php endforeach ?>
        </select>
        <label for="inputGroupSelect02" style=<?php if (isset($lista_erros['categoria'])) : echo '"color: white;"';endif ?>>Selecione o tipo de solicitação</label>
      </div>

      <!-- Campo Sistemas -->
      <!-- <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"> -->
      <div>
        <?php foreach ($sistemas as $sistema) : ?>
          <input type="checkbox" class="btn-check" name="sistemas[]" id='<?php echo "sistema" . $sistema['id'] ?>' value="<?php echo $sistema['id']?>" autocomplete="off" 
          <?php if(isset($_POST['sistemas']) && (in_array($sistema['id'],$_POST['sistemas']))): echo 'checked'; endif ?>>
          <label class="botao btn btn-outline-primary" for='<?php echo "sistema" . $sistema['id'] ?>'>
            <?php echo nl2br($sistema['nome']) ?>
          </label>
        <?php endforeach ?>
      </div>

      <!--  -->

      <!-- Campo resumo/descrição -->
      <div class="form-floating mt-3">
        <textarea name="resumo" class="form-control" placeholder="text" id="floatingTextarea01" style=<?php if (isset($lista_erros['resumo'])) : echo '"height: 100px; background-color: #F63C53; color: white;"';else: echo '"height: 100px;"'; endif ?>><?php if(isset($_POST['resumo'])): echo $_POST['resumo']; endif?></textarea>
        <!-- <textarea name="resumo" class="form-control" placeholder="text" id="floatingTextarea01" style="height: 100px; background-color: #F63C53; color: white;"></textarea> -->
        <label for="floatingTextarea01" style=<?php if (isset($lista_erros['resumo'])) : echo '"color: white;"';endif ?>>Resumo objetivo do problema...</label>
      </div>

      <!-- Campo anexar arquivo -->
      <div class="input-group mb-3 fs-6">
        <!-- <label class="input-group-text" for="inputGroupFile01">Anexar</label> -->
        <input type="file" class="form-control" id="inputGroupFile01" multiple="multiple">
      </div>

      <!-- Campo botões | Cancelar | Confirmar -->
      <div class="btn-group" role="group">
        <!-- class=" gap-2"> -->
        <!-- <input type="reset" value="Cancelar" class=" btn btn-lg btn-outline-secondary"  > -->
        <button class=" btn btn-lg btn-outline-secondary " type="button" onclick="limpa_formulario();">Cancelar</button>
        <button class=" btn btn-lg btn-outline-primary" type="submit">Confirmar</button>
      </div>
      <!-- Campo creditos -->
      <p class="mt-3 text-muted">&copy; <?php echo "Vox Conexão " . date('Y') ?></p>
    </form>
  </main>

  <script src="semigual.js"></script>
</body>

</html>