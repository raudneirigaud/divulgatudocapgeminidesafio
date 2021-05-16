 
<?php require_once('../controller/ControllerLista.php');?>


<?php include('header.php');?>


<?php include('menu.php');?>


<table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cliente</th>
                <th>Data início</th>
                <th>Data Fim</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php new ControllerLista();  ?>

        </tbody>
    </table>


<?php include('footer.php');?>