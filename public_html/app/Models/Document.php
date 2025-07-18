<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Document extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'documents';
    protected $guarded = ['id'];

    protected $fillable = [
        'category_id',
        'name',
        'filename',
        'is_published'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getFullPath():string{
        return Storage::disk('public')->url($this->category->slug . '/' .$this->filename);
    }

    public function setFilenameAttribute($value)
    {
        if (is_string($value)){
            $this->filename = $value;
        }
        else{
            $newFileExt = pathinfo($value->getClientOriginalName())['extension'];
            $newFilename = Str::of($this->name)->beforeLast('.')->slug()->value();
            $this->uploadFileToDisk($value, 'filename', 'public', $this->category->slug, $newFilename.'.'.$newFileExt);
            $this->attributes['filename'] = $newFilename.'.'.$newFileExt;
        }
    }

}
