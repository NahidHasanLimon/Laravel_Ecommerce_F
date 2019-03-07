<div class="row">
  @foreach ($products as $products2)
  <div class="col-md-3"style="justify-content: center;
  /* text-transform: uppercase; */
  color:#f57224;
  height: 330px;

  font-weight: 400;">
    <div class="card">
      @php  $i=1;  @endphp
        @foreach ($products2->images as $image)
      @if($i>0)
        <a href="{{ route('products.show',$products2->slug)  }}"><img class="card-img-top feature-img" src="{{asset('images/products/'.$image->image)}}" alt="{{ $products2->title}}"></a>
      @endif
        @php  $i--;  @endphp
        @endforeach
        <div class="card-body ">
          <h4 class="card-title mt-1 mb-1"style="height:20px; font-size: 16px;"><a href="{{ route('products.show',$products2->slug)  }}">{{str_limit($products2->title, $limit = 20, $end = '  ..')}}</a></h4>
          <p class="card-text mt-5 mb-2" style="height:25px;margin-top:2px;margin-bottom:1px;">৳ {{$products2->price}} </p>
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
