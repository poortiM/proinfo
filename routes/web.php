<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
	$title = "Designs, remodel ideas, and costs for home projects | Propisor";
	return view('root')->with('title',$title);
});
*/
Route::get('/', [
	'uses' => '\App\Http\Controllers\MainController@index',
]);

Route::get('clone', [
	'uses' => '\App\Http\Controllers\MainController@clone',
]);

Route::get('cloneproject', [
	'uses' => '\App\Http\Controllers\MainController@cloneproject',
]);

Route::get('contentimage', [
	'uses' => '\App\Http\Controllers\MainController@contentImage',
]);

Route::get('project/{id}/{slug}', [
	'uses' => '\App\Http\Controllers\MainController@project',
]);

Route::get('faq', [
	'uses' => '\App\Http\Controllers\MainController@faq',
]);

Route::get('stories', [
	'uses' => '\App\Http\Controllers\MainController@stories',
]);

Route::get('stories/{id}/{title}', [
	'uses' => '\App\Http\Controllers\MainController@storiesDetails',
]);

Route::get('profile/{businessname?}', [
	'uses' => '\App\Http\Controllers\MainController@profile',
]);

Route::get('profile/{businessname?}/followers', [
	'uses' => '\App\Http\Controllers\MainController@followers',
]);

Route::get('profile/{businessname?}/following', [
	'uses' => '\App\Http\Controllers\MainController@following',
]);

Route::get('profile/{businessname?}/collections', [
	'uses' => '\App\Http\Controllers\MainController@collections',
]);

Route::get('profile/{businessname}/scrapbook/{id}', [
	'uses' => '\App\Http\Controllers\MainController@scrapbook',
]);

Route::get('profile/{businessname}/stories', [
	'uses' => '\App\Http\Controllers\MainController@vendorstories',
]);

Route::get('product/{id}/{title}', [
	'uses' => '\App\Http\Controllers\MainController@productDetails',
]);

Route::get('profile/{username}/projects', [
	'uses' => '\App\Http\Controllers\MainController@projects',
]);

Route::get('profile/{username}/products', [
	'uses' => '\App\Http\Controllers\MainController@products',
]);

Route::get('all-projects', [
	'uses' => '\App\Http\Controllers\MainController@allProjects',
]);

Route::get('search', [
	'uses' => '\App\Http\Controllers\MainController@searchResult',
]);

Route::get('search/pros', [
	'uses' => '\App\Http\Controllers\MainController@searchPros',
]);

Route::get('super-pros', [
	'uses' => '\App\Http\Controllers\MainController@superPros',
]);

Route::post('claim-profile', [
	'uses' => '\App\Http\Controllers\MainController@claimProfile',
]);

Route::post('postClaimProfile', [
	'uses' => '\App\Http\Controllers\MainController@postClaimProfile',
]);
/*
Route::get('super-pros', function () {
	$title = "Super Pros | Propisor";
	return view('main.super-pros')->with('title',$title);
});*/

Route::get('about-us', function () {
	$title = "About Us | Propisor";
	return view('main.about-us')->with('title',$title);
});

Route::get('tandc', function () {
	$title = "Terms and Condition | Propisor";
	return view('main.terms-condition')->with('title',$title);
});

Route::group(['prefix' => 'web'], function () {
    Route::get('searchAlgo', [
		'uses' => '\App\Http\Controllers\MainController@searchAlgo',
	]);

	Route::get('searchtype/searchWithVendor', [
		'uses' => '\App\Http\Controllers\MainController@searchWithVendor',
	]);

	Route::group(['prefix' => 'ajax'], function () {

		Route::post('analytics', [
			'uses' => '\App\Http\Controllers\MainController@analytics',
		]);

	});
});

