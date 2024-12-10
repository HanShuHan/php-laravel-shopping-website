<div class="header_box">
    <div class="login_menu">
        <ul>
            <li>
                <a href="/">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="padding_10">Cart</span>
                </a>
            </li>
            <li>
                @auth
                    <a href="/account">
                        <i class="fa fa-user" aria-hidden="true">
                            <span class="padding_10">My Account</span>
                        </i>
                    </a>
                @else
                    <a href="/login">
                        <i class="fa fa-user" aria-hidden="true">
                            <span class="padding_10">Login</span>
                        </i>
                    </a>
                @endauth
            </li>
        </ul>
    </div>
</div>
