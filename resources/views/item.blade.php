{!!Html::style('css/shop-info.css')!!}
<figure>
    <div class="addWrap">
        <div class="swipe" id="mySwipe" style="visibility: visible;">
            <div class="swipe-wrap" style="width: 1119px;">
                <div data-index="0" style="width: 373px; left: 0px; transition-duration: 300ms; transform: translate(0px, 0px) translateZ(0px);"><a href="javascript:;"><img class="img-responsive" src="http://demo.mycodes.net/shouji/Goods/img/u67.png"></a></div>
                <div data-index="1" style="width: 373px; left: -373px; transition-duration: 0ms; transform: translate(373px, 0px) translateZ(0px);"><a href="javascript:;"><img class="img-responsive" src="http://demo.mycodes.net/shouji/Goods/img/u67.png"></a></div>
                <div data-index="2" style="width: 373px; left: -746px; transition-duration: 300ms; transform: translate(373px, 0px) translateZ(0px);"><a href="javascript:;"><img class="img-responsive" src="http://demo.mycodes.net/shouji/Goods/img/u67.png"></a></div>
            </div>
        </div>
        <ul id="position">
            <li class="cur"></li>
            <li class=" "></li>
            <li class=" "></li>
        </ul>
    </div>
    <!-- 轮播 -->
    {!!Html::script('js/swipe.js')!!}
    <script type="text/javascript">
        var bullets = document.getElementById('position').getElementsByTagName('li');
        var banner = Swipe(document.getElementById('mySwipe'), {
            auto: 3000,
            continuous: true,
            disableScroll:false,
            callback: function(pos) {
                var i = bullets.length;
                while (i--) {
                    bullets[i].className = ' ';
                }
                bullets[pos].className = 'cur';
            }
        });
    </script>
    <p>全部商品</p>
    <div class="info">
    <em class="sat">￥100</em>
        <a href="shopping.html"><button type="button" class="btn">加入购物车</button></a>
    </div>
</figure>

<div class="sjxx">
    <p class="pclass1">商家信息</p>
</div>
<div class="sjxx">
    <p class="pclass2">店铺名称：{{ $item->shop_name }}</p>
    <p class="pclass2">地址：{{ $item->item_address }}</p>
    <p class="pclass2">电话：{{ $item->item_name }}</p>
</div>
