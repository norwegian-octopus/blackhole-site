<header>
    <div class="header">
        <!-- <a href="/">
            <div class="logo">
                <span>BLACK HOLE</span>
            </div>
        </a> -->
        <div class="toolbar">

            <?php if (isset($_SESSION['valid_user'])) : // если сессия активна 
            ?>

                <div class="authorized">
                    <a href="/shop" class="main-shop-link">
                        <div class="shop-icon">SHOP</div>
                    </a>
                    <a href="/cart" class="main-cart-link">
                        <div class="cart-icon">CART</div>
                    </a>
                    <!-- <div class="cart-count"></div> -->
                    <a href="/account" class="main-account-link">
                        <div class="avatar-image">ACCOUNT</div>
                    </a>
                    <a href="/login/logout" class="main-logout-link">
                        <div class="logout-icon">LOGOUT</div>
                    </a>
                </div>
            <?php else : // если сессия неактивна 
            ?>
                <div class="non-authorized">
                    <a href="/cart" class="main-cart-link">
                        <div class="cart-icon">CART</div>
                        <!-- <div class="cart-count"></div> -->
                    </a>
                    <a class="main-login-link" href="/login">
                        <div class="main-login">SIGN IN</div>
                    </a>
                    <a class="main-signup-link" href="/signup">
                        <div class="main-signup">SIGN UP</div>
                    </a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</header>