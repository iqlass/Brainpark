<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Exception;
use DB;
use Redirect;
use App\empModel;
use App\tbl_class;
use App\tbl_section;
use App\studentmodel;
use App\tbl_attendance;
use App\tbl_metirial;
use App\tdl_bill;
use App\tdl_billdetails;
use App\branchmodel;
use App\ledgermodel;
use App\subledger;
use App\dailybookentrymodel;
use Illuminate\Support\Facades\Input;

class teachercontroller extends Controller
{
   public function index(){
	   $sql = DB::select('select * from tbl_users where is_active ="1" and User_type !="1"');
	   return view('teacher',compact('sql'));
	 
   }
   public function login(){
	   return view('login');
   }
   public function class_creation(){
	  $sql = DB::select('select * from tbl_class where is_active ="1" ');
	   return view('class',compact('sql'));
   }
     public function login_valid(Request $request){
	  $sql = DB::select('select * from tbl_users where emp_username = "'.$request['username'].'" and emp_pwd = "'.$request['pwd'].'" and is_active="1"');
	  if(count($sql) > 0){
		 Session::put('user_data',$sql); 
		   return Redirect::to('/');
	  }else{
		  
		 
		  $data = array('status'=>'error','msg'=>'Invalid User Name and Password');
		   Session::put('user_data',$data); 
		   return Redirect::to('/emp_login'); 
	  }
	 
	  
   }
   public function add_class(Request $request){
	      try{
		  $check_class = $this->check_class($request);
	 if($check_class =='true'){
	



             tbl_class::Create([ 
	   'classes' =>$request['e_name'],
	   'sub_category' =>$request['sub_cat'],
	   'level' =>$request['level'],
	   'price' =>$request['price'],
	   'is_active' =>'1',

	   
	   ]);
	    $data = array('status'=>'success','msg'=>'Insert Successfully');
				
	 }else{
		 
		 $data = array('status'=>'error','msg'=>'This Record Already Inserted');
	 }
	  }
	  catch(Exception $e){
		  $data = array('status'=>'error','msg'=>$e->getMessage());
	  }finally{
		 
		 Session::put('status',$data);
		  return Redirect::to('/class_creation'); 
	  }
   }
    public function check_class($data){
	   try{
		    $sql = DB::select('select * from tbl_class where classes="'.$data['e_name'].'" and sub_category="'.$data['sub_cat'].'" and level="'.$data['level'].'" ');
	 if(count($sql) > 0){
		 $data =  "fales";
	 }else{
		  $data =  "true";
	 }
		 
	  }
	  catch(Exception $e){
		  $data = array('status'=>'error','msg'=>$e->getMessage());
	  }finally{
		  return $data;
	  }
   }
   public function add_emp(Request $request){
	  
		
	   try{
		  $check_user = $this->check_user($request);
	 if($check_user =='true'){
	$emp_id = DB::select("select max(emp_id) as id from tbl_users where e_id = (select max(e_id) from tbl_users)");
	

$str = $emp_id[0]->id;




				 $image = $request->file('e_img');
                $name = time().'.'.$image->getClientOriginalExtension();
             empModel::Create([
	   'emp_id' =>$str + 1,
	   'emp_name' =>$request['e_name'],
	   'emp_designation' =>$request['d_designation'],
	   'emp_dob' =>$request['d_dob'],
	   'emp_gender' =>$request['d_gender'],
	   'emp_address' =>$request['d_address'],
	   'emp_username' =>$request['d_username'],
	   'emp_pwd' =>$request['d_pwd'],
	   'emp_mobile' =>$request['d_mob'],
	   'emp_photo' =>'public/teachers_image/'.$name,
	   'emp_email' =>$request['d_email'],
	   'is_active' =>'1',
	   'User_type' =>'2',
	   
	   ]);
	    $data = array('status'=>'success','msg'=>'Insert Successfully');
				 $image->move(public_path().'/teachers_image/', $name);
               
				 ini_set('memory_limit', '256M');
				$image->save(); 
		   
		  $data = array('status'=>'success','msg'=>'Insert Successfully');
	 }else{
		 
		 $data = array('status'=>'error','msg'=>'This Record Already Inserted');
	 }
	  }
	  catch(Exception $e){
		  $data = array('status'=>'error','msg'=>$e->getMessage());
	  }finally{
		 
		 Session::put('status',$data);
		  return Redirect::to('/teacher'); 
	  }
   }
   public function check_user($data){
	   try{
		    $sql = DB::select('select * from tbl_users where emp_name="'.$data['e_name'].'" and emp_mobile ="'.$data['d_mob'].'"');
	 if(count($sql) > 0){
		 $data =  "fales";
	 }else{
		  $data =  "true";
	 }
		 
	  }
	  catch(Exception $e){
		  $data = array('status'=>'error','msg'=>$e->getMessage());
	  }finally{
		  return $data;
	  }
   }
   public function section_creation(){
	   $section = DB::select('select * from tbl_section where is_active="1"');
	

	   return view('section',compact('section'));
   }
   public function add_section(Request $request){
	   try{
		    $check_section = $this->check_section($request);
			// dd($check_section);
			// exit;
			 if($check_section =='true'){
				 // echo "HI";
				 // exit;
				 tbl_section::create([
				 'sec_name' =>$request['branch'],
				 'is_active' =>'1',
				 ]);
	     $data = array('status'=>'success','msg'=>'Insert Successfully');
			 }else{
				 $data = array('status'=>'error','msg'=>'This Record Already Inserted');
			 }
	   }
 catch(Exception $e){
	   $data = array('status'=>'error','msg'=>$e->getMessage());
 }
 finally{
	 Session::put('status',$data);
		  return Redirect::to('/section_creation'); 
 }	  
   }
   public function check_section($val){
	   try{
		     $sql = DB::select('select * from tbl_section where sec_name="'.$val['branch'].'"');
	 if(count($sql) > 0){
		 $data =  "fales";
	 }else{
		  $data =  "true";
	 }
		 
	   }
	   catch(Exception $e){
		    $data = array('status'=>'error','msg'=>$e->getMessage());
	   }
	   finally{
		   return $data;
	   }
   }
   public function studentcration(){
	    // $section = DB::select('SELECT * from tbl_section as s,tbl_users as u,tbl_class as c where s.staff_id = u.emp_id and s.class_id = c.c_id and s.is_active ="1" ');
	   // $sql = DB::select('select * from tbl_class where is_active ="1" ');
		$sql = DB::table('tbl_class')
                     ->where('is_active', '=','1')
                     ->groupBy('classes')
                     ->get();
	    $batch= DB::select('select * from tbl_section where is_active ="1"');
	    $student= DB::select('select * from tbl_student as s,tbl_class as c,tbl_section as b,tbl_branch as br where s.level = c.c_id and s.batch = b.sec_id and s.branch_id = br.branch_id and  s.is_active ="1"');
	   // $student= DB::select('select * from tbl_student as s,tbl_class as c,tbl_section as l,tbl_users as u where s.coruse =c.c_id and s.level = l.sec_id and l.staff_id = u.emp_id and s.is_active ="1"');
	   $roll_no = DB::select("select max(`stu_id`) as reg_no from tbl_student where `is_active` ='1'");
	    
	   if($roll_no[0]->reg_no != null){
		   $data = $roll_no[0]->reg_no;
	   }
	   else{
		  $data =  1;
	   }
	    $branch= DB::select('select * from tbl_branch where is_active ="1"');
	   return view('student',compact('data','sql','batch','student','branch'));
	   // return view();
   }
   public function create_fee(){
	  $sql = DB::select("select * from tbl_metirial where is_active = '1'");
	  $class = DB::select("select * from tbl_class where is_active = '1' group by classes");
	 
	  return view('create_fee',compact('sql','class'));
   }
   public function del_sec($id){
	   
	   DB::select("delete from tbl_section where sec_id='".$id."'");
	    $data = array('status'=>'success','msg'=>'Deleted Successfully');
	   Session::put('status',$data);
	    return Redirect::to('/section_creation'); 
   }
   public function add_student(Request $request){
	    // dd($request);
	
	   
	  $tran_id =  rand();
	 
	  
	   if($request['paytype'] == '1'){
		    $msg = 'Thank you for Join with us. Your credit card has been charged and your transaction is successful. your transaction is "'.$tran_id.'". Payment is "'.$request['price'].'" ';
		 	    $contect = $request['mob1'];
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?mobiles=$contect'&authkey=250185Aw6PBq6R85cf2425f&route=4&sender=ARTSPO&message=$msg&country=91",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
		studentmodel::create([
		'reg_no'=>$request['reg_no'],
	    'stu_name'=>$request['stu_name'],
	    'dob'=>$request['dob'],
	    'age'=>$request['age'],
	    'Address'=>$request['address'],
	    'mailid'=>$request['mail'],
	    'contectno1'=>$request['mob1'],
	    'contectno2'=>$request['mob2'],
	    'coruse'=>$request['e_class'],
	    'level'=>$request['section'],
	    'batch'=>$request['batch'],
	    'branch_id'=>$request['branch'],
	    'price'=>$request['price'],
	    'book_fee'=>$request['book_fee'],
	    'paytype'=>$request['paytype'],
	    'paymode'=>$request['paymode'],
		   'response'=>$response,
	    'paymode'=>1,
	    'is_active'=>1,
		
		]);
  	$data = array('status'=>'success','msg'=>'Insert Successfully');
		Session::put('status',$data);
		return Redirect::to('/studentcration'); 
}
		   
		   
	   }else if($request['paytype'] == '2'){
		   $payment = $request['price'] * 6 ;
		  
		      $msg = 'Thank you for Join with us. Your credit card has been charged and your transaction is successful. . your transaction is "'.$tran_id.'". Payment is "'.$payment .'" ';
		   	  	  $contect = $request['mob1']; 
 $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?mobiles=$contect&authkey=250185Aw6PBq6R85cf2425f&route=4&sender=ARTSPO&message=$msg&country=91",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	
		studentmodel::create([
		'reg_no'=>$request['reg_no'],
	    'stu_name'=>$request['stu_name'],
	    'dob'=>$request['dob'],
	    'age'=>$request['age'],
	    'Address'=>$request['address'],
	    'mailid'=>$request['mail'],
	    'contectno1'=>$request['mob1'],
	    'contectno2'=>$request['mob2'],
	    'coruse'=>$request['e_class'],
	    'level'=>$request['section'],
	    'batch'=>$request['batch'],
		'branch_id'=>$request['branch'],
	    'price'=>$payment,
		'book_fee'=>$request['book_fee'],
	    'paytype'=>$request['paytype'],
	    'paymode'=>$request['paymode'],
		   'response'=>$response,
	    'paymode'=>1,
	    'is_active'=>1,
		
		]);
 	$data = array('status'=>'success','msg'=>'Insert Successfully');
		Session::put('status',$data);
		return Redirect::to('/studentcration'); 
}
		 
	   }else{
		   $payment = $request['price'] * 12 ;
		      $msg = 'Thank you for Join with us. Your credit card has been charged and your transaction is successful. your transaction is "'.$tran_id.'". Payment is "'.$payment .'" '; 
	  	   $contect = $request['mob1'];
		  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?mobiles=$contect&authkey=250185Aw6PBq6R85cf2425f&route=4&sender=ARTSPO&message=$msg&country=91",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
		studentmodel::create([
		'reg_no'=>$request['reg_no'],
	    'stu_name'=>$request['stu_name'],
	    'dob'=>$request['dob'],
	    'age'=>$request['age'],
	    'Address'=>$request['address'],
	    'mailid'=>$request['mail'],
	    'contectno1'=>$request['mob1'],
	    'contectno2'=>$request['mob2'],
	    'coruse'=>$request['e_class'],
	    'level'=>$request['section'],
	    'batch'=>$request['batch'],
		'branch_id'=>$request['branch'],
	    'price'=>$payment,
		'book_fee'=>$request['book_fee'],
	    'paytype'=>$request['paytype'],
	    'response'=>$response,
	    'paymode'=>$request['paymode'],
	    'is_active'=>1,
		
		]);

		$data = array('status'=>'success','msg'=>'Insert Successfully');
		Session::put('status',$data);
		return Redirect::to('/studentcration'); 
  
}
		 
	  }
	   // $data = array();
	  // try{
		// $check_student = $this->check_student($request);
	  // if($check_student =='true'){
		    // studentmodel::Create([
	   // 'reg_no'=>$request['reg_no'],
	   // 'stu_name'=>$request['stu_name'],
	   // 'dob'=>$request['dob'],
	   // 'age'=>$request['age'],
	   // 'Address'=>$request['address'],
	   // 'mailid'=>$request['mail'],
	   // 'contectno1'=>$request['mob1'],
	   // 'contectno2'=>$request['mob2'],
	   // 'coruse'=>$request['e_class'],
	   // 'level'=>$request['section'],
	   // 'is_active'=>1,
	   // ]);
	    // $data = array('status'=>'success','msg'=>'Insert Successfully');
	  // }else{
		  // $data = array('status'=>'error','msg'=>'This Record Already Inserted'); 
	  // }    
	   // }
	     // catch(Exception $e){
		    // $data = array('status'=>'error','msg'=>$e->getMessage());
	   // }
	   // finally{
		    // Session::put('status',$data);
		  // return Redirect::to('/studentcration'); 
		
	   // }
	   
   }
   public function check_student($request){
	   try{
		   $sql = DB::select("select * from tbl_student where stu_name='".$request['stu_name']."' and contectno1='".$request['mob1']."'");
	  if(count($sql) > 0){
		 $data =  "fales";
	 }else{
		  $data =  "true";
	 }
	   }
	     catch(Exception $e){
		    $data = array('status'=>'error','msg'=>$e->getMessage());
	   }
	   finally{
		   return $data;
	   }
   }
   public function getlevel($id){
	 
	$sql = DB::select("select classes from tbl_class where c_id = '".$id."' ");
$data = DB::table('tbl_class')
                     ->where('classes', '=',$sql[0]->classes)
                     ->groupBy('sub_category')
                     ->get();
	 if(count($data) > 0){
		 for($i=0;$i<count($data);$i++){
			echo  '<option value="'.$data[$i]->c_id.'">'.$data[$i]->sub_category.'</option>';
			
		 }
	 }else{
		echo  '<option > ----</option>'; 
	 }
	
   }
      public function getsection($id){
		  $sql = DB::select("select price from tbl_class where c_id = '".$id."' ");
	echo $sql[0]->price;
	 
	// $sql = DB::select("select sub_category from tbl_class where c_id = '".$id."' ");
// $data = DB::table('tbl_class')
                     // ->where('sub_category', '=',$sql[0]->sub_category)
                     // ->groupBy('level')
                     // ->get();
	 // if(count($data) > 0){
		 // for($i=0;$i<count($data);$i++){
			// echo  '<option value="'.$data[$i]->c_id.'">'.$data[$i]->level.'</option>';
			
		 // }
	 // }else{
		// echo  '<option > ----</option>'; 
	 // }
	
   }
     public function getprice($id){
	$sql = DB::select("select price from tbl_class where c_id = '".$id."' ");
	echo $sql[0]->price;
// $data = DB::table('tbl_class')
                     // ->where('sub_category', '=',$sql[0]->sub_category)
                     // ->groupBy('level')
                     // ->get();
	 // if(count($data) > 0){
		 // for($i=0;$i<count($data);$i++){
			// echo  '<option value="'.$data[$i]->c_id.'">'.$data[$i]->level.'</option>';
			
		 // }
	 // }else{
		// echo  '<option > ----</option>'; 
	 // }
	
   }
   public function manage_attendance(){
	   $sql = DB::select('select * from tbl_section where is_active ="1" ');
	  return view('manage_attendance_view',compact('sql'));
   }
   public function add_attendance(Request $request){

	    $sql = DB::select('select * from tbl_section where is_active ="1" ');
	  $attendance = DB::select("select * from  tbl_student where batch='".$request['batch']."' and is_active='1' ");
	  $dateofattendance = $request['date'];
	
	 return view('manage_attendance_view',compact('sql','attendance','dateofattendance'));
   }
   public function view_studentinfo($val){
	   $student= DB::select('select * from tbl_student as s,tbl_class as c,tbl_section as l,tbl_users as u where s.coruse =c.c_id and s.level = l.sec_id and l.staff_id = u.emp_id and s.is_active ="1"');
	   return view('studentinfo',compact('student'));
   }
   public function student_delete($id){
	   DB::select("delete from tbl_student where stu_id='".$id."'");
	    $data = array('status'=>'success','msg'=>'Deleted Successfully');
	   Session::put('status',$data);
	    return Redirect::to('/studentcration');
   }
   public function edit_stuent($id){
	   
	   //$student= DB::select('select * from tbl_student as s,tbl_class as c,tbl_section as l,tbl_users as u where s.coruse =c.c_id and s.level = l.sec_id and l.staff_id = u.emp_id and s.is_active ="1" and stu_id ="'.$id.'"');
	   $sql = DB::select('select * from tbl_class where is_active ="1" ');
	   return view('edit_student',compact('sql'));   
   }
   public function update_student(Request $request){
	 $user= studentmodel::find($request['id']);
        $user->reg_no = $request['reg_no'];
        $user->stu_name = $request['stu_name'];
        $user->dob = $request['dob'];
        $user->age = $request['age'];
        $user->Address = $request['address'];
        $user->mailid = $request['mail'];
        $user->contectno1 = $request['mob1'];
        $user->contectno2 = $request['mob2'];
        $user->level = $request['section'];
        $user->save();
		 $data = array('status'=>'success','msg'=>'Updated Successfully');
	   Session::put('status',$data);
	    return Redirect::to('/studentcration');
   }
   public function del_staff($id){
	 
	    DB::select("delete from tbl_users where e_id='".$id."'");
	    $data = array('status'=>'success','msg'=>'Deleted Successfully');
	   Session::put('status',$data);
	    return Redirect::to('/teacher');
   }
   public function class_delete($id){
	    DB::select("delete from tbl_class where c_id='".$id."'");
	    $data = array('status'=>'success','msg'=>'Deleted Successfully');
	   Session::put('status',$data);
	    return Redirect::to('/class_creation');
   }
   public function class_edit($id){
	  $sql = DB::select("select * from tbl_class where c_id='".$id."'");
	  return view('edit_class',compact('sql'));
   }
   public function update_class(Request $request){
	  $user= tbl_class::find($request['id']);
        $user->classes = $request['class'];
        $user->sub_category = $request['sub_cat'];
        $user->level = $request['level'];
        $user->price = $request['price'];
        $user->save();
		 $data = array('status'=>'success','msg'=>'Updated Successfully');
	   Session::put('status',$data);
	    return Redirect::to('/class_creation');  
   }
     public function edit_sec($id){
	   
	   $data = DB::select("SELECT * from tbl_section where  is_active='1' ");

	 return view('edit_sec',compact('data'));
	   
   }
   public function update_sec(Request $request){
	   $user= tbl_section::find($request['id']);
        $user->sec_name = $request['section'];
        $user->save();
		 $data = array('status'=>'success','msg'=>'Updated Successfully');
	   Session::put('status',$data);
	    return Redirect::to('/section_creation');  
   }
   public function edit_staff($id){
	   $sql = DB::select("select * from tbl_users where emp_id='".$id."'");
	  return view('edit_staff',compact('sql'));
   }
