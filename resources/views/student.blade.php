<!DOCTYPE html>
<html lang="en">
<head>
@include('include/title')
@include('include/meta')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
<script src="js/controller/emp_controller.js"></script>
<script src="javascripts/jquery.growl.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<link href="stylesheets/jquery.growl.css" rel="stylesheet" type="text/css" />
 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
 <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
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
	//data:'country_id='+val,
	success: function(data){
		console.log(data);
		$("#state-list").html(data);
		getlevel(val);
		getprice(val);
	}
	});
}
function getlevel(val) {

	$.ajax({
	type: "GET",
	url: "getsection/"+val,
	//data:'country_id='+val,
	success: function(data){
		console.log(data);
		$("#select_level").html(data);
		getprice(val);
	}
	});
}
function getprice(val) {

	$.ajax({
	type: "GET",
	url: "getprice/"+val,
	//data:'country_id='+val,
	success: function(data){
		console.log(data);
		$("#price").val(data);
		getbookfee(val);
	}
	});
}
function getbookfee(val){
	$.ajax({
	type: "GET",
	url: "getbookfee/"+val,
	//data:'country_id='+val,
	success: function(data){
		console.log(data);
		$("#book_fee").val(data);
		
	}
	});
}
</script>

<Style>
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
          window.location.href = 'student_delete/'+id;
      })
    });
	$('.view_studentinfo').each(function(){
      $(this).click(function(){
        var id = $(this).attr('id');
          window.location.href = 'view_studentinfo/'+id;
      })
    });
	$("#dob").change(function(){
		 var today = new Date();
		 var birthDate = new Date($(this).val());
		  var age = today.getFullYear() - birthDate.getFullYear();
   // var m = today.getMonth() - birthDate.getMonth();
	
    // if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        // age--;
    // }
   // return age;
		$("#age").val(age);
	});
	$('#alert').delay(5000).fadeOut('slow');


	
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
	 <br>
	 @if($msg = Session::get('status'))



	@if($msg['status'] =='success')
		
	<div class="alert alert-success" id="alert">
  <strong>{{$msg['msg']}}</strong> .
</div>

@endif
@if($msg['status'] =='error')
		<div class="alert alert-danger" id="alert">
  <strong>{{$msg['msg']}}</strong> .
</div>

@endif
@endif
{{Session::forget('status')}} 
 
 <h2 class="page_title">Student  </h2> 
  <a href="#" ng-click="ShowHide()"> <button type="button" class="btn btn-default" style="margin-left: 5%;">Add New</button></a>


     <div class="page_single layout_fullwidth_padding" ng-show = "IsVisible">
	 
                <div class="contactform">
                <form class="" name="empForm" method="post" action="{{url('add_student')}}" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group" >
  <label for="usr">Registration no:</label>
  <input type="text" class="form-control" name="reg_no"  value="{{$data}}" readonly required>

</div>
		<div class="form-group" >
  <label for="usr">Student Name:</label>
  <input type="text" class="form-control" name="stu_name"    required>

</div>

<div class="form-group" >
  <label for="usr">DOB:</label>
  <input type="date" class="form-control" name="dob" id="dob"   required>

</div>
<div class="form-group" >
  <label for="usr">Age:</label>
  <input type="number" class="form-control" name="age"  id="age"  readonly required>

</div>
<div class="form-group" >
  <label for="usr">Address :</label>
  <input type="text" class="form-control" name="address"  ng-model="address"  required>

</div>
<div class="form-group" >
  <label for="usr">Mail Id :</label>
  <input type="email" class="form-control" name="mail"  ng-model="mail"  required>

</div>
<div class="form-group" >
  <label for="usr">Contect No 1 :</label>
  <input type="number" class="form-control" name="mob1"  ng-model="mob1"  required>

</div>
<div class="form-group" >
  <label for="usr">Contect No 2 :</label>
  <input type="number" class="form-control" name="mob2"  ng-model="mob2"  required>
</div>
				<div class="form-group" >
  <label for="usr">Course :</label>
   <select class="form-control" id="sel1" name="e_class"  ng-model="e_class"  onChange="getState(this.value);" required>
    @for($i=0;$i<count($sql);$i++)
        <option value="{{$sql[$i]->c_id}}">{{$sql[$i]->classes}}</option>
@endfor  
      </select>


</div>
		<div class="form-group" >
  <label for="usr">Sub Category:</label>
    <select class="form-control" id="state-list" name="section"  ng-model="section" onChange="getlevel(this.value);" required>
	{{--	@for($i=0;$i<count($teacher);$i++)
        <option value="{{$teacher[$i]->sec_id}}">{{$teacher[$i]->sec_name}}</option>
@endfor --}}
      </select>

