<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'role';
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function users(): HasMany{
        return $this->hasMany(User::class);
    }

    public function permissions(): HasMany{
        return $this->hasMany(Permissions::class, 'role_id');
    }
}
