<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetricHistoryRun extends Model
{
    use HasFactory;

    protected $fillable = [
        'strategy_id',
        'url',
        'accesibility_metric',
        'pwa_metric',
        'performance_metric',
        'seo_metric',
        'best_practices_metric',
    ];

    public function strategy()
    {
        return $this->belongsTo(Strategy::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
