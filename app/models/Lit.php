<?php

class Lit extends Eloquent {

    public function users() {
        return $this->belongsToMany('User')
            ->withPivot('mode' , 'started', 'finished')
            ->withTimestamps();

        return $this->belongsToMany('Tag', 'tags');
    }

    public function inUserLibrary() {
        return ! is_null(
            DB::table('lit_user')
              ->where('lit_id', $this->id)
              ->where('user_id', Auth::user()->id)
              ->first()
        );
    }

}