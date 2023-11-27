<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permissions extends Model
{
    use HasFactory;

    protected $table = 'permission';
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function roles(): BelongsTo{
        $this->belongsTo(Roles::class);
    }
}
