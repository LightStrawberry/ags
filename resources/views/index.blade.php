<!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <title>生鲜O2O</title> 
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" /> 
  <meta name="author" content="" /> 
  <!-- Le styles --> 
  {!!Html::style('css/index.css')!!}
 </head>
 <body>
<div id="wrapper" class="viewer">
    <div class="item_list">
        @foreach($items as $item)
        <li>
            <div class="list-item">
            <div class="p">
                <a href="/item/{{ $item->id }}" title="">
                    <img class="p-pic" src="//img.alicdn.com/imgextra/i2/148880247574559532/TB2JPxvspXXXXbiXXXXXXXXXXXX_!!0-saturn_solar.jpg_210x210.jpg" style="visibility: visible;">
                    <span class="flag c-icon-p4p"></span>
                </a>
                </div>
                <div class="d">
                    <a href="/item/{{ $item->id }}" title="">
                        <h3 class="d-title">{{ $item->item_name }}</h3>
                    </a>
                    <p class="d-price"><em class="h"><span class="price-icon">¥</span><span class="font-num">100</span></em><del></del></p>
                    <div class="d-main">
                        <p class="d-freight">运费10.00</p>
                        <p class="d-num"><span class="font-num">118</span>人付款</p>
                        <p class="d-area">上海</p>
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
