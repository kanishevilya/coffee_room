<div class="headerSection">
    <div class="logo"></div>

    <div class="rightPart">

        <div class="lists">
            <ol class="baseList">
                <li>HOME</li>
                <li>CATALOG</li>
            </ol>
            <?php if (isset($_COOKIE["token"])): ?>
                <ol class="addList">
                    <li>ORDERS</li>
                    <li>CART</li>
                </ol>
            <?php endif; ?>
        </div>
        <div class="userAction">
            <?php if (isset($_COOKIE["token"])): ?>
                <span class="logout">Logout</span>
            <?php else: ?>
                <span class="signin">Sign IN</span>
                <span class="signup">Sign UP</span>
            <?php endif; ?>
        </div>
    </div>
</div>