@extends('site.app')
@section('title', 'Accueil')

@section('content')
<section class="section-content bg padding-y">
    <div class="container">
        <h3>Popular Categories</h3>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4 col-home">
                <div class="image-rounded">
                    <a href="{{ route('category.show', $category->slug) }}">
                        <img src="{{ asset('storage/'.$category->image) }}" >
                        {{-- <dd>
                            {{ dd($category->image) }}
                        </dd> --}}
                    </a>
                </div>
                <h5 class="name-categoria">{{$category->name}}</h5>
                <div class="overlay">
                    <a href="{{ route('category.show', $category->slug) }}">
                        <div class="text">
                            <h5>{{strtoupper($category->name)}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="row providers">
            <img src="{{url('/')}}/img/footer.jpeg">
        </div> --}}
    </div>
</section>
@stop
