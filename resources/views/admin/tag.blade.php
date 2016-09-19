<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
{!!Html::style('css/tag.css')!!}
{!!Html::style('css/bootstrap.css')!!}

<a class="btn btn-default col-48 " href="/admin">返回后台</a>
<a class="btn btn-default col-48 tag-btn" href="/admin/add_tag">添加商店分类</a>

@foreach($tags as $tag)
    <li>
        <a href="" class=""><span>大类－{{ $tag['type'] }}</span></a>
        <dl>
            <dd>
                <ul>
                    @foreach($tag['value'] as $t)
                    <li>
                        <a href="/tag/{{ $t->id }}"><span>{{ $t->name }}</span></a>
                        <a class="btn btn-default tag-del" href="/admin/del_tag/{{ $t->id }}">删除</a>
                    </li>
                    @endforeach
                </ul>
            </dd>
        </dl>
    </li>
@endforeach
