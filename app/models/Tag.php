<?php

public function lit() {
    return $this->belongsToMany('User', 'tags');
}