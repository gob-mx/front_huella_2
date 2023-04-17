<?php

namespace App\Models;

use App\Core\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserInfo extends Model
{
    use SpatieLogsActivity;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'id',
        'user_id',
        'telefono',
        'avatar',
        'company',
        'phone',
        'website',
        'country',
        'language',
        'timezone',
        'currency',
        'communication',
        'marketing',
        // 'created_at',
        'updated_at',
    ];


    /**
     * Prepare proper error handling for url attribute
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        // if file avatar exist in storage folder
        // $avatar = public_path(Storage::url($this->avatar));

        $avatar = public_path('avatars/'.$this->avatar);
        if (is_file($avatar) && file_exists($avatar)) {
            // get avatar url from storage
            // return Storage::url($this->avatar);
            return asset('avatars/'.$this->avatar);
        }

        // check if the avatar is an external url, eg. image from google
        if (filter_var($this->avatar, FILTER_VALIDATE_URL)) {
            return $this->avatar;
        }

        // no avatar, return blank avatar
        // return asset(theme()->getMediaUrlPath().'avatars/blank.png');
        return asset('avatars/blank.png');
    }

    /**
     * User info relation to user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Unserialize values by default
     *
     * @param $value
     *
     * @return mixed|null
     */
    public function getCommunicationAttribute($value)
    {
        // test to un-serialize value and return as array
        $data = @unserialize($value);
        if ($data !== false) {
            return $data;
        } else {
            return null;
        }
    }
}
