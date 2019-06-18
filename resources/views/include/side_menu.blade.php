
 
  <div class="statusbar-overlay"></div>

    <div class="panel-overlay"></div>

    <div class="panel panel-left panel-reveal">
	<div class="view view-subnav">
	<div class="pages">
		<div data-page="panel-leftmenu" class="page pagepanel">	
                     <div class="page-content">
			<nav class="main_nav_icons_inline_3">
			<ul>
			<li><a href="#" class="close-panel" id="home_re" data-view=".view-main"><img src="images/icons/white/home.png" alt="" title="" /><span>Home</span></a></li>
			<li><a href="about.html" class="close-panel" data-view=".view-main"><img src="images/icons/white/mobile.png" alt="" title="" /><span>About</span></a></li>
			<li><a href="#"  id="login" class="close-panel" data-view=".view-main"><img src="images/icons/white/lock.png" alt="" title="" /><span>Login</span></a></li>
			<li><a href="#" class="close-panel" id="staff_re" data-view=".view-main"><img src="icon/Teacher-icon.png" alt="" title="" /><span>Staff</span></a></li>
			
			
			<li><a  href="#" class="close-panel"  id="class_re" data-view=".view-main"><img src="images/icons/white/users.png" alt="" title="" /><span>Class</span></a></li>
			<li><a href="#" id="level_re" class="close-panel" data-view=".view-main"><img src="icon/Teacher-icon.png" alt="" title="" /><span>Batch</span></a></li>	
<li><a href="#" class="close-panel" id="add_student" data-view=".view-main"><img src="images/icons/white/mobile.png" alt="" title="" /><span>Student</span></a></li>
<li><a href="#" class="close-panel" id="att_student" data-view=".view-main"><img src="images/icons/white/mobile.png" alt="" title="" /><span>Attendance </span></a></li>
<li><a href="#" class="close-panel" id="create_fee" data-view=".view-main"><img src="images/icons/white/mobile.png" alt="" title="" /><span>Material</span></a></li>			

			<li><a href="#" class="close-panel"  id="bill_carete"  data-view=".view-main"><img src="images/icons/white/photos.png" alt="" title="" /><span>bill</span></a></li>
			<li><a href="#" class="close-panel" data-view=".view-main"><span></span></a></li>
			<li><a href="#" class="close-panel" data-view=".view-main"><span></span></a></li>
			<!--<li><a href="videos.html" class="close-panel" data-view=".view-main"><img src="images/icons/white/video.png" alt="" title="" /><span>Videos</span></a></li>
			<li><a href="music.html" class="close-panel" data-view=".view-main"><img src="images/icons/white/music.png" alt="" title="" /><span>Music</span></a></li>
			
			<li><a href="shop.html" class="close-panel" data-view=".view-main"><img src="images/icons/white/shop.png" alt="" title="" /><span>Shop</span></a></li>
			<li class="subnav"><a href="categories.html"><img src="images/icons/white/categories.png" alt="" title="" /><span>Sub level menu</span></a></li>
			<li><a href="cart.html" class="close-panel" data-view=".view-main"><img src="images/icons/white/cart.png" alt="" title="" /><span>Cart</span></a></li>
			
			<li><a href="tables.html" class="close-panel" data-view=".view-main"><img src="images/icons/white/tables.png" alt="" title="" /><span>Tables</span></a></li>
			<li><a href="chat.html" class="close-panel" data-view=".view-main"><img src="images/icons/white/message.png" alt="" title="" /><span>Chat messages</span></a></li>
			<li><a href="form.html" class="close-panel" data-view=".view-main"><img src="images/icons/white/form.png" alt="" title="" /><span>Custom Form</span></a></li>
			
			<li><a href="#" data-popup=".popup-social" class="open-popup"><img src="images/icons/white/twitter.png" alt="" title="" /><span>SOCIAL</span></a></li>
			<li><a href="#" class="close-panel external" data-view=".view-main"><img src="images/icons/white/phone.png" alt="" title="" /><span>Call now!</span></a></li>
			<li><a href="contact.html" class="close-panel" data-view=".view-main"><img src="images/icons/white/contact.png" alt="" title="" /><span>Contact</span></a></li>-->
			</ul>
			</nav>
                     </div>
		</div>
	  </div>
	</div>  
    </div>

    <div class="panel panel-right panel-reveal">
      <div class="user_login_info">
	  
                <div class="user_thumb">
                <img src="images/background.png" alt="" title="" />
                  <div class="user_details">
				    @if($user = Session::get('user_data'))
						
                   <p>Welcome, <span>{{$user[0]->emp_name}}</span></p>
                  </div>  
				  @if($user[0]->emp_photo =='')
					   <div class="user_avatar"><img src="images/avatar.jpg" alt="" title="" /></div> 
					  @else
						   <div class="user_avatar"><img src="{{$user[0]->emp_photo}}" alt="" title="" /></div> 
						  @endif
                       @else
							<script>
   window.location.href = "emp_login";
   </script>
						@endif
                </div>
				
                  <nav class="user-nav" style="background-color: #e35002;">
                    <ul>
                      <li><a href="features.html" class="close-panel"><img src="images/icons/white/settings.png" alt="" title="" /><span>Account Settings</span></a></li>
                      <li><a href="features.html" class="close-panel"><img src="images/icons/white/briefcase.png" alt="" title="" /><span>My Account</span></a></li>
                      <li><a href="features.html" class="close-panel"><img src="images/icons/white/message.png" alt="" title="" /><span>Messages</span><strong>12</strong></a></li>
                      <li><a href="features.html" class="close-panel"><img src="images/icons/white/love.png" alt="" title="" /><span>Favorites</span><strong>5</strong></a></li>
                      <li><a href="index.html" class="close-panel"><img src="images/icons/white/lock.png" alt="" title="" /><span>Logout</span></a></li>
                    </ul>
                  </nav>
      </div>
    </div>