<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Activities extends Model{

        protected $table = 'activities';

        public function status()
        {
            return $this->belongsTo('App\Models\Status');
        }


}

?>