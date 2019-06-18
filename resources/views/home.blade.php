<!DOCTYPE html>
<html lang="en">
<head>
@include('include/title')
@include('include/meta')

</head>
<body id="mobile_wrap">
<script>
function myFunction(){
	 window.location.href = 'emp_login';
}
function home(){
	  window.location.href = 'http://localhost/test_app/';
}
function staff(){
	   window.location.href = 'teacher';
}
function class_create(){
	   window.location.href = 'class_creation';
}
function level_create(){
	   window.location.href = 'section_creation';
}
function Student(){
	   window.location.href = 'studentcration';
}
function Attendance(){
	  window.location.href = 'manage_attendance_view';
}
function Fee_Category(){
	 window.location.href = 'create_fee';
}


</script>

 @include('include/side_menu')

    <div class="views">

      <div class="view view-main">



        <div class="pages">

          <div data-page="index" class="page homepage">
            <div class="page-content">
		
                      @include('include/top_nav')

                  <!-- Slider -->
                 <div class="swiper-container slidertoolbar swiper-init" data-effect="slide" data-parallax="true" data-pagination=".swiper-pagination"  data-next-button=".swiper-button-next" data-prev-button=".swiper-button-prev">
                    <div class="swiper-wrapper">
                    
                      <div class="swiper-slide" style="background-image:url(images/shutterstock.png);">
		     <div class="slider_trans">
			 <div class="slider-caption">
			          <span class="subtitle" data-swiper-parallax="-60%">The Fine Arts Center</span>
				  <h2 data-swiper-parallax="-100%">Art Spot part of one of the leading education organizations in India.</h2>
				  
			
				  <p data-swiper-parallax="-30%"> Proven business model that has delivered a robust ROI for our Franchisees.</p>
			 </div>
		      </div> 
                       </div>
                      <div class="swiper-slide" style="background-image:url(images/shutterstock2.png);">
			<div class="slider_trans">		  
				<div class="slider-caption">
			<span class="subtitle" data-swiper-parallax="-60%">The Fine Arts Center</span>
				<h2 data-swiper-parallax="-100%">Support in enrolments via marketing</h2>
				
				<p data-swiper-parallax="-30%"> Assistance in developing infrastructure and designing interiors</p>
				</div>	
			</div>	
                      </div>
                      <div class="swiper-slide" style="background-image:url(images/shutterstock3.png);">
			<div class="slider_trans">		  
				<div class="slider-caption">
			<span class="subtitle" data-swiper-parallax="-60%">The Fine Arts Center</span>
				<h2 data-swiper-parallax="-100%">Provides time tested books, publications and other learning resources/h2>
				
				<p data-swiper-parallax="-30%"> Continuous updates on current educational developments</p>
				</div>
                       </div>
		   </div> 		   
                    </div>
                    <div class="swiper-pagination"></div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>	
                  </div>
			  
		 <div class="swiper-container-toolbar swiper-toolbar swiper-init" data-effect="slide" data-slides-per-view="1" data-slides-per-group="1" data-space-between="0" data-pagination=".swiper-pagination-toolbar">
			<div class="swiper-pagination-toolbar"></div>
			<div class="swiper-wrapper">
			  <div class="swiper-slide toolbar-icon">
				<a href="#" onclick="home()" data-view=".view-main" ><img src="images/icons/red/users.png" alt="" title="" /><span>Home</span></a>
			        <a href="#" onclick="myFunction()" data-view=".view-main"><img src="images/icons/red/features.png" alt="" title="" /><span>Login</span></a>
				<a href="#" onclick="staff()" data-view=".view-main"><img src="images/icons/red/lock.png" alt="" title="" /><span>Staff</span></a>
				<a href="#"  onclick="class_create()" data-view=".view-main"><img src="images/icons/red/blog.png" alt="" title="" /><span>Class</span></a>
				<a href="#"  onclick="level_create()" data-view=".view-main"><img src="images/icons/red/photos.png" alt="" title="" /><span>Level</span></a>
				<a href="#" onclick="Student()"   data-view=".view-main"><img src="images/icons/red/contact.png" alt="" title="" /><span>Student</span></a>
			  </div> 
			  <div class="swiper-slide toolbar-icon">
				  <a href="#"  onclick="Attendance()"  data-view=".view-main"><img src="images/icons/red/shop.png" alt="" title="" /><span>Attendance</span></a>
				  <a href="#"  onclick="Fee_Category()" data-view=".view-main"><img src="images/icons/red/music.png" alt="" title="" /><span>Fee Category</span></a>
				  <a href="#" onclick="myFunction()" data-view=".view-main"><img src="images/icons/red/features.png" alt="" title="" /><span>Login</span></a>
				<a href="#" onclick="staff()" data-view=".view-main"><img src="images/icons/red/lock.png" alt="" title="" /><span>Staff</span></a>
				<a href="#"  onclick="class_create()" data-view=".view-main"><img src="images/icons/red/blog.png" alt="" title="" /><span>Class</span></a>
				<a href="#"  onclick="level_create()" data-view=".view-main"><img src="images/icons/red/photos.png" alt="" title="" /><span>Level</span></a>
				 <!-- <a href="form.html" data-view=".view-main"><img src="images/icons/red/form.png" alt="" title="" /><span>CUSTOM FORM</span></a>
				  <a href="#" data-popup=".popup-social" class="open-popup"><img src="images/icons/red/twitter.png" alt="" title="" /><span>SOCIAL</span></a>
				  <a href="videos.html" data-view=".view-main"><img src="images/icons/red/video.png" alt="" title="" /><span>VIDEOS</span></a>
				  <a href="#" class="external"><img src="images/icons/red/phone.png" alt="" title="" /><span>CALL NOW!</span></a>-->
			   </div>

			</div>
		  </div>	

			  
            </div>
          </div>
        </div>



      </div>
    </div>

	
    <!-- Login Popup -->
    <div class="popup popup-login">
        <div class="content-block">
            <h4>LOGIN</h4>
            <div class="loginform">
                <form id="LoginForm" method="post">
                    <input type="text" name="Username" value="" class="form_input required" placeholder="username" />
                    <input type="password" name="Password" value="" class="form_input required" placeholder="password" />
                    <div class="forgot_pass"><a href="#" data-popup=".popup-forgot" class="open-popup">Forgot Password?</a></div>
                    <input type="submit" name="submit" class="form_submit" id="submit" value="SIGN IN" />
                </form>
                <div class="signup_bottom">
                    <p>Don't have an account?</p>
                    <a href="#" data-popup=".popup-signup" class="open-popup">SIGN UP</a>
                </div>
            </div>
            <div class="close_popup_button">
                <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
            </div>
        </div>
    </div>

    <!-- Register Popup -->
    <div class="popup popup-signup">
        <div class="content-block">
            <h4>REGISTER</h4>
            <div class="loginform">
                <form id="RegisterForm" method="post">
                    <input type="text" name="Username" value="" class="form_input required" placeholder="Username" />
                    <input type="text" name="Email" value="" class="form_input required" placeholder="Email" />
                    <input type="password" name="Password" value="" class="form_input required" placeholder="Password" />
                    <input type="submit" name="submit" class="form_submit" id="submitregister" value="SIGN UP" />
                </form>
				
            </div>
            <div class="close_popup_button">
                <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
            </div>
        </div>
    </div>
	
    <!-- Forgot Password Popup -->
    <div class="popup popup-forgot">
        <div class="content-block">
            <h4>FORGOT PASSWORD</h4>
            <div class="loginform">
                <form id="ForgotForm" method="post">
                    <input type="text" name="Email" value="" class="form_input required" placeholder="email" />
                    <input type="submit" name="submit" class="form_submit" id="submitforgot" value="RESEND PASSWORD" />
                </form>
                <div class="signup_bottom">
                    <p>Check your email and follow the instructions to reset your password.</p>
                </div>
            </div>
            <div class="close_popup_button">
                <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
            </div>
        </div>
    </div>
	
    <!-- Social Icons Popup -->
    <div class="popup popup-social">
    <div class="content-block">
      <h4>Social Share</h4>
      <p>Share icons solution that allows you share and increase your social popularity.</p>
      <ul class="social_share">
      <li><a href="http://twitter.com/" class="external"><img src="images/icons/black/twitter.png" alt="" title="" /><span>TWITTER</span></a></li>
      <li><a href="http://www.facebook.com/" class="external"><img src="images/icons/black/facebook.png" alt="" title="" /><span>FACEBOOK</span></a></li>
      <li><a href="http://plus.google.com" class="external"><img src="images/icons/black/gplus.png" alt="" title="" /><span>GOOGLE</span></a></li>
      <li><a href="http://www.dribbble.com/" class="external"><img src="images/icons/black/dribbble.png" alt="" title="" /><span>DRIBBBLE</span></a></li>
      <li><a href="http://www.linkedin.com/" class="external"><img src="images/icons/black/linkedin.png" alt="" title="" /><span>LINKEDIN</span></a></li>
      <li><a href="http://www.pinterest.com/" class="external"><img src="images/icons/black/pinterest.png" alt="" title="" /><span>PINTEREST</span></a></li>
      </ul>
      <div class="close_popup_button"><a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a></div>
    </div>
    </div>
    
@include('include/script')
  </body>
</html>