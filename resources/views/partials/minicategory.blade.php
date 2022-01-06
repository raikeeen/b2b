
<li class="wrapper_drop_down c-category-menu__children__item py-2 text-left">
{{--    <a class="c-category-menu__children__link" id="category-item" href="{{route('products.index', ['category' => $category->slug])}}"
       title="{{$category->name}}">{{$category->name}}</a>--}}

        @if(isset($category->children[0]))
        <a  @if(isset($category->children[0])) class="d-flex align-items-center justify-content-between" @else style="padding-left: 10px" @endif
            href="{{route('products.index', ['category' => $category->slug])}}"
            title="{{$category->name}}">
            <span class="c-category-menu__name mr-1"> {{$category->name}}</span>
            <svg class="cat-icon-red float-right">
                <use xlink:href="#category-show">
                    <svg id="category-show" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 12 12">
                        <path d="M12,7.37H7.37V12H4.63V7.37H0V4.63H4.63V0H7.37V4.63H12Z"></path>
                    </svg>
                </use>
            </svg>
            <svg class="cat-icon-blue float-right">
                <use xlink:href="#category-hide">
                    <svg id="category-hide" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 10.5 10.5">
                        <path d="M10.46,2,7.19,5.25l3.27,3.27L8.52,10.46,5.25,7.19,2,10.46,0,8.52,3.31,5.25,0,2,2,0,5.25,3.31,8.52,0Z"></path>
                    </svg>
                </use>
            </svg>
        </a>
        @if (count($category->children) > 0)

            <ul class="drop-down-header c-category-menu__children_next dropdown-menu px-3" x-placement="right-start" style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;"
                id="category-drop">
                @foreach($category->children as $category)
                    @include('partials.minicategory', $category)
                @endforeach
            </ul>
        @endif
        @else
        <a class="c-category-menu__children__link" id="category-item" href="{{route('products.index', ['category' => $category->slug])}}"
           title="{{$category->name}}">{{$category->name}}</a>
        @endif
    </a>
</li>

