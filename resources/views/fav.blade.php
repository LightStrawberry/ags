<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
{!!Html::style('css/select-pos.css')!!}
{!!Html::style('css/bootstrap.css')!!}

<h1>我的收藏</h1>
<div class="pos-list">
    @foreach($favShops as $f)
    <a href="shop/{{ $f->id }}"><button id="btn" class="btn btn-default" type="button">{{ $f->shop_name }}</button></a>
    @endforeach
</div>