public function update_emp(Request $request){

					
			  $data = array('status'=>'success','msg'=>'Updated Successfully');
	   Session::put('status',$data);
	    return Redirect::to('/teacher');		  
}
public function submit_attendance(Request $request){
	$check_attendance = $this->check_attendance($request['date'][0]);
	if(count($check_attendance) > 0){
		//dd($check_attendance[0]->attendance);
		for($i =0;$i<count($check_attendance);$i++){
			
			  $user[$i]= tbl_attendance::find($check_attendance[$i]->att_id);
         $user[$i]->attendance = $check_attendance[$i]->attendance;
        $user[$i]->save();
	$att_back = DB::select("select a.att_id,a.stu_id,a.date,a.attendance,s.stu_name,c.classes,l.sec_name from tbl_student as s,tbl_attendance as a,tbl_class as c,tbl_section as l where s.reg_no = a.stu_id   and s.level = l.sec_id and  s.coruse = c.c_id and a.date = '".$request['date'][0]."'");
	Session::put('att_date',$request['date'][0]);
	return view('view_attandence',compact('att_back'));
		}
	}else{
		 for($i=0;$i<count($request['student_id']);$i++){
		 tbl_attendance::create([
		 'stu_id'=>$request['student_id'][$i],
		 'date'=>$request['date'][$i],
		 'attendance'=>$request['attendance'.$i],
		 ]);
	} 
	$att_back = DB::select("select a.att_id,a.stu_id,a.date,a.attendance,s.stu_name,c.classes,l.sec_name from tbl_student as s,tbl_attendance as a,tbl_class as c,tbl_section as l where s.reg_no = a.stu_id   and s.level = l.sec_id and  s.coruse = c.c_id and a.date = '".$request['date'][0]."'");
	return view('view_attandence',compact('att_back'));
	}
	
}
public function check_attendance($data){
	 try{
		 $att_back = DB::select("select a.att_id,a.stu_id,a.date,a.attendance,s.stu_name from tbl_student as s,tbl_attendance as a where s.reg_no = a.stu_id   and a.date = '".$data."'");
		 $data = $att_back;
	 }
	catch(Exception $e){
		    $data = array('status'=>'error','msg'=>$e->getMessage());
	   }
	    finally{
		    return $data;
	    }
	
}
public function set_fee(Request $request){
	 $image = $request->file('met_image');
                $name = time().'.'.$image->getClientOriginalExtension();
				 $image->move(public_path().'/teachers_image/', $name);
				//$image->save(); 
	tbl_metirial::create([
	'level_id' =>$request['section'],
	'met_name' =>$request['met_name'],
	'met_dis' =>$request['met_des'],
	'met_price' =>$request['price'],
	'met_image' =>'public/teachers_image/'.$name,
	'is_active' =>'1',
	]);
	 $data = array('status'=>'success','msg'=>'Insert Successfully');
	   Session::put('status',$data);
	    return Redirect::to('/create_fee');
}
public function met_bill(){
	$sql = DB::select("select * from tbl_metirial where is_active ='1'");
	$batch = DB::select("select * from  tbl_section where is_active ='1'");
	$bill_no = DB::select('select max(bill_no) as bill_no from tdl_bill');
	return view('met_bill',compact('sql','batch','bill_no'));
}
public function get_met_price($data){

	$sql = DB::select("select * from tbl_metirial where met_id ='".$data."'");
	print_r($sql[0]->met_price);
}
public function getstudent($id){
	$sql = DB::select("select * from tbl_student where batch ='".$id."'");
	//print_r($sql[0]);
	if(count($sql) > 0){
		for($i=0;$i<count($sql);$i++){
			echo '<option value="'.$sql[$i]->stu_id.'">'.$sql[$i]->stu_name.'</option>';
		}
	
	}
	else{
		echo "<option></option>";
	}
}
public function insert_bill(Request $request){
	tdl_bill::create([
	'bill_no'=>$request['inv_no'],
	'batch'=>$request['batch'],
	'student_id'=>$request['student_name'],
	'date'=>$request['date'],
	'total'=>$request['total'],
	'is_active'=>'1',
	]);
	$productname =$request['productname']; 
	$qty =$request['qty']; 
	$price =$request['price']; 

	for($i =0;$i<count($productname);$i++){
	$sql = tdl_billdetails::create([
	'bill_id' =>$request['inv_no'],
	'product_id' =>$productname[$i],
	'qty' =>$qty[$i],
	'price' =>$price[$i],
	'total' =>$request['total'],
	'is_active' =>'1',
	]);
 $id = $request['inv_no'];
 $bill = DB::select("select * from tdl_bill as b,tbl_student as s where b.student_id= s.stu_id and b.bill_no = '".$id."'");
	$bill_details = DB::select("select *  from tdl_billdetail as b,tbl_metirial as m where b.bill_id = '".$id."' and b.product_id = m.met_id");
return view('bill',compact('bill','bill_details'));

	}
}
public function create_branch(){
$sql = DB::select('select * from tbl_branch where is_active="1"');
return view('create_branch',compact('sql'));
}
public function add_branch(Request $request){
$check_branch = $this->check_branch($request['b_name']);
if($check_branch ==false){
$data = array('status'=>'Error','msg'=>' This Record Already Exist');
	   Session::put('status',$data);
}else{
$sql = branchmodel::create([
	'branch_name' =>$request['b_name'],
	'is_active' =>'1',
	]);
$data = array('status'=>'success','msg'=>'Insert Successfully');
	   Session::put('status',$data);
	    
}
return Redirect::to('/create_branch');
}
public function check_branch($data){
$sql = DB::select('select * from tbl_branch where branch_name = "'.$data.'" and is_active="1"');
	  if(count($sql) > 0){
		return false;
	  }else{
		  return true;
	  }

}
public function create_ledger(){
$sql = DB::select('select * from tbl_ledger where is_active="1"');
return view('create_ledger',compact('sql'));
}
public function add_ledger(Request $request){
$check_ledger = $this->check_ledger($request['l_name']);
if($check_ledger ==false){
$data = array('status'=>'Error','msg'=>' This Record Already Exist');
	   Session::put('status',$data);
}else{
$sql = ledgermodel::create([
	'ledger_name' =>$request['l_name'],
	'is_active' =>'1',
	]);
$data = array('status'=>'success','msg'=>'Insert Successfully');
	   Session::put('status',$data);
	    
}
return Redirect::to('/create_ledger');
}
public function check_ledger($data){
$sql = DB::select('select * from tbl_ledger where ledger_name = "'.$data.'" and is_active="1"');
	  if(count($sql) > 0){
		return false;
	  }else{
		  return true;
	  }

}
public function create_subledger(){
$sql = DB::select('select * from tbl_ledger where is_active="1"');
$subledger = DB::select('select * from tbl_subledger as s,tbl_ledger as l where s.ledger_id = l.ledger_id and   s.is_active="1"');
return view('create_subledger',compact('sql','subledger'));
}
public function add_subledger(Request $request){
$check_subledger = $this->check_subledger($request);
if($check_subledger ==false){
$data = array('status'=>'Error','msg'=>' This Record Already Exist');
	   Session::put('status',$data);
}else{
$sql = subledger::create([
	'ledger_id' =>$request['ledger'],
	'subledger_name' =>$request['sub_name'],
	'is_active' =>'1',
	]);
$data = array('status'=>'success','msg'=>'Insert Successfully');
	   Session::put('status',$data);
	    
}
return Redirect::to('/create_subledger');
}
public function check_subledger($data){
$sql = DB::select('select * from tbl_subledger where ledger_id = "'.$data['ledger'].'" and subledger_name = "'.$data['sub_name'].'"  and is_active="1"');
	  if(count($sql) > 0){
		return false;
	  }else{
		  return true;
	  }

}
public function create_entry(){
	$sql = DB::select("select * from tbl_ledger where is_active='1'");
	$amount = DB::select("SELECT * FROM tbl_dailybookentry as b,tbl_subledger as s,tbl_ledger as l where b.subledger_id = s.subledger_id and s.ledger_id = l.ledger_id and  b.is_active='1' order by b.date");
	$total = 0;
	$report = 'data';
	return view('create_daily_book',compact('sql','amount','total','report'));
}
public function getsubledger($id){
	
		$sql = DB::select("select * from tbl_subledger where ledger_id ='".$id."'");

	if(count($sql) > 0){
		for($i=0;$i<count($sql);$i++){
			
			echo '<option value="'.$sql[$i]->subledger_id.'">'.$sql[$i]->subledger_name.'</option>';
		}
	
	}
	else{
		echo "<option></option>";
	}
}
public function add_bookentry(Request $request){
	dailybookentrymodel::create([
	'subledger_id'=>$request['sub_ledger'],
	'date'=>$request['date'],
	'amount'=>$request['amount'],
	'paymenttype'=>$request['pay_type'],
	'is_active'=>1,
	]);
	$data = array('status'=>'success','msg'=>'Insert Successfully');
	   Session::put('status',$data);
	   return Redirect::to('/create_entry');
}
public function search_data(Request $request){
	
	$sql = DB::select("select * from tbl_ledger where is_active='1'");
	//$amount = DB::select("SELECT * FROM tbl_dailybookentry as b,tbl_subledger as s,tbl_ledger as l where b.subledger_id = s.subledger_id and s.ledger_id = l.ledger_id and  b.is_active='1' and b.date <='".$request['f_date']."' and b.date >='".$request['t_date']."' order by b.date");
	$amount = DB::select("SELECT * FROM tbl_dailybookentry as b,tbl_subledger as s,tbl_ledger as l where b.subledger_id = s.subledger_id and s.ledger_id = l.ledger_id and  b.is_active='1' and b.`date` >='".$request['f_date']."' and b.`date` <='".$request['t_date']."'   order by b.date");
	$total = 0;
	$report = 'search';
	return view('create_daily_book',compact('sql','amount','total','report'));
}
public function getbookfee($id){
	
	$sql = DB::select("select sum(met_price) as total  from  tbl_metirial  where level_id='".$id."'");
	echo  $sql[0]->total;
}

}
