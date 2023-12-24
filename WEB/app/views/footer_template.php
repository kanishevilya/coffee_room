<footer>
    <div class="footer-section">
        <div class="footer-logo"></div>
        <div class="footer-lists">
            <ol class="baseList">
                <li><a href="/ilya/EXAM/WEB/home">HOME</a></li>
                <li><a href="/ilya/EXAM/WEB/catalog">CATALOG</a></li>
            </ol>
            <?php if (isset($_COOKIE["token"])): ?>
                <ol class="addList">
                    <li><a href="">ORDERS</a></li>
                    <li><a href="">CART</a></li>
                </ol>
            <?php endif; ?>
        </div>
    </div>
</footer>