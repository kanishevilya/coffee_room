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

        <form id="form">
            <div class="left__part">
                <h1 class="left__price">Price</h1>
                <div class="line"></div>
                <div class="prices">
                    <div class="">$ <input type="text" name="min__price" class="left__input__price"> </div>TO<div class=""> $ <input
                            type="text" name="max__price" class="right__input__price">
                    </div>
                </div>
                <button class="left__btn" type="submit">Filter</button>
                <div class="left__name">
                    Name
                    <input type="text" name="input__name" class="left__input__name">
                </div>
                <div class="line"></div>
                <div class="left__allergens">
                    Product allergens
                    <select id="select__allergens" name="select__allergens" class="select__allergens">
                        <option value="0">Nothing</option>
                    </select>
                </div>
                <div class="line"></div>
                <div class="left__additions">
                    Product additions
                    <select id="select__additions" name="select__additions" class="select__additions">
                        <option value="0">Nothing</option>
                    </select>
                </div>
                <div class="line"></div>
                <div class="left__category">
                    Product category
                    <select id="select__category" name="select__category" class="select__category">
                        <option value="0">All</option>
                        <option value="1">Beverages</option>
                        <option value="2">Food</option>
                    </select>
                </div>
                <div class="line"></div>
                <div class="left__sort">
                    Sort by
                    <select id="select__sort" name="select__sort" class="select__sort">
                        <option value="0">Any</option>
                        <option value="1">Price 100$->1$</option>
                        <option value="2">Price 1$->100$</option>
                        <option value="3">Name A->Z</option>
                        <option value="4">Name Z->A</option>
                    </select>
                </div>
                <div class="line"></div>
            </div>
        </form>
        <div id="productsBlock" class="productsBlock">

        </div>

    </section>
    <?php include_once("footer_template.php") ?>
    <script src="/ilya/EXAM/WEB/app/scripts/func.js"></script>
    <script src="/ilya/EXAM/WEB/app/scripts/catalog.js"></script>
</body>

</html>