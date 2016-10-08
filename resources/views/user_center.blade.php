<html lang="en" data-dpr="1" style="font-size: 25.875px;">
<head>
<style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta content="telephone=no,email=no" name="format-detection">
    <meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <!-- <meta name="viewport" content="initial-scale=1.5, maximum-scale=1.5, minimum-scale=1.5, user-scalable=no"> -->
    {!!Html::style('css/user.css')!!}
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
</head>

<body style="font-size: 36px;" class="">
    <div class="fixbar" style="z-index: 99">
        <nav class="bar bar-tab">
            <a class="tab-item external" href="/category">
                <span class="xeAppfonts icon-me"></span>
                <span class="tab-label">分类</span>
            </a>
            <a class="tab-item external active" href="/user">
                <span class="xeAppfonts icon-orders"></span>
                <span class="tab-label">个人中心</span>
            </a>
        </nav>
    </div>

	<div class="viewport">
		<div class="user-con">
				<div class="user-basic-new">
					<div class="new-user-nologin" style="cursor: pointer;" onclick="window.location='/login';">
                        <?php if(empty($user)):?>
						<a>登录/注册</a>
                        <?php else: ?>
                        <a>{{ $user->phone }}</a>
                        <?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>

			<div class="user-order mt20">
				<a ui-sref="fav" href="/myFavs">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-fav"></i>
						我的收藏
					</div>
				</a>
				
				<a ui-sref="auth.changepassword" href="/password/reset">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-pho"></i>
						修改密码
					</div>
				</a>
				
			</div>

			<div class="user-order mt20">
				<a need-login="" action="goUserInfo()" class="ng-isolate-scope">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-grmsg"></i>
						个人信息
					</div>
				</a>
			</div>

			<div class="user-order mt20">
				<a need-login="" action="goFeedback()" class="ng-isolate-scope">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-yijian"></i>
						意见反馈
					</div>
				</a>
				<a href="">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-help"></i>
						帮助说明
					</div>
				</a>
		</div>

	</div>
</section>
</div>
</body>
