<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
{!!Html::style('css/bootstrap.css')!!}
{!!Html::style('css/admin.css')!!}
<div class="shops-wrapper row">
    <a class="btn btn-default col-48 shop-add-btn" href="admin/add_shop">添加商店</a>
    <a class="btn btn-default col-48 shop-add-btn" href="admin/tag">商店分类</a>
    <ul class="shop-list">
        @foreach($shops as $shop)
        <li>
            <div class="shop-info">
                <a class="btn btn-default shop-name" href="#">{{ $shop->shop_name }}</a>
            </div>
            <div class="shop-add-img">
                <a class="btn btn-default" href="admin/add_shop_image/{{ $shop->id }}">图片</a>
            </div>
            <div class="shop-edit">
                <a class="btn btn-default" href="admin/edit_shop/{{ $shop->id }}">编辑</a>
            </div>
            <div class="shop-del">
                <a class="btn btn-default" href="/admin/del_shop/{{ $shop->id }}">删除</a>
            </div>
        </li>
        @endforeach
    </ul>
</div class="shops-wrapper row">
