<li>
    <div class="checkbox">
        <label>
            <input type="checkbox" id="category" data-id="{{$category->id}}" data-name="{{$category->name}}" name="category[]" value="{{$category->id}}"
                   class="category" {{($categoriesForProduct !== [] ? $categoriesForProduct->contains($category)  : '') ? 'checked': ''}}>
            {{$category->name}}
        </label>
    </div>
</li>
@if(count($category->children) > 0)
    <ul>
        @foreach($category->children as $category)
            @include('partials.minicategoryadmin', ['category' => $category, 'categoriesForProduct' => $categoriesForProduct])
        @endforeach
    </ul>
@endif

