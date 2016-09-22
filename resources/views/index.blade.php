<html lang="en" data-dpr="1" style="font-size: 25.875px;">
    <head>
        <style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
        <meta charset="UTF-8">
        <title>商品分类</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <meta content="telephone=no,email=no" name="format-detection">
        <meta http-equiv="Access-Control-Allow-Origin" content="*">
         
        {!!Html::style('css/index.css')!!}
        {!!Html::style('css/swiper.css')!!}
        <link rel="shortcut icon" href="../img/favicon.ico">

    </head>
    <body style="font-size: 12px;" class="">
        <xe-confirm class="ng-isolate-scope"><!-- ngIf: show --></xe-confirm>
        <!-- uiView:  --><div ui-view="" class="ng-scope"><section data-ng-controller="CategroyCtr" class="ng-scope">
    <wx-title title="title" class="ng-isolate-scope"></wx-title>
    <loading class="ng-isolate-scope"><!-- ngIf: show --></loading>
    <xe-tab index="1" cart-num="cartNum" class="ng-isolate-scope"><div class="fixbar" style="z-index: 99">
    <nav class="bar bar-tab">
        <a class="tab-item external" ng-class="{active: index == '0'}" ui-sref="home" href="#/">
            <span class="xeAppfonts icon-home"></span>
            <span class="tab-label">首页</span>
        </a>
        <a class="tab-item external active" ng-class="{active: index == '1'}" ui-sref="category" href="#/category">
            <span class="xeAppfonts icon-me"></span>
            <span class="tab-label">分类</span>
        </a>
        <a class="tab-item external" href="/user">
            <span class="xeAppfonts icon-orders"></span>
            <span class="tab-label">个人中心</span>
        </a>
    </nav>
</div></xe-tab>
    <div class="viewport">
        <div class="pos-list-con-list">
            <div class="pos-list-con">
                <ul>
                    @foreach($tags as $tag)
                    <li class="Collapsing current">
                        <em class="">{{ $tag['type'] }}</em>
                        <div class="coll_body">
                            @foreach($tag['value'] as $t)
                            <a href="/tag/{{ $t->id }}">{{ $t->tag_name }}</a>
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="pos-list-right-con ">
                <div class="header-select-fixed">
                    <ul>
                        <li ng-click="changeSort(0)" ng-class="{'active': sortType == 0, 'up': sortType == 0 &amp;&amp; !desc}" class="active">
                            <span class="xeAppfonts">综合</span>
                        </li>
                        <li ng-click="changeSort(1)" ng-class="{'active': sortType == 1, 'up': sortType == 1 &amp;&amp; !desc}">
                            <span class="xeAppfonts">销量</span>
                        </li>
                        <li ng-click="changeSort(2)" ng-class="{'active': sortType == 2, 'up': sortType == 2 &amp;&amp; !desc}">
                            <span class="xeAppfonts">价格</span>
                        </li>
                        <li ng-click="clickFilter()">
                            <span class="xeAppfonts">筛选</span>
                        </li>
                    </ul>
                </div>
                <div slider="" free-mode="true" slides-per-view="auto" target=".header-nav-list" class="header-nav-list swiper-container ng-isolate-scope swiper-container-horizontal swiper-container-free-mode">
                    <ul class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                        <a href="/tag/{{ $current_tag->id }}"><li class="swiper-slide swiper-slide-active <?php if(Route::current()->getParameter('category') ==  null) {echo "actived";} else {echo "";} ?>"">全部</li></a>
                        @foreach($current_tag->categories as $c)
                            <a href="/tag/{{ $current_tag->id }}/{{ $c->id }}"><li class="swiper-slide swiper-slide-active <?php if(Route::current()->getParameter('category') == $c->id) {echo "actived";} else {echo "";} ?>">{{ $c->category_name }}</li></a>
                        @endforeach
                    </ul>
                </div>
                <div class="list-con-show">
                        <div class="list-con-showlist ng-scope">
                            @foreach($shops as $s)
                            <div class="ng-scope">
                                <dl>
                                    <a href="/shop/{{ $s->id }}">
                                    <dt href="/shop/{{ $s->id }}">
                                    <div class="pic-div">
                                    <img src="{{ json_decode($s->shop_image_url)[0] }}">
                                    </div>
                                    </dt>
                                    <dd>
                                        <p class="pro-name">
                                        <xe-html html-text="product.productName" >{{ $s->shop_name }}</xe-html>
                                        </p>
                                        <p class="price ng-binding">
                                            <i>¥<em ng-bind="product.price | price" class="ng-binding">57.00</em></i>/千克
                                        </p>
                                        <p class="pro-pri">
                                            <i ng-bind="product.unitPrice" class="ng-binding">28.50元/斤</i>
                                            <i>销量:<em ng-bind="product.totalSale" class="ng-binding">0</em></i>
                                        </p>
                                        <span class="gouwuche xeAppfonts ng-scope"></span>
                                    </dd>
                                    </a>
                                </dl>
                            </div>
                            @endforeach
                        </div>
                        <div ng-if="productList.length > 0" ng-click="requestData()" class="load-more ng-binding ng-scope" ng-bind="loadText">没有更多数据了</div><!-- end ngIf: productList.length > 0 -->
                </div>
            </div>
        </div>

    </div>
</section>
</div>

            {!!Html::script('js/jquery.js')!!}
            {!!Html::script('js/index.js')!!}
            {!!Html::script('js/swiper.js')!!}
             
            <script> 
            var mySwiper = new Swiper('.swiper-container', {})
            </script>
            
            <script type="text/javascript">
            $(function(){
                $(".coll_body").eq({{ $current_tag->type }}-1).show();
                $(".Collapsing").click(function(){
                    $(this).toggleClass("current").siblings('.Collapsing').removeClass("current");//切换图标
                    $(this).children(".coll_body").slideToggle(500);
                    $(this).siblings(".Collapsing").children(".coll_body").slideUp(500);
                });
            });
            </script>
    </body>
</html>
