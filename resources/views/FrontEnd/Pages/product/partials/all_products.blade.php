<div class="row">
  @foreach ($products as $products2)
  <div class="col-md-3">
    <div class="card" >
      @php  $i=1;  @endphp
        @foreach ($products2->images as $image)
      @if($i>0)
        <a href="{{ route('products.show',$products2->slug)  }}"><img class="card-img-top feature-img" src="{{asset('images/products/'.$image->image)}}" alt="{{ $products2->title}}"></a>
      @endif
        @php  $i--;  @endphp
        @endforeach
        <div class="card-body">
          <h4 class="card-title"><a href="{{ route('products.show',$products2->slug)  }}">{{$products2->title}}</a></h4>
          <p class="card-text">Taka- {{$products2->price}} BDT</p>
          <!-- <a href="#" class="btn btn-primary">Add to Cart</a> -->
          @include('FrontEnd.pages.product.partials.cart-button')
        </div>
      </div>
  </div>
  @endforeach



</div>
<div class="mt-4 pagination">
  {{ $products->links() }}
</div>