Route::group(['prefix' => 'pro'], function () {
	
	Route::get('register', [
		'uses' => 'VendorController@getRegister',
		'middleware' => ['guest'],
	]);

	Route::get('login', [
		'uses' => 'VendorController@getLogin',
		'middleware' => ['guest'],
	]);

	Route::post('login', [
		'uses' => 'VendorController@postLogin',
		'middleware' => ['guest'],
	]);

	Route::get('signup', [
		'uses' => 'VendorController@getSignup',
		'middleware' => ['guest'],
	]);

	Route::post('register', [
		'uses' => 'VendorController@postRegister',
		'middleware' => ['guest'],
	]);

	Route::get('registration-message', [
		'uses' => 'VendorController@registrationMessage',
		'middleware' => ['guest'],
	]);

	Route::get('account-verification/{code}', [
		'uses' => 'VendorController@accountVerification',
		'middleware' => ['guest'],
	]);

	Route::get('dashboard', [
		'uses' => 'VendorController@dashboard',
		'middleware' => ['userauthenticate'],
	]);

	Route::get('add/project', [
		'uses' => '\App\Http\Controllers\VendorController@addProject',
		'middleware' => ['userauthenticate'],
	]);

	Route::post('addProject', [
		'uses' => '\App\Http\Controllers\VendorController@postAddProject',
		'middleware' => ['userauthenticate'],
	]);

	Route::get('add/project/image', [
		'uses' => '\App\Http\Controllers\VendorController@projectImage',
		'middleware' => ['userauthenticate'],
	]);

	Route::get('edit/project/{projectId?}',[
		'uses' => '\App\Http\Controllers\VendorController@editProject',
		'middleware' => ['userauthenticate'],
	]);

	Route::get('analytics',[
		'uses' => '\App\Http\Controllers\VendorController@vendorAnalytics',
		'middleware' => ['userauthenticate'],
	]);

	Route::get('contact-analytics',[
		'uses' => '\App\Http\Controllers\VendorController@vendorContactAnalytics',
		'middleware' => ['userauthenticate'],
	]);

	Route::get('change-password', [
    	'uses' => '\App\Http\Controllers\VendorController@changePassword',
    	'middleware' => ['userauthenticate'],
    ]);

    Route::get('account-settings', [
    	'uses' => '\App\Http\Controllers\VendorController@accountSettings',
    	'middleware' => ['userauthenticate'],
    ]);

    Route::get('notification-settings', [
    	'uses' => '\App\Http\Controllers\VendorController@notificationSettings',
    	'middleware' => ['userauthenticate'],
    ]);

    Route::post('postNotificationSettings', [
    	'uses' => '\App\Http\Controllers\VendorController@postNotificationSettings',
    	'middleware' => ['userauthenticate'],
    ]);

    Route::post('postChangePassword', [
    	'uses' => '\App\Http\Controllers\VendorController@postChangePassword',
    	'middleware' => ['userauthenticate'],
    ]);

    Route::post('postNotificationSettings', [
    	'uses' => '\App\Http\Controllers\VendorController@postNotificationSettings',
    	'middleware' => ['userauthenticate'],
    ]);

    Route::post('postChangePassword', [
    	'uses' => '\App\Http\Controllers\VendorController@postChangePassword',
    	'middleware' => ['userauthenticate'],
    ]);

    Route::get('add/product', [
		'uses' => '\App\Http\Controllers\VendorController@addProduct',
		'middleware' => ['userauthenticate'],
	]);

	Route::get('edit/{product_id}/product', [
		'uses' => '\App\Http\Controllers\VendorController@editProduct',
		'middleware' => ['userauthenticate'],
	]);
	
	Route::get('edit-image/{product_id}/product', [
		'uses' => '\App\Http\Controllers\VendorController@editProductImage',
		'middleware' => ['userauthenticate'],
	]);

	Route::get('add/product/image', [
		'uses' => '\App\Http\Controllers\VendorController@addProductImage',
		'middleware' => ['userauthenticate'],
	]);

	Route::get('update-password', [
		'uses' => '\App\Http\Controllers\VendorController@updatePassword',
		'middleware' => ['userauthenticate'],
	]);

	Route::post('postUpdatePassword', [
		'uses' => '\App\Http\Controllers\VendorController@postUpdatePassword',
		'middleware' => ['userauthenticate'],
	]);

	Route::post('postAddProduct', [
		'uses' => '\App\Http\Controllers\VendorController@postAddProduct',
		'middleware' => ['userauthenticate'],
	]);

	Route::post('postEditProduct', [
		'uses' => '\App\Http\Controllers\VendorController@postEditProduct',
		'middleware' => ['userauthenticate'],
	]);

	Route::group(['prefix' => 'ajax'], function () {

		Route::post('postGetStarted', [
			'uses' => 'VendorController@postGetStarted',
		]);

		Route::post('registerVendorOnVerifyOTP', [
			'uses' => '\App\Http\Controllers\VendorController@registerVendorOnVerifyOTP',
		]);

		Route::post('aboutBusiness', [
			'uses' => '\App\Http\Controllers\VendorController@postaboutBusiness',
		]);

		Route::post('services', [
			'uses' => '\App\Http\Controllers\VendorController@services',
		]);

		Route::post('serviceDelete', [
			'uses' => '\App\Http\Controllers\VendorController@serviceDelete',
		]);

		Route::post('getVendor', [
			'uses' => '\App\Http\Controllers\VendorController@getVendor',
		]);

		Route::post('license', [
			'uses' => '\App\Http\Controllers\VendorController@license',
		]);

		Route::post('personalInfoEdit', [
			'uses' => '\App\Http\Controllers\VendorController@postEditAction',
		]);

		Route::post('businessNameSave', [
			'uses' => '\App\Http\Controllers\VendorController@businessNameSave',
		]);

		Route::post('uploadVendorAvatar',[
			'uses' => 'VendorController@uploadVendorAvatar',
		]);

		Route::post('uploadVendorCover',[
			'uses' => 'VendorController@uploadVendorCover',
		]);

		Route::post('projectImage',[
			'uses' => 'VendorController@postProjectImage',
		]);

		Route::post('productImage',[
			'uses' => 'VendorController@postProductImage',
		]);

		Route::post('postGetProjectImage',[
			'uses' => 'VendorController@postGetProjectImage',
		]);

		Route::post('setProjectCoverImage',[
			'uses' => '\App\Http\Controllers\VendorController@setProjectCoverImage',
		]);

		Route::post('projectImageDelete',[
			'uses' => '\App\Http\Controllers\VendorController@projectImageDelete',
		]);

		Route::post('productImageDelete',[
			'uses' => '\App\Http\Controllers\VendorController@productImageDelete',
		]);

		Route::post('setProjectStatus',[
			'uses' => '\App\Http\Controllers\VendorController@setProjectStatus',
		]);

		Route::post('updateYoutube',[
			'uses' => '\App\Http\Controllers\VendorController@updateYoutube',
		]);

		Route::post('deleteProject',[
			'uses' => '\App\Http\Controllers\VendorController@deleteProject',
		]);

		Route::post('saveProject',[
			'uses' => '\App\Http\Controllers\VendorController@saveProject',
		]);

		Route::post('uploadProjectBanner', [
			'uses' => '\App\Http\Controllers\VendorController@uploadProjectBanner',
		]);

		Route::post('setClick', [
			'uses' => '\App\Http\Controllers\VendorController@setClick',
		]);

		Route::post('selectCategory', [
			'uses' => '\App\Http\Controllers\VendorController@selectCategory',
		]);

		Route::post('deleteProduct', [
			'uses' => '\App\Http\Controllers\VendorController@deleteProduct',
		]);

		Route::post('postGetProductImage', [
			'uses' => '\App\Http\Controllers\VendorController@postGetProductImage',
		]);

		Route::get('coordinatesUpdate', [
			'uses' => '\App\Http\Controllers\VendorController@coordinatesUpdate',
		]);

		Route::post('superPros', [
			'uses' => '\App\Http\Controllers\VendorController@superPros',
		]);

		Route::post('review_description', [
			'uses' => '\App\Http\Controllers\VendorController@reviewDescription',
		]);

		Route::post('timeSpentProfile', [
			'uses' => '\App\Http\Controllers\VendorController@timeSpentProfile',
		]);
	});

	Route::get('logout',[
		'uses' => 'VendorController@logout'
	]);

});

