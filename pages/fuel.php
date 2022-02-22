<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTROLE DE ABASTECIMENTO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <!--header-->
    <header>
        <nav class="navbar">
        <img src="../public/images/logo.jpg" width="270px" height="70px">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="./fuel.php">Abastecimento</a></li>
            </ul>
        </nav>
    </header>

    <!--h2-->
    <div class="div-h2">
        <h2>Tabela de Abastecimento</h2>
    </div>
    <!--pesquisar-->
    <div id="search">
        <form action="./search.php" method="POST">
            <i class="fas fa-search"></i>
                <input type="text" name="carros" maxlength="50" required>
                    <button type="submit" id="btn-search">Buscar</button>
        </form>
    </div>
    <!--section-fuel-->
    <section class="section-fuel">
        <!--table-->
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th>CARRO</th>
                <th>PLACA</th>
                <th>MOTORISTA</th>
                <th>KM ATUAL</th>
                <th>KM FINAL</th>
                <th>KM PERCORRIDO</th>
                <th>R$ VALOR COMBUSTÍVEL</th>
                <th>ABASTECIMENTO (litros)</th>
                <th>R$ TOTAL ABASTECIDO</th>
                <th>MÉDIA KM/LTS</th>
                <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <!--php-->
                <?php
                include("../models/ClassConexao.php");
                // GET
                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
                // numero de paginas
                $register_page = 5;

                // sql
                $sql = $pdo->conectaDB("127.0.0.1","crud","root","")->prepare("SELECT * FROM abastecimentoDois ORDER BY id LIMIT :current_page, :register_page");
                $sql->bindValue(':current_page', ($page-1)*$register_page, PDO::PARAM_INT);
                $sql->bindValue(':register_page', $register_page, PDO::PARAM_INT);
                $sql->execute();
                $row = $sql->fetchAll(PDO::FETCH_ASSOC);
                $num_contacts = $pdo->conectaDB("127.0.0.1","crud","root","")->prepare("SELECT COUNT(*) FROM abastecimentoDois");
                $sql->execute();

                foreach($row as $rows){
                    //variaveis
                    $id = $rows['id'];
                    $carros = $rows['carros'];
                    $placas = $rows['placas'];
                    $motoristas = $rows['motoristas'];
                    $km_atual = $rows['km_atual'];
                    $km_final = $rows['km_final'];
                    $valor_combustivel = $rows['valor_combustivel'];
                    $litros_abastecimento = $rows['litros_abastecimento'];
                    //km - percorrido
                    $km = $rows['km_final'] - $rows['km_atual'];
                    //valor total gasto - combustivel
                    $fuel = $rows['valor_combustivel'] * $rows['litros_abastecimento'];
                    number_format($fuel, 2, ",", ".");
                    //media de km por litros
                    $media = ceil($km / $rows['litros_abastecimento']);
                
                ?>
                <tr>
                <td scope="row"><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['carros']; ?></td>
                <td><?php echo $rows['placas']; ?></td>
                <td><?php echo $rows['motoristas']; ?></td>
                <td><?php echo $rows['km_atual']; ?></td>
                <td><?php echo $rows['km_final']; ?></td>
                <td><?php echo $km; ?></td>
                <td><?php echo $rows['valor_combustivel']; ?></td>
                <td><?php echo $rows['litros_abastecimento']; ?></td>
                <td><?php echo $fuel; ?></td>
                <td><?php echo $media; ?></td>
                <td><a href="<?php echo " ../controllers/ControllerDelete.php?id={$rows['id']}"?>"><i class="fas fa-trash"></i></a> |
                <a href="<?php echo " ../pages/fuelUpdate.php?id={$rows['id']}"?>"><i class="fas fa-pencil"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
                <!-- pagination-->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="./fuel.php?page=<?php if($page > 1){echo $page-1;}?>">Voltar</a></li>
                        <li class="page-item"><a class="page-link" href="./fuel.php?page=<?php if($page*$register_page != $num_contacts){echo $page+1;}?>">Próximo</a></li>
                    </ul>
                </nav>
        </table>
    </section>

    <!--footer-->
    <footer>
            <p>Desenvolvido por Pedro Parro</p>
    </footer>

<!--scripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../public/js/script.js"></script>
</body>
</html>