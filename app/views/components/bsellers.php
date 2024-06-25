<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>

<body>
    <div>
        <?php
        if (!function_exists('formatar')) {
            function formatar($numero)
            {
                return number_format((float)$numero, 2, ',', '.');
            }
        }
        ?>
        
    </div>



    <div class="product-card">
        <div class="product-image">
            <img src="public/img/<?php echo ($imagem); ?>" alt="Imagem indisponível, por favor, entre em contato com o suporte." class="product-thumb">
            <button class="card-btn"><?php echo "<a href='app/views/pages/descricaoBS.php?id=$id'>Ver mais detalhes</a>";?></button>
        </div>
        <div class="product-info">
            <h2 class="product-brand"><?= $nome ?></h2>
            <p class="product-short-description"><?= $descricao ?></p>
            <span class="actual-price"><span>De R$</span><?= formatar($preco) ?></span>
            <span class="price"><br> <span>Por </span> <?= $parcelamento ?><span> x de R$</span><?= formatar($preco / $parcelamento) ?><br><span> sem juros.</span></span>
        </div>
    </div>
        <script src="../../../public/js/script.js" defer></script>
</body>

</html>