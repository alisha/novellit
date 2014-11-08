<?php

class Lit extends Eloquent {

    public function users() {
        return $this->belongsToMany('User', 'library');

        return $this->belongsToMany('Tag', 'tags');
    }

}