<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    // use SoftDeletes;

    public $table = 'answers';

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'option_id',
        'question_id',
    ];

    public function answerText()
    {
        return $this->hasOne(Option::class, 'option_id', 'id');
    }

}
