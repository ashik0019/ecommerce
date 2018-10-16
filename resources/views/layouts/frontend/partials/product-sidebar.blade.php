<div class="list-group">
    @foreach(App\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parentCategory)
    <a href="#main-{{ $parentCategory->id }}" class="list-group-item list-group-item-action" data-toggle="collapse">
        <img src="{{asset('images/categories/'.$parentCategory->image)}}" width="50" alt="{{$parentCategory->name}}">
        {{$parentCategory->name}}
    </a>
        <div class=" collapse" id="main-{{ $parentCategory->id }}">
            <div class="child-rows">
                @foreach(App\Category::orderBy('name','asc')->where('parent_id', $parentCategory->id)->get() as $childCategory)
                    <a href="#main-{{$parentCategory->id}}" class="list-group-item list-group-item-action">
                        <img src="{{asset('images/categories/'.$childCategory->image)}}" width="30" alt="{{$childCategory->name}}">
                        {{$childCategory->name}}
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
