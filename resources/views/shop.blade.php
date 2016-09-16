<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
{!!Html::style('css/shop-info.css')!!}
<div class="header">
<table width="100%" border="0" cellspacing="0" class="header_nav">
	<tbody><tr>
    	<td width="10%" class="nav_left1"><a href="javascript:window.history.go(-1)">&lt;</a></td>
        <td width="80%" class="nav_title">产品详情</td>
        <td width="10%" class="nav_r"></td>
    </tr>
</tbody></table>
</div>
<div class="banner">
    <ul>
        @foreach(json_decode($shop->shop_image_url) as $img)
        <li><div class="shop-img"><a href=""><img class="img-responsive" src="{{ $img }}"></a></div></li>
        @endforeach
    </ul>
</div>
<div class="cp">
	<div class="cp_left">
    	<div>店铺：{{ $shop->shop_name }}</div>
        <div><h5>电话：{{ $shop->shop_name }}</h5></div>
    </div>
    <div class="cp_right"></div>
</div>
<div class="dz">
	<div class="dz_left">
        <div>地址：{{ $shop->shop_address }}</div>
        <div>微信号：{{ $shop->shop_wechat }}</div>
        <div>{{ $shop->shop_description }}</div>
    </div>
    <div class="dz_right"><img src="/img/bd.png" width="70%" height="auto"></div>
</div>

{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/unslider.js')!!}
<script>
$(function() {
    $('.banner').unslider();
});
</script>
