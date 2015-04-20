
<div class="register-page">
	

<header>
	<nav>
		<div class="header-title">
			<div class="header-back"><span class="glyphicon glyphicon-menu-left"></span></div>
			<div class="header-main-title">注册</div>
		</div>
	</nav>
</header>

<section>
	<div class="logo-area register-area">
		<img width="180" height="80" src="images/logo.png" />
		吃大餐·做晓菜
	</div>
	
	<div class="setting-list change-password-input">
		<ul>
			<li id="setting-list-phone-num-input">
				<input id="reg-mobile" type="tel" max="11" placeholder="手机号" />
				<a class="button button-caution button-pill button-small send-ver-code">发送验证码</a>
			</li>
			<li id="setting-list-password-o-input"><input placeholder="手机验证码" /></li>
			<li id="setting-list-password-new-input" class="setting-list-second"><input type="password" placeholder="登录密码" /></li>
			<li id="setting-list-password-confrom-input"><input type="password" placeholder="确认密码" /></li>
		</ul>
	</div>

	<div class="change-password-submit-button">
		<a id="btn-confirm-register" class="button button-caution button-pill">确认注册</a>
		<div class="fast-register">————— 或 —————</div>
		<div class="wechat-logo">
			<img src="images/wechat.png">
		</div>
	</div>

	<div class="loading">
		<div class="loading-main"><span class="glyphicon glyphicon-option-horizontal"></span><span class="glyphicon glyphicon-option-horizontal"></span></div>
	</div>

</section>

</div>

<script type="text/javascript">

	$(document).ready(function(){

		$('.header-back').click(function(){
			backPreviosPage('register.php');
		});

		function checkMobile(sMobile){
    		if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(sMobile))){
        		return false;
    		}else{
    			return true;
    		}
		} 

		function regInfoIsNull(){
			var flag=0;
			$('.change-password-input ul li').each(function(){
				if($(this).find('input').val()==null){
					flag+=1;
				}
			});
			return flag===0;
		}

		$('.send-ver-code').click(function(){
			var sMobile=$('.change-password-input ul li #reg-mobile').val();
			if(checkMobile(sMobile)){
				sendSms(sMobile,1,function(data){
					console.log(data);
				});
			}else{
				alert('手机号非法');
			}
		});

		$('#btn-confirm-register').click(function(){
			if(regInfoIsNull()){
				var smobile=$('.change-password-input ul li #reg-mobile').val();
				var password=$('.change-password-input ul #setting-list-password-o-input input').val();
				var repassword=$('.change-password-input ul #setting-list-password-new-input input').val();
				var code=$('.change-password-input ul #setting-list-password-confrom-input input').val();
				//console.log(smobile,password,repassword,code);
				//regByMobile(smobile,password,repassword,code);
				$.post(
				rootURL+"api.php/Api/Public/reg",
				{
					mobile:smobile,
					password:password,
					repassword:repassword,
					code:code
				},
				function(){
					console.log('ssds');
				});
				$.ajax({
					type:"POST",
					url:rootURL+"api.php/Api/Public/reg",
					data:{
						mobile:smobile,
						password:password,
						repassword:repassword,
						code:code
					},
					success:function(data){
						console.log(data);
					}
				});
			}else{
				alert('资料不完整');
			}
		});

	});

</script>