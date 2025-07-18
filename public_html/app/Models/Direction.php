<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    public const MOVE_UP = 'up';
    public const MOVE_DOWN = 'down';

    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'program',
        'short_name',
        'qualification',
        'target_audience',
        'order',
        'is_published',
        'for_it'
    ];
    private $firstWhere;

    protected function program(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str_replace('\n','<br>',$value),
        );
    }

    public static function getLastOrderNumber()
    {
        $lastOrderNumber = self::where('is_published', true)->max('order');
        return $lastOrderNumber ?? false;
    }

    protected function swapOrder(int $targetOrderNumber){
        $this->firstWhere = self::firstWhere(
            [
                ['order', $targetOrderNumber],
                ['is_published', true]
            ]
        );
        if ($this->firstWhere){
            $this->firstWhere->order = $this->order;
            if ($this->firstWhere->save()){
                $this->order = $targetOrderNumber;
            }
            return $this->save();
        }
    }

    public function move(string $type)
    {
        switch ($type) {
            case self::MOVE_UP:
            {
                if ($this->order > 1) {
                    return $this->swapOrder($this->order-1);
                }
                return false;
            }
            case self::MOVE_DOWN:
            {
                $lastOrderNumber = self::getLastOrderNumber();
                if ($this->order < $lastOrderNumber) {
                    return $this->swapOrder($this->order+1);
                }
            }
        }
        return true;
    }

    public static function checkMoveType(string $type): bool{
        return $type === self::MOVE_UP || $type === self::MOVE_DOWN;
    }

    public function publish()
    {
        $this->is_published = !$this->is_published;
        return $this->save();
    }
}
