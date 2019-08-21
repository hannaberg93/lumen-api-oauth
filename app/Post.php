<?php
namespace App;
use Illuminate\Database\Eloquent\Model;



class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'title', 'content',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * Define a one-to-many relationship with App\Comment
     */
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
