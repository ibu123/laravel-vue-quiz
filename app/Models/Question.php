<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    public $table = 'questions';

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'topic_id',
        'question_text',
        'level'
    ];

    public function questionOptions()
    {
        return $this->hasMany(Option::class, 'question_id', 'id');
    }

    public function questionsAnwer()
    {
        return $this->hasOne(Answer::class, 'question_id', 'id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function getLevelAttribute($value)
    {
        if($value == 1) {
            return 'Beginner';
        } elseif($value == 2) {
            return 'Intermediate';
        } else {
            return 'Professional';

        }
    }
}
