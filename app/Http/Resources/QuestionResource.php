<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'question' => $this->question_text,
            'answer' => array_search(
                $this->questionsAnwer->option_id,
                $this->questionOptions->pluck('id')->toArray()
            ),
            'options' => $this->questionOptions->pluck('option_text'),
            'level' => $this->level
        ];
    }
}
