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
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit">
</form>
