<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <img src="{{ asset('img/nature-logo.jpg') }}" width="42" height="42" style="margin-top:5px" />
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav">
              <li><a href="/ecommerce/public/">Home</a></li>
              <li><a href="/ecommerce/public/products">Produits</a></li>
              <li><a href="/ecommerce/public/customers">Clients</a></li>
              <li><a href="/ecommerce/public/orders">Commandes</a></li>
           </ul>
           <a href="/ecommerce/public/excel" class="btn btn-success" style="float:right;margin-top:7px;margin-left:4px;">Exporter</a>
           <a href="/ecommerce/public/import" class="btn btn-success" style="float:right;margin-top:7px;margin-left:10px;">Importer</a>
           <a href="/ecommerce/public/products/create" class="btn btn-primary" style="float:right;margin-top:7px;">Ajouter un produit</a>
        </div>
    </div>
</nav>