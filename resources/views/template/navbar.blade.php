<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{route('/')}}"><span class="img img-circle"><img src="{{URL::to('images/shoppingCart1.png')}}" style="height: 25px"></span><i>G</i><strong>G</strong> Shopping</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('show.cart')}}">
                    <span class="badge badge-light">
                        @if(Session::has('cart'))
                            {{Session::get('cart')->totalQty}}
                        @endif
                    <i class="fa fa-shopping-cart"></i>
                    </span>
                    <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-info" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach($cate as $c)
                        <a class="dropdown-item" href="{{route('by.category',['id'=>$c->id])}}">{{$c->cate_name}}</a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="{{route('search')}}">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="q">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>