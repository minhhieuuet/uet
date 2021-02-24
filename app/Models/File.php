<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'user_id', 'current_step_id', 'price', 'payer_name', 'file_type_id', 'organization_id'];

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
