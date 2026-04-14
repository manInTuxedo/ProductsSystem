<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
    <div class='container'>
        <a class='navbar-brand text-white' href='/'>My Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                
                @auth
                    <li class="nav-item">
                        <a class='nav-link text-white' href='/getProducts'>Products</a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link text-white' href='/viewForm'>Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link text-white' href='/getCategories'>Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link text-white' href='/viewCategoryForm'>Add Category</a>
                    </li>
                @endauth

            </ul>

            <ul class="navbar-nav ms-auto">
                @guest
                    
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/register">Add Account</a>
                    </li>
                    
                @else
                    
                    <li class="nav-item">
                        <span class="nav-link text-info">Welcome, {{ Auth::user()->name }}</span> 
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-white" style="display: inline; cursor: pointer;">Log out</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>