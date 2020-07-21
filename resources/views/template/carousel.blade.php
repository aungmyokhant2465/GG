<div class="bd-example" style="background: #374e0c;">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{URL::to('images/shoppingCart1.png')}}" class="d-block" alt="..." style="height: 250px;">
                <div class="carousel-caption d-none d-md-block">
                    <h3 id="carouselText"><i>G</i><strong>G</strong> Shopping</h3>
                    <p>Here,you can buy all of objectives exist on universe.</p>
                </div>
            </div>
            @foreach($cars as $c)
                <div class="carousel-item">
                    <img src="{{route('image',['image_name'=>$c->image_name])}}" class="d-block " alt="..." style="height: 250px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 id="carouselText1">{{$c->title}}</h3>
                        <p>{{$c->description}}</p>
                    </div>
                </div>
                @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>