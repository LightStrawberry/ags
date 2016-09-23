<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
{!!Html::style('css/bootstrap.css')!!}


店家:{{ $shop->shop_name }}
店铺详情:{{ $shop->shop_description }}

@foreach($shop->items as $i)
<li>
    <a href="/tag/{{ $i->id }}"><span>{{ $i->item_name }}</span></a>
    <a class="btn btn-default tag-del" href="/admin/del_item/{{ $i->id }}">删除</a>
</li>
@endforeach


<div class="shop-add-item">
    <a class="btn btn-default" href="/admin/add_item/{{ $shop->id }}">添加商品</a>
</div>
<div class="shop-add-img">
    <a class="btn btn-default" href="/admin/add_shop_image/{{ $shop->id }}">添加图片</a>
</div>
<div class="shop-edit">
    <a class="btn btn-default" href="/admin/edit_shop/{{ $shop->id }}">编辑</a>
</div>
<div class="shop-del">
    <a class="btn btn-default" href="/admin/del_shop/{{ $shop->id }}">删除</a>
</div>
