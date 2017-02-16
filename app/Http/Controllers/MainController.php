<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Project;
use App\User;
use Mail;
use Auth;
use Input;
use Validator;
use Session;
use DB;
use Response;
use App\Review;
use App\Analytic;
use Carbon\Carbon;
use App\Product;
use App\Blog;
use App\Http\Controllers\UserController;
use Image;

class MainController extends Controller
{
    protected $usercontroller;

    /*public function __construct(UserController $usercontroller){
        $this->usercontroller = $usercontroller;
    }*/

    public function index(){

        $state =  DB::table('state')->get();

        $title = "Remodeling,Designs and Home Renovation | Propisor";
        $category = Category::where('show_on_page', 1)->limit(4)->get();
        $row_category = Category::where('show_on_page', 1)->limit(4)->orderBy('row_priority','asc')->get();
        $more_category = Category::where('show_on_page', 1)->limit(8)->orderBy('row_priority','asc')->get();
        $project = Project::where('show_on_page', '1')->orderBy('id','desc')->limit(4)->get();

        $data = array(
            'category' => $category,
            'row_category' => $row_category,
            'more_category' => $more_category,
            'project' => $project,
            'state' => $state,
            'userblog' => $this->retrieveStories(6),
        );

        return view('main.index')->with([
                    'title' => $title,
                    'data' => $data,
                ]);
    }

    public function faq()
    {
        return view('main.faq')->with([
                    'title' => 'Frequently asked questions | Propisor',
                ]);
    }

    public function getPhotoCount($project_id)
    {
        $count = DB::table('project_image')->where('project_id',$project_id)->count();
        return $count;
    }

    public function retrieveStories($limit)
    {
        $blog_array = array();

        if($limit == ''){
            $stories = Blog::where([
                        'repost_id' => null,
                        // 'show_on_home' => 1,
                    ])->orderBy('id','desc')->get();
        }else{
            $stories = Blog::where([
                        'repost_id' => null,
                        'show_on_home' => 1,
                    ])->orderBy('id','desc')->limit($limit)->get();
        }
        
        foreach ($stories as $key => $value) {
            $blog_array[] = array(
                'id' => $value->id,
                'title' => $value->title,
                'description' => $value->description,
                'location' => $value->location,
                'getvendorinfo' => $this->getvendorinfo($value->user_id),
                'images' => $this->getBlogImage($value->id),
                'time' => \Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans(),
                'total_liked' => $this->total_liked($value->id),
            );
        }

        return $blog_array;
    }

    public function total_liked($id)
    {
        $total_liked = DB::table('blog_likes')->where([ 
                    'blog_id' => $id,
                ])->count();
        return $total_liked;
    }

    public function storiesDetails($id,$title)
    {   
        $blog = Blog::find($id);
        
        if(empty($blog->id)){
            abort(404);
        }

        $data = $this->blog($id);
        
        $suggestion_users = User::orderBy(\DB::raw('RAND()'))->select('id','name','username','avatar')->limit(5)->get();
        
        $suggestion_users_array = array();

        if(Auth::guard('web')->check()){

            foreach ($suggestion_users as $key => $value) {

                if(Auth::guard('web')->user()->id != $value->id){
                    $suggestion_users_array[] = array(
                            'id' => $value->id,
                            'name' => $value->name,
                            'username' => $value->username,
                            'avatar' => $value->avatar,
                            'is_followed' => $this->is_followed(Auth::guard('web')->user()->id,$value->id),
                        );
                }
            }
            
        }else{
            foreach ($suggestion_users as $key => $value) {
                $suggestion_users_array[] = array(
                        'id' => $value->id,
                        'name' => $value->name,
                        'username' => $value->username,
                        'avatar' => $value->avatar,
                        'is_followed' => 0,
                    );
            }
        }

        if(Auth::guard('web')->check()){
            $scrapbook = DB::table('scrapbooks')
            ->where('scrapbooks.user_id','=',Auth::guard('web')->user()->id)
            ->get();
        }
        else{
            $scrapbook = [];
        }
        

        $allhashtag = DB::table('hashtags')->get();

        return view('main.stories-detail')->with([
            'title' => $blog->title,
            'data' => $data,
            'allhashtag' => $allhashtag,
            'suggestion_users' => $suggestion_users_array,
            'scrapbook' => $scrapbook,
        ]);
    }

