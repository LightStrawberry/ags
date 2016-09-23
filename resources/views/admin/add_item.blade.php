<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<form action="/admin/add_item/{{ $shop->id }}" method="post" enctype="multipart/form-data">
    <p>请输入物品名称：</p><input type="text" name="item_name">
    <p>请输入物品描述：</p><input type="text" name="item_description">
    <p>添加图片:</p>
    <input id="img_input" name="file"  type="file" accept="image/*"/>
    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
    <input type="submit">
</form>
