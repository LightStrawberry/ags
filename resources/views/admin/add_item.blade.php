{!!Html::style('css/add-item.css')!!}

<form action="/admin/add_item" autocomplete="on" method="post">
    产品名字:<input type="text" name="item_name"><br>
    产品简介:<input type="text" name="item_description"><br>
    
    
    产品分类:<input type="radio" name="type" value="1">肉类
            <input type="radio" name="type" value="2">冻品
            <input type="radio" name="type" value="3">蔬菜
            <input type="radio" name="type" value="4">水产<br>
    
    产品细类:
    @foreach($tags as $tag)
        <input type="radio" name="tag" value="{{ $tag->id }}">{{ $tag->name }}
    @endforeach
    <br>
    
    产品店家:<input type="text" name="shop_name"><br>
    
    <div id="preview_box"></div>
    <input id="img_input" type="file" name="item_image_url" accept="image/*"/>
    <label for="img_input" id="img_label">选择文件<i class="fa fa-plus fa-lg"></i></label>
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit">
</form>

<form id="imageform" method="post" enctype="multipart/form-data" action="/admin/add_item_image">
    <div id="up_status" style="display:none"><img src="loader.gif" alt="uploading"/></div> 
    <div id="up_btn" class="btn"> 
        <span>添加图片</span>
        <input id="image" type="file" name="image">
    </div> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="上传">
</form>
<div id="preview"></div>

{!!Html::script('js/jquery.js')!!}
