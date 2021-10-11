@unless ($breadcrumbs->isEmpty())
    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="c-breadcrumb d-flex flex-column flex-sm-row align-items-start align-items-sm-center px-0">
        <li class="c-breadcrumb__item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="c-breadcrumb__link d-flex algin-items-center" itemprop="item" href="{{route('home')}}" title="Pagrindinis">
                <span class="d-none">Pagrindinis</span>
                <span itemprop="name">
                    <svg class="c-icon c-icon--breadcrumb">
                        <svg id="breadcrumb-home-name" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                    <path d="M14,6.8,7,0,0,6.8V14H5.62V9.43H8.38V14H14Zm-1.25,6H9.63V8.21H4.37v4.57H1.25V7.31L7,1.72l5.75,5.59Z"></path>
                                </svg>
                        <use xlink:href="#breadcrumb-home-name"></use>
                    </svg>
                </span>
            </a>
        </li>

        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="c-breadcrumb__item d-flex align-items-center" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a class="c-breadcrumb__link u-text-nice" itemprop="item" href="{{ $breadcrumb->url }}" title="« grįžti į {{ $breadcrumb->title }}">
                        <span class="d-inline-block d-sm-none">« <span>grįžti į</span> &nbsp;</span>
                        <span itemprop="name">{{ $breadcrumb->title }}</span>
                    </a>
                </li>
            @else
                <li class="c-breadcrumb__item d-flex align-items-center c-breadcrumb__item--active u-text-nice" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <meta itemprop="item" content="{{ $breadcrumb->url }}">
                    <span itemprop="name">{{ $breadcrumb->title }}</span>
                </li>
            @endif

        @endforeach
    </ol>
@endunless



