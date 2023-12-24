<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glegoo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/catalog.css">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/header.css">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/footer.css">
</head>

<body>
    <?php include_once("header_template.php") ?>

    <section class="catalog">

        <div class="left__part">
            <h1 class="left__price">Price</h1>
            <div class="line"></div>
            <div class="prices">
                <div class="">$ <input type="text" class="left__input__price"> </div>TO<div class=""> $ <input
                        type="text" class="right__input__price">
                </div>
            </div>
            <div class="left__btn">Filter</div>
            <div class="left__name">
                Name
                <input type="text" class="left__input__name">
            </div>
            <div class="line"></div>
            <div class="left__genre">
                Product genre
                <select name="" id="" class="select__genre">
                    <option value="all">all</option>
                </select>
            </div>
            <div class="line"></div>
        </div>

        <div id="productsBlock" class="productsBlock">

        </div>

    </section>
    <?php include_once("footer_template.php") ?>
    <script src="/ilya/EXAM/WEB/app/scripts/func.js"></script>
    <script src="/ilya/EXAM/WEB/app/scripts/catalog.js"></script>
</body>

</html>