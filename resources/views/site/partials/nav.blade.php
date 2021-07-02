{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                </li>
                @foreach($categories as $cat)
                    @foreach($cat->items as $category)
                        @if ($category->items->count() > 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="{{ $category->slug }}">
                                    @foreach($category->items as $item)
                                        <a class="dropdown-item" href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a>
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</nav>
 --}}
 {{-- <div
 class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center"
>
 <div class="content">
   <h1 class="text-white">Test</h1>
 </div>
</div> --}}
<div class="owl-carousel owl-theme">
    @forelse($products as $product)
    <div class="product">
        <div class="product-image"> <a href="{{ route('product.show', $product->slug) }}" class="image">
            @if ($product->images->count() > 0)
                    <img  src="{{ asset('storage/'.$product->images->first()->full) }}" alt="...">
            @else
                <img class="pic-1" src="https://via.placeholder.com/176" alt="...">
            @endif
            </a> <a href="{{ route('product.show', $product->slug) }}" class="cart">Voir Produit</a>
        </div>
        <div class="content"> <span class="category"><a href="">Marque {{ $product->brand->name}} </a></span>
          <h3 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
          <div class="price">
            @if ($product->special_price)
                 {{ $product->price}}{{config('settings.currency_symbol')}}
                 <span>{{ $product->special_price}}{{config('settings.currency_symbol')}}</span>
            @else
               {{ $product->price}}{{config('settings.currency_symbol')}}
            @endif
          </div>
        </div>
      </div>
    @empty
          <p>0 Produit Trouvé.</p>
    @endforelse
</div>
