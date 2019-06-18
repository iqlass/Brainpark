<!DOCTYPE html>
<html lang="en">
<head>
@include('include/title')
@include('include/meta')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
<script src="js/controller/emp_controller.js"></script>
<script src="javascripts/jquery.growl.js" type="text/javascript"></script>
<link href="stylesheets/jquery.growl.css" rel="stylesheet" type="text/css" />
 <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body id="mobile_wrap">
<script type="text/javascript">
$(document).ready(function () {
    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap'
    });
});
function getState(val) {

	$.ajax({
	type: "GET",
	url: "getlevel/"+val,
	data:'country_id='+val,
	success: function(data){
		console.log(data);
		$("#state-list").html(data);
		//getCity();
	}
	});
}
</script>
 @include('include/side_menu')

    <div class="views" ng-app="MyApp" ng-controller="MyController">

      <div class="view view-main">
@if($msg = Session::get('status'))

	
	@if($msg['status'] =='success')
<script>
  $.growl.notice({ message: "Insert Successfully" });
 
</script>
@endif
@if($msg['status'] =='error')
<script>

   $.growl.error({ message: "this Record Already Inserted" });
 
</script>
@endif
@endif
{{Session::forget('status')}}
<Script>
$(document).ready(function(){
$('.student_edit').each(function(){
      $(this).click(function(){
        var id = $(this).attr('id');
         window.location.href = 'edit_stuent/'+id;
      })
    });
	$('.student_delete').each(function(){
      $(this).click(function(){
        var id = $(this).attr('id');
          window.location.href = 'met_delete/'+id;
      })
    });
	
});
</script>

        <div class="pages">

          <div data-page="index" class="page homepage">
            <div class="page-content">
		
                      @include('include/top_nav')

                  <!-- Slider -->
               <div class="pages">
  <div data-page="form" class="page no-toolbar no-navbar">
    <div class="page-content">
    
	<div class="navbarpages navbarpagesbg">
                            <div class="navbar_left">
                               <div class="logo_text"><img src="logo.PNG" style="width: 150px;"></div>
                            </div>
			    <div class="navbar_right navbar_right_menu">
				<a href="#" data-panel="left" class="open-panel"><img src="images/icons/white/menu.png" alt="" title="" /></a>
			    </div>			
			    <div class="navbar_right">
				<a href="#" data-panel="right" class="open-panel"><img src="images/icons/white/user.png" alt="" title="" /></a>
			    </div>
			   			
	</div>
	
     <div id="pages_maincontent">
  
              <h2 class="page_title">Fee Category   </h2> 
       <a href="#" ng-click="ShowHide()"> <button type="button" class="btn btn-default" style="margin-left: 5%;">Add New</button></a>
     <div class="page_single layout_fullwidth_padding" ng-show = "IsVisible">

                <div class="contactform">
                <form class="" name="empForm" method="post" action="{{url('set_fee')}}" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group" >
  <label for="usr">Name:</label>
  <input type="text" class="form-control" name="met_name"  ng-model="met_name"  required>

</div>
		<div class="form-group" >
  <label for="usr">Discription:</label>
  <input type="text" class="form-control" name="met_des"  ng-model="met_des"  required>

</div>
	<div class="form-group" >
  <label for="usr">Price:</label>
  <input type="text" class="form-control" name="price"  ng-model="price"  required>

</div>
<div class="form-group" >
  <label for="usr">Image:</label>
 <input type="file" name="met_image"  class="btn btn-default" required />

</div>
	
	







  <input type="submit" name="submit" value="SAVE"   class="btn btn-default">


                </form>
                </div>

              
              
              </div>
	
     <div class="page_single layout_fullwidth_padding" ng-show = "Show">
	
                <div class="contactform">
				
				<table class="table">
    <thead>
      <tr>
        <th>Reg.Id</th>
        <th>Material Name</th>
        <th>Material discription</th>
        <th>Material price</th>
        
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
	 @for($i=0;$i<count($sql);$i++)
      <tr>
       
        <td>{{$sql[$i]->met_name}}</td>
		    <td>{{$sql[$i]->met_dis}}</td>
        <td><img src="{{$sql[$i]->met_image}}" width="200" height="100"></td>
        <td>{{$sql[$i]->met_price}}</td>
    
       
	 
        <td>
		<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Option
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#" class="student_edit" id="{{$sql[$i]->met_id}}"><font color="blue"> Edit</font></a></li>
    <li><a href="#" class="student_delete" id="{{$sql[$i]->met_id}}"><font color="red">DELETE </font></a></li>
  
  </ul>
</div>
		
		</td>
      </tr>
      @endfor 
    </tbody>
  </table>
				</div>
				</div>
      
      </div>
      
      
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