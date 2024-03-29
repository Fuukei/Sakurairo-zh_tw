<?php 
/**
 Template Name: 註冊頁面模版
 */

get_header();
if( !empty($_POST['register_reg']) ) {
	$error = '';
	$sanitized_user_login = sanitize_user( $_POST['user_login'] );
	$user_email = apply_filters( 'user_registration_email', $_POST['user_email'] );

	// Check the username
	if ( $sanitized_user_login == '' ) {
	  $error .= '<strong>'.__("Error","sakurairo")./*錯誤*/'</strong>：'.__("Please enter username.","sakurairo")./*請輸入用戶名。*/'<br />';
	} elseif ( ! validate_username( $sanitized_user_login ) ) {
	  $error .= '<strong>'.__("Error","sakurairo")./*錯誤*/'</strong>：'.__("Invalid characters, please enter a valid username.","sakurairo")./*此用戶名包含無效字元，請輸入有效的用戶名。*/'<br />';
	  $sanitized_user_login = '';
	} elseif ( username_exists( $sanitized_user_login ) ) {
	  $error .= '<strong>'.__("Error","sakurairo")./*錯誤*/'</strong>：'.__("This username has been registered.","sakurairo")./*該用戶名已被註冊。*/'<br />';
	}

	// Check the e-mail address
	if ( $user_email == '' ) {
	  $error .= '<strong>'.__("Error","sakurairo")./*錯誤*/'</strong>：'.__("Please enter email address.","sakurairo")./*請填寫電子郵件地址。*/'<br />';
	} elseif ( ! is_email( $user_email ) ) {
	  $error .= '<strong>'.__("Error","sakurairo")./*錯誤*/'</strong>：'.__("Invalid email address.","sakurairo")./*電子郵件地址不正確。*/'<br />';
	  $user_email = '';
	} elseif ( email_exists( $user_email ) ) {
	  $error .= '<strong>'.__("Error","sakurairo")./*錯誤*/'</strong>：'.__("This email address has been registered.","sakurairo")./*該電子郵件地址已經被註冊。*/'<br />';
	}

	// Check the password
	if(strlen($_POST['user_pass']) < 6){
	  $error .= '<strong>'.__("Error","sakurairo")./*錯誤*/'</strong>：'.__("Password length is at least 6 digits.","sakurairo")./*密碼長度至少6位。*/'<br />';
	}elseif($_POST['user_pass'] != $_POST['user_pass2']){
		$error .= '<strong>'.__("Error","sakurairo")./*錯誤*/'</strong>：'.__("Inconsistent password entered twice.","sakurairo")./*兩次輸入的密碼不一致。*/'<br />';
	}

	// verification
	if(iro_opt('registration_validation') && strlen($_POST['verification']) > 0 ){
		$error .= '<strong>'.__("Error","sakurairo")./*錯誤*/'</strong>：'.__("Please drag the slider to verify identity","sakurairo")./*請拖動滑塊驗證身份*/'<br />';
	}

	if($error == '') {
		$user_id = wp_create_user( $sanitized_user_login, $_POST['user_pass'], $user_email );
		if ( !$user_id ) {
			$error .= '<strong>'.__("Error","sakurairo")./*錯誤*/'</strong>：'.__("Unable to complete registration request...Please contact","sakurairo")./*無法完成註冊請求... 請聯繫*/'<a href=\"mailto:'. get_option( 'admin_email' ) .'\">'.__("administrator","sakurairo")./*管理員*/'</a>！<br />';
		}else if (!is_user_logged_in()) {
			$user = get_userdatabylogin($sanitized_user_login);
			$user_id = $user->ID;
			// 自動登入
			wp_set_current_user($user_id, $user_login);
			wp_set_auth_cookie($user_id);
			do_action('wp_login', $user_login);
		}
	}
}
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if(iro_opt('ex_register_open')) : ?>
		<?php if(!is_user_logged_in()){ ?>
			<div class="ex-register">
				<div class="ex-register-title">
					<h3>New Account</h3>
				</div>
				<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">  
					<p><input type="text" name="user_login" tabindex="1" id="user_login" class="input" value="<?php if(!empty($sanitized_user_login)) echo $sanitized_user_login; ?>" placeholder="用戶名" required /></p>
					<p><input type="text" name="user_email" tabindex="2" id="user_email" class="input" value="<?php if(!empty($user_email)) echo $user_email; ?>" size="25" placeholder="電子郵箱" required /></p>
					<p><input id="user_pwd1" class="input" tabindex="3" type="password" tabindex="21" size="25" value="" name="user_pass" placeholder="密碼" required /></p>
					<p><input id="user_pwd2" class="input" tabindex="4" type="password" tabindex="21" size="25" value="" name="user_pass2" placeholder="確認密碼" required /></p>
					<?php if(iro_opt('registration_validation')) : ?>
					<div id="verification-slider">
						<div id="slider">
							<div id="slider_bg"></div>
							<span id="label">»</span><span id="labelTip"><?php _e("Drag the slider to verify","sakurairo")/*拖動滑塊驗證*/?></span>
						</div>
						<input type="hidden" name="verification" value="verification" />
					</div>
					<?php endif; ?>
					<input type="hidden" name="register_reg" value="ok" />
					<?php if(!empty($error)) { echo '<p class="user-error">'.$error.'</p>'; } ?>
					<input class="button register-button" name="submit" type="submit" value="<?php _e("Sign up","sakurairo")/*注 冊*/?>">
				</form>
			</div>
		<?php }else{ 
		$loadurl = iro_opt('exlogin_url') ? iro_opt('exlogin_url') : get_bloginfo('url');
		?>
			<div class="ex-register-title">
				<h3><?php _e("Success! Redirecting......","sakurairo")/*註冊成功！正在跳轉...*/?></h3>
			</div>
			<script>window.location.href='<?php echo $loadurl; ?>';</script>
		<?php } ?>
		<?php else : ?>
			<div class="register-close"><p><?php _e("Registration is not open yet.","sakurairo")/*暫未開放註冊。*/?></p></div>
		<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<style type="text/css">
