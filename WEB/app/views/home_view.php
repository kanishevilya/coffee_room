<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/home.css">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/header.css">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/footer.css">
</head>

<body>

    <div class="headerSection">


        <div class="overlay">
            <?php include_once("header_template.php") ?>

            <div class="header_textBlock">
                <p class="header_title">
                    We’ve got your morning covered with
                </p>
                <p class="header_coffeeTitle">Coffee</p>
                <p class="header_subTitle">
                    It is best to start your day with a cup of coffee. Discover the
                    best flavours coffee you will ever have. We provide the best
                    for our customers.
                </p>
                <button class="header_btn" onclick="document.location='/ilya/EXAM/WEB/user/registration'">Join
                    us</button>
            </div>
        </div>
    </div>
    <main>
        <section class="first">
            <p class="first-title">our collection</p>
            <div class="types">
                <div class="type">
                    <div class="imgFirst img"></div>
                    <p class="type-title">Gran Espresso</p>
                    <p class="type-subtitle">Light and flavorful blend with cocoa and black pepper for an intense
                        experience</p>
                </div>
                <div class="type">
                    <div class="imgSecond img"></div>
                    <p class="type-title">Planalto</p>
                    <p class="type-subtitle">Brazilian dark roast with rich and velvety body, and hints of fruits and
                        nuts</p>
                </div>
                <div class="type">
                    <div class="imgThird img"></div>
                    <p class="type-title">Piccollo</p>
                    <p class="type-subtitle">Mild and smooth blend featuring notes of toasted almond and dried cherry
                    </p>
                </div>
                <div class="type">
                    <div class="imgFourth img"></div>
                    <p class="type-title">Danche</p>
                    <p class="type-subtitle">Ethiopian hand-harvested blend densely packed with vibrant fruit notes</p>
                </div>
            </div>
        </section>
        <section class="second">
            <div class="second-block">
                <div class="second-back">
                    <p class="second-title">Why choose us?</p>
                    <p class="second-subtitle">A large part of our role is choosing which particular coffees will be
                        featured
                        in our range. This means working closely with the best coffee growers to give
                        you a more impactful experience on every level.</p>
                </div>
                <div class="second-infoblocks">
                    <div class="info-block">
                        <div class="second-img1 second-img"></div>
                        <p class="info-block-title">Best quality</p>
                        <p class="info-block-subtitle">Discover an endless variety of the world’s best artisan coffee
                            from each of our roasters.</p>
                    </div>
                    <div class="info-block">
                        <div class="second-img2 second-img"></div>
                        <p class="info-block-title">Exclusive benefits</p>
                        <p class="info-block-subtitle">Special offers and swag when you subscribe, including 30% off
                            your first shipment.</p>
                    </div>
                    <div class="info-block">
                        <div class="second-img3 second-img"></div>
                        <p class="info-block-title">Free shipping</p>
                        <p class="info-block-subtitle">We cover the cost and coffee is delivered fast. Peak freshness:
                            guaranteed.</p>
                    </div>
                </div>
                <button class="catalogBtn" id="catalogBtn" onclick="document.location='/ilya/EXAM/WEB/catalog/'">Show catalog</button>
            </div>
        </section>
    </main>
    <?php include_once("footer_template.php") ?>
</body>

</html>