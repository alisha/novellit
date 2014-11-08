<?php

public function users() {
    return $this->belongsTo('User');
}

public function lits() {
    return $this->hasMany('Lit');
}

public function isReading() {
    return $this->mode == "currently_reading";
}

public function hasRead() {
    return $this->mode == "have_read";
}

public function toRead() {
    return $this->mode == "to_read";
}