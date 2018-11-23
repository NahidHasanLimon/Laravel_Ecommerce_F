<div class="row">
  @foreach ($products as $products2)
  <div class="col-md-3">
    <div class="card" >
      @php  $i=1;  @endphp
        @foreach ($products2->images as $image)
      @if($i>0)
        <a href=""><img class="card-img-top feature-img" src="{{asset('images/products/'.$image->image)}}" alt="Card image"></a>
      @endif
        @php  $i--;  @endphp
        @endforeach
        <div class="card-body">
          <h4 class="card-title">{{$products2->title}}</h4>
          <p class="card-text">Taka- {{$products2->price}} BDT</p>
          <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
  </div>
  @endforeach



</div>
<div class="mt-4 pagination">
  {{ $products->links() }}
</div>
