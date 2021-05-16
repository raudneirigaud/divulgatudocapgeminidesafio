<?php

include('header.php');

include('menu.php');
?>


<div class="container">

    <form class="form-signin" action="../controller/ControllerAnuncio.php" id="form2" name="form2" method="post" onsubmit="return validaForm2(this);">
        <h2 class="form-signin-heading">Cadastro de Anúncio</h2>

        <div class="form-group">

<label for="exampleFormControlInput1" class="form-label">Nome do Anúncio</label>
<input type="text" id="nome" name="nome" class="form-control" placeholder="Digite um Nome para o anúncio" required autofocus>

<label for="exampleFormControlInput1" class="form-label">Cliente</label>
<input type="text" id="cliente" name="cliente" class="form-control" placeholder="Digite o nome do cliente" required autofocus>


<label for="exampleFormControlInput1" class="form-label">Data Início</label>
<input type="date" id="datainicio" name="datainicio" class="form-control" placeholder="Escolha a data" required autofocus>


<label for="exampleFormControlInput1" class="form-label">Data Fim</label>
<input type="date" id="datafim" name="datafim" class="form-control" placeholder="Escolha a data" required autofocus>

<label for="exampleFormControlInput1" class="form-label">Valor</label>
<input type="number" id="valor" name="valor" class="form-control" placeholder="Digite um número" required autofocus>

<p>
</p>
          <button type="submit"  name="submit" class="btn btn-primary mb-3">CADASTRAR ANÚNCIO</button>
  
        </div>


     

    </form>



</div> <!-- /container -->


<?php

include('footer.php');

?>