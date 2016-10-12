<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
{!!Html::style('css/fav.css')!!}
{!!Html::style('css/bootstrap.css')!!}

<h3>我的收藏</h3>
<div class="fav-list">
    @foreach($favShops as $f)
    <a href="/shop/{{ $f->id }}">
        <div class="fav-item">
            <dl>
                <dt>
                <div class="pic-div">
                    <a href="/shop/{{ $f->id }}">
                        <img src="{{ json_decode($f->shop_image_url)[0].'?imageView2/2/w/76/h/76/interlace/0/q/100' }}">
                    </a>
                </div>
                </dt>
                <dd>
                    <a href="/shop/{{ $f->id }}">
                        <p class="shop-name">{{ $f->shop_name }}</p>
                    </a>
                </dd>
            </dl>
        </div>
    </a>
    @endforeach
</div>
