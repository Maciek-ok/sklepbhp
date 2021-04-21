@extends('master')

@section('main')

@if(session('status'))
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="alert alert-{{session('status')['type']}}">
        {{session('status')['content']}}
        
      </div>
              
    </div>
  </div>
</div>
@endif   
    
<div class="container">
  

  
<div class="card">
  <div class="row">
    <aside class="col-sm-5 border-right">
<article class="gallery-wrap"> 
<div class="img-big-wrap">
  
  @if ($products->photos->count())
<div>
   <a href="#"><img src="{{asset('/'. $products->firstPhoto()->photo)}}"></a>
</div>
    @endif
    
  
</div> <!-- slider-product.//
<div class="img-small-wrap">
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
</div> --> <!-- slider-nav.// -->
</article> <!-- gallery-wrap .end// -->
    </aside>
    <aside class="col-sm-7">
<article class="card-body p-5">
  <h3 class="title mb-3">{{$products->name}}</h3>

<p class="price-detail-wrap"> 
  <span class="price h3 text-warning"> 
    <span class="currency"></span><span class="num">{{$products->price}}</span>
  </span> 
  <span>PLN</span> 
</p> <!-- price-detail-wrap .// -->
<dl class="item-property">
  <dt>Opis</dt>
  <dd><p>{{$products->description}} </p></dd>
</dl>
<dl class="param param-feature">
  <dt>Model#</dt>
  <dd>12345611</dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Color</dt>
  <dd>Black and white</dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Delivery</dt>
  <dd>Russia, USA, and Europe</dd>
</dl>  <!-- item-property-hor .// -->

<hr>
<form action="{{route('add_to_cart',['products'=>$products->id])}}" method="POST">
  @csrf
  <div class="row">
    <div class="col-sm-5">
      <dl class="param param-inline">
        <dt>Ilość: </dt>
        <dd>
          <select name="amount" class="form-control form-control-sm" style="width:70px;">

            @for ($i = 1; $i < 10; $i++)
                <option> {{ $i }}</option>
            @endfor
           
          </select>
        </dd>
      </dl>  <!-- item-property .// -->
    </div> <!-- col.// -->
    
  </div> <!-- row.// -->
  <hr>
  <a href="#" class="btn btn-lg btn-primary text-uppercase"> Kup szkolenie </a>
  <button type="submit" class="btn btn-lg btn-outline-primary text-uppercase">
  <i class="fas fa-shopping-cart"></i>Dodaj do koszyka
  </button>

  <!--
  <a href="" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Dodaj do koszyka </a>
  -->
  </form>
</article> <!-- card-body.// -->
    </aside> <!-- col.// -->
  </div> <!-- row.// -->
</div> <!-- card.// -->


</div>

</article>
 <!--  <a class="btn btn-outline-primary" href="#">Sign up</a>-->


@endsection
