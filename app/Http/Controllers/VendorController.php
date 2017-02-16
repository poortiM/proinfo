<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Project;
use App\User;
use Mail;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use DB;
use Response;
use App\Review;
use App\Analytic;
use Carbon\Carbon;
use App\Product;
use App\Blog;
use App\Http\Controllers\MainController;
use File;

class VendorController extends Controller
{
	protected $maincontroller;

    function __construct(MainController $maincontroller){
        $this->maincontroller = $maincontroller;
    }

    public function getRegister(){

        $state =  DB::table('state')->get();

        $category = Category::all();
        return view('pro.register')->with([
            'category' => $category,
            'state' => $state,
            'title' => "Register Page | Propisor",
        ]);
    }

    public function postGetStarted(Request $request){

        $rules = array(
            'name' => 'required',
            'email' => 'required|unique:users|email|max:255',
            'mobile_number' => 'required|unique:users',
        );
        
        $otp = rand(1000,9999);
        $message = 'Hi '.$request->input('name').' your OTP is : '.$otp;
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return json_encode($validator->messages());
        }
        else{
            $this->maincontroller->sms($request->input('mobile_number'),$message);
            return json_encode(['message' => 1,'otp' => $otp]);
        }
    }

    public function registerVendorOnVerifyOTP(Request $request){

        $vendor = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile_number' => $request->input('mobile_number'),
            'type' => $request->input('user_type'),
            'username' => str_slug($request->input('name')).'-'.str_random(10).str_random(10),
            'avatar' => 'avatar.png',
            'cover' => 'cover.png',
        ]);
        return json_encode(['message' => 1,'vendor_id' => $vendor->id,'type' => $request->input('user_type')]);
    }

    public function getSignup(){
        $category = Category::all();
        
        $data = array();

        foreach ($category as $key => $value) {
            $data[] = array(
                'category' => $value->category,
                'subcategory' => $this->maincontroller->getSubcategory($value->id),
                );
        }
        return view('pro.signup')->with([
            'title' => "Register Page | Propisor",
            'data' => $data,
        ]);
    }

    public function postRegister(Request $request){
        $verification_code = rand();

        $explode_category = $request->input('category');

        $vendor = User::find($request->input('vendor_id'));
        $vendor->update([
          
            'business_name' => $request->input('business_name'),
            // 'category' => $request->input('category'),
            'pincode' => $request->input('zip'),
            'password' => bcrypt($request->input('password')),
            // 'state' => $request->input('state'),
            'status' => 'Suspend',
            'verification_code' => $verification_code,
            'latitude' => $this->maincontroller->getFormattedAddress($request->input('zip'),'latitude'),
            'longitude' => $this->maincontroller->getFormattedAddress($request->input('zip'),'longitude'),
        ]);

        for ($i=0; $i < count($request->input('category')); $i++) { 
            $count = DB::table('vendorservices')->where('service_name',$request->input('category')[$i])->count();
            if($count == 0){

                DB::table('vendorservices')->insert(
                    ['service_name' => $request->input('category')[$i], 'user_id' => $request->input('vendor_id')]
                );
            }
           
        }

        $data = array(
            'link' => url('/pro/account-verification/'.$verification_code),
            'business_name' => $request->input('business_name'),
        );

        $sender_data = array(
            'sender' => $vendor->email
        );

        Mail::send('emails.register', $data, function ($message) use ($sender_data)  {

            $message->from('support@propisor.com', 'Welcome to Propisor');
            $message->to($sender_data['sender'])->subject('Account verification');

        });

        return redirect('pro/registration-message');
    }

    public function registrationMessage()
    {
        $title = "Message | Propisor";
        return view('pro.registration-message')->with([
            'title' => $title
        ]);
    }

    public function accountVerification($code){
        $count = User::where('verification_code', $code)
                    ->update(['verified' => '1']);

        return redirect('pro/login')
                ->with('info','Verified Successfully');
    }

    public function getLogin(){
        $title = "Login Page | Propisor";
        return view('pro.login')->with([
            'title' => $title
        ]);
    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials  = [
            'email'  =>   $request->input('email'),
            'password'  =>   $request->input('password'),
            // 'verified' => '1'
        ];
        $auth = auth()->guard('web');


        if(!$auth->attempt($credentials)) {
            // Authentication passed...
            if(!empty($request->get('redirect'))){
                $redirect = $request->get('redirect');
            }
            else{
                $redirect = '';
            }
            return redirect('pro/login?redirect='.$redirect)
                ->with('info','Could not sign you in with those details.');
        }

        if(!empty($request->get('redirect'))){
            return redirect($request->get('redirect'));
        }
        return redirect('pro/dashboard');
    }

    public function dashboard(){

        $vendor = Auth::guard('web')->user();

        $product_array = array();

        $services =  DB::table('vendorservices')
                        ->whereUser_id($vendor->id)
                        ->orderBy('id', 'desc')
                        ->get();

        $service_name = $this->maincontroller->get_subcategory_limit($vendor->id,100);

        $state =  DB::table('state')
                        ->orderBy('state', 'desc')
                        ->get();

        $categories =  DB::table('categories')
                        ->orderBy('id', 'desc')
                        ->get();

        $star_review = DB::table('reviews')
                     ->select(DB::raw ('AVG(efficiency) as efficiency'),DB::raw ('AVG(quality) as quality'),DB::raw ('AVG(helpfulness) as helpfulness'),DB::raw ('AVG(effectiveness) as effectiveness'),DB::raw ('AVG(experience) as experience'),DB::raw ('count(id) as count'))
                     ->where('user_id', '=', $vendor->id)
                     ->get();

        $reviews = DB::table('reviews')->where('user_id', '=', $vendor->id)
                        ->take(1)
                        ->orderBy('id', 'desc')
                        ->get();

        $product = Product::where('user_id',$vendor->id)
                        ->take(3)
                        ->orderBy('id', 'desc')
                        ->get();

        $countproduct = Product::where('user_id',$vendor->id)
                        ->orderBy('id', 'desc')
                        ->count();

        
        $project = Project::where('user_id', $vendor->id)
                   ->orderBy('id', 'desc')
                   ->take(3)
                   ->get();

        foreach ($product as $key => $value) {
            $product_array[] = array(
                'id' => $value->id,
                'name' => $value->name,
                'product_code' => $value->product_code,
                'description' => $value->description,
                'brand' => $value->brand,
                'price' => $value->price,
                'created_at' => substr($value->created_at, 0,-8),
                'image' => $this->getProductFeaturedImage($value->id),
            );
        }

        $countproject = Project::where('user_id', $vendor->id)
                   ->where('status',1)
                   ->orderBy('id', 'desc')
                   ->count();
      
        return view('vendordashboard.home')->with([
            'vendor' => $vendor,
            'title' => $vendor->business_name." | Propisor",
            'services' => $services,
            'project' => $project,
            'star_review' => $star_review,
            'reviews' => $reviews,
            'state' => $state,
            'categories' => $categories,
            'product' => $product_array,
            'countproduct' => $countproduct,
            'countproject' => $countproject,
            'service_name' => $service_name,
        ]);
    }

    public function getProductFeaturedImage($id)
    {
        $image = DB::table('product_images')->where('product_id', '=', $id)->take(1)->get();
        if(count($image)!=0){
            $featured_image = url('contentimage').'?file=uploads/product/'.$image[0]->image.'&l=243&w=160';
            return $featured_image;
        }else{
            return url('uploads/product/cover.png');
        }
    }

    public function postaboutBusiness(Request $request){
        $id = $request->input('user_id');
        $user = User::findOrFail($id);

        $user->update([
            'about_us' => nl2br($request->input('about_us')),
            'founding_year' => $request->input('founding_year'),
            'website' => $request->input('website'),

            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'googleplus' => $request->input('googleplus'),
            'linkedin' => $request->input('linkedin'),
            'instagram' => $request->input('instagram'),
            'tumblr' => $request->input('tumblr'),
            'awards' => nl2br($request->input('award')),
            'category' => nl2br($request->input('category')),
            
            'pinterest' => $request->input('pinterest'),
            'youtube_channel' => $request->input('youtube_channel'),
        ]);
        return 1;
    }

    public function serviceDelete(Request $request){
        $deleteid = $request->input('deleteid');

        $users = DB::table('vendorservices')->where([
            ['id',$deleteid],
        ])->delete();

        return 1;
    }

    public function services(Request $request){
        $service = $request->input('service');
        $user_id = $request->input('user_id');
        $count = DB::table('vendorservices')->where([
	                ['service_name', '=', $service],
	                ['user_id', '=', $user_id],
	            ])->count();
        if($count == 0){
            DB::table('vendorservices')->insert(
                ['service_name' => $service,'user_id' => Auth::guard('web')->user()->id ]
            );
            $service = DB::table('vendorservices')->where('user_id', Auth::guard('web')->user()->id )->get();
            return $service;
        }else{
            return 0;
        }
    }

    public function getVendor(Request $request)
    {
        $vendor = User::where('id',$request->input('id'))->get();

        $data = array();

        foreach ($vendor as $key => $value) {
            $data = array(
                'avatar' => $value->avatar,
                'cover' => $value->cover,
                'service' => $this->getVendorService($value->id),
                'awards' => $value->awards,
                'type_of_property' => $value->type_of_property,
                'accreditation' => $value->accreditation,
                'license_expiry' => $value->license_expiry,
                'license' => $value->license,
                'facebook' => $value->facebook,
                'twitter' => $value->twitter,
                'googleplus' => $value->googleplus,
                'linkedin' => $value->linkedin,
                'instagram' => $value->instagram,
                'tumblr' => $value->tumblr,
                );
        }

        return $data;
    }

    public function getVendorService($id)
    {
        $services =  DB::table('vendorservices')
                    ->whereUser_id($id)
                    ->orderBy('id', 'desc')
                    ->get();
        return $services;
    }

    public function license(Request $request){
        $id = $request->input('user_id');
        $user = User::findOrFail($id);

        $user->update([
            'accreditation' => nl2br($request->input('accreditation')),
        ]);
        return 1;
    }

    public function postEditAction(Request $request){

        $id = $request->input('user_id');
        $user = User::findOrFail($id);

        if($request->input('type_of_property') != 'null'){
        	$user->update([
	            'name' => $request->input('name'),
	            'mobile_number' => $request->input('mobile_number'),
	            'pincode' => $request->input('pincode'),
	            'location' => $request->input('location'),
	            'type_of_property' => str_replace(',', ', ', $request->input('type_of_property')),
	            'scope_of_work' => $request->input('scope_of_work'),

	            'area' => $request->input('area'),
	            'zipcode' => $request->input('zipcode'),
                'street' => $request->input('street'),
	            'area_served' => nl2br($request->input('area_served')),
	            
	            // 'latitude' => $this->maincontroller->getFormattedAddress($request->input('pincode'),'latitude'),
	            // 'longitude' => $this->maincontroller->getFormattedAddress($request->input('pincode'),'longitude'),
	            // 'formatted_address' => $this->maincontroller->getFormattedAddress($request->input('pincode'),'address'),
	        ]);
        }else{
        	$user->update([
	            'name' => $request->input('name'),
	            'mobile_number' => $request->input('mobile_number'),
	            'pincode' => $request->input('pincode'),
	            'location' => $request->input('location'),
	            'scope_of_work' => $request->input('scope_of_work'),

	            'area' => $request->input('area'),
	            'zipcode' => $request->input('zipcode'),
	            'street' => $request->input('street'),
                'area_served' => nl2br($request->input('area_served')),
	        ]);
        }
        return 1;
    }

    public function businessNameSave(Request $request){
        $id = $request->input('user_id');
        $user = User::findOrFail($id);

        $user->update([
            'business_name' => $request->input('business_name'),
        ]);
        return 1;
    }

    public function uploadVendorAvatar(Request $request)
    {
        if(!empty($request->input('imagedata'))){
            define('UPLOAD_DIR', 'uploads/avatar/');
            $img = $request->input('imagedata');
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $imagename = uniqid().'.png';
            $file = UPLOAD_DIR . $imagename;
            $success = file_put_contents($file, $data);
            // print $success ? $file : 'Unable to save the file.';
            $user = User::find(Auth::guard('web')->user()->id);
            $user->update([
                'avatar' => $imagename,
            ]);
        }
    }

    public function uploadVendorCover(Request $request)
    {
      if(!empty($request->input('imagedata'))){

          define('UPLOAD_DIR', 'uploads/cover/');
          $img = $request->input('imagedata');
          $img = str_replace('data:image/png;base64,', '', $img);
          $img = str_replace(' ', '+', $img);
          $data = base64_decode($img);
          $imagename = uniqid().'.png';
          $file = UPLOAD_DIR . $imagename;
          $success = file_put_contents($file, $data);
          // print $success ? $file : 'Unable to save the file.';
          $user = User::find(Auth::guard('web')->user()->id);
          $user->update([
              'cover' => $imagename,
          ]);

          return Response::json(array(
                'success' => "true",
            ), 200);
      }
    }

    public function addProject()
    {
        return view('vendordashboard.add-project')->with([
            'title' => "Project Detail | Propisor"
        ]);
    }

    public function postAddProject(Request $request){
    	$this->validate($request,[
            'title' => 'required',
            // 'location' => 'required',
            // 'cost' => 'required|numeric',
            // 'date' => 'required',
            // 'youtube_videos' => 'required',
            // 'description' => 'required',
            // 'type_of_project' => 'required',
            // 'scope_of_work' => 'required',
            // 'currency' => 'required',
            // 'project_status' => 'required',
            // 'client_name' => 'required',
            // 'area' => 'required',
        ]);

        $projectId = Project::create([
            'title' => $request->input('title'),
            'location' => $request->input('location'),
            'cost' => $request->input('cost'),
            'min_cost' => $request->input('min_cost'),
            'date' => $request->input('date'),
            'youtube_videos' => $request->input('youtube_videos'),
            'description' => $request->input('description'),
            'user_id' => $request->input('id'),
            'type_of_project' => $request->input('type_of_project'),
            'scope_of_work' => $request->input('scope_of_work'),
            'currency' => $request->input('currency'),
            'project_status' => $request->input('project_status'),
            'status' => 1,
            'featured_image' => 'cover.png',
            'client_name' => $request->input('client_name'),
            'area' => $request->input('area'),
            'created_at' => Carbon::now(),
        ])->id;

        return redirect('pro/add/project/image?projectId='.$projectId)
                            ->with([
                                'message' => 'success',
                                'projectId' => $projectId
                            ]);
    }

    public function projectImage(Request $request)
    {
    	return view('vendordashboard.project-image')->with([
            'title' => "Add Project Image Detail | Propisor",
            'projectId' =>  $request->get('projectId'),
        ]);
    }

    public function postProjectImage(Request $request){
        $max_size = 1024*1000; // 200kb
        $extensions = array('jpeg', 'jpg', 'png','JPG','PNG','JPEG');
        $dir = 'uploads/';
        $count = 0;
        if( $request->hasFile('files') ){
            foreach ($request->file('files') as $file) {
                // if($file->getSize() <= $max_size){
                if (in_array($file->getClientOriginalExtension(), $extensions)){
                    $destination_path = 'uploads/project';
                    $filename_project = str_random(15).'.'.$file->getClientOriginalExtension();
                    $file->move($destination_path, $filename_project);

                    DB::table('project_image')->insert([
                        'image' => $filename_project,
                        'project_id' => $request->input('projectId'),
                        'type' => '',
                    ]);
                }
                // }
            }

            $project_image = DB::table('project_image')->where([
                'project_id' => $request->input('projectId')
            ])->orderBy('id','desc')->get();

            return Response::json(array(
                'success' => "true",
                'data' => $project_image,

            ), 200);
        }
        else{
            return Response::json(array(
                'success' => "false",
                'data' => [],

            ), 200);
        }

        // $file_extension = array('jpeg','png','jpg','JPEG','PNG','JPG' );
        // if( $request->hasFile('featured_image') ){
        //     foreach ($request->file('featured_image') as $file) {

        //         if (in_array($file->getClientOriginalExtension(), $file_extension))
        //         {
        //             if($file->getSize() < 10485760){

        //                 $destination_path = 'uploads/project';
        //                 $filename_project = str_random(15).'.'.$file->getClientOriginalExtension();
        //                 $file->move($destination_path, $filename_project);

        //                 DB::table('project_image')->insert([
        //                     'image' => $filename_project,
        //                     'project_id' => $request->input('projectId'),
        //                     'type' => '',
        //                 ]);
        //             }
        //             else{
        //                 return Response::json(array(
        //                     'success' => "false",
        //                     'message' => "The uploaded file exceeds the 10MB",
        //                 ), 200);
        //             }
                    
        //         }
        //         else{
        //             return Response::json(array(
        //                 'success' => "false",
        //                 'message' => 'Invalid Extension',
        //             ), 200);
        //         }
        //     }

        //     $project_image = DB::table('project_image')->where([
        //         'project_id' => $request->input('projectId')
        //     ])->orderBy('id','desc')->get();

        //     return Response::json(array(
        //         'success' => "true",
        //         'data' => $project_image,

        //     ), 200);
        // }
        // else{
        //     $project_image = DB::table('project_image')->where([
        //         'project_id' => $request->input('projectId')
        //     ])->orderBy('id','desc')->get();
            
        //     return Response::json(array(
        //         'success' => "false",
        //         'message' => 'Invalid Extension',
        //     ), 200);
        // }
    }

    public function postProductImage(Request $request)
    {
        $file_extension = array('jpeg','png','jpg','JPEG','PNG','JPG' );

        if( $request->hasFile('files') ){
            foreach ($request->file('files') as $file) {
                if (in_array($file->getClientOriginalExtension(), $file_extension))
                {
                    $destination_path = 'uploads/product';
                    $filename_project = str_random(15).'.'.$file->getClientOriginalExtension();
                    $file->move($destination_path, $filename_project);

                    DB::table('product_images')->insert([
                        'image' => $filename_project,
                        'product_id' => $request->input('productId'),
                    ]);
                }
                else{

                }
            }

            $project_image = DB::table('product_images')->where([
                    'product_id' => $request->input('productId')
                ])->orderBy('id','desc')->get();

            return Response::json(array(
                'success' => "true",
                'data' => $project_image,
            ), 200);
        }

        else{
            return Response::json(array(
                'success' => "false",
                'data' => [],

            ), 200);
        }
    }

    public function postGetProjectImage(Request $request)
    {
        $project_image = DB::table('project_image')->where([
                'project_id' => $request->input('projectId')
            ])->orderBy('id','desc')->get();

        return Response::json(array(
                'success' => "true",
                'data' => $project_image,
            ), 200);
    }

    public function postGetProductImage(Request $request)
    {
        $product_image = DB::table('product_images')->where([
                'product_id' => $request->input('product_id')
            ])->orderBy('id','desc')->get();

        return Response::json(array(
                'success' => "true",
                'data' => $product_image,
            ), 200);
    }

    public function setProjectCoverImage(Request $request)
    {
        $result = DB::table('project_image')->where([
                    'id' => $request->input('id')
                ])->get();

        $project = Project::find($request->input('projectid'));
        $project->update([
            'featured_image' => $result[0]->image
        ]);
        return $project;
    }

    public function projectImageDelete(Request $request)
    {
        DB::table('project_image')->where([
                    'id' => $request->input('id')
                ])->delete();
    }

    public function productImageDelete(Request $request)
    {
        DB::table('product_images')->where([
                    'id' => $request->input('id')
                ])->delete();
    }

    public function setProjectStatus(Request $request)
    {
        if($request->input('type') == 3){
            $type = 'After';
        }else if($request->input('type') == 2){
            $type = 'During';
        }else{
            $type = 'Before';
        }
        DB::table('project_image')
            ->where(['id' => $request->input('id') ])
            ->update(['type' => $type]); 
    }

    public function updateYoutube(Request $request){
        // return $request->all();
        $link = explode('?v=', $request->input('link'))[1];
        $count = User::where('id' ,$request->input('vendor_id'))
                    ->update(['youtube' => 'https://www.youtube.com/embed/'.$link]);
        return 1;
    }

    public function deleteProject(Request $request)
    {
        Project::find($request->input('project_id'))->delete();
    }

    public function editProject($projectId)
    {
    	$project = Project::find($projectId);

        return view('vendordashboard.edit-project')->with([
            'title' => "Edit Project Image Detail | Propisor",
            'projectId' =>  $projectId,
            'project' => $project
        ]);
    }

    /*public function getprojectimage($id,$type){

        $image =  DB::table('project_image')
                    ->whereProject_id($id)
                    ->where('type','=',$type)
                    ->get();
       return $image;
    }*/

    public function saveProject(Request $request)
    {
        $project = Project::find($request->input('project_id'));
        if($request->input('type') == 'title'){
            $project->update([
                'title' => $request->input('editable')
            ]);
        }
        elseif ($request->input('type') == 'description') {
            $project->update([
                'description' => $request->input('editable')
            ]);
        }elseif ($request->input('type') == 'location') {
            $project->update([
                'location' => $request->input('editable')
            ]);
        }elseif ($request->input('type') == 'cost') {
            $project->update([
                'min_cost' => $request->input('from'),
                'cost' => $request->input('to'),
                'currency' => $request->input('currency'),
            ]);
        }elseif ($request->input('type') == 'date') {
            $project->update([
                'date' => $request->input('editable')
            ]);
        }elseif ($request->input('type') == 'type') {
            $project->update([
                'type_of_project' => $request->input('editable')
            ]);
        }elseif ($request->input('type') == 'video') {
        	$link = explode('?v=', $request->input('editable'))[1];
            $project->update([
                'youtube_videos' => 'https://www.youtube.com/embed/'.$link,
            ]);
        }elseif ($request->input('type') == 'area') {
            $project->update([
                'area' => $request->input('editable'),
            ]);
        }elseif ($request->input('type') == 'currency') {
            $project->update([
                'currency' => $request->input('editable'),
            ]);
        }
    }

    public function uploadProjectBanner(Request $request)
    {
        if(!empty($request->input('imagedata'))){

            define('UPLOAD_DIR', 'uploads/project/');
            $img = $request->input('imagedata');
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $imagename = uniqid().'.png';
            $file = UPLOAD_DIR . $imagename;
            $success = file_put_contents($file, $data);
            // print $success ? $file : 'Unable to save the file.';
            $user = Project::find($request->input('projectId'));
            $user->update([
                'featured_image' => $imagename,
            ]);

            return url('/').'/'.$file;
        }
    }

      public function vendorAnalytics()
    {
        $vendor = Auth::guard('web')->user();

        $search_view = DB::table('search_analytics')->where('user_id',$vendor->id)->get();

        //-------------------------------------------------------------
        
        $profile_view = DB::table('profile_time_spent')->where('user_id',$vendor->id)->get();

        $profile_view_group_by = DB::table('profile_time_spent')
                                ->select(DB::raw('COUNT(*) as count'),DB::raw('LEFT(MONTHNAME(CONCAT(created_at)),3) as month'),'time','created_at')
                                ->where('user_id',$vendor->id)
                                ->groupBy(DB::raw(' DATE_FORMAT(created_at, "%Y%m")'))
                                ->get();
        //-------------------------------------------------------------

        $project_view = DB::table('project_time_spent')
                            ->join('projects', 'project_time_spent.project_id', '=', 'projects.id')
                            ->join('users', 'projects.user_id', '=', 'users.id')
                            ->select('project_time_spent.*')
                            ->get();

        $project_view_group_by = DB::table('project_time_spent')
                            ->join('projects', 'project_time_spent.project_id', '=', 'projects.id')
                            ->join('users', 'projects.user_id', '=', 'users.id')
                            ->select('project_time_spent.*',DB::raw('LEFT(MONTHNAME(CONCAT(project_time_spent.created_at)),3) as month'))
                            ->groupBy(DB::raw(' DATE_FORMAT(project_time_spent.created_at, "%Y%m")'))
                            ->get();
        //-------------------------------------------------------------
        $search_view = DB::table('search_analytics')->where('user_id',$vendor->id)->get();

        //-------------------------------------------------------------
        
        $email = DB::table('reviews')->where('user_id',$vendor->id)->get();

        $email_group_by = DB::table('reviews')
                                ->select(DB::raw('COUNT(*) as count'),DB::raw('LEFT(MONTHNAME(CONCAT(created_at)),3) as month'),'created_at')
                                ->where('user_id',$vendor->id)
                                ->groupBy(DB::raw(' DATE_FORMAT(created_at, "%Y%m")'))
                                ->get();
        //-------------------------------------------------------------
        $contact = DB::table('clicks')->where('user_id',$vendor->id)->get();
        $contact_group_by = DB::table('clicks')
                                ->select(DB::raw('COUNT(*) as count'),DB::raw('LEFT(MONTHNAME(CONCAT(created_at)),3) as month'),'created_at')
                                ->where('user_id',$vendor->id)
                                ->groupBy(DB::raw(' DATE_FORMAT(created_at, "%Y%m")'))
                                ->get();


        $data = array(
            'search_view' => $search_view, 

            'profile_view' => $profile_view, 
            'profile_view_group_by' => $profile_view_group_by, 

            'project_view' => $project_view, 
            'project_view_group_by' => $project_view_group_by, 

            'email' => $email, 
            'email_group_by' => $email_group_by, 

            'contact' => $contact, 
            'contact_group_by' => $contact_group_by, 
        );

        return view('vendordashboard.analytics')->with([
            'vendor' => $vendor,
            'title' => $vendor->business_name." | Propisor",
            'data' => $data,
        ]);
    }

    public function vendorContactAnalytics()
    {
        $vendor = Auth::guard('web')->user();

        $search_view = DB::table('search_analytics')->where('user_id',$vendor->id)->get();

        //-------------------------------------------------------------
        
        $profile_view = DB::table('profile_time_spent')->where('user_id',$vendor->id)->get();

        $profile_view_group_by = DB::table('profile_time_spent')
                                ->select(DB::raw('COUNT(*) as count'),DB::raw('LEFT(MONTHNAME(CONCAT(created_at)),3) as month'),'time','created_at')
                                ->where('user_id',$vendor->id)
                                ->groupBy(DB::raw(' DATE_FORMAT(created_at, "%Y%m")'))
                                ->get();
        //-------------------------------------------------------------

        $project_view = DB::table('project_time_spent')
                            ->join('projects', 'project_time_spent.project_id', '=', 'projects.id')
                            ->join('users', 'projects.user_id', '=', 'users.id')
                            ->select('project_time_spent.*')
                            ->get();

        $project_view_group_by = DB::table('project_time_spent')
                            ->join('projects', 'project_time_spent.project_id', '=', 'projects.id')
                            ->join('users', 'projects.user_id', '=', 'users.id')
                            ->select('project_time_spent.*',DB::raw('LEFT(MONTHNAME(CONCAT(project_time_spent.created_at)),3) as month'))
                            ->groupBy(DB::raw(' DATE_FORMAT(project_time_spent.created_at, "%Y%m")'))
                            ->get();
        //-------------------------------------------------------------
        $search_view = DB::table('search_analytics')->where('user_id',$vendor->id)->get();

        //-------------------------------------------------------------
        
        $email = DB::table('reviews')->where('user_id',$vendor->id)->get();

        $email_group_by = DB::table('reviews')
                                ->select(DB::raw('COUNT(*) as count'),DB::raw('LEFT(MONTHNAME(CONCAT(created_at)),3) as month'),'created_at')
                                ->where('user_id',$vendor->id)
                                ->groupBy(DB::raw(' DATE_FORMAT(created_at, "%Y%m")'))
                                ->get();
        //-------------------------------------------------------------
        $contact = DB::table('clicks')->where('user_id',$vendor->id)->get();
        $contact_group_by = DB::table('clicks')
                                ->select(DB::raw('COUNT(*) as count'),DB::raw('LEFT(MONTHNAME(CONCAT(created_at)),3) as month'),'created_at')
                                ->where('user_id',$vendor->id)
                                ->groupBy(DB::raw(' DATE_FORMAT(created_at, "%Y%m")'))
                                ->get();

        $data = array(
                'search_view' => $search_view, 

                'profile_view' => $profile_view, 
                'profile_view_group_by' => $profile_view_group_by, 

                'project_view' => $project_view, 
                'project_view_group_by' => $project_view_group_by, 

                'email' => $email, 
                'email_group_by' => $email_group_by, 

                'contact' => $contact, 
                'contact_group_by' => $contact_group_by, 
                );

        return view('vendordashboard.contact-analytic')->with([
	        'vendor' => $vendor,
	        'title' => $vendor->business_name." | Propisor",
	        'data' => $data,
        ]);
    }

    public function changePassword()
    {
        return view('vendordashboard.setting')->with([
            'title' => "Change Password | Propisor",
        ]);
    }

    public function notificationSettings()
    {
        return view('vendordashboard.notification-settings')->with([
            'title' => "Change Password | Propisor",
        ]);
    }

    public function coordinatesUpdate(Request $request)
    {
        $vendor = Auth::guard('web')->user();

        $vendor = User::find($vendor->id);

        $vendor->update([
            'latitude' => $request->input('lat'),
            'longitude' => $request->input('lng'),
        ]);
    }

    public function postChangePassword(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);

        $vendor = Auth::guard('web')->user();

        $vendor = User::find($vendor->id);

        $vendor->update([
            'password' => bcrypt($request->input('password'))
        ]);

         return redirect('pro/change-password')
                ->with('info','Changed Successfully...');

    }

    public function postNotificationSettings(Request $request)
    {
        return redirect('pro/notification-settings')
                ->with('info','Changed Successfully...');
    }

    public function setClick(Request $request)
    {
        DB::table('clicks')->insert([
                'ip' => $request->ip(),
                'user_id' => $request->input('vendor_id'),
                'created_at' => Carbon::now()
            ]);
    }

    public function accountSettings()
    {
        # code...
    }

    public function addProduct()
    {
        $category = DB::table('product_categories')->get();

        $data = array();

        foreach ($category as $key => $value) {
            $data[] = array(
                'category' => $value->category,
                'subcategory' => $this->maincontroller->getProductSubcategory($value->id),
                );
        }

        return view('vendordashboard.add-product')->with([
            'title' => "Add Product | Propisor",
            'category' => $category,
            'data' => $data,
        ]);
    }

    public function selectCategory(Request $request)
    {
        $category = Category::where('category',$request->input('category'))->first();
        $subcategory = DB::table('subcategory')->where('category_id',$category->id)->get();
        return $subcategory;
    }

    public function postAddProduct(Request $request)
    {
        $product_code = 'PRO'.rand(100000,999999);
        $id = Product::create([
            'product_code' => $product_code,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'brand' => $request->input('brand'),
            'price' => $request->input('price'),
            // 'category' => $request->input('category'),
            // 'subcategory' => $request->input('subcategory'),
            'length' => $request->input('length'),
            'width' => $request->input('width'),
            'depth' => $request->input('depth'),
            'weight' => $request->input('weight'),
            'material' => $request->input('material'),
            'color' => $request->input('color'),
            'assembly_required' => $request->input('assembly_required'),
            'user_id' => $request->input('user_id'),
        ])->id;

        for ($i=0; $i < count($request->input('category')); $i++) { 
            $count = DB::table('product_services')->where('service',$request->input('category')[$i])->count();
            if($count == 0){

                DB::table('product_services')->insert(
                    ['service' => $request->input('category')[$i], 'product_id' => $id]
                );
            }  
        }

        return redirect('pro/add/product/image?id='.$id);
    }

    public function addProductImage(Request $request)
    {
        return view('vendordashboard.product-image')->with([
            'title' => "Add Product Image Detail | Propisor",
            'id' =>  $request->get('id'),
        ]);
    }

    public function deleteProduct(Request $request)
    {
        $image = DB::table('products')->where('id', '=', $request->input('product_id'))->delete();
        return Response::json(array(
                'success' => "true",
            ), 200);
    }

    public function editProduct($id)
    {
        $category = Category::all();
        $product = Product::find($id);

        return view('vendordashboard.edit-product')->with([
            'title' => "Edit Product | Propisor",
            'category' => $category,
            'product' => $product,
        ]);
    }

    public function postEditProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::find($product_id);
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'brand' => $request->input('brand'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'subcategory' => $request->input('subcategory'),
            'length' => $request->input('length'),
            'width' => $request->input('width'),
            'depth' => $request->input('depth'),
            'weight' => $request->input('weight'),
            'material' => $request->input('material'),
            'color' => $request->input('color'),
            'assembly_required' => $request->input('assembly_required'),
        ]);
        return redirect("pro/edit/".$product_id."/product")
                ->with('info','Edit Successfully...');
    }

    public function editProductImage($id)
    {
        return view('vendordashboard.edit-product-image')->with([
            'title' => "Edit Product Image Detail | Propisor",
            'id' =>  $id,
        ]);
    }

    public function superPros(Request $request)
    {
        $data = array(
            'category' => $request->input('category'), 
            'company_name' => $request->input('company_name'), 
            'email' => $request->input('email'), 
            'mobile_number' => $request->input('mobile_number'), 
            'name' => $request->input('name'), 
            'position' => $request->input('position'), 
            );

        // $emails = ['sandeepdnp28@gmail.com','veer@digitalcandy.in','satyam@digitalcandy.in'];
        $emails = ['sandeepdnp28@gmail.com'];

        Mail::send('emails.superpros', $data, function($message) use ($emails){   
            $message->from('admin@propisor.com', 'Propisor Important');
            $message->to($emails)->subject('!IMPORTANT [Super Pro Request]');    
        });
    }

    public function reviewDescription(Request $request){

        $rules = array(
            'efficiency' => 'required',
            'quality' => 'required',
            'helpfulness' => 'required',
            'effectiveness' => 'required',
            'experience' => 'required',

            'reviewer_name' => 'required',
            'reviewer_email' => 'required|email',
            'reviewer_phone' => 'required',
            'review_description' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            return Response::json(array(
                'success' => "false",
                'message' => $validator->getMessageBag()->toArray()

            ), 200);
        }
        Review::create([
                'efficiency' => $request->input('efficiency'),
                'quality' => $request->input('quality'),
                'helpfulness' => $request->input('helpfulness'),
                'effectiveness' => $request->input('effectiveness'),
                'experience' => $request->input('experience'),

                'user_id' => $request->input('vendor_id'),

                'name' => $request->input('reviewer_name'),
                'email' => $request->input('reviewer_email'),
                'phone' => $request->input('reviewer_phone'),
                'description' => $request->input('review_description'),
                'user_id' => $request->input('vendor_id'),
                'status' => 1,
                // 'created_at' => Carbon::now(),
            ]);

        return Response::json(array(
                'success' => "true",
                'message' => 'Reviewed Successfully'

            ), 200);
    }
    
    public function timeSpentProfile(Request $request)
    {
        $count = DB::table('profile_time_spent')->where([
                'ip' => $request->ip(),
                'user_id' => $request->input('vendor_id')
            ])->count();

        if($count == 0){
             DB::table('profile_time_spent')->insert([
                'ip' => $request->ip(),
                'user_id' => $request->input('vendor_id'),
                'time' => $request->input('time'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }else{
            DB::table('profile_time_spent')
                ->where([
                    'ip' => $request->ip(),
                    'user_id' => $request->input('vendor_id'),
                ])
                ->update([
                    'time' => $request->input('time'),
                    'updated_at' => Carbon::now(),
                ]);
        }
        return $request->input('time');
    }

    public function updatePassword()
    {
        return view('vendordashboard.update-password')->with([
            'title' => "Update Password | Propisor",
        ]);
    }

    public function postUpdatePassword(Request $request)
    {
        $this->validate($request,[
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::find($request->input('id'));
        $user->update([
            'password' => bcrypt($request->input('password')),
            'claim_status' => 1,
        ]);

        return redirect('pro/dashboard');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
