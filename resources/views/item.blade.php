<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
{!!Html::style('css/bootstrap.css')!!}
{!!Html::style('css/shop-info.css')!!}

<h1>商品信息</h1>
<div class="item-info">
    <h3>{{ $item->item_name }}<h3>
    @foreach(json_decode($item->item_image_url) as $img)
    <img class="img-view" src="{{ $img }}">
    @endforeach
    <p>{{ $item->item_description }}<p>
</div>
