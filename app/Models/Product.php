<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Clasification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['room_id', 'clasification_id', 'name', 'quantity', 'desc'];

    public function Room(): BelongsTo {
        return $this->belongsTo(Room::class);
    }

    public function Clasification(): BelongsTo {
        return $this->belongsTo(Clasification::class);
    }
}
