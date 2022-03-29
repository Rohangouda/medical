<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SearchLogHistory extends Model
{
    use  SoftDeletes;

    protected $table = "search_history_log";
    
    protected $fillable =[
        'user_id',
        'search_keyword',
        'search_date'
    ];


    public function get_user(){
        return $this->hasOne(User::class, 'id' ,'user_id')->withTrashed();
    }
}