    public function blog($id)
    {
        $blog = Blog::find($id);

        $hashtag = DB::table('hashtags')
                     ->where('blog_id',$blog->id)
                     ->get();

        $total_liked = DB::table('blog_likes')->where([ 
                    'blog_id' => $blog->id,
                ])->count();

        $total_commented = DB::table('blog_comments')
            ->join('users', 'blog_comments.user_id', '=', 'users.id')
            ->select('blog_comments.id as comment_id','blog_comments.comment','users.name','users.avatar','users.username')
            ->where('blog_id',$blog->id)
            ->get();

        $data = array(
            'blog' => $blog,
            'hashtag' => $hashtag,
            'images' => $this->getBlogImage($blog->id),
            'getvendorinfo' => $this->getvendorinfo($blog->user_id),
            'liked' => $total_liked,
            'commented' => $total_commented,
        );

        return $data;
    }

    public function is_followed($following_id,$follower_id)
    {
        $count = DB::table('follows')->where([ 
                    'following_id' => $follower_id,
                    'follower_id' => $following_id,
                ])->count();
        return $count;
    }

    public function getvendorinfo($project_id){
        $vendor = User::where('id','=',$project_id)
                    ->select('id','name', 'avatar','username','type','business_name')
                    ->first();
        return $vendor;
    }

    public function getBlogImage($blog_id)
    {
        $images =  DB::table('blog_images')->where('blog_id',$blog_id)->get();
        return $images;
    }

    public function category_menu(){
        $category = Category::where('find_professional',1)->orderBy('priority', 'asc')->get();
        return $category;
    }

    public function getCategory($type){
        if($type == 'popular'){
            return Category::where('find_professional',1)->get();
        }
        else{
            return Category::all();
        }
    }

    public function getCity(){
        $state =  DB::table('city')->where('status',1)->get();
        return $state;
    }

    public function searchAlgo(){
        $category = Category::all();
        $subcategory = DB::table('subcategory')->get();
        $vendor = User::where(['type'=>'vendor','status'=>'Active'])->get();
        
        foreach ($category as $value) {
            $term['suggestions'][] = array_add(['value' => $value->category,'type' => 'listing','element' => 'category','id' => $value->id], 'data', $value->category);
        }
        foreach ($subcategory as $value) {
            $term['suggestions'][] = array_add(['value' => $value->subcategory,'type' => 'listing','element' => 'subcategory','id' => $value->id], 'data', $value->subcategory);
        }
        foreach ($vendor as $value) {
            $term['suggestions'][] = array_add(['value' => $value->business_name,'type' => 'profile','element' => 'profile','id' => $value->id], 'vendor', $value->name);
        }
        foreach ($term['suggestions'] as $v) {
            echo "['".$v['value']."','".$v['type']."','".$v['element']."','".$v['id']."'], ";
        }
    }

    public function searchWithVendor(){
        $category = Category::all();
        $subcategory = DB::table('subcategory')->get();
        $vendor = User::where(['type'=>'vendor','status'=>'Active'])->get();
        
        foreach ($category as $value) {
            $term['suggestions'][] = array_add(['value' => $value->category,'type' => 'listing','element' => 'category','id' => $value->id], 'data', $value->category);
        }
        foreach ($subcategory as $value) {
            $term['suggestions'][] = array_add(['value' => $value->subcategory,'type' => 'listing','element' => 'subcategory','id' => $value->id], 'data', $value->subcategory);
        }
        foreach ($vendor as $value) {
            $term['suggestions'][] = array_add(['value' => $value->business_name,'type' => 'profile','element' => 'profile','id' => $value->id], 'vendor', $value->name);
        }
        foreach ($term['suggestions'] as $v) {
            echo "['".$v['value']."','".$v['type']."','".$v['element']."','".$v['id']."'], ";
        }
    }

    public function analytics(Request $request){
        Analytic::create([
            'line_of_work' => $request->input('category'),
            'property_type' => $request->input('property_type'),
            'budget' => $request->input('budget'),
            'location' => $request->input('location'),
            'pincode' => $request->input('pincode'),
            'kms' => $request->input('kms'),
            'super_pros_vendors' => $request->input('super_pros'),
            'ip' => $request->ip(),
        ]);
        echo 1;
    }

