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
   <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Twoje Zakupy
                <a href="{{route('master')}}" class="btn btn-outline-info btn-sm pull-right">Dodaj produkty</a>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                @foreach ($cart as $item)
                    <!-- PRODUCT -->

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>{{$item->name}}</strong></h4>
                            <h4>
                                <small>Product description</small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong>{{$item->price}} <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <input type="button" value="+" class="plus">
                                    <input type="number" step="1" max="99" min="1" value="{{$item->quantity}}" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" value="-" class="minus">
                                </div>
                            </div>

                            <div class="col-2 col-sm-2 col-md-2 text-right">

                                <form action="{{route('cart.delete',['products'=>$item->id])}}" method="POST">
                                 

                                   @method('DELETE')
                                    @csrf
                                           <button type="submit" class="btn btn-outline-danger btn-xs">Usuń
                                           </button>

                                </form>
                                
                            </div>

                        </div>
                    </div>
                    <hr>
                    <!-- END PRODUCT -->
                    @endforeach
                <div class="pull-right">
                    <a href="" class="btn btn-outline-secondary pull-right">
                        Update shopping cart
                    </a>
                </div>
            </div>
            <div class="card-footer">
                
                <div class="pull-right" style="margin: 10px">
                    
                    <div class="pull-right" style="margin: 5px">
                        Ilość: <b>{{$cartTotalQuantity}}</b>
                    </div>
                    <div class="pull-right" style="margin: 5px">
                        Cena <b>{{$total}}PL</b>
                    </div>
                    @if ($cart->count() > 0)
                    <form action="{{route('orders.store')}}" method='POST'>
                         @csrf
                         <button type="submit" class="btn btn-success pull-right">Zapłać</button>
                  
                    </form>
                    @endif
                </div>
            </div>
        </div>
</div>


@endsection
