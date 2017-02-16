<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'about_us',
        'mobile_number',
        'business_name',
        'category',
        'pincode',
        'password',
        'status',
        'website',
        'verification_code',
        'verified',
        'super_pros',
        'license',
        'license_expiry',
        'accreditation',
        'avatar',
        'cover',
        'service',
        'founding_year',
        'type_of_property',
        'scope_of_work',
        'youtube',
        'password_hash',
        'trusted_image',
        'community_reviews',
        'licensed_by_state',
        'background_checked',
        'porch_pledge',
        'facebook',
        'twitter',
        'googleplus',
        'linkedin',
        'instagram',
        'tumblr',
        'pinterest',
        'youtube_channel',
        'street',
        'area',
        'zipcode',
        'latitude',
        'longitude',
        'awards',
        'type',
        'area_served',
        'claim_verification_code',
        'claim_status',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