    public function searchResult(Request $request,UserController $usercontroller){

        $type = $request->input('type');
        $element = $request->input('element');
        $keyword = $request->input('keyword');
        $location = $request->input('location');

        $category = Category::all();
        $state =  DB::table('state')->get();

        $keyword = str_replace('-', ' ', $keyword);
        $location = str_replace('-', ' ', $location);

        if($type == "listing")
        {
            if($element == "category")
            {
                $getResult = DB::table('vendorservices');
                $getResult->leftJoin('subcategory', 'vendorservices.service_id', '=', 'subcategory.id');
                $getResult->leftJoin('categories', 'subcategory.category_id', '=', 'categories.id');
                $getResult->leftJoin('users', 'vendorservices.user_id', '=', 'users.id');
                $getResult->leftJoin('reviews', 'users.id', '=', 'reviews.user_id');
                $getResult->leftJoin('projects','users.id', '=', 'projects.user_id');

                if(!empty($request->input('sid')))
                {
                    $getResult->where('categories.id', '=', $request->input('sid'));
                }

                // return $getResult->get();
            }
            elseif ($element == "subcategory") {

                $getResult = DB::table('vendorservices');
                $getResult->leftJoin('subcategory', 'vendorservices.service_id', '=', 'subcategory.id');
                $getResult->leftJoin('users', 'vendorservices.user_id', '=', 'users.id');
                $getResult->leftJoin('reviews', 'users.id', '=', 'reviews.user_id');
                $getResult->leftJoin('projects','users.id', '=', 'projects.user_id');

                if(!empty($request->input('sid')))
                {
                    $getResult->where('vendorservices.service_id', '=', $request->input('sid'));
                }
                // return $getResult->get();
            }

            if(!empty($request->input('location')))
            {
                $latitude = $request->input('lat');
                $longitude = $request->input('lng');

                if(!empty($latitude) && !empty($longitude)){
                    $raw = DB::raw(' ( 6371 * acos( cos( radians(' . $latitude . ') ) * 
                         cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $longitude . ') ) + 
                            sin( radians(' . $latitude . ') ) *
                                 sin( radians( latitude ) ) ) )  AS distance');

                    $getResult->select('users.*',DB::raw ('AVG(reviews.efficiency) as efficiency'),DB::raw ('AVG(reviews.quality) as quality'),DB::raw ('AVG(reviews.helpfulness) as helpfulness'),DB::raw ('AVG(reviews.effectiveness) as effectiveness'),DB::raw ('AVG(reviews.experience) as experience'),DB::raw ('count(reviews.efficiency) as countReview'),DB::raw ('AVG(projects.cost) as projectCost'),$raw);

                    $getResult->orderBy('distance', 'ASC');
                    $getResult->orderBy('countReview', 'DESC');

                    $getResult->groupBy('users.id');
                    
                    $getResult->where('users.status', '=', 'Active');

                    $getResult->where(DB::raw(' ( 6371 * acos( cos( radians(' . $latitude . ') ) * 
                             cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $longitude . ') ) + 
                                sin( radians(' . $latitude . ') ) *
                                     sin( radians( latitude ) ) ) )'), '<', 100);
                    // return $getResult->get();
                }
                else{

                }

                $getResult->groupBy('users.id');

                $result = $getResult->paginate(20);
            }
            else
            {
                $getResult->select('users.*',DB::raw ('AVG(reviews.efficiency) as efficiency'),DB::raw ('AVG(reviews.quality) as quality'),DB::raw ('AVG(reviews.helpfulness) as helpfulness'),DB::raw ('AVG(reviews.effectiveness) as effectiveness'),DB::raw ('AVG(reviews.experience) as experience'),DB::raw ('count(reviews.efficiency) as countReview'),DB::raw ('AVG(projects.cost) as projectCost'));

                $getResult->orderBy('countReview', 'DESC');
            
                $getResult->groupBy('users.id');
                
                $getResult->where('users.status', '=', 'Active');
                // return $getResult->get();
                $result = $getResult->paginate(20);
            }
            
        }
        elseif ($type == "profile")
        {
            $getResult = DB::table('users');
            $getResult->leftJoin('vendorservices', 'users.id', '=', 'vendorservices.user_id');
            $getResult->leftJoin('projects','users.id', '=', 'projects.user_id');
            $getResult->leftJoin('reviews', 'users.id', '=', 'reviews.user_id');

            $getResult->where('business_name', 'like', $keyword.'%');
            $getResult->groupBy('users.id');
            $result = $getResult->paginate(20);
        }

