<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function organization() {
        return $this->belongsTo(Organization::class);
    }

    public function currentStep() {
        return $this->hasOne(FileStep::class, 'id', 'current_step_id');
    }

    public function histories() {
        return $this->hasMany(FileHistory::class);
    }
}
