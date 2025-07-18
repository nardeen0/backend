<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Listener extends Model
{
    use CrudTrait;
    use HasFactory;


    protected $fillable = [
        'fio',
        'email',
        'education_level',
        'university',
        'faculty',
        'group_name',
        'direction_id',
        'phone',
        'image',
        'documents_number',
        'is_foreign',
        'specialization',
        'birthday',
        'country',
        'time_edu',
        'start_year',
        'diplom_num',
        'diplom_place',
        'diplom_napr',
        'diplom_year',
        'vk'
    ];

    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class, 'direction_id', 'id');
    }

    public function getImage(): string
    {
        if ($this->image && Storage::disk('images')->exists($this->image)) {
            return URL::to('images/' . $this->image);
        }
        return '';
    }


}
