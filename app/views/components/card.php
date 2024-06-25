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


    <div class="card">
        <div class="imgBox">
            <img src="public/img/<?= htmlspecialchars($imagem); ?>" alt="Imagem indisponível, por favor, entre em contato com o suporte." class="mouse">
        </div>
        <div class="contentBox">
            <h3><?= htmlspecialchars($nome); ?></h3>
            <br><h3><?= htmlspecialchars($parcelamento); ?><span>x de R$</span><?= formatar($preco / $parcelamento) ?><span> sem juros</span></h3>
            <h3><span>ou</span></ h3>
            <h2 class="price1"><span>R$</span><?= formatar($preco); ?><span> à vista</span></h2>
            <a href="app/views/pages/descricao.php?id=<?= urlencode($id); ?>" class="buy">Ver mais detalhes</a>
        </div>
    </div>

    <script src="../../../public/js/script.js" defer></script>
</body>

</html>