Route::group(['prefix' => 'user'], function () {
		
	Route::group(['prefix' => 'dashboard'], function () {
		
		Route::get('newsfeed', [
	    	'uses' => '\App\Http\Controllers\UserController@newsfeed',
	    	'middleware' => ['userauthenticate'],
	    ]);

	    Route::get('add-blog', [
	    	'uses' => '\App\Http\Controllers\UserController@addblog',
	    	'middleware' => ['userauthenticate'],
	    ]);

	    Route::get('story/{id}/edit', [
	    	'uses' => '\App\Http\Controllers\UserController@editStories',
	    	'middleware' => ['userauthenticate'],
	    ]);

	    Route::get('following', [
	    	'uses' => '\App\Http\Controllers\UserController@following',
	    	'middleware' => ['userauthenticate'],
	    ]);

	    Route::get('followers', [
	    	'uses' => '\App\Http\Controllers\UserController@follower',
	    	'middleware' => ['userauthenticate'],
	    ]);

	    Route::get('collections', [
	    	'uses' => '\App\Http\Controllers\UserController@collections',
	    	'middleware' => ['userauthenticate'],
	    ]);

	    Route::get('wishlist', [
	    	'uses' => '\App\Http\Controllers\UserController@wishlist',
	    	'middleware' => ['userauthenticate'],
	    ]);

	    Route::post('wishlistProduct', [
	    	'uses' => '\App\Http\Controllers\UserController@wishlistProduct',
	    	'middleware' => ['userauthenticate'],
	    ]);

	    Route::get('{id}/scrapbook', [
	    	'uses' => '\App\Http\Controllers\UserController@scrapbook',
	    	'middleware' => ['userauthenticate'],
	    ]);

	});

	Route::group(['prefix' => 'ajax'], function () {
		
		Route::post('register', [
			'uses' => 'UserController@postSignUp',
		]);

		Route::post('login', [
			'uses' => 'UserController@postLogin',
		]);

		Route::post('addBlogAction', [
			'uses' => 'UserController@addBlogAction',
		]);

		Route::post('editBlogAction',[
			'uses' => 'UserController@editBlogAction',
		]);

		Route::post('follow', [
			'uses' => 'UserController@follow',
		]);

		Route::post('editBlogAction',[
			'uses' => 'UserController@editBlogAction',
		]);

		Route::post('likestories',[
			'uses' => 'UserController@likestories',
		]);

		Route::post('commentstories',[
			'uses' => 'UserController@commentstories',
		]);

		Route::post('repoststories',[
			'uses' => 'UserController@repoststories',
		]);

		Route::post('saveScrapbook',[
			'uses' => 'UserController@saveScrapbook',
		]);

		Route::post('deleteStories',[
			'uses' => 'UserController@deleteStories',
		]);

		Route::post('deleteWholeCollection',[
			'uses' => 'UserController@deleteWholeCollection',
		]);

		Route::post('removeToScrapbook',[
			'uses' => 'UserController@removeToScrapbook',
		]);

		Route::post('postMedia',[
			'uses' => 'UserController@postMedia',
		]);

		Route::post('deleteStoriesImage',[
			'uses' => 'UserController@deleteStoriesImage',
		]);

		Route::post('validZipcode',[
			'uses' => 'UserController@validZipcode',
		]);
	});

	Route::get('logout',[
		'uses' => 'VendorController@logout'
	]);

});