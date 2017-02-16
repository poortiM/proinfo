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
use App\Http\Controllers\MainController;


class UserController extends Controller
{
    protected $maincontroller;

    function __construct(MainController $maincontroller){
        $this->maincontroller = $maincontroller;
    }

    public function postSignUp(Request $request)
    {
        $rules = array(
           'name' => 'required',
           'email' => 'required|unique:users|email|max:255',
           'mobile_number' => 'required|unique:users|max:255',
           'password' => 'required'
        );

       $validator = Validator::make($request->all(), $rules);
       if ($validator->fails())
       {
            return Response::json([
               'success' => false,
               'errors' => $validator->getMessageBag()->toArray(),
               'next'=> '',
               'message'=> ''
            ]);
       }
       else
       {
            // $otp = rand(1000,9999);
            $otp = 7777;

            $user=User::create([
               'name' => $request->input('name'),
               'username' => str_random(6),
               'email' => $request->input('email'),
               'mobile_number' => $request->input('mobile_number'),
               'password' => bcrypt($request->input('password')),
               'avatar' => 'avatar.png',
               'cover' => 'cover.png',
               'type' => 'user',
               'status' => 'Active'
            ]);

            $credentials  = [
                'email' =>   $request->input('email'),
                'password' => $request->input('password'),
                'type'=>'user'
            ];

            $auth = auth()->guard('web');
            $auth->attempt($credentials);

            return Response::json([
               'success' => true,
               'errors' => '',
               'next'=> '',
               'rld' => true,
               'message'=> '',
               'otp'=> $otp,
            ]);

            /*$auth = auth()->guard('web');

            if($auth->attempt($credentials)) {
                return Response::json([
                   'success' => true,
                   'errors' => '',
                   'next'=> '',
                   'rld' => true,
                   'message'=> '',
                ]);
            }*/
        }
    }

    public function postLogin(Request $request)
    {
        $credentials  = [
            'email' =>   $request->input('email'),
            'password' =>  $request->input('password'),
            'status' =>'Active',
            'type'=>'user'
        ];

        $auth = auth()->guard('web');

        if(!$auth->attempt($credentials)) 
        {
        	return Response::json([
               'success' => false,
               'errors' => '',
               'next'=> '',
               'message'=> 'The email or password is incorrect'
            ]);
        }
        else
        {
            return Response::json([
               'success' => true,
               'errors' => '',
               'next'=> '',
               'message'=> '',
               'rld' => true
            ]);
        }
	}

	public function newsfeed()
    {
        $user = User::find(Auth::guard('web')->user()->id);
        $title = 'Newsfeed | propisor';
        $data = $this->userNewsfeedFunc(Auth::guard('web')->user()->id);

        $blog = array(
            'userblog' => $data,
        );

        return view('userdashboard.newsfeed')->with([
            'title' => $title,
            'user' => $user,
            'data' => $blog,
        ]);
    }                                                                               
    
    public function addblog()
    {
        $user = User::find(Auth::guard('web')->user()->id);
        $title = "Add Blog | Propisor";
        return view('userdashboard.add-blog')->with([
            'title' => $title,
            'user' => $user,
        ]);
    }

