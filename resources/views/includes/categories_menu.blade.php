@isset($categories)

    @foreach($categories as $category)
        <li>
            <a class="waves-effect waves-cyan" href="{{route('category_products', $category->id )}}" data-i18n="">
                <i class="material-icons">shopping_basket</i>
                <span>{{$category->name}}</span>
            </a>
        </li>
    @endforeach

@endisset