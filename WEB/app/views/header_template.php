<header>
    <div class="logo"></div>

    <div class="rightPart">

        <div class="lists">
            <ol class="baseList">
                <li><a href="/ilya/EXAM/WEB/home">HOME</a></li>
                <li><a href="/ilya/EXAM/WEB/catalog">CATALOG</a></li>
            </ol>
            <?php if (isset($_COOKIE["token"])): ?>
                <ol class="addList">
                    <li><a href="/ilya/EXAM/WEB/order">ORDERS</a></li>
                    <li><a href="/ilya/EXAM/WEB/cart">CART</a></li>
                </ol>
            <?php endif; ?>
        </div>
        <div class="userAction">
            <?php if (isset($_COOKIE["token"])): ?>
                <a id="logout" class="logout">Logout</a>
            <?php else: ?>
                <a  href="/ilya/EXAM/WEB/user/authentication" class="signin">Sign IN</a>
                <a  href="/ilya/EXAM/WEB/user/registration" class="signup">Sign UP</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<script src="/ilya/EXAM/WEB/app/scripts/func.js"></script>
<script src="/ilya/EXAM/WEB/app/scripts/logout.js"></script>