    public function addBlogAction(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'location' => 'required',
            'description' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if(count($validator->getMessageBag()) == 0){

            $blog = Blog::create([
                'title' => $request->input('title'),
                'location' => $request->input('location'),
                'description' => $request->input('description'),
                'user_id' => Auth::guard('web')->user()->id,
            ]);

            if(count($request->input('image_data_image')) !=0){

                foreach ($request->input('image_data_image') as $key => $data) {
            
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);
                    $ext = explode("/",$type);

                    $extension = $ext[1];

                    $filename_project = str_random('30').'.'.$extension;

                    file_put_contents("/var/www/propisor/public/uploads/blog/".$filename_project, $data);

                    if(!empty($request->input('image_description')[$key])){
                        $image_description = $request->input('image_description')[$key];
                    }else{
                        $image_description = '';
                    }
                    DB::table('blog_images')->insert([
                        'image' => $filename_project, 
                        'image_description' => $image_description, 
                        'blog_id' => $blog->id
                    ]);
                }
            }
            

            $hashtag = explode(' ', $request->input('hashtag'));

            if(count($hashtag) != 0){
                foreach ($hashtag as $key => $value) {
                    DB::table('hashtags')->insert([
                        'hashtag' => $value, 
                        'blog_id' => $blog->id
                    ]);
                }
            }

            return Response::json([
                'success' => true,
                'errors' => '',
            ]);
        }
        else{
            return Response::json([
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
        }
    }

    public function editStories($id)
    {
        $user = User::find(Auth::guard('web')->user()->id);
        
        $blog = Blog::find($id);

        $hashtagdata = DB::table('hashtags')->where('blog_id',$id)->get();
        $blog_images = DB::table('blog_images')->where('blog_id',$id)->get();

        $hashtags = '';
        foreach ($hashtagdata as $key => $value) {
            $hashtags .= $value->hashtag.' ';
        }

        $title = "Edit Blog | Propisor";
        
        return view('userdashboard.edit-stories')->with([
            'title' => $title,
            'blog' => $blog,
            'user' => $user,
            'hashtag' => trim($hashtags),
            'blog_images' => $blog_images,
            'id' => $id,
        ]);
    }

    public function editBlogAction(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'location' => 'required',
            'description' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if(count($validator->getMessageBag()) == 0){

            $blog = Blog::find($request->input('stories_id'));
            $blog->update([
                'title' => $request->input('title'),
                'location' => $request->input('location'),
                'description' => $request->input('description'),
            ]);

            if(count($request->input('image_data_image')) != 0){
                foreach ($request->input('image_data_image') as $key => $data) {
                
                    if($data == 'set'){
                            if(!empty($request->input('image_description')[$key])){
                                $image_description = $request->input('image_description')[$key];

                                DB::table('blog_images')
                                    ->where(['id' => $request->input('image_id')[$key]])
                                    ->update(['image_description' => $image_description,]);   
                            }
                    }
                    else{
                        list($type, $data) = explode(';', $data);
                        list(, $data)      = explode(',', $data);
                        $data = base64_decode($data);
                        $ext = explode("/",$type);

                        $extension = $ext[1];

                        $filename_project = str_random('30').'.'.$extension;

                        file_put_contents("/var/www/propisor/public/uploads/blog/".$filename_project, $data);

                        if(!empty($request->input('image_description')[$key])){
                            $image_description = $request->input('image_description')[$key];
                        }else{
                            $image_description = '';
                        }
                        DB::table('blog_images')->insert([
                            'image' => $filename_project, 
                            'image_description' => $image_description, 
                            'blog_id' => $blog->id
                        ]);
                    }
                }
            }

            $hashtag = explode(' ', $request->input('hashtag'));

            if(count($hashtag) != 0){
                foreach ($hashtag as $key => $value) {
                    $count = DB::table('hashtags')
                                ->where([
                                    'hashtag' => $value, 
                                    'blog_id' => $blog->id
                                ])->count();
                    
                    if($count == 0){
                        DB::table('hashtags')->insert([
                            'hashtag' => $value, 
                            'blog_id' => $blog->id
                        ]);    
                    }
                }
            }

            return Response::json([
                'success' => true,
                'errors' => '',
            ]);
        }
        else{
            return Response::json([
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
        }
    }

    public function follower(Request $request)
    {
        $user = User::find(Auth::guard('web')->user()->id);

        $follower = $this->followerFunc($user->id);

        $title = "Follower | Propisor";

        return view('userdashboard.follower')->with([
            'title' => $title,
            'user' => $user,
            'follower' => $follower,
        ]);
    }

    public function following(Request $request)
    {
        $user = User::find(Auth::guard('web')->user()->id);

        $following = $this->followingFunc(Auth::guard('web')->user()->id);

        $title = "Following | Propisor";

        return view('userdashboard.following')->with([
            'title' => $title,
            'user' => $user,
            'following' => $following,
        ]);
    }

    public function followingFunc($id)
    {
        $following = DB::table('follows')
            ->join('users', 'follows.following_id', '=', 'users.id')
            ->select('users.id','users.name','users.username','users.avatar')
            ->where('follows.follower_id', $id)
            ->get();
        return $following;
    }

    public function followerFunc($id)
    {
        $following = DB::table('follows')
            ->join('users', 'follows.follower_id', '=', 'users.id')
            ->select('users.id','users.name','users.username','users.avatar')
            ->where('follows.following_id', $id)
            ->get();
        return $following;
    }

    public function collectionFunc($id)
    {
        $scrapbook = DB::table('scrapbooks')->where('user_id',$id)->get();
        $scrapbook_array = array();

        foreach ($scrapbook as $key => $value) {
            $scrapbook_array[] = array(
                'id' => $value->id,
                'scrapbook' => $value->scrapbook,
                'total_image' => $this->total_scrapbook_image($value->id),
                'featured_image' => $this->featured_scrapbook_image($value->id),
                'valueid' => $value->id,
            );
        }

        return $scrapbook_array;
    }

    public function scrapbookFunc($id)
    {
        $data = DB::table('userscrapbooks')
            ->join('blog_images', 'userscrapbooks.image_id', '=', 'blog_images.id')
            ->join('blogs', 'blog_images.blog_id', '=', 'blogs.id')
            ->join('users', 'blogs.user_id', '=', 'users.id')
            ->where('userscrapbooks.scrapbook_id','=',$id)
            ->select('userscrapbooks.id as image_id','blog_images.image','userscrapbooks.comment','blog_images.image_description','blogs.created_at','users.name','users.avatar','users.username','blogs.id','blogs.title')
            ->get();

        return $data;
    }

    public function collections()
    {
        $user = User::find(Auth::guard('web')->user()->id);
        $title = 'Collections | Propisor';

        $scrapbook = $this->collectionFunc(Auth::guard('web')->user()->id);

        return view('userdashboard.collection')->with([
            'title' => $title,
            'user' => $user,
            'scrapbook' => $scrapbook,
        ]);
    }

    public function follow(Request $request)
    {
        if(Auth::guard('web')->check()){
            $count = DB::table('follows')->where([
                    'following_id' => $request->input('following_id'), 
                    'follower_id' => $request->input('auth_id'),
                ])->count();
            if($count == 0){
                DB::table('follows')->insert([
                    'following_id' => $request->input('following_id'), 
                    'follower_id' => $request->input('auth_id'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $response = array(
                    'is_followed' => 1,
                    'message' => 'Followed successfully',
                    'data_template' => 'Following',
                );
            }else{
                DB::table('follows')->where([
                    'following_id' => $request->input('following_id'), 
                    'follower_id' => $request->input('auth_id'),
                ])->delete();

                $response = array(
                    'is_followed' => 1,
                    'message' => 'Unfollowed successfully',
                    'data_template' => 'Follow',
                );
            }
        }else{
            $response = array(
                'is_reposted' => 0,
                'message' => 'Auth errors',
            );
        }

        return Response::json($response);
    }

    public function likestories(Request $request)
    {
        if(Auth::guard('web')->check()){

            $count = DB::table('blog_likes')->where([
                'user_id' => $request->input('auth_id'), 
                'blog_id' => $request->input('stories_id'),
            ])->count();

            if($count == 0){
                DB::table('blog_likes')->insert([
                    'user_id' => $request->input('auth_id'), 
                    'blog_id' => $request->input('stories_id'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $total_liked = DB::table('blog_likes')->where([ 
                    'blog_id' => $request->input('stories_id'),
                ])->count();

                $response = array(
                    'total_liked' => $total_liked,
                    'is_liked' => 1,
                    'message' => 'Liked successfully',
                    'like_template' => 'fa fa-thumbs-up',
                );
            }else{

                DB::table('blog_likes')->where([ 
                    'user_id' => $request->input('auth_id'), 
                    'blog_id' => $request->input('stories_id'),
                ])->delete();

                $total_liked = DB::table('blog_likes')->where([ 
                    'blog_id' => $request->input('stories_id'),
                ])->count();

                $response = array(
                    'total_liked' => $total_liked,
                    'is_liked' => 1,
                    'message' => 'Unliked successfully',
                    'like_template' => 'fa fa-thumbs-o-up',
                );
            }
        }else{
            $response = array(
                'is_liked' => 0,
                'message' => 'Auth errors',
            );
        }

        return Response::json($response);
    }

    public function commentstories(Request $request)
    {
        if(Auth::guard('web')->check()){

            DB::table('blog_comments')->insert([
                'user_id' => $request->input('auth_id'), 
                'blog_id' => $request->input('stories_id'),
                'comment' => $request->input('comment'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $user = User::find($request->input('auth_id'));

            $response = array(
                'is_commented' => 1,
                'message' => 'Commented successfully',
                'name' => $user->name,
                'avatar' => url('uploads/avatar').'/'.$user->avatar,
                'data' => $request->input('comment'),
            );
            
        }else{
            $response = array(
                'is_commented' => 0,
                'message' => 'Auth errors',
            );
        }
        return Response::json($response);
    }

    public function repoststories(Request $request)
    {
        if(Auth::guard('web')->check()){

            $count = Blog::where([
                    'user_id' => $request->input('auth_id'), 
                    'repost_id' => $request->input('stories_id'), 
                ])->count();

            if($count == 0){
                $blog = Blog::create([
                    'user_id' => $request->input('auth_id'), 
                    'repost_id' => $request->input('stories_id'), 
                ]);

                $response = array(
                    'is_reposted' => 1,
                    'message' => 'Reposted successfully',
                    'data_template' => '<i class="fa fa-exchange" aria-hidden="true"></i> <span class="t hidden-xs">Undo repost</span>',
                );
            }else{

                $blog = Blog::where([
                    'user_id' => $request->input('auth_id'), 
                    'repost_id' => $request->input('stories_id'), 
                ])->delete();

                $response = array(
                    'is_reposted' => 1,
                    'message' => 'Undo reposted successfully',
                    'data_template' => '<i class="fa fa-exchange" aria-hidden="true"></i> <span class="t hidden-xs">Repost</span>',
                );
            }
            
        }else{
            $response = array(
                'is_reposted' => 0,
                'message' => 'Auth errors',
            );
        }
        
        return Response::json($response);
    }

    public function saveScrapbook(Request $request)
    {
        // return $request->all();
        if(Auth::guard('web')->check()){
            if($request->input('scrapbook_id') == '0new-scrapbook0'){

                $count = DB::table('scrapbooks')->where([
                        'scrapbook' => $request->input('new_scrapbook_name'), 
                        'user_id' => Auth::guard('web')->user()->id,
                    ])->count();

                if($count == 0){
                    $scrapbook_id = DB::table('scrapbooks')->insertGetId([
                        'scrapbook' => $request->input('new_scrapbook_name'), 
                        'user_id' => Auth::guard('web')->user()->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        ]);

                    DB::table('userscrapbooks')->insert([
                        'scrapbook_id' => $scrapbook_id, 
                        'image_id' => $request->input('image_id'),
                        'comment' => $request->input('comment'),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        ]);
                    $response = array(
                            'is_saved' => 1,
                            'message' => 'Saved successfully',
                            'image_id' => $request->input('image_id'),
                        );
                }else{
                    $response = array(
                            'is_saved' => 0,
                            'message' => 'Already saved',
                            'image_id' => $request->input('image_id'),
                        );
                }
                
            }else{
                $count = DB::table('userscrapbooks')->where([
                        'scrapbook_id' => $request->input('scrapbook_id'), 
                        'image_id' => $request->input('image_id'),
                    ])->count();

                if($count == 0){
                    DB::table('userscrapbooks')->insert([
                        'scrapbook_id' => $request->input('scrapbook_id'), 
                        'image_id' => $request->input('image_id'),
                        'comment' => $request->input('comment'),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        ]);
                    $response = array(
                            'is_saved' => 1,
                            'message' => 'Saved successfully',
                            'image_id' => $request->input('image_id'),
                        );
                }else{
                    $response = array(
                            'is_saved' => 0,
                            'message' => 'Already saved',
                            'image_id' => $request->input('image_id'),
                        );
                }
            }
        }
        else{
             $response = array(
                            'is_saved' => 2,
                            'message' => 'Auth error',
                        );

        }

        return Response::json($response);
    }

    public function deleteStories(Request $request)
    {
        $delete = Blog::find($request->input('stories_id'))->delete();
        
        $response = array(
                'is_deleted' => 1,
                'message' => 'Deleted successfully',
            );
        
        return Response::json($response);
    }

    public function total_scrapbook_image($id)
    {
        $count = DB::table('userscrapbooks')->where('scrapbook_id',$id)->count();
        return $count;
    }

    public function featured_scrapbook_image($id)
    {
        $data = DB::table('userscrapbooks')
            ->join('blog_images', 'userscrapbooks.image_id', '=', 'blog_images.id')
            ->where('userscrapbooks.scrapbook_id','=',$id)
            ->select('blog_images.image')
            ->get();
        if(!empty($data[0]->image)){
            return url('uploads/blog').'/'.$data[0]->image;
        }else{
            return url('uploads/avatar/cover.png');
        }
    }

    public function deleteWholeCollection(Request $request)
    {
        DB::table('scrapbooks')->where('id','=',$request->input('collection_id'))->delete();
        $response = array(
                            'is_deleted' => 1,
                            'message' => 'Deleted successfully',
                        );
        return Response::json($response);
    }

    public function scrapbook($id)
    {
        $user = User::find(Auth::guard('web')->user()->id);
        $title = 'Scrapbook | Propisor';

        $data = $this->scrapbookFunc($id);

        return view('userdashboard.scrapbook')->with([
            'title' => $title,
            'user' => $user,
            'data' => $data,
        ]);
    }

    public function removeToScrapbook(Request $request)
    {
        DB::table('userscrapbooks')->where('id','=',$request->input('id'))->delete();
        $response = array(
                            'is_deleted' => 1,
                            'message' => 'Deleted successfully',
                        );
        return Response::json($response);
    }

    public function userNewsfeedFunc($id=''){
        $blog = Blog::where([
                'user_id' => $id,
                ])->orderBy('id','desc')->get();

        $blog_array = array();

        foreach ($blog as $key => $value) {
            if($value->repost_id == null){
                $blog_array[] = array(
                    'id' => $value->id,
                    'title' => $value->title,
                    'repost_id' => $value->repost_id,
                    'description' => $value->description,
                    'location' => $value->location,
                    'getvendorinfo' => $this->maincontroller->getvendorinfo($value->user_id),
                    'images' => $this->maincontroller->getBlogImage($value->id),
                    'time' => \Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans(),
                    'total_liked' => $this->maincontroller->total_liked($value->id),
                );
            }
            else{
                $blog = Blog::where([
                    'id' => $value->repost_id,
                    ])->get();
                
                foreach ($blog as $key => $value) {
                    $blog_array[] = array(
                        'id' => $value->id,
                        'title' => $value->title,
                        'repost_id' => $value->repost_id,
                        'description' => $value->description,
                        'location' => $value->location,
                        'getvendorinfo' => $this->maincontroller->getvendorinfo($value->user_id),
                        'images' => $this->maincontroller->getBlogImage($value->id),
                        'time' => \Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans(),
                        'total_liked' => $this->maincontroller->total_liked($value->id),
                    );
                }
            }
        }

        return $blog_array;
    }

    public function total_follower($id){
        return DB::table('follows')->where('following_id','=',$id)->count();
    }

    public function total_following($id){
        return DB::table('follows')->where('follower_id','=',$id)->count();
    }

    public function postMedia(Request $request){
        $file = $request->file('image');
        $destination_path = 'uploads/blog';
        $filename = str_random(15).'.'.$file->getClientOriginalExtension();
        $file->move($destination_path, $filename); 

        echo url("uploads/blog/$filename");
    }

    public function wishlist(){
        $user = User::find(Auth::guard('web')->user()->id);
        $title = 'Wishlist | Propisor';

        $scrapbook = $this->collectionFunc(Auth::guard('web')->user()->id);

        return view('userdashboard.wishlist')->with([
            'title' => $title,
            'user' => $user,
            'scrapbook' => $scrapbook,
        ]);   
    }

    public function wishlistProduct(Request $request){
        if(Auth::guard('web')->check()) {

            $count = DB::table('wishlists')->select([
                        'user_id' => Auth::guard('web')->user()->id, 
                        'product_id' => $request->input('product_id'),
                    ])->count();

            if($count == 0){
                DB::table('wishlists')->insert([
                    'user_id' => Auth::guard('web')->user()->id, 
                    'product_id' => $request->input('product_id'),
                ]);

                $response = array(
                    'is_saved' => 2,
                    'message' => 'Saved',
                    'success' => true,
                ); 
            }
            else{

                DB::table('wishlists')->select([
                    'user_id' => Auth::guard('web')->user()->id, 
                    'product_id' => $request->input('product_id'),
                ])->delete();

                $response = array(
                    'is_saved' => 2,
                    'message' => 'Removed to wishlist',
                    'success' => false,
                ); 
            }           
        }
        else{
            $response = array(
                'is_saved' => 2,
                'message' => 'Auth error',
                'success' => false,
            );
        }
        return $response;
    }

    public function deleteStoriesImage(Request $request)
    {
        $blog_images = DB::table('blog_images')->where('id',$request->input('image_id'))->delete();
        return Response::json([
                'success' => true,
                'errors' => '',
            ]);
    }

    public function validZipcode(Request $request)
    {
        $count = DB::table('postcode_db')->where('postcode',$request->input('zipcode'))->count();

        if($count != 0 ){
            $data = DB::table('postcode_db')->where('postcode',$request->input('zipcode'))->get();
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
}
