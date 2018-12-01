<div class="list-group">
  <h4 class="success">categories</h4>
@foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',0)->get() as $parent_cat )
  <a href="#main-{{ $parent_cat->id}}" class="list-group-item list-group-item-action" data-toggle="collapse">

<img src="{{ asset('images/categories/'.$parent_cat->image) }}"  width="50" alt="{{$parent_cat->image->name}}">
{{ $parent_cat->name }}

  </a>
<div class="collapse
 @if (Route::is('categories.show'))
    @if(App\Models\Category::ParentOrNotCategory($parent_cat,$category->id))
    show
    @endif
  @endif " id="main-{{ $parent_cat->id}}">
  <div class="child-rows">
    @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',$parent_cat->id)->get() as $child_cat )
    <a href="{{route('categories.show',$child_cat->id)}}" class="list-group-item list-group-item-action
      @if (Route::is('categories.show'))
        @if($child_cat->id==$category->id)
        active
        @endif
      @endif
      " >
    <img src="{{ asset('images/categories/'.$child_cat->image) }}"  width="50" alt="{ {$child_cat->image->name}}">
    {{ $child_cat->name }}

    </a>
    @endforeach
  </div>

</div>

@endforeach

</div>
