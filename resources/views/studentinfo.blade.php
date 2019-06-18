<!DOCTYPE html>
<html lang="en">
<head>
@include('include/title')
@include('include/editmeta')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
<script src="../js/controller/emp_controller.js"></script>
<script src="../javascripts/jquery.growl.js" type="text/javascript"></script>
<link href="../stylesheets/jquery.growl.css" rel="stylesheet" type="text/css" />
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
<style>
body {
    background: #eeeeee;
}
.panel {
    display: inline-block;
    background: #ffffff;
    min-height: 100px;
    height: 100px;
    box-shadow:0px 0px 5px 5px #C9C9C9;
    -webkit-box-shadow:2px 2px 5px 5x #C9C9C9;
    -moz-box-shadow:2px 2px 5px 5px #C9C9C9;
    margin: 10%;
    padding: 10px;
}
.panel1 {
    min-width: 100px;
    width: 100px;
}

</style>
 @include('include/editsidemenu')

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
         window.location.href = 'edit_sec/'+id;
      })
    });
	$('.student_delete').each(function(){
      $(this).click(function(){
        var id = $(this).attr('id');
          window.location.href = 'del_sec/'+id;
      })
    });
	$('.view_studentinfo').each(function(){
      $(this).click(function(){
        var id = $(this).attr('id');
          window.location.href = 'view_studentinfo/'+id;
      })
    });
	$("#Back").click(function(){
		  window.location.href = '../studentcration';
	});
});
</script>

        <div class="pages">

          <div data-page="index" class="page homepage">
            <div class="page-content">
		
                      @include('include/edit_top_name')

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
  
              <h2 class="page_title">Student Info  </h2> 
      
     <div class="page_single layout_fullwidth_padding" >

                <div class="contactform">
				  <button type="button" id="Back" class="btn btn-default">Back</button>
				  <br>
				  <br>
                 <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Basic Info</a></li>
  
    <li><a data-toggle="tab" href="#menu1">Parent Info</a></li>
    <li><a data-toggle="tab" href="#menu2">Exam Marks</a></li>
    <li><a data-toggle="tab" href="#menu3">Payments</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">

      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>{{$student[0]->stu_name}}</th>
       
      </tr>
	   <tr>
        <th>Parent Name</th>
        <th> Mohamed</th>
       
      </tr>
	   <tr>
        <th>Class</th>
        <th>{{$student[0]->classes}}</th>
       
      </tr>
	   <tr>
        <th>Section</th>
        <th>{{$student[0]->sec_name}}</th>
       
      </tr>
	  <tr>
        <th>Class Teacher</th>
        <th>{{$student[0]->emp_pwd}}</th>
       
      </tr>
	   <tr>
        <th> Mobile</th>
        <th>{{$student[0]->emp_mobile}}</th>
       
      </tr>
	   <tr>
        <th> Email</th>
        <th>{{$student[0]->emp_email}}</th>
       
      </tr>
    </thead>
  
  </table>
    </div>
    <div id="menu1" class="tab-pane fade">
        <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Caldwell Mccoy</th>
       
      </tr>
	   <tr>
        <th>Email</th>
        <th> parent@example.com</th>
       
      </tr>
	   <tr>
        <th>Phone</th>
        <th>	+995-69-7769714</th>
       
      </tr>
	   <tr>
        <th>Address</th>
        <th>Tempore magna ut sit atque aute autem nostrum qui odio maxime autem adipisci ut</th>
       
      </tr>
	  <tr>
        <th>Profession</th>
        <th>Consequatur Iure et nihil laboris eligendi omnis et nulla</th>
       
      </tr>
	  
	  
    </thead>
  
  </table>
    </div>
    <div id="menu2" class="tab-pane fade">
   
	 <h2>1st semester exam</h2>
	 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Subject</th>
        <th>Obtained Mark</th>
        <th>Highest Mark</th>
        <th>Grade</th>
        <th>Comment</th>
    </thead>
	<tbody>
	<tr>
	<td>Physics</td>
	<td>74</td>
	<td>95</td>
	<td>A</td>
	<td>Good</td>
	</tr>
	<tr>
	<td>Math</td>
	<td>74</td>
	<td>95</td>
	<td>A+</td>
	<td>Good</td>
	</tr>
	</tbody>
  
  </table>
  <br>
  <p>Total Marks : 171 <br>
Average Grade Point : 4.5 </p>

      
	  
    </div>
    <div id="menu3" class="tab-pane fade">
       <h6>1st semester exam</h6>
	 <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Options</th>
    </thead>
	<tbody>
	<tr>
	<td>1</td>
	<td>Exam Fees</td>
	<td>500</td>
	<td>23 Apr 2018</td>
	<td><button type="button" class="btn btn-default">View Invoice</button></td>
	</tr>
	
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
    
@include('include/editscript')
  </body>
</html>