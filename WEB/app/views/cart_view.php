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
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/cart.css">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/header.css">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/footer.css">
</head>

<body>
    <?php include_once("header_template.php") ?>

    <section class="cart">
        <div id="productsBlock" class="productsBlock">
            
        </div>
        <button class="makeOrderBtn" id="makeOrderBtn">Make an order</button>
    </section>
    <?php include_once("footer_template.php") ?>
    <script src="/ilya/EXAM/WEB/app/scripts/func.js"></script>
    <script src="/ilya/EXAM/WEB/app/scripts/cart.js"></script>
</body>

</html>