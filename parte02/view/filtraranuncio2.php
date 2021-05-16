<?php

include('header.php');

include('menu.php');
?>



<?php

// recebe os dados do formulário, acessa o banco de dados, filtra de acordo com os parãmetros passados


$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "divulgatudo";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM anuncios";
if( isset($_POST['datainicio']) && isset($_POST['datafim']) ){
    $datainicio = mysqli_real_escape_string($con, htmlspecialchars($_POST['datainicio']));
    $datafim = mysqli_real_escape_string($con, htmlspecialchars($_POST['datafim']));
    $sql = "SELECT * FROM anuncios WHERE datainicio >= '$datainicio' and datafim  <= '$datafim'";
}
$result = $con->query($sql);
?>
<div class="container">

    <form class="form-signin" action="" name="form" method="post" onsubmit="return validaForm(this);">
        <h2 class="form-signin-heading">Filtrar</h2>

        <div class="form-group">


<label for="exampleFormControlInput1" class="form-label">Data Início</label>
<input type="date" id="datainicio" name="datainicio" class="form-control" placeholder="Escolha a data">


<label for="exampleFormControlInput1" class="form-label">Data Fim</label>
<input type="date" id="datafim" name="datafim" class="form-control" placeholder="Escolha a data" >


<p>
</p>
          <button type="submit" name="submit" class="btn btn-primary mb-3">FILTRAR</button>
  
        </div>


     

    </form>


    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cliente</th>
                <th>Data início</th>
                <th>Data Fim</th>
                <th>Dias Campanha</th>
                <th>Qtd máxima de cliques</th>
                <th>Qtd máxima de compartilhamentos</th>
                <th>Valor total investido</th>
                <th>Qtd máxima de visualizações</th>
            </tr>
        </thead>
        <tbody>
<?php
while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['nome']; ?></td>
    <td><?php echo $row['cliente']; ?></td>
    <td><?php echo (date('d-m-Y',strtotime($row['datainicio']))) ?></td>
    <td><?php echo (date('d-m-Y',strtotime($row['datafim']))) ?></td>
    <td>
    	<?php
$dias_anuncio = quantidadeDias($row['datainicio'],$row['datafim']);

echo $dias_anuncio;

    	?>

    </td>
    <td>
 <?php

$impressaoinicial = 30;



$visualizacoes_original = calculo_CP30 ( $row['valor'], $impressaoinicial);
	
$cliques_original = calculo_cliques_original(calculo_CP30 ( $row['valor'], $impressaoinicial));

echo $cliques_original * $dias_anuncio;
?>
    </td>
    <td>
    	<?php
$compart_original = calculo_compartilhamento_original(calculo_cliques_original(calculo_CP30($row['valor'], $impressaoinicial)));

echo $compart_original * $dias_anuncio;

?>


    </td>
    <td>
    	
R$ <?php echo $row['valor'] * $dias_anuncio; ?>



    </td>


    <td>

    	<?php
    	
$visualizacoes_por_compartilhamento = calculo_compartilhamento_views (calculo_compartilhamento_original(calculo_cliques_original(calculo_CP30($row['valor'], $impressaoinicial))));


for ($i=0; $i<3; $i++) {
			for ($j=0; $j< $compart_original; $j++) {
				$visualizacoes_por_compartilhamento = $visualizacoes_por_compartilhamento + 40;
                }
		}


// Calcular projeção aproximada da quantidade máxima de pessoas que visualizarão o mesmo anúncio (considerando o anúncio original + os compartilhamentos)

$totalimpressoes =  $visualizacoes_por_compartilhamento + $visualizacoes_original;

echo $totalimpressoes * $dias_anuncio;


?>
    </td>

    </tr>
    <?php

}
?>
</tbody>
    </table>
<?php
//variavel para representar: 30 pessoas visualizam o anúncio original (não compartilhado)


//Função cálculo o custo por 30 visualizações iniciais a apartir do valor investido
function calculo_CP30 ($var1 ,$var2) {
	$visualizacaooriginal = (double) $var1 * $var2;
	return $visualizacaooriginal;
}


//Função calcular a taxa de cliques (cada 100 pessoas que visualizam o anúncio 12 clicam nele) = 12% clicam
function calculo_cliques_original ($var1) {
	$cliques_post_original = (double) $var1 * 0.12;
	return $cliques_post_original;
}



//Função calcular taxa de compartilhamento (cada 20 pessoas que clicam no anúncio 3 compartilham nas redes sociais) = 15% compartilham
function calculo_compartilhamento_original ($var1) {
	$compart_post_original = (double) $var1 * 0.15;
	return $compart_post_original;
}



//Função calcular (compartilhamento nas redes sociais gera 40 novas visualizações) = Número de compartilhamento do anúncio origial multiplicado por 40, para encontrar o total de visualizações a cada compartilhamento
function calculo_compartilhamento_views ($var1){
   $compartilhamento_views = (double) $var1 * 40;
   return $compartilhamento_views;
}



// Cálculo para o mesmo anúncio ser compartilhado no máximo 3 vezes em sequência após o 1º compartilhamento

//A cada 1 compartilhamento, 3 em sequencia

// For Pai = Faz a soma de +40 visualizações por 3x, em cada compartilhamento original computado do anúncio original
// For filho =  //loop para contar números de compartilhamentos originais do anúncio e executar a soma de + 40 visualizações

for ($i=0; $i<3; $i++) {
			for ($j=0; $j< $compart_original; $j++) {
				$visualizacoes_por_compartilhamento = $visualizacoes_por_compartilhamento + 40;
                }
		}


// Calcular projeção aproximada da quantidade máxima de pessoas que visualizarão o mesmo anúncio (considerando o anúncio original + os compartilhamentos)

$totalimpressoes =  $visualizacoes_por_compartilhamento + $visualizacoes_original;

		

// função para contar quantidades de dias da campanha de anúncios
function quantidadeDias($data_inicial,$data_final) {
	$data_inicio = new DateTime($data_inicial);
    $data_fim = new DateTime($data_final);
     // Resgata diferença entre as datas
    $dateInterval = $data_inicio->diff($data_fim);
    return $dateInterval->days;


}



?>



</div> <!-- /container -->


<?php

include('footer.php');

?>