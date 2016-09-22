<html lang="en" data-dpr="1" style="font-size: 25.875px;">
    <head>
        <style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
        <meta charset="UTF-8">
        <title>商品分类</title>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <meta content="telephone=no,email=no" name="format-detection">
        <meta http-equiv="Access-Control-Allow-Origin" content="*">
         
        <script src="../js/mobileUtil.js"></script><meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

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
        <a class="tab-item external" ng-class="{active: index == '3'}" ui-sref="usercenter" href="#/userCenter">
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
                            <a class="">{{ $t->tag_name }}</a>
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
                <div class="search-dropdown" ng-class="{'show': showFilter}">
                    <div ng-class="{'active': filter === currentFilter}" ng-click="selectFilter(filter)" ng-repeat="filter in filters" ng-bind="filter" class="ng-binding ng-scope">全部</div><!-- end ngRepeat: filter in filters --><div ng-class="{'active': filter === currentFilter}" ng-click="selectFilter(filter)" ng-repeat="filter in filters" ng-bind="filter" class="ng-binding ng-scope">有货</div><!-- end ngRepeat: filter in filters --><div ng-class="{'active': filter === currentFilter}" ng-click="selectFilter(filter)" ng-repeat="filter in filters" ng-bind="filter" class="ng-binding ng-scope">预售</div><!-- end ngRepeat: filter in filters --><div ng-class="{'active': filter === currentFilter}" ng-click="selectFilter(filter)" ng-repeat="filter in filters" ng-bind="filter" class="ng-binding ng-scope">冻品</div><!-- end ngRepeat: filter in filters -->
                </div>
                <div slider="" free-mode="true" slides-per-view="auto" target=".header-nav-list" class="header-nav-list swiper-container ng-isolate-scope swiper-container-horizontal swiper-container-free-mode">
                    <ul class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                        <li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope actived swiper-slide-active" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">全部</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope swiper-slide-next" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛腿</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛腱子</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛里脊</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛排肉</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛腩肉</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛肚</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛百叶</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛肋条</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛舌</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">肥牛片</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛小黄瓜条</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">其他</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛米龙</li><!-- end ngRepeat: c3 in secondCategory.cateList --><li ng-repeat="c3 in secondCategory.cateList" ng-bind="c3.name" class="swiper-slide ng-binding ng-scope" ng-class="{'actived': c3.id == thirdCategory.id}" ng-click="select(c3, 'third')">牛胸</li><!-- end ngRepeat: c3 in secondCategory.cateList -->
                    </ul>
                </div>
                <div class="list-con-show" ng-class="{'list-con-show-bigpic': showGrid}">
                        <!-- ngIf: productList.length > 0 --><div ng-if="productList.length > 0" class="list-con-showlist ng-scope">
                            <!-- ngRepeat: product in productList --><div ng-repeat="product in productList" class="ng-scope">
                                <dl>
                                    <dt ui-sref="product.detail({productId: product.product_code, sku: product.sku})" href="#/product/detail/20012489?sku=147012814896896">
                                    <div class="pic-div">
                                    <img ng-src="http://picssl.xebest.com/product/200/200/160417193147718.jpg" src="http://picssl.xebest.com/product/200/200/160417193147718.jpg">

                                    <!-- ngIf: product.isPresale == '1' -->
                                    </div>
                                    </dt>
                                    <dd>
                                        <p class="pro-name">
                                        <xe-html html-text="product.productName" class="ng-isolate-scope">冻牛臀肉   散装</xe-html>
                                        </p>
                                        <p class="price ng-binding">
                                            <i>¥<em ng-bind="product.price | price" class="ng-binding">57.00</em></i>/千克
                                        </p>
                                        <p class="pro-pri">
                                            <i ng-bind="product.unitPrice" class="ng-binding">28.50元/斤</i>
                                            <i>销量:<em ng-bind="product.totalSale" class="ng-binding">0</em></i>
                                        </p>
                                        <!-- ngIf: product.stock >= product.minorderQuantity --><span ng-class="{'disabled': product.isPresale == '1'}" ng-if="product.stock >= product.minorderQuantity" ng-click="buy(product)" class="gouwuche xeAppfonts ng-scope"></span><!-- end ngIf: product.stock >= product.minorderQuantity -->
                                     <!-- ngIf: product.stock < product.minorderQuantity || product.stock == 0 -->
                                    </dd>
                                </dl>
                            </div><!-- end ngRepeat: product in productList --><div ng-repeat="product in productList" class="ng-scope">
                                <dl>
                                    <dt ui-sref="product.detail({productId: product.product_code, sku: product.sku})" href="#/product/detail/20012234?sku=146943572032403">
                                    <div class="pic-div">
                                    <img ng-src="http://picssl.xebest.com/product/200/200/160725163423784.png" src="http://picssl.xebest.com/product/200/200/160725163423784.png">

                                    <!-- ngIf: product.isPresale == '1' -->
                                    </div>
                                    </dt>
                                    <dd>
                                        <p class="pro-name">
                                        <xe-html html-text="product.productName" class="ng-isolate-scope">冻牛针扒 散装</xe-html>
                                        </p>
                                        <p class="price ng-binding">
                                            <i>¥<em ng-bind="product.price | price" class="ng-binding">55.60</em></i>/千克
                                        </p>
                                        <p class="pro-pri">
                                            <i ng-bind="product.unitPrice" class="ng-binding">27.80元/斤</i>
                                            <i>销量:<em ng-bind="product.totalSale" class="ng-binding">110</em></i>
                                        </p>
                                        <!-- ngIf: product.stock >= product.minorderQuantity --><span ng-class="{'disabled': product.isPresale == '1'}" ng-if="product.stock >= product.minorderQuantity" ng-click="buy(product)" class="gouwuche xeAppfonts ng-scope"></span><!-- end ngIf: product.stock >= product.minorderQuantity -->
                                     <!-- ngIf: product.stock < product.minorderQuantity || product.stock == 0 -->
                                    </dd>
                                </dl>
                            </div><!-- end ngRepeat: product in productList --><div ng-repeat="product in productList" class="ng-scope">
                                <dl>
                                    <dt ui-sref="product.detail({productId: product.product_code, sku: product.sku})" href="#/product/detail/20012237?sku=146943597225406">
                                    <div class="pic-div">
                                    <img ng-src="http://picssl.xebest.com/product/200/200/151004171638389.jpg" src="http://picssl.xebest.com/product/200/200/151004171638389.jpg">

                                    <!-- ngIf: product.isPresale == '1' -->
                                    </div>
                                    </dt>
                                    <dd>
                                        <p class="pro-name">
                                        <xe-html html-text="product.productName" class="ng-isolate-scope">冻牛霖 25kg/箱</xe-html>
                                        </p>
                                        <p class="price ng-binding">
                                            <i>¥<em ng-bind="product.price | price" class="ng-binding">1030.00</em></i>/箱
                                        </p>
                                        <p class="pro-pri">
                                            <i ng-bind="product.unitPrice" class="ng-binding">20.60元/斤</i>
                                            <i>销量:<em ng-bind="product.totalSale" class="ng-binding">2480</em></i>
                                        </p>
                                        <!-- ngIf: product.stock >= product.minorderQuantity --><span ng-class="{'disabled': product.isPresale == '1'}" ng-if="product.stock >= product.minorderQuantity" ng-click="buy(product)" class="gouwuche xeAppfonts ng-scope"></span><!-- end ngIf: product.stock >= product.minorderQuantity -->
                                     <!-- ngIf: product.stock < product.minorderQuantity || product.stock == 0 -->
                                    </dd>
                                </dl>
                            </div><!-- end ngRepeat: product in productList -->
                            
                        </div><!-- end ngIf: productList.length > 0 -->
                        <!-- ngIf: productList.length > 0 --><div ng-if="productList.length > 0" ng-click="requestData()" class="load-more ng-binding ng-scope" ng-bind="loadText">没有更多数据了</div><!-- end ngIf: productList.length > 0 -->
                        <!-- ngIf: noResult -->
                </div>
            </div>
        </div>

    </div>
</section></div>

            {!!Html::script('js/jquery.js')!!}
            {!!Html::script('js/index.js')!!}
            {!!Html::script('js/swiper.js')!!}
             
            <script> 
            var mySwiper = new Swiper('.swiper-container', {})
            </script>
            
            <script type="text/javascript">
            $(function(){
                $(".coll_body").eq(0).show();
                $(".Collapsing").click(function(){
                    $(this).toggleClass("current").siblings('.Collapsing').removeClass("current");//切换图标
                    $(this).children(".coll_body").slideToggle(500);
                    $(this).siblings(".Collapsing").children(".coll_body").slideUp(500);
                });
            });
            </script>
    </body>
</html>
