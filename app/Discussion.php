<?php

namespace App;



class Discussion extends Model
{
    //
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
         return 'slug';
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function markAsBestReply(Reply $reply){
        $this->update([
           'reply_id'=>$reply->id
        ]);


    }

//    public function checkBestReply(){
//        // shorthand property
//        return Reply::find($this->reply_id);
//    }

    public function bestReply(){
      return $this->belongsTo(Reply::class,"reply_id");
    }
    public function scopeFilterByChannels($builder)
    {
        if (request()->query('channel')) {
            // filter
            $channel = Channel::where('slug', request()->query('channel'))->first();

            if ($channel) {
                return $builder->where('channel_id', $channel->id);
            }

            return $builder;
        }

        return $builder;
    }
}
