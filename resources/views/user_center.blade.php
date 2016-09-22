{!!Html::style('css/index.css')!!}

<head>
<style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta content="telephone=no,email=no" name="format-detection">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="initial-scale=0.3333333333333333, maximum-scale=0.3333333333333333, minimum-scale=0.3333333333333333, user-scalable=no">
</head>

<body style="font-size: 36px;" class="">
    <nav class="bar bar-tab">
        <a class="tab-item external" ng-class="{active: index == '0'}" ui-sref="home" href="#/">
            <span class="xeAppfonts icon-home"></span>
            <span class="tab-label">首页</span>
        </a>
        <a class="tab-item external" ng-class="{active: index == '1'}" ui-sref="category" href="#/category">
            <span class="xeAppfonts icon-me"></span>
            <span class="tab-label">分类</span>
        </a>
        <a class="tab-item external active" ng-class="{active: index == '3'}" ui-sref="usercenter" href="#/userCenter">
            <span class="xeAppfonts icon-orders"></span>
            <span class="tab-label">个人中心</span>
        </a>
    </nav>

	<div class="viewport">
		<div class="user-con">
				<div class="user-basic-new">
					<div ui-sref="auth.login" class="new-user-nologin ng-scope" ng-if="!user" href="#/auth/login">
						<a>登录/注册</a>
					</div>
				</div>
				<div class="g-userInfo">
					<ul>
						<li ui-sref="auth.myCoupon" href="#/auth/myCoupon/">
							<span ng-bind="info.totalCoupon || 0" class="ng-binding">0</span>
							<p>优惠券</p>
						</li>
						<li ui-sref="auth.myPoints" href="#/auth/myPoints/">
							<span ng-bind="info.totalPoint || 0" class="ng-binding">0</span>
							<p>积分</p>
						</li>
						<li>
							<span ng-bind="info.userAmount | price" class="ng-binding">0.00</span><span>元</span>
							<p>余额</p>
						</li>
					</ul>
				</div>

			</div>
			

			<div class="user-order mt20">
				<a ui-sref="order.list({type: 'all'})" href="#/order/list?type=all">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-order"></i>
						我的订单
						<span>查看全部订单</span>
					</div>
				</a>
				<div class="user-sta">
					<div class="user-sta-co" ui-sref="order.list({type: 'unpay'})" href="#/order/list?type=unpay">
						<div class="user-sta-coc">
							<a>
								<p class="xeAppfonts user-sta-icon01"></p>
								<p class="user-sta-text">待付款</p>
								<!-- ngIf: info.toBePayCount > 0 -->
							</a>
						</div>
					</div>
					<div class="user-sta-co" ui-sref="order.list({type: 'unrecived'})" href="#/order/list?type=unrecived">
						<div class="user-sta-coc">
							<a>
								<p class="xeAppfonts user-sta-icon02"></p>
								<p class="user-sta-text">待收货</p>
								<!-- ngIf: info.toBeReceivedCount > 0 -->
							</a>
						</div>
					</div>
					<div class="user-sta-co" ui-sref="order.list({type: 'completed'})" href="#/order/list?type=completed">
						<div class="user-sta-coc">
							<a>
								<p class="xeAppfonts user-sta-icon03"></p>
								<p class="user-sta-text">已完成</p>
								<!-- ngIf: info.completeCount > 0 -->
							</a>
						</div>
					</div>

					<div class="user-sta-co" ui-sref="order.list({type: 'canceled'})" href="#/order/list?type=canceled">
						<div class="user-sta-coc">
							<a>
								<p class="xeAppfonts user-sta-icon04"></p>
								<p class="user-sta-text">已取消</p>
								<!-- ngIf: info.cancelCount > 0 -->
							</a>
						</div>
					</div>
				</div>
				
			</div>

			<div class="user-order mt20">
				<!-- <a ui-sref="auth.myCoupon">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-yhq"></i>
						我的优惠券
						<span ng-bind="info.totalCoupon + '张'" ng-if="info.totalCoupon > 0"></span>
					</div>
				</a> -->
				<a ui-sref="fav" href="#/fav">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-fav"></i>
						我的收藏
						<!-- <span>查看全部订单</span> -->
					</div>
				</a>
				
				
				<a ui-sref="auth.changepassword" href="#/auth/changepassword">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-pho"></i>
						修改密码
						<!-- <span>查看全部订单</span> -->
					</div>
				</a>
				<a ui-sref="bankCardList" href="#/bankCardList">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-myka"></i>
						我的银行卡
					</div>
				</a>

				<a ui-sref="award" href="#/award">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-jp"></i>
						我的奖品
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

				<a ui-sref="address.list({type: 'all'})" href="#/address/list">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-adr"></i>
						收货地址管理
						<!-- <span>查看全部订单</span> -->
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

				<a need-login="" action="goAfterService()" class="ng-isolate-scope">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-souhou"></i>
						售后政策
					</div>
				</a>

				<!-- ngIf: info.managerPhone.length > 0 -->
				

				<a href="tel://400-662-6366">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-shz"></i>
						客服热线
						<span>400-662-6366</span>
					</div>
				</a>
				
				<a href="http://cy.xebest.com/release/wx_helpcenter.html">
					<div class="user-nav xeAppfonts arrow-right">
						<i class="xeAppfonts nav-icon icon-help"></i>
						帮助说明
					</div>
				</a>

			<!-- ngIf: user -->

		</div>

	</div>
</section></div>

        
            <script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
            <script src="../js/bundle-v0.8.2.js?1472117810028"></script>
             
            <script>
                var _hmt = _hmt || [];
                (function() {
                var hm = document.createElement("script");
                hm.src = "//hm.baidu.com/hm.js?edb835e7726923171b465d2cf4629430";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
                })();
            </script>
           
        
    </body>
