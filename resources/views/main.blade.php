@extends('master')

@section('main')

    
   
    
<main class="container">
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Pricing</h1>
    <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
  </div>


    
    
      

  <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    @foreach ($products as $product)
    <div class="col">
      <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 fw-normal">{{$product->name}}</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">{{$product->price}} zł<small class="text-muted"></small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>{{ Str::limit($product->description, 100) }}</li>
          
        </ul>
        <a href="{{url("/products/{$product->id}")}}">
        <button type="button" class="w-100 btn btn-lg btn-outline-primary">Dowiedz się więcej</button>
      </a>
      </div>
    </div>
    </div>
    @endforeach 
     
  </div>
  <div class="pagination justify-content-center">
          <div class="row ">
            <div class="col-md-12">
              {{ $products->links() }}
            </div>
            </div>
          </div>
</main>

 <!--  <a class="btn btn-outline-primary" href="#">Sign up</a>-->


@endsection
