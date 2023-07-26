<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = ['body', 'ticket_id', 'created_by'];
    /**
     * Define the "belongs to" relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commentuser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}