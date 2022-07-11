<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;

    public $table = 'options';

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'option_text',
        'question_id'
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
}
