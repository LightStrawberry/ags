@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">注册</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">手机号</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('vcode') ? ' has-error' : '' }}">
                            <label for="vcode" class="col-md-4 control-label">手机验证码</label>

                            <div class="col-md-6">
                                <input id="vcode" type="vcode" class="form-control" name="vcode" value="" placeholder="请输验证码" required>
                                <span><button class="btn" id="send-btn" type="button">免费发送验证码</button></span>
                                <span><button class="btn reset-code" id="resetCode" style="display:none;"><span id="second">60</span>秒后重发</button></span>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">密码</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">确认密码</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    注册
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{!!Html::script('js/jquery.js')!!}
<script type="text/javascript">
    $(document).ready(function(){
        $('#send-btn').click(function(){
            var phone = $.trim($('#phone').val());
            console.log(phone);
            var csrf = document.getElementsByName("_token")[0].value;
            $.ajax({
                type: "POST",
                url: "/send/"+phone,
                data: "_token="+csrf,
                success: function(msg){
                    resetCode();
                }
            });
        });
    });
    
    function resetCode(){
    	$('#send-btn').hide();
    	$('#second').html('60');
    	$('#resetCode').show();
    	var second = 60;
    	var timer = null;
    	timer = setInterval(function(){
    		second -= 1;
    		if(second >0 ){
    			$('#second').html(second);
    		}else{
    			clearInterval(timer);
    			$('#send-btn').show();
    			$('#resetCode').hide();
    		}
    	},1000);
    }
</script>
