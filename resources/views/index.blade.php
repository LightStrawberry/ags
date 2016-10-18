<html lang="en" data-dpr="1" style="font-size: 25.875px;">
    <head>
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
    <div class="fixbar" style="z-index: 99">
        <nav class="bar bar-tab">
            <!-- <a class="tab-item external" ng-class="{active: index == '0'}" ui-sref="home" href="#/">
                <span class="xeAppfonts icon-home"></span>
                <span class="tab-label">首页</span>
            </a> -->
            <a class="tab-item external active" href="/category">
                <span class="xeAppfonts icon-me"></span>
                <span class="tab-label">分类</span>
            </a>
            <a class="tab-item external" href="/user">
                <span class="xeAppfonts icon-orders"></span>
                <span class="tab-label">个人中心</span>
            </a>
        </nav>
    </div>
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
                        <li class="active">
                            <span class="xeAppfonts">综合</span>
                        </li>
                        <li>
                            <span class="xeAppfonts">销量</span>
                        </li>
                        <li>
                            <span class="xeAppfonts">价格</span>
                        </li>
                        <li>
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
                                    <dt>
                                    <div class="pic-div">
                                        <a href="/shop/{{ $s->id }}">
                                            <img src="{{ json_decode($s->shop_image_url)[0].'?imageView2/2/w/76/h/76/interlace/0/q/100' }}">
                                        </a>
                                    </div>
                                    </dt>
                                    <dd>
                                        <a href="/shop/{{ $s->id }}">
                                            <p class="pro-name">{{ $s->shop_name }}</p>
                                        </a>
                                        <p class="description">
                                            <i><em class="ng-binding">{{ mb_substr($s->shop_description, 0, 20) }}</em></i>
                                        </p>
                                        <a>
                                            <?php if(isset($user)&&$user->liked($s->id)): ?>
                                            <span class="fav like-icon" value="{{ $s->id }}" ><em></em></span>
                                            <?php else : ?>
                                            <span class="fav unlike-icon" value="{{ $s->id }}" ><em></em></span>
                                            <?php endif ?>
                                        </a>
                                    </dd>
                                </dl>
                            </div>
                            @endforeach
                        </div>
                        <div class="load-more">点击加载</div>
                </div>
            </div>
        </div>

    </div>
</section>
</div>

            {!!Html::script('js/jquery.js')!!}
            {!!Html::script('js/swiper.js')!!}
            {!!Html::script('js/index.js')!!}
            
            <script>
            var currentPage = 1;
            
            $(function() {
                $(".coll_body").eq({{ $current_tag->type }}-1).show();
                $(".Collapsing").click(function(){
                    $(this).toggleClass("current").siblings('.Collapsing').removeClass("current");//切换图标
                    $(this).children(".coll_body").slideToggle(500);
                    $(this).siblings(".Collapsing").children(".coll_body").slideUp(500);
                });
                
                $(".fav").click(function() {
                    $(this).toggleClass('like-icon');
                    $(this).toggleClass('unlike-icon');
                    var a = $(this).attr("value");
                    //$(this).toggleClass("like-icon");
                    $.get( "/fav/"+a, function(data) {
                        console.log(data['code']);
                        if(data['code'] == -1) {
                            window.location.href="/login";
                        }
                    });
                });
                
                $(".load-more").click(function() {
                    currentPage++;
                    var url = '{{ substr_replace(Request::url(), '/json', strlen(url('/')), 0) }}';
                    $.ajax({
                       type:'GET',
                       url:'{{ substr_replace(Request::url(), '/json', strlen(url('/')), 0) }}',
                       data:{page : currentPage},
                       success:function(data){
                           console.log(JSON.parse(data));
                           var html = "";
                           var list = JSON.parse(data);
                           for (var i = 0, len = list.data.length ; i < len ; i++ ) {
                               if(list.data[i].liked == false) {
                                   var fav_html = mix('<span class="fav unlike-icon" value="${id}" ><em></em></span>', {id : list.data[i].id });
                               } else {
                                   var fav_html = mix('<span class="fav like-icon" value="${id}" ><em></em></span>', {id : list.data[i].id });
                               }
                               html += mix('<div class="ng-scope"><dl><dt><div class="pic-div"><a href="/shop/${shop_id}"><img src="${shop_img}"></a></div></dt><dd><a href="/shop/"${shop_id}""><p class="pro-name">${shop_name}</p></a><p class="description"><i><em class="ng-binding">${shop_description}</em></i></p><a>${fav}</a></dd></dl></div>', {shop_name: list.data[i].shop_name, shop_id: list.data[i].id, shop_img: JSON.parse(list.data[i].shop_image_url)[0]+'?imageView2/2/w/76/h/76/interlace/0/q/100', fav: fav_html, shop_description: list.data[i].shop_description.substring(0,20) });
                           }
                           $(".list-con-showlist").append(html);
                           $( document ).on( "click", ".fav", function() {
                               $(this).toggleClass('like-icon');
                               $(this).toggleClass('unlike-icon');
                               var a = $(this).attr("value");
                               console.log(a);
                               //$(this).toggleClass("like-icon");
                               $.get( "/fav/"+a, function(data) {
                                   console.log(data['code']);
                                   if(data['code'] == -1) {
                                       window.location.href="/login";
                                   }
                               });
                           })
                           if(JSON.parse(data).next_page_url == null) {
                               $(".load-more").text("没有更多数据了");
                           }
                       }
                    });
                });
            });
            
            function mix (str,group) {
                str = str.replace(/\$\{([^{}]+)\}/gm,function (m,n) {
                    return (group[n] != undefined) ? group[n] : '';
                })
                return str;
            }
            </script>
    </body>
</html>
