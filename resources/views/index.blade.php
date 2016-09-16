<!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <title>农产品商铺</title> 
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" /> 
  <meta name="author" content="" /> 
  <!-- Le styles --> 
  {!!Html::style('css/index.css')!!}
 </head>
 <body>
<div id="wrapper" class="viewer">
    <div class="shop_list">
        @foreach($shops as $shop)
        <li>
            <div class="list-shop">
            <div class="p">
                <a href="/shop/{{ $shop->id }}" title="">
                    <img class="p-pic" src="{{ json_decode($shop->shop_image_url)[0] }}" style="visibility: visible;">
                    <span class="flag c-icon-p4p"></span>
                </a>
                </div>
                <div class="d">
                    <a href="/shop/{{ $shop->id }}" title="">
                        <h3 class="d-title">{{ $shop->shop_name }}</h3>
                    </a>
                    <p class="d-price"><em class="h">{{ $shop->shop_description }}</em><del></del></p>
                    <div class="d-main">
                        <p class="d-area">{{ $shop->shop_address }}</p>
                    </div>
                </div>
            </div>
            <div class="icons-group"></div>
        </li>
        @endforeach
    </div>
    <div class="hovertreebottom">
        <nav>
        <div id="hovertreebottom_ul">
        <ul class="box">
            @foreach($tags as $tag)
                <li>
                    <a href="javascript:;" class=""><span>{{ $tag['type'] }}</span></a>
                    <dl>
                        <dd>
                            @foreach($tag['value'] as $t)
                            <a href="/tag/{{ $t->id }}"><span>{{ $t->name }}</span></a>
                            @endforeach
                        </dd>
                    </dl>
                </li>
            @endforeach
        </ul>
        </div>
    </nav>
    <div id="page-content-wrapper" class="">
        <div class="page-content">
            <div class="container" id="J_list_Container">
            </div>
        </div>
    </div>
</div>
  {!!Html::script('js/jquery.js')!!}
  {!!Html::script('js/index.js')!!}
  <script type="text/javascript">
  hovertreebottom.bindClick(document.getElementById("hovertreebottom_ul").querySelectorAll("li>a"), document.getElementById("hovertreebottom_masklayer"));
  </script>
 </body>
</html>