        $project = Project::where('show_on_result_page', '1')->orderBy('id','desc')->limit(5)->get();

        $data = array(
            'vendor' => $result,
            'type' => $type,
            'element' => $element,
            'keyword' => $keyword,
            'location' => $location,
            'category' => $category,
            'state' => $state,
            'project' => $project,
        );
        // return $data;
        // return $result;

        return view('main.result')->with([
            'title' => "Result Page | Propisor",
            'data' => $data,
        ]);
    }

    public function validZipcode($zipcode)
    {
        $count = DB::table('postcode_db')->where('postcode',$zipcode)->count();

        if($count != 0 ){
            $data = DB::table('postcode_db')->where('postcode',$zipcode)->get();
            // return $data;
            return Response::json([
                'success' => true,
                'errors' => '',
                'message' => '',
                'data' => [
                    'lat' => $data[0]->lat,
                    'lon' => $data[0]->lon,
                ],
            ]);
        }
        else{
            return Response::json([
                'success' => false,
                'errors' => '',
                'message' => 'Invalid zipcode',
            ]);
        }
    }

    public function searchPros(Request $request){
        $category = Category::all();
        return view('main.pros-result')->with([
            'title' => "Result Page | Propisor",
            'category' => $category,
        ]);
    }

    public function searchAnalytic($vendor_id)
    {
        $count = DB::table('search_analytics')->where([
                    'ip' =>  $_SERVER['REMOTE_ADDR'],
                    'user_id' => $vendor_id,
                ])->count();

        if($count == 0){
            /*DB::table('search_analytics')->insert([
                    'ip' => $_SERVER['REMOTE_ADDR'],
                    'user_id' => $vendor_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);*/
        }
    }

    public function get_subcategory_limit($id,$count)
    {
        $data = DB::table('vendorservices');
        $data->leftJoin('subcategory','vendorservices.service_id','=','subcategory.id');
        $data->where('user_id',$id)->limit($count);

        $result = $data->get();

        $service_name = '';
        if(count($result) != 0){
            foreach ($result as $key => $value) {
                $service_name .= $value->subcategory.",";
            }
            $trim_service_name = rtrim($service_name,", ");
            return $trim_service_name;
        }else{
            return '';
        }
    }

    public function getSubcategory($category_id)
    {
        $subcategory = DB::table('subcategory')->where('category_id',$category_id)->get();
        return $subcategory;
    }
    
    public function getProductSubcategory($category_id)
    {
        $subcategory = DB::table('product_subcategories')->where('category_id',$category_id)->get();
        return $subcategory;
    }

    public function sms($phone,$message)
    {
        $empphoneno= $phone;

        $sender_id='AspHre';
        $user="tayalsanyam";     // sender id
        $pwd='tayal123';              //your account password
        $msg=$message;

        // $url='http://sms.globalbulksms.com/sendsmsv2.asp?user='.$user.'&password='.$pwd.'&sender='.$sender_id.'&text='.urlencode($msg).'&PhoneNumber=91'.$empphoneno.'&track=1';
        $url='https://control.msg91.com/api/sendhttp.php?authkey=130725AqYoyhU558240f46&mobiles=91'.$empphoneno.'&message='.urlencode($msg).'&sender=PRPISR&route=4&country=91';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $auth = curl_exec($curl);
        return json_encode(['message' => 1]);
    }

    public function getLatLng($address)
    {
        $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address)."&sensor=false";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);

        $data = array('lat' => $response['results'][0]['geometry']['location']['lat'],'lng' =>  $response['results'][0]['geometry']['location']['lng']);
        return $data;
    }

    public function getFormattedAddress($pincode,$type)
    {
        $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($pincode)."&sensor=false";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);

        // echo "<pre>",print_r($response),"</pre>";
        if($type == 'address'){
            return $response['results'][0]['formatted_address'];
        }
        elseif ($type == 'latitude') {
            return $response['results'][0]['geometry']['location']['lat'];
            // echo "<pre>",print_r(),"</pre>";
        }else{
            return $response['results'][0]['geometry']['location']['lng'];
        }
    }

    public function get_tags(){
        $tags = DB::table('subcategory')->get();
        return $tags;
    }

    public function project($id,$slug){
        $project = DB::table('projects')
                ->join('users', 'projects.user_id', '=', 'users.id')
                ->select('projects.*', 'users.business_name', 'users.business_name','users.id as vendor_id','users.avatar','users.username')
                ->where('projects.id','=',$id)
                ->get();
        if(empty(count($project))) {
            abort(404);
        }

        $title = $project[0]->title." | Propisor";
        return view('main.project')->with([
            'title' => $title,
            'project' => $project,
        ]);
    }

    public function getprojectimage($id,$type){

        $image =  DB::table('project_image')
                        ->whereProject_id($id)
                        ->where('type','=',$type)
                        ->get();
        return $image;
    }

    public function projects($username){

        $user = User::where('username',$username)->first();
        if(count($user)==0){
            return abort(404);
        }
        $title = $user->business_name." projects | Propisor";
        
        return view('main.projects')->with([
            'title' => $title,
            'projects' => Project::where('user_id',$user->id)->orderBy('id','desc')->get(),
            'user_id' => $user->id,
        ]);
    }
    
    public function allProjects(){

        $title = "Propisor projects | Propisor";
        
        return view('main.all-projects')->with([
            'title' => $title,
            'projects' => Project::paginate(200),
        ]);
    }

    public function products($username){

        $user = User::where('username',$username)->first();

        if(count($user)==0){
            return abort(404);
        }
        $title = $user->business_name." products | Propisor";


        $product = Product::where('user_id',$user->id)
                        ->orderBy('id', 'desc')
                        ->get();

        $product_array = array();

        foreach ($product as $key => $value) {
            $product_array[] = array(
                'id' => $value->id,
                'name' => $value->name,
                'description' => $value->description,
                'brand' => $value->brand,
                'price' => $value->price,
                'created_at' => substr($value->created_at, 0,-8),
                'image' => $this->getProductFeaturedImage($value->id),
            );
        }
        
        return view('main.products')->with([
            'title' => $title,
            'product_array' => $product_array,
            'user_id' => $user->id,
        ]);
    }

    public function profile(Request $request,$businessname = null,UserController $usercontroller){

        $vendor = User::where('username', '=', $businessname)->get();
        $product_array = array();

        if(count($vendor) != 0){
            if($vendor[0]->type == 'vendor'){
                $reviews = DB::table('reviews')->where('user_id', '=', $vendor[0]->id)
                            // ->take(1)
                            ->where('status','=',1)
                            ->orderBy('id', 'desc')
                            ->get();

                $project = Project::where('user_id', $vendor[0]->id)
                           ->where('status',1)
                           ->take(4)
                           ->orderBy('id', 'desc')
                           ->get();

                $product = Product::where('user_id',$vendor[0]->id)
                        ->take(4)
                        ->orderBy('id', 'desc')
                        ->get();

                foreach ($product as $key => $value) {
                    $product_array[] = array(
                        'id' => $value->id,
                        'name' => $value->name,
                        'description' => $value->description,
                        'brand' => $value->brand,
                        'price' => $value->price,
                        'image' => $this->getProductFeaturedImage($value->id),
                        'created_at' => substr($value->created_at, 0,-8),
                    );
                }
                // return $product_array;

                $countproject = Project::where('user_id', $vendor[0]->id)
                           ->where('status',1)
                           ->orderBy('id', 'desc')
                           ->count();

                $countproduct = Product::where('user_id',$vendor[0]->id)
                                ->orderBy('id', 'desc')
                                ->count();

                $star_review = DB::table('reviews')
                             ->select(DB::raw ('AVG(efficiency) as efficiency'),DB::raw ('AVG(quality) as quality'),DB::raw ('AVG(helpfulness) as helpfulness'),DB::raw ('AVG(effectiveness) as effectiveness'),DB::raw ('AVG(experience) as experience'),DB::raw ('count(id) as count'))
                             ->where('user_id', '=', $vendor[0]->id)
                             ->get();

                
                $services = $this->get_subcategory_limit($vendor[0]->id,100);
    
                $oneK = DB::table('projects')
                             ->select(DB::raw ('count(`id`) as id'))
                             ->where([
                                ['user_id', '=', $vendor[0]->id],
                                ['cost', '<=', 10000],
                               ])
                             ->get();

                $twoK = DB::table('projects')
                             ->select(DB::raw ('count(`id`) as id'))
                             ->where([
                                ['user_id', '=', $vendor[0]->id],
                                ['cost', '>', 10000],
                               ])
                             ->get();
                // return $oneK;


                return view('main.vendor')->with([
                    'title' => $vendor[0]->business_name." | Propisor",
                    'vendor' => $vendor,
                    'openMsg' => $request->get('openMsg'),
                    'reviews' => $reviews,
                    'project' => $project,
                    'product' => $product_array,
                    'star_review' => $star_review,
                    'services' => $services,
                    'oneK' => $oneK,
                    'twoK' => $twoK,
                    'businessname' => $businessname,
                    'countproject' => $countproject,
                    'countproduct' => $countproduct,
                ]);
            }
            else{

                $user = User::where('username', '=', $businessname)->first();

                $response = $usercontroller->userNewsfeedFunc($user->id);

                $data = array(
                    'userblog' => $response,
                );

                return view('main.user')->with([
                    'title' => $vendor[0]->name." | Propisor",
                    'user' => $user,
                    'data' => $data,
                    'total_follower' => $usercontroller->total_follower($user->id),
                    'total_following' => $usercontroller->total_following($user->id),
                ]);
            }
        }
        else{
            return abort(404);
        }
    }

    public function getProductFeaturedImage($id)
    {
        $image = DB::table('product_images')->where('product_id', '=', $id)->take(1)->get();
        if(count($image)!=0){
            return url('uploads/product').'/'.$image[0]->image;
        }else{
            return url('uploads/product/cover.png');
        }
    }

    public function vendorstories(Request $request,$businessname = null,UserController $usercontroller)
    {
        $user = User::where('username', '=', $businessname)->first();

        $response = $usercontroller->userNewsfeedFunc($user->id);

        $data = array(
            'userblog' => $response,
        );

        return view('main.user')->with([
            'title' => $user->name." | Propisor",
            'user' => $user,
            'data' => $data,
            'total_follower' => $usercontroller->total_follower($user->id),
            'total_following' => $usercontroller->total_following($user->id),
        ]);
    }

    public function countReview($id)
    {
        return Review::where('user_id',$id)->count();
    }

    public function followers($username,UserController $usercontroller)
    {
        $user = User::where('username', '=', $username)->first();
        $follower = $usercontroller->followerFunc($user->id);
        
        $title = "Follower | Propisor";

        $data = $usercontroller->userNewsfeedFunc($user->id);

        $blog = array(
            'userblog' => $data,
        );

        $follower = $usercontroller->followerFunc($user->id);
        // return $blog;

        return view('main.follower')->with([
            'title' => $title,
            'user' => $user,
            'data' => $blog,
            'total_follower' => $usercontroller->total_follower($user->id),
            'total_following' => $usercontroller->total_following($user->id),
            'follower' => $follower,
        ]);
    }

    public function following($username,UserController $usercontroller)
    {
        $user = User::where('username', '=', $username)->first();
        $follower = $usercontroller->followerFunc($user->id);
        
        $title = "Following | Propisor";

        $data = $usercontroller->userNewsfeedFunc($user->id);

        $blog = array(
            'userblog' => $data,
        );

        $following = $usercontroller->followingFunc($user->id);

        return view('main.following')->with([
            'title' => $title,
            'user' => $user,
            'data' => $blog,
            'total_follower' => $usercontroller->total_follower($user->id),
            'total_following' => $usercontroller->total_following($user->id),
            'following' => $following,
        ]);
    }

    public function collections($username,UserController $usercontroller)
    {
        $user = User::where('username', '=', $username)->first();
        $title = 'Collections | Propisor';

        $scrapbook = $usercontroller->collectionFunc($user->id);

        $data = $usercontroller->userNewsfeedFunc($user->id);

        $blog = array(
            'userblog' => $data,
        );

        return view('main.collections')->with([
            'title' => $title,
            'user' => $user,
            'data' => $blog,
            'total_follower' => $usercontroller->total_follower($user->id),
            'total_following' => $usercontroller->total_following($user->id),
            'scrapbook' => $scrapbook,
        ]);
    }

    public function productDetails($id)
    {
        $product = Product::find($id);
        
        if(empty($product->id)){
            abort(404);
        }
        $product_images = DB::table('product_images')->where('product_id', '=', $product->id)->get();
        $product_subcategories = DB::table('product_services')->where('product_id', '=', $product->id)->get();
        
        $title = $product->name.' | Propisor';
        return view('main.product')->with([
            'title' => $title,
            'product' => $product,
            'product_images' => $product_images,
            'product_subcategories' => $product_subcategories,
            'id' => $id,
        ]);
    }

    public function stories()
    {
        $title = 'Stories | Propisor';

        $data = array(
            'userblog' => $this->retrieveStories(''),
        );

        return view('main.stories')->with([
                    'title' => $title,
                    'data' => $data,
                ]);
    }

    public function superPros()
    {
        $title = 'Super Pros | Propisor';
        $categories =  DB::table('categories')
                        ->orderBy('id', 'desc')
                        ->get();
        return view('main.super-pros')->with([
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    public function contentImage(Request $request)
    {
        $img = Image::make($request->input('file'))->resize($request->input('l'), $request->input('w'));
        return $img->response('jpg');
    }

    public function claimProfile(Request $request)
    {
        $verification_code = rand(10000,99999);
        $user = User::where('username',$request->input('username'))->update([
            'claim_verification_code' => $verification_code,
        ]);
        $user = User::where('username',$request->input('username'))->first();

        $data = array(
            'code' => $verification_code,
        );

        $sender_data = array(
            'sender' => $user->email
        );

        Mail::send('emails.claim-profile', $data, function ($message) use ($sender_data)  {

            $message->from('support@propisor.com', 'Welcome to Propisor');
            $message->to($sender_data['sender'])->subject('Claim your profile');

        });

        $message = 'Hi! Claim request : name -> '.$user->name.' phone -> '.$user->mobile_number;
        // return $user->mobile_number;
        // $this->sms('8860806718',$message);
    }

    public function claimModal($username)
    {
        $verification_code = rand(10000,99999);
        $user = User::where('username',$username)->update([
            'claim_verification_code' => $verification_code,
        ]);
        $user = User::where('username',$username)->first();

        $data = array(
            'code' => $verification_code,
        );

        $sender_data = array(
            'sender' => 'sandeepdnp28@gmail.com'
        );

        Mail::send('emails.claim-profile', $data, function ($message) use ($sender_data)  {

            $message->from('support@propisor.com', 'Welcome to Propisor');
            $message->to($sender_data['sender'])->subject('Claim your profile');

        });

        $message = 'Hi! Claim request : name -> '.$user->name.' phone -> '.$user->mobile_number;
    }

    public function postClaimProfile(Request $request)
    {
        $user = User::where([
            'claim_verification_code' => $request->input('code'),
            'username' => $request->input('username'),
        ])->first();

        if(count($user) == 1){
            Auth::loginUsingId($user->id, true);
            return Response::json(array(
                'success' => true,
            ), 200);
        }else{
            return Response::json(array(
                'success' => false,
            ), 200);
        }
        
        
        $code = $request->input('code');
        return $code;
    }

    public function clone(Request $request)
    {
        $url = $request->input('url');

        $path = parse_url($url, PHP_URL_PATH);
        $segments = explode('/', rtrim($path, '/'));
        print_r($segments);
        
        $ch = curl_init();
        $timeout = 200;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);

        $description = $this->GetBetween("<div class='profile-about profile-about--regular'>",'</div>',$data);

        $company = $this->GetBetween('<a class="profile-full-name" itemprop="name" href="'.$url.'">','</a>',$data);

        $contact_no = $this->GetBetween('<span class="pro-contact-text">','</span>',$data);

        $name = $this->GetBetween('<div class="info-list-text"><b>Contact</b>: ','</div>',$data);

        $street = $this->GetBetween('<span itemprop="streetAddress">','</span>',$data);

        $locality = $this->GetBetween('<span itemprop="addressLocality">','</span>',$data);

        $profile = $this->GetBetween('<img class="profile-pic" width="173" height="173" id="mainUserProfilePic" src="','"',$data);

        $cover = $this->GetBetween('<img id="coverImage" class="cover-image custom-cover " src="','"',$data);

        echo "Company = ". $company;
        echo "<br><br>Description = ". $description;
        echo "<br><br>Contact = ". $contact_no;
        echo "<br><br>Street = ". $street;
        echo "<br><br>Locality = ". strip_tags($locality);
        echo "<br><br>Profile Image = ". $profile;
        echo "<br><br>Cover Image = ". $cover;
        echo "<br><br>Name = ". $name;
        // echo "<br><br>Project Page = "."<pre>",print_r($projects),"</pre>";

        $profile_string = str_random('30').".jpg";
        $profile_upload = '/var/www/propisor/public/uploads/avatar/'.$profile_string;
        $image_url = $profile;
        $pimage = file_get_contents($image_url);
        file_put_contents($profile_upload,$pimage);

        $cover_string = str_random('30').".jpg";
        $cover_upload = '/var/www/propisor/public/uploads/cover/'.$cover_string;
        $cover_image_url = $cover;
        $cimage = file_get_contents($cover_image_url);
        file_put_contents($cover_upload,$cimage);

        $vendor = User::create([
            'name' => $name,
            'email' => str_random(10)."@gmail.com",
            'mobile_number' => $contact_no,
            'type' => 'vendor',
            'username' => str_slug($name).'-'.str_random(10).str_random(10),
            'password' => bcrypt('world'),
            'avatar' => $profile_string,
            'cover' => $cover_string,
            'about_us' => trim(strip_tags($description)),
            'business_name' => $company,
        ]);

        $projects = $this->cloneproject("https://www.houzz.in/projects/users/$segments[2]",$vendor->id);
    }

    public function cloneproject($url,$vendor_id)
    {
        // $vendor_id = 50;
        // $url = $request->input('url');

        $ch = curl_init();
        $timeout = 300;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);

        $project_url = $this->getContents($data, "<a class='whiteCard project-card ' href='", "'");

        unset($project_url[count($project_url)-1]);
         
        $project_name = $this->getContents($data, "<div class='text-bold one-line'>", "</div>");
        $project_desc = $this->getContents($data, '<div id="projectDescTrimmed">', "</div>");
        echo "<pre>",print_r($project_name),"</pre>";

        foreach ($project_url as $key => $value) {
             echo "<pre>",print_r($this->fetchproject($value)),"</pre>";
            $project_id = Project::create([
                'title' => $project_name[$key],
                // 'description' => trim($project_desc[$key]),
                'user_id' => $vendor_id,
                'created_at' => Carbon::now(),
            ])->id;

            foreach ($this->fetchproject($value) as $ikey => $value) {

                $cover = $value;
                $cover_string = str_random('30').".jpg";
                $cover_upload = '/var/www/propisor/public/uploads/project/'.$cover_string;
                $cover_image_url = $cover;
                $cimage = file_get_contents($cover_image_url);
                file_put_contents($cover_upload,$cimage);

                if($ikey == 0){
                    $project = Project::find($project_id);
                    $project->update([
                        'featured_image' => $cover_string,
                    ]);
                }

                DB::table('project_image')->insert([
                    'image' => $cover_string,
                    'project_id' => $project_id,
                    'type' => '',
                ]);
            }
            echo "<br>------------------------------------<br>";
        }
    }

    public function fetchproject($value='')
    {
        $url = $value;

        // $data = array();
        $ch = curl_init();
        $timeout = 300;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);

        $quoted = '"true"';
        $response = $this->getContents($data, "<img data-pin-no-hover=".$quoted." class='hide-context space reloadable' src='", "'");
        // return "<img data-pin-no-hover=".$quoted." class='hide-context space reloadable' src='";
        return $response;
    }

    function GetBetween($var1="",$var2="",$pool){
        $temp1 = strpos($pool,$var1)+strlen($var1);
        $result = substr($pool,$temp1,strlen($pool));
        $dd=strpos($result,$var2);
        if($dd == 0){
        $dd = strlen($result);
        }

        return substr($result,0,$dd);
    }

    function getContents($str, $startDelimiter, $endDelimiter) {
        $contents = array();
        $startDelimiterLength = strlen($startDelimiter);
        $endDelimiterLength = strlen($endDelimiter);
        $startFrom = $contentStart = $contentEnd = 0;
        while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
        $contentStart += $startDelimiterLength;
        $contentEnd = strpos($str, $endDelimiter, $contentStart);
        if (false === $contentEnd) {
          break;
        }
        $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
        $startFrom = $contentEnd + $endDelimiterLength;
        }

        return $contents;
    }
}
