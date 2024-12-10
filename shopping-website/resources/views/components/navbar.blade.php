<header>
   <nav class="menu-container">
       <div class="menu-left">
           <ul>
               <li class="logo"><strong><em><a href="/">sHopper</a></em></strong></li>
               <li class="menu-item" id="contextActivator">Shop <span class="material-icons-sharp">expand_more</span></li>
               <li class="menu-item"><a href="/sales" class="menu-link">On Sale</a></li>
               <li class="menu-item">Contact</li>
           </ul>
       </div>

       <div class="menu-right">
           <x-searchbar></x-searchbar>
           <div class="user-menu-controls">
               @auth
                   <a href="/cart" class="menu-button"><span class="material-icons-sharp">shopping_cart</span>Cart <span id="cart-items-count" class="cart-info-badge"> {{ $cartItemsCount }}</span></a>
                   <a href="/profile" class="menu-button"><span class="material-icons-sharp">account_circle</span>Profile</a>
               @else
                   <a href="/login" class="menu-button"><span class="material-icons-sharp">account_circle</span>Login</a>
                   <a href="/signup" class="menu-button"><span class="material-icons-sharp">person_add</span>Register</a>
               @endauth
           </div>
       </div>

       <div class="menu-context" id="menuContext">
           <ul>
               <li><a href="/products/all">All Products</a></li>
               @foreach($categories as $category)
                   <li><a href="{{ route('product.listItems', $category->name) }}">{{ $category->name }}</a></li>
               @endforeach
           </ul>
       </div>
   </nav>
</header>