</div>
	<!--<div class="form-group" >
  <label for="usr">Level:</label>
    <select class="form-control" id="select_level" name="level"  ng-model="level" onChange="getprice(this.value);"  required>
	
      </select>

</div> -->
	<div class="form-group" >
  <label for="usr">Batch:</label>
    <input type="hidden" class="form-control" name="level"  ng-model="level"  value=" ">
    <select class="form-control" id="state-list" name="batch"  ng-model="batch" required>
		@for($i=0;$i<count($batch);$i++)
        <option value="{{$batch[$i]->sec_id}}">{{$batch[$i]->sec_name}}</option>
@endfor
      </select>

</div>
<div class="form-group" >
  <label for="usr">Branch:</label>
    <select class="form-control"  name="branch"  ng-model="branch"  required>
	@for($i=0;$i<count($branch);$i++)
        <option value="{{$branch[$i]->branch_id}}">{{$branch[$i]->branch_name}}</option>
@endfor
      </select>

</div>
<div class="form-group" >
  <label for="usr">Tuition Fee :</label>
  <input type="number" class="form-control" name="price"   id="price" readonly  required>
</div>
<div class="form-group" >
  <label for="usr">Book Fee :</label>
  <input type="number" class="form-control" name="book_fee"   id="book_fee" readonly  required>
</div>
<div class="form-group" >
  <label><input type="radio" name="paytype" value="1" >One Month </label>
  <label><input type="radio" name="paytype" value="2">Half  Month</label>
  <label><input type="radio" name="paytype" value="3">One Year</label>
</div>

<div class="form-group" >
  <label for="usr">Payment Mode :</label>
<div class="radio">
  <label><input type="radio" name="paymode" value="1" >Cash</label>
  <label><input type="radio" name="paymode" value="2">Online Payment</label>
</div>
</div>



  <input type="submit" name="submit" value="SAVE"   class="btn btn-default">


                </form>
                </div>

              
              
              </div>
	
     <div class="page_single layout_fullwidth_padding" ng-show = "Show">
	
                <div class="contactform">
				
				<table id="example" class="table">
    <thead>
      <tr>
        <th>S.no</th>
        <th>Reg.Id</th>
        <th>Name</th>
        <th>Class</th>
        <th>Level </th>
        <th>Batch </th>
        <th>Branch </th>
        <th>Payment Mode </th>
        <th>Fee  </th>
        <th>Fee Type  </th>
        <th>Status  </th>
      
        
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
	 @for($i=0;$i<count($student);$i++)
@if($birth[$i] = explode("-",$student[$i]->dob))
@endif

      
@if($birth[$i][1] == date("m") && $birth[$i][2] == date("d"))
<tr class="success">
@elseif($birth[$i][1] == date("m") && $birth[$i][2] == date("d")+1)
<tr class="info">
@endif
        <td>{{$i+1}}</td>
        <td>{{$student[$i]->reg_no}}</td>
		    <td>{{$student[$i]->stu_name}}</td>
        <td>{{$student[$i]->classes}}</td>
        <td>{{$student[$i]->sub_category}} </td>
        <td>{{$student[$i]->sec_name}}</td>
        <td>{{$student[$i]->branch_name}}</td>
        <td>
		@if($student[$i]->paymode == '1')
			<p>Cash </p>
			@else
				<p>Online Payment </p>
				@endif
		
		</td>
		
		<td>
		{{$student[$i]->price}}
		</td>
    <td>
	
	 @if($student[$i]->paymode =='1')
			<p>One Month Fee </p>
			@elseif($student[$i]->paymode =='2')
				<p>One Six Fee </p>
				@elseif($student[$i]->paymode =='3')
					<p>One Year Fee </p>
					@endif  
		</td>
       <td>
	   @if($student[$i]->payment_status == '0')
			<p>Pendding </p>
			@else
				<p>Payed</p>
				@endif
	   </td>
	 
        <td>
		<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Option
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
  <li><a href="#" class="student_edit" id="{{$student[$i]->stu_id}}"><font color="blue"> Edit</font></a></li> 
    <li><a href="#" class="student_delete" id="{{$student[$i]->stu_id}}"><font color="red">DELETE </font></a></li>
   <!-- <li><a href="#" class="view_studentinfo" id="{{$student[$i]->stu_id}}"><font color="#000">View Profile </font></a></li> -->
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