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
</script>
<Script>
$(document).ready(function(){
$('.student_edit').each(function(){
      $(this).click(function(){
        var id = $(this).attr('id');
         window.location.href = 'class_edit/'+id;
      })
    });
	$('.student_delete').each(function(){
      $(this).click(function(){
        var id = $(this).attr('id');
          window.location.href = 'class_delete/'+id;
      })
    });

});
</script>
<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
</style>
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
  
              <h2 class="page_title">Class </h2> 
       <a href="#" ng-click="ShowHide()"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span><b><font color="#000"><span class="glyphicon glyphicon-plus"></span> </font></b></span></a>
     <div class="page_single layout_fullwidth_padding" ng-show = "IsVisible">

                <div class="contactform">
                <form class="" name="empForm" method="post" action="{{url('add_class')}}" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group" >
  <label for="usr">Class:</label>
  <input type="text" class="form-control" name="e_name"  ng-model="e_name"  required>

</div>
<div class="form-group" >
  <label for="usr">Sub Category:</label>
  <input type="text" class="form-control" name="sub_cat"  ng-model="sub_cat"  required>

</div>
<!--<div class="form-group" >
  <label for="usr">Level :</label>
  <input type="text" class="form-control" name="level"  ng-model="level"  required>

</div>  -->
<div class="form-group" >
  <label for="usr">price :</label>
   <input type="hidden" class="form-control" name="level"  ng-model="level"  value=" ">

  <input type="number" class="form-control" name="price"  ng-model="price"  required>

</div>








  <input type="submit" name="submit" value="SAVE" ng-click="insert()"  class="btn btn-default">


                </form>
                </div>

              
              
              </div>
			    
     <div class="page_single layout_fullwidth_padding" ng-show = "Show">
                <div class="contactform">
				
				<table class="table">
    <thead>
      <tr>
        <th>Sno</th>
        <th>Class</th>
        <th>Sub category</th>
        
        <th>Price </th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
	@for($i=0;$i<count($sql);$i++)
      <tr>
        <td>{{$i +1}}</td>
        <td>{{$sql[$i]->classes}}</td>
        <td>{{$sql[$i]->sub_category}}</td>
       
        <td>{{$sql[$i]->price}}</td>
	 
        <td>
				<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Option
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#" class="student_edit" id="{{$sql[$i]->c_id}}"><font color="blue"> Edit</font></a></li>
    <li><a href="#" class="student_delete" id="{{$sql[$i]->c_id}}"><font color="red">DELETE </font></a></li>
  </ul>
</div>
		
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