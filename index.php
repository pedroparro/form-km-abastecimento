<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTROLE DE ABASTECIMENTO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css">
</head>
<body>
    <!--header-->
    <header>
        <nav class="navbar">
            <!--logo-->
        <img src="./public/images/logo.jpg" width="270px" height="70px">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./pages/fuel.php">Abastecimento</a></li>
            </ul>
        </nav>
    </header>
  <!--h2-->
  <div class="div-h2"><h2>Formulário de Abastecimento</h2></div>
    <!--section-index-->
    <section class="section-index">
      
        <div class="div-form">
            <!--form-->
            <form action="controllers/ControllerInsert.php" method="POST" id="form">
                <!--id-->
                <input type="hidden" name="id" id="id">
                <!--car-->
                <div class="forms">
                    <label for="carros">Carros
                        <select name="carros" id="carros">
                            <option value="all">Selecione</option>
                            <option data-name="Truck" value="Truck">Truck</option>
                            <option data-name="Iveco" value="Iveco">Iveco</option>
                            <option data-name="Kombi" value="Kombi">Kombi</option>
                            <option data-name="Fiorino" value="Fiorino">Fiorino</option>
                        </select>
                    </label>
                </div>
                <!--placas carros-->
                <div class="forms">
                    <label for="placas">Placas
                        <select name="placas" id="placas">
                            <option value="all">Selecione</option>
                            <option data-name="Truck" value="KLI-8569">KLI-8569</option>
                            <option data-name="Iveco" value="NBV-3652">NBV-3652</option>
                            <option data-name="Kombi" value="CDF-3698">CDF-3698</option>
                            <option data-name="Fiorino" value="ASD-1254">ASD-1254</option>
                        </select>
                    </label>
                </div>
                <!--motoristas-->
                <div class="forms">
                    <label for="motoristas">Motoristas
                        <select name="motoristas" id="motoristas">
                            <option >Selecione</option>
                            <option value="Enzo">Enzo</option>
                            <option value="Almir">Almir</option>
                            <option value="Zeca">Zeca</option>
                            <option value="Aniceto">Aniceto</option>
                        </select>
                    </label>
                </div>
                <!--km inicial-->
                <div class="forms">
                    <label for="km_atual">Km Atual
                        <input type="text" name="km_atual" placeholder="Km Atual" required>
                    </label>
                </div>
                <!--km final-->
                <div class="forms">
                    <label for="km_final">Km Final
                        <input type="text" name="km_final" placeholder="Km Final" required>
                    </label>
                </div>
                <!--valor combustivel-->
                <div class="forms">
                    <label for="valor_combustivel">Valor Combustível
                        <input type="text" name="valor_combustivel" placeholder="Valor Combustível" required>
                    </label>
                </div>
                <!--litros abastecimento-->
                <div class="forms">
                    <label for="litros_abastecimento">Litros Abastecido (litros)
                        <input type="text" name="litros_abastecimento" placeholder="Litros Abastecido" required>
                    </label>
                </div>
    
                <!--button-->
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </section>
    
    <!--footer-->
    <footer>
        <p>Desenvolvido por Pedro Parro</p>
    </footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./public/js/script.js"></script>
</body>
</html>