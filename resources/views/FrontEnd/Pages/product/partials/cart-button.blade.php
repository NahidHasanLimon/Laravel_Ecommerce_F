<form class="form-inline" action="{{route('carts.store')}}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $products2->id }}">

  <button type="submit" class="btn btn-warning"name="button"><i class="fa fa-plus"></i>Add to Cart</button>

</form>
