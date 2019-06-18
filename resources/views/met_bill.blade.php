<!DOCTYPE html>
<html lang="en">
<head>
@include('include/title')
@include('include/meta')


<link src="css/font-awesome.css">

  <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js'></script>
    <script  src="ajs/index.js"></script>
</head>
<body id="mobile_wrap">
<script type="text/javascript">
$(document).ready(function () {
    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap'
    });
	getState(val);
});
function getState(val) {

	$.ajax({
	type: "GET",
	url: "getstudent/"+val,
	//data:'country_id='+val,
	success: function(data){
		console.log(data);
		$("#student_name").html(data);
		// getlevel(val);
		// getprice(val);
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

    <div class="views" >

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
  
              <h2 class="page_title">Material Billing  </h2> 
			  
	<div class="container" ng-app="invoice">
	<form method="post" action="{{url('insert_bill')}}">
  <section class="jumbotron">
    <div class="form-group row">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="col-sm-3">
	    <label for="ex2">Invoice No</label>
		 <input class="form-control input-sm" name="inv_no"  type="text" value="{{$bill_no[0]->bill_no + 1}}" required readonly>
	</div>
  <div class="col-sm-3">
    <label for="ex2">Batch</label>
    <select class="form-control"  name="batch" id="sel1" required  onChange="getState(this.value);">
	<option>      </option>
	@for($i =0;$i<count($batch);$i++)
    <option value="{{$batch[$i]->sec_id}}">{{$batch[$i]->sec_name}}</option>
@endfor
  </select>
  </div>
   <div class="col-sm-3">
    <label for="ex2">Student Name</label>
    <select class="form-control" name="student_name" id="student_name" required>
 
  </select>
  </div>
   <div class="col-sm-3">
    <label for="ex2">Date</label>
  <input class="form-control input-sm" name="date"  type="date" required>
  </div>
 
</div>
  </section>
  <section class="row" ng-controller="InvoiceController">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Qty</th>
          <th>Price</th>
          <th>Total</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="item in invoice.items">
          <td><select class="form-control" ng-model="item.name"  name="productname[]" ng-change="myFunc()"  required>
		  @for($i=0;$i<count($sql);$i++)
    <option value="{{$sql[$i]->met_id}}">{{$sql[$i]->met_name}}</option>
@endfor
   
  </select></td>
          <td><input type="number" ng-model="item.qty" class="form-control qty"  name="qty[]" ng-change="count()"  required/></td>
          <td><input type="number" ng-model="item.price" class="form-control" name="price[]"  ng-value="myValue" required/></td>
          <td>₹ <% item.qty * myValue %> </td>
          <td><button type="button" class="btn btn-danger" ng-click="remove($index)">Delete</button></td>
        </tr>
        <tr>
        <td><button type="button" class="btn btn-primary" ng-click="add()">Add item</button></td>
          <td></td>
          <td></td>
          <td>Total : </td>
          <td>₹ <% total() %> <input type="hidden" name="total" value="<% total() %>"></td>
        </tr>
      </tbody>
    </table>
  </section>
  <input type="submit" name="submit" class="btn btn-default">
  </form>
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