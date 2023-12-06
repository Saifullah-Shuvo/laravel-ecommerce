@foreach ($latestProduct as $data)
<li class="col-xl-3 col-lg-4 col-sm-6 col-12">
    <div class="product-wrap">
        <div class="product-img">
            <span>Sale</span>
            <img src="{{asset('admins')}}/productimage/{{ $data->thambnail }}" alt="">
            <div class="product-icon flex-style">
                <ul>
                    <li><a class="edit" data-id = "{{ $data->id }}" data-toggle="modal" data-target="#popularproductdetails"
                        href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                    <li><a href="{{ route('wishlist.add',['id'=>$data->id]) }}"><i class="fa fa-heart"></i></a></li>
                    <li><a href="{{ route('cart.add',['id'=>$data->id]) }}"><i class="fa fa-shopping-bag"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="product-content">
            <h3><a href="{{ route('home.product.details',['id'=>$data->id]) }}">{{ $data->name }}</a></h3>
            <p class="pull-left">${{ $data->selling_price }}

            </p>
            <ul class="pull-right d-flex">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star-half-o"></i></li>
            </ul>
        </div>
    </div>
</li>
@endforeach
