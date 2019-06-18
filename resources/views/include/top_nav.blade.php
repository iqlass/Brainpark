   @if($user = Session::get('user_data'))
	   @else
		  <script>
   window.location.href = "emp_login";
   </script>  
	   @endif
  
  
   
   
   <div class="navbarpages">
                            <div class="navbar_left">
                                <div class="logo_text">
							<img src="logo.PNG" style="width: 150px;">
								</div>
                            </div>
			    <div class="navbar_right navbar_right_menu">
				<a href="#" data-panel="left" class="open-panel"><img src="images/icons/white/menu.png" alt="" title="" /></a>
			    </div>			
			    <div class="navbar_right">
				<a href="#" data-panel="right" class="open-panel"><img src="images/icons/white/user.png" alt="" title="" /></a>
			    </div>
			    
                        </div>