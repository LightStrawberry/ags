<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

<form action="/admin/add_shop_image/{{ $id }}" method="post" enctype="multipart/form-data">
添加图片:<br>
<input name="file"  type="file" accept="image/*"/>
<br>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit">
</form>
