<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" sizes="16x16" href="https://cdn-retailhub.com/the-north-face/4657f6f5-2db5-445d-9377-fef0e9338303.webp" type="image/x-icon">
    <title>The North Face</title>
</head>

<body class="bodyDesc">
    <header>
        <div class="navbar">
            <a href="../../../index.php"><img src="../../../public/img/logo.png" alt="Início" class="logo"></a>
            <ul>
                <li><a href="../../../index.php">Home</a></li>
                <li><a href="https://www.thenorthface.com/en-us/bags-and-gear/camp-shop-c829877">Camping</a></li>
                <li><a href="https://www.thenorthfacerenewed.com/">Renewed</a></li>
                <li><a href="https://www.thenorthface.com/en-us/help">Help</a></li>
                <li><a href="https://www.thenorthface.com/en-us/about-us">About Us</a></li>
            </ul>
        </div>
    </header>





    <?php
    function formatar($numero)
    {
        return number_format((float)$numero, 2, ',', '.');
    }

    include_once("../../database/dados.php");
    $id = $_GET["id"];
    $product = $products[$id];
    $nome = $product["nome"];
    $preco = $product["preco"];
    $imagem = $product["imagem"];
    $parc_cj = $product["parcelamento_max_cj"];
    $parc_sj = $product["parcelamento_max_sj"];
    $descricao = $product["descricao"];
    $juros_mes = $product["juros"];

    $preco_mostrar = formatar($preco);
    $parcela_max = formatar($preco / $parc_sj);
    ?>
    <div class='cardDesc'>
        <nav>
            <a href='javascript:history.back()'>
            <svg class='arrow' version='1.1' viewBox='0 0 512 512' width='512px' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                <polygon points='352,115.4 331.3,96 160,256 331.3,416 352,396.7 201.5,256 ' stroke='#727272' />
            </svg>
            <span class="back">Voltar</span></a>
            <svg class=' heart' version='1.1' viewBox='0 0 512 512' width='512px' xml:space='preserve' stroke='#727272' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                <path d='M340.8,98.4c50.7,0,91.9,41.3,91.9,92.3c0,26.2-10.9,49.8-28.3,66.6L256,407.1L105,254.6c-15.8-16.6-25.6-39.1-25.6-63.9  c0-51,41.1-92.3,91.9-92.3c38.2,0,70.9,23.4,84.8,56.8C269.8,121.9,302.6,98.4,340.8,98.4 M340.8,83C307,83,276,98.8,256,124.8  c-20-26-51-41.8-84.8-41.8C112.1,83,64,131.3,64,190.7c0,27.9,10.6,54.4,29.9,74.6L245.1,418l10.9,11l10.9-11l148.3-149.8  c21-20.3,32.8-47.9,32.8-77.5C448,131.3,399.9,83,340.8,83L340.8,83z' stroke='#727272' />
            </svg>
        </nav>
        <div class='photo'>
            <img src='../<?= $imagem ?>'>
        </div>
        <div class='description'>
            <h2><?= $nome ?></h2>
            <h4>R$<?= $preco_mostrar ?></h4>
            <h1> <?= $parc_sj ?> x de R$<?= $parcela_max ?> sem juros</h1>
            <p><?= $descricao ?></p>

            <button class="old" onclick="abrirModal()"> Ver todas as parcelas</button>
            <button class="old">Adicionar ao Carrinho</button>
            <button class="old">Lista de <br>Desejos</button>
            <div class="janela-modal" id="janela-modal">
                <div class="modal">
                    <button class="fechar" id="fechar"><span>X</span></button>
                    <div class="title-modal">
                        <h1>Parcelamento</h1>
                    </div>
                    <div class="container-modal">
                        <table>
                            <caption>
                                Opções de Parcelamento
                            </caption>
                            <thead>
                                <tr>
                                    <th>Quantidade Parcelas</th>
                                    <th>Valor das Parcelas</th>
                                    <th>Valor Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $parcelas = 1;

                                while ($parcelas <= $product["parcelamento_max_cj"]) {
                                    $prestacao = 0;
                                    $vlrtt = 0; // Valor total a ser pago
                                    if ($parcelas <= $product["parcelamento_max_sj"]) {
                                        // Parcelamento sem juros
                                        $prestacao = $product["preco"] / $parcelas;
                                        $vlrtt = $product["preco"]; // Valor total sem juros é o valor do produto
                                        echo "<tr>
                                                <td>$parcelas x de</td>
                                                <td>R$" . number_format($prestacao, 2, ',', '') . " sem juros</td>
                                                <td>R$" . number_format($vlrtt, 2, ',', '') . "</td>
                                             </tr>";
                                    } else if ($parcelas > $product["parcelamento_max_sj"] && $parcelas <= $product["parcelamento_max_cj"]) {
                                        // Parcelamento com juros simples a partir da quarta parcela
                                        $porc_juros = $product['juros'] / 100;
                                        // Juros aplicados somente a partir da quarta parcela
                                        $juros = $product['preco'] * $porc_juros * ($parcelas - $product["parcelamento_max_sj"]);
                                        $vlrtt = $product['preco'] + $juros;
                                        $prestacao = $vlrtt / $parcelas;
                                        echo "<tr>
                                                        <td>$parcelas x de</td>
                                                        <td>R$" . number_format($prestacao, 2, ',', '') . " com juros (" . $product['juros'] . "% ao mês)</td>
                                                        <td>R$" . number_format($vlrtt, 2, ',', '') . "</td>
                                                    </tr>";
                                    }
                                    $parcelas++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="../../../public/js/script.js" defer></script>
</body>

</html>