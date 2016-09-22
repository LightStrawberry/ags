<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<form action="/admin/add_tag" method="post">
    <p>请选择大分类：</p>
    <select name="type">
        <option value="1" selected>生鲜肉类</option>
        <option value="2">海鲜水产</option>
        <option value="3">熟食调理</option>
        <option value="4">粮油副食</option>
    </select>
    <p>请输入小分类：</p><input type="text" name="tag_name">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
    <input type="submit">
</form>
