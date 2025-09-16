<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ticket extends Model
{
    //
    use HasFactory;
    
     protected $fillable = [
        'user_id',
        'subject',
        'description',
        'status',
        'priority',
        'assigned_to',
        'category_id'
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    
    public function ticketResponses(): HasMany
    {
        return $this->hasMany(TicketResponse::class);
    }
    public function ticketCategory(): BelongsTo
    {
        return $this->belongsTo(TicketCategory::class, 'category_id');
    }
    
    public function ticketFeedbacks(): HasOne
    {
        return $this->hasOne(TicketFeedback::class);
    }
    
     public function escalations(): HasMany
    {
        return $this->hasMany(TicketEscalation::class);
    }
    
}
