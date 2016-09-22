<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
{!!Html::style('css/add-category.css')!!}
{!!Html::style('css/bootstrap.css')!!}

<form id="shop" action="/admin/add_category" method="post">
    @foreach($tags as $tag)
        <li>
            <a href="" class=""><span>大类－{{ $tag['type'] }}</span></a>
            <dl>
                <dd>
                    <ul>
                        @foreach($tag['value'] as $t)
                        <li>
                            <input type="radio" name="tag_id" value="{{ $t->id }}">{{ $t->tag_name }}
                        </li>
                        @endforeach
                    </ul>
                </dd>
            </dl>
        </li>
    @endforeach
    
    输入小分类:<input type="text" name="category_name" value=""><br>
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
    <button class="btn btn-default" type="submit" form="shop" value="Submit">提交</button>
</form>
