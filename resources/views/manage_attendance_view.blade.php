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
<link rel="stylesheet" href="w3.css">
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
$('.edit').each(function(){
      $(this).click(function(){
        var id = $(this).attr('id');
         window.location.href = 'edit_sec/'+id;
      })
    });
	$('.delete').each(function(){
      $(this).click(function(){
        var id = $(this).attr('id');
          window.location.href = 'del_sec/'+id;
      })
    });
});
</script>
<Script>
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
  
              <h2 class="page_title">Student Attendance </h2> 
       <a href="#" ng-click="ShowHide()"> <button type="button" class="btn btn-default" style="margin-left: 5%;">Add New</button></a>
     <div class="page_single layout_fullwidth_padding" ng-show = "IsVisible">
<br>
               <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
	<br>
      <h6>Attendance For Class Class One
Section A
28 May 2019</h6>
    </header>

    <div class="w3-container">
	<br>
       <table class="table">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Id</th>
        <th>Name</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>ADE001</td>
        <td>John</td>
        <td>
		   <label class="radio-inline">
      <input type="radio" name="optradio" checked>Undefined    
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio">Present   
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio">Absent  
    </label>
		</td>
      </tr>
    </tbody>
  </table>
    </div>

 
  </div>

              
              
              </div>
	
     <div class="page_single layout_fullwidth_padding" ng-show = "Show">
	 <form method="post" action="{{url('manage_attendance')}}">
	 	<input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="form-group row">
  <div class="col-sm-3">
    <label for="ex1">Date</label>
	@if(isset($dateofattendance))
    <input class="form-control" id="ex1" name="date" type="date" value="{{$dateofattendance}}" required>
@else
    <input class="form-control" id="ex1" name="date" type="date" required>
@endif
  </div>
  <div class="col-sm-3">
    <label for="ex2">Batch</label>
  <select class="form-control"  name="batch" required>
 @for($i=0;$i<count($sql);$i++)
        <option value="{{$sql[$i]->sec_id}}">{{$sql[$i]->sec_name}}</option>
@endfor
  </select>
  </div>
 
    <div class="col-sm-3">
	<br>
 <input type="submit" name="submit" class="btn btn-default" value="Submit">
  </div>
</div>
</form>
<br>
@if(isset($attendance))


   <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
	<br>
      <h6>Marks Manager</h6>
    </header>

    <div class="w3-container">
	<br>
	<form method="post" action="{{url('submit_attendance')}}">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
       <table class="table">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Id</th>
        <th>Name</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
	@for($i=0;$i<count($attendance);$i++)
      <tr>
        <td>{{$i+1}}</td>
        <td>{{$attendance[$i]->reg_no}}</td>
        <td>{{$attendance[$i]->stu_name}}</td>
        <td>
		<input type="hidden" name="date[]" value="{{$dateofattendance}}">
		<input type="hidden" name="student_id[]" value="{{$attendance[$i]->reg_no}}">
		   
    <label class="radio-inline">
      <input type="radio"  id="{{$attendance[$i]->reg_no}}" name="attendance{{$i}}" value="1">Present   
    </label>
    <label class="radio-inline">
      <input type="radio" id="{{$attendance[$i]->reg_no}}" name="attendance{{$i}}" value="2">Absent  
    </label>
		</td>
      </tr>
	  @endfor
    </tbody>
  </table>
  <input type="submit" name="submit" value="Submit" class="btn btn-default">
  <br>
  <br>
  </form>
    </div>

 
  </div>
	@endif


			   
			   
			   
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