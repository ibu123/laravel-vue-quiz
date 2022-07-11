<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Resources\TopicResource;
use App\Http\Resources\QuestionResource;

class QuizController extends Controller
{
    public function topics() {
        return  response()->json([
            'topics' => Topic::all()
        ], 200);
    }

    public function quizByTopic(Request $request) {
        $questionWithAnswerLevel1 = Topic::where('title', $request->topic)
                                    ->with('topicQuestions', function($q) {
                                        $q->where('level', 1)->with('questionOptions','questionsAnwer')->inRandomOrder()->limit(4);
                                    })->first();

        $questionWithAnswerLevel2 = Topic::where('title', $request->topic)
                                    ->with('topicQuestions', function($q) {
                                        $q->where('level', 2)->with('questionOptions','questionsAnwer')->inRandomOrder()->limit(3);
                                    })->first();

        $questionWithAnswerLevel3 = Topic::where('title', $request->topic)
                                    ->with('topicQuestions', function($q) {
                                        $q->where('level', 3)->with('questionOptions','questionsAnwer')->inRandomOrder()->limit(3);
                                    })->first();

                                    $questionWithAnswerLevel1->topicQuestions = $questionWithAnswerLevel1->topicQuestions
                            ->merge($questionWithAnswerLevel2->topicQuestions)
                            ->merge($questionWithAnswerLevel3->topicQuestions);
        return new TopicResource($questionWithAnswerLevel1);
    }
}