#slider {
	margin: 0 auto 20px auto;
	width: 300px;
	height: 46px;
	position: relative;
	border-radius: 3px;
	background-color: #eee;
	overflow: hidden;
	text-align: center;
	user-select: none;
	-moz-user-select: none;
	-webkit-user-select: none;
}

#slider_bg {
	position: absolute;
	left: 0;
	top: 0;
	height: 100%;
	background-color: #444;
	z-index: 1;
	border-radius: 3px 0 0 3px;
}

#label {
	width: 46px;
	position: absolute;
	left: 0;
	top: 0;
	height: 46px;
	line-height: 38px;
	border: 1px solid #ddd;
	background: #fff;
	z-index: 3;
	cursor: move;
	color: #E67474;
	font-size: 38px;
	font-weight: 900;
	border-radius: 3px;
}

#labelTip {
	position: absolute;
	left: 0;
	width: 100%;
	height: 100%;
	font-size: 13px;
	font-family: 'Microsoft Yahei', serif;
	color: #888;
	line-height: 46px;
	text-align: center;
	z-index: 2;
}
#verification-slider{
	margin: 1em;
}
#verification-ok{
	color: #777;
}
</style>

<?php
get_footer();
?>
<script type="text/javascript">
	var startTime = 0;
	var endTime = 0;
	var numTime = 0;
	$(function () {
	    var slider = new SliderUnlock("#slider",{
	    successLabelTip : "OK"
	},function(){
		var sli_width = $("#slider_bg").width();
        $('#verification-slider').html('').append('<input id="verification-ok" class="input" type="text" size="25" value="Pass!" name="verification" disabled="true" />');
        
        endTime = nowTime();
        numTime = endTime-startTime;
        endTime = 0;
        startTime = 0;
        // 獲取到滑動使用的時間 滑動的寬度
        // alert( numTime );
        // alert( sli_width );
	});
		slider.init();
	})

	/**
	* 獲取時間精確到毫秒
	* @type
	*/
	function nowTime(){
		var myDate = new Date();
		var H = myDate.getHours();//獲取小時
		var M = myDate.getMinutes(); //獲取分鐘
		var S = myDate.getSeconds();//獲取秒
		var MS = myDate.getMilliseconds();//獲取毫秒
		var milliSeconds = H * 3600 * 1000 + M * 60 * 1000 + S * 1000 + MS;
		return milliSeconds;
	}
</script>
<script type='text/javascript' src='<?php bloginfo("template_url"); ?>/user/verification.js'></script>
