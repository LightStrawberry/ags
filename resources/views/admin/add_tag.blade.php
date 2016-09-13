<form action="/admin/add_tag" method="post">
    <p>请选择大分类：</p>
    <select name="type">
        <option value="1" selected>肉类</option>
        <option value="2">冻品</option>
        <option value="3">蔬菜</option>
        <option value="4">水产</option>
    </select>
    <p>请输入小分类：</p><input type="text" name="name">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
    <input type="submit">
</form>
