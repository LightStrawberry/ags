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
        <ul>
            <img>
            <h3>{{ $item->item_name }}</h3>
            <p>简介：{{ $item->item_description }}</p>
        </ul>
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
                            <a href="/item/{{ $t->id }}"><span>{{ $t->name }}</span></a>
                            @endforeach
                        </dd>
                    </dl>
                </li>
            @endforeach
        </ul>
        </div>
    </nav>
    <div id="hovertreebottom_masklayer" class="masklayer_div on">&nbsp;</div>
    </div>
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
