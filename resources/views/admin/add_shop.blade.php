<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
{!!Html::style('css/add-shop.css')!!}

<form action="/admin/edit_shop" method="post" enctype="multipart/form-data">
    商家名字:<input type="text" name="shop_name" value="{{ $shop->shop_name }}"><br>
    商家简介:<textarea name="shop_description" cols="50" rows="5">{{ $shop->shop_description }}</textarea><br>
    
    
    产品分类:<input type="radio" name="type" value="1">肉类
            <input type="radio" name="type" value="2">冻品
            <input type="radio" name="type" value="3">蔬菜
            <input type="radio" name="type" value="4">水产<br>
    
    产品细类:
    @foreach($tags as $tag)
        <input type="radio" name="tag" value="{{ $tag->id }}">{{ $tag->name }}
    @endforeach
    <br>
    
    商家地址:<input type="text" name="shop_address" value="{{ $shop->shop_address }}"><br>
    联系方式:<input type="text" name="shop_phone" value="{{ $shop->shop_phone }}"><br>
    微信号:<input type="text" name="shop_wechat" value="{{ $shop->shop_wechat }}"><br>
    
    添加图片:
    <input name="file"  type="file" accept="image/*"/>
    <!-- <input id="img_input" type="file" name="shop_image_url" accept="image/*"/>
    <label for="img_input" id="img_label">选择文件<i class="fa fa-plus fa-lg"></i></label> -->
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit">
</form>
