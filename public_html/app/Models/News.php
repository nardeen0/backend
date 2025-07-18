<?php

namespace App\Models;

use App\Components\VstuNewsParser;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
class News extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'url',
        'publish_date',
        'image_path',
    ];

    public function createFromUrl(): bool{
        $response = Http::get($this->url);
        if ($response && $response->ok()){
            $newsParser = new VstuNewsParser($response->body());
            $newsAttributes = $newsParser->parse();

            $newsTokens = explode('/', $this->url);
            $newsSlug = $newsTokens[count($newsTokens)-2];
            $this->title = $newsAttributes['title'] ?? '';
            $this->slug = $newsSlug;
            if ($newsAttributes['publishDate']){
                $this->publish_date = Carbon::parse($newsAttributes['publishDate']);
            }
            $this->image_path = $newsAttributes['image'] ?? '';
            return true;
        }
        return false;
    }

    public function getImage(){
        return "https://www.vstu.ru$this->image_path";
    }
}
