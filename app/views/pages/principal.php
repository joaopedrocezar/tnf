<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="shortcut icon" sizes="16x16" href="https://cdn-retailhub.com/the-north-face/4657f6f5-2db5-445d-9377-fef0e9338303.webp" type="image/x-icon">
    <title>The North Face</title>
</head>

<body>
    <div class="banner">
        <header>
            <div class="navbar">
                <img src="public/img/logo.png" alt="Início" class="logo">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="https://www.thenorthface.com/en-us/bags-and-gear/camp-shop-c829877">Camping</a></li>
                    <li><a href="https://www.thenorthfacerenewed.com/">Renewed</a></li>
                    <li><a href="https://www.thenorthface.com/en-us/help">Help</a></li>
                    <li><a href="https://www.thenorthface.com/en-us/about-us">About Us</a></li>
                </ul>
            </div>
        </header>
        <div class="content">
            <h1>EXPLORE THE UNKNOWN</h1>
            <p>Exploration is our oxygen. It shapes who we are, what we stand for and what we strive for. Because the
                path of discovery is also a path of progression. To see the world beyond the map and reimagine what each
                one of us can accomplish. Since 1966, we’ve continually explored new ways to make a difference for each
                other and our planet.</p>
            <div>
                <center>
                    <section>
                        <div id="duvida" class="merchBtn">
                            <h2>Discover Your Trail</h2>
                            <img src="images/arrow.png" alt="">
                            <p> <iframe width="100%" height="100%" src="https://www.youtube.com/embed/xbD_Pxv4MEw?si=77AR9xUEBB2ZSmZ9&autoplay=0&mute=1&loop=1&playlist=xbD_Pxv4MEw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </p>
                        </div>
                    </section>
                </center>
            </div>
        </div>
    </div>
    <center>
        <div class="slogan">
            <br>
            <h1>THE NORTH FACE captures the spirit of exploration in an environment that challenges harsh nature.</h1>
            <br>
        </div>
    </center>
    <section class="product">
        <h2 class="product-category">best selling</h2>
        <button class="pre-btn"><img src="public/img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="public/img/arrow.png" alt=""></button>
        <div class="product-container">
            <?php
            include_once("app/database/dados.php");
            foreach ($bestSellers as $id => $bestSelling) {
                $nome = $bestSelling["nome"];
                $preco = $bestSelling["preco"];
                $imagem = $bestSelling["imagem"];
                $parcelamento = $bestSelling["parcelamento_max_cj"];
                $descricao = $bestSelling["descricao"];
                include("app/views/components/bsellers.php");
            }
            ?>
        </div>
    </section>

    <!--Área Geral dos Produtos-->
    <div class="general">
        <?php
        include("app/database/dados.php");
        foreach ($products as $id => $product) {
            if (!empty($product["nome"]) && !empty($product["preco"]) && !empty($product["imagem"]) && !empty($product["parcelamento_max_cj"])) {
                $nome = $product["nome"];
                $preco = $product["preco"];
                $imagem = $product["imagem"];
                $parcelamento = $product["parcelamento_max_cj"];
                include("app/views/components/card.php");
            }
        }
        ?>
    </div>

    <script src="public/js/script.js" defer></script>
</body>

</html>