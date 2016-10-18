<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
{!!Html::style('css/add-shop.css')!!}
{!!Html::style('css/bootstrap.css')!!}

<form id="shop" action="/admin/<?php if(isset($shop)) {echo 'edit_shop/'.$shop->id; } else {echo 'add_shop'; }?>" method="post" enctype="multipart/form-data">
    商家名字:<input type="text" name="shop_name" value="<?php if(isset($shop)) {echo $shop->shop_name;} ?>"><br>
    商家简介:<textarea name="shop_description" cols="50" rows="5"><?php if(isset($shop)) {echo $shop->shop_description;} ?></textarea><br>
    
    商家地区:<input type="radio" name="shop_pos" value="1" <?php if(isset($shop->shop_pos) and $shop->shop_pos == 1) {echo 'checked="checked"';} ?>>华南
            <input type="radio" name="shop_pos" value="2" <?php if(isset($shop->shop_pos) and $shop->shop_pos == 2) {echo 'checked="checked"';} ?>>白沙洲<br>
    
    产品分类:<input type="radio" name="type" value="1" <?php if(isset($shop->type) and $shop->type == 1) {echo 'checked="checked"';} ?>>生鲜肉类
            <input type="radio" name="type" value="2" <?php if(isset($shop->type) and $shop->type == 2) {echo 'checked="checked"';} ?>>海鲜水产
            <input type="radio" name="type" value="3" <?php if(isset($shop->type) and $shop->type == 3) {echo 'checked="checked"';} ?>>熟食调理
            <input type="radio" name="type" value="4" <?php if(isset($shop->type) and $shop->type == 4) {echo 'checked="checked"';} ?>>粮油副食
            <input type="radio" name="type" value="5" <?php if(isset($shop->type) and $shop->type == 5) {echo 'checked="checked"';} ?>>冻制品类<br>
    
    产品大类:
    @foreach($tags as $tag)
        <input type="radio" name="tag" value="{{ $tag->id }}" <?php if(isset($shop->tag) and $shop->tag == $tag->id) {echo 'checked="checked"';} ?>>{{ $tag->tag_name }}
    @endforeach
    <br>
    
    产品细类:
    @foreach($categories as $c)
        <input type="radio" name="category" value="{{ $c->id }}" <?php if(isset($shop->category ) and $shop->category == $c->id) {echo 'checked="checked"';} ?>>{{ $c->category_name }}
    @endforeach
    <br>
    
    商家地址:<input type="text" name="shop_address" value="<?php if(isset($shop)) {echo $shop->shop_address; } ?>"><br>
    联系方式:<input type="text" name="shop_phone" value="<?php if(isset($shop)) {echo $shop->shop_phone; } ?>"><br>
    微信号:<input type="text" name="shop_wechat" value="<?php if(isset($shop)) {echo $shop->shop_whchat; } ?>"><br>
    
    添加图片:
    <input id="img_input" name="file"  type="file" accept="image/*"/>
    <!-- <input id="img_input" type="file" name="shop_image_url" accept="image/*"/>
    <label for="img_input" id="img_label">选择文件<i class="fa fa-plus fa-lg"></i></label> -->
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
    <button class="btn btn-default" type="submit" form="shop" value="Submit">提交</button>
</form>
