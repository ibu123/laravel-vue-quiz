<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
            ['title' => 'Sports'],
            ['title' => 'Science'],
            // ['title' => 'Arts'],
            // ['title' => 'Politics']
        ];

        $quizQuestion['Quiz']['Science'] = [
            [
                'question' => "The temperature at which all substances have zero thermal energy?",
                'options' => [ '-273 deg c' , '-250 deg c', '-100 deg c', '100 deg c'],
                'answer' => 0,
                'level' => 1
            ],
            [
                'question' => 'Any substance which when added to a reaction, alters the rate of the reaction but remains chemically unchanged at the end of the process is called?',
                'options' => [ 'Metalyst' , 'Catalyst', 'Meteoroids', 'Ionosphere'],
                'answer' => 1,
                'level' => 1
            ],
            [
                'question' => 'The study of the inter-relations of animals and plants with their environment is called?',
                'options' => [ 'Biology' , 'Ecology', 'Cronology', 'Sumsology'],
                'answer' => 1,
                'level' => 1
            ],
            [
                'question' => 'Study of insects is called?',
                'options' => [ 'Insectomania' , 'Biometric', 'Cycology', 'Entomology'],
                'answer' => 3,
                'level' => 1
            ],
            [
                'question' => 'A unit used to express the focal power of optical lenses?',
                'options' => [ 'Power' , 'Dioptre', 'Liter', 'Pound'],
                'answer' => 1,
                'level' => 2
            ],
            [
                'question' => 'The velocity that a body with less mass must achieve in order to escape from the gravitational attraction of a more massive body is called?',
                'options' => [ 'Technical Velocity' , 'Lightning Velocity', 'Middle Velocity', 'Escape Velocity'],
                'answer' => 3,
                'level' => 2
            ],
            [
                'question' => "Laughing gas is chemically known as?",
                'options' => [ 'H2O' , 'O2', 'Nitrous Oxide', 'Nitrogen'],
                'answer' => 2,
                'level' => 2
            ],
            [
                'question' => "The blood vessels carrying blood from the heart to various parts of the body is called?",
                'options' => [  'Parasite', 'Artery' ,'Injection', 'Medicine'],
                'answer' => 1,
                'level' => 3
            ],
            [
                'question' => "The distance travelled by light in one year is called?",
                'options' => [ 'Light year' , 'Moon year', 'Panther', 'Sun light year'],
                'answer' => 0,
                'level' => 3
            ],
            [
                'question' => "The rate of change of position of a body with respect to time in a particular direction and is a vector quantity is called:",
                'options' => [ 'Velocity', 'Venus', 'Liver', 'Virus' ],
                'answer' => 0,
                'level' => 3
            ]
        ];

        $quizQuestion['Quiz']['Sports'] = [
            [
                'question' => "Who became India's second Grand Master in Chess after Vishwanathan Anand?",
                'options' => [ 'Dibyendu Barua' , 'Salman Khan', 'Sachin Tendulkar', 'Sonu Sood'],
                'answer' => 0,
                'level' => 1
            ],
            [
                'question' => 'What is the beginning level in Karate?',
                'options' => [ 'Black Belt' , 'White Belt', 'Gold Belt', 'Red Belt'],
                'answer' => 1,
                'level' => 1
            ],
            [
                'question' => 'What is the national sport of India?',
                'options' => [ 'Circket' , 'Hockey', 'Football', 'Basket Ball'],
                'answer' => 1,
                'level' => 1
            ],
            [
                'question' => 'What is the national game of China?',
                'options' => [ 'Cards' , 'Bike Racing', 'Badminton', 'Table Tennis'],
                'answer' => 3,
                'level' => 1
            ],
            [
                'question' => 'The term Grand Slam is associated with?',
                'options' => [ 'Greece Tennis' , 'Lawn Tennis', 'Cricket', 'Football'],
                'answer' => 1,
                'level' => 2
            ],
            [
                'question' => 'Who was the first Test centurion in Indian Cricket?',
                'options' => [ 'Lala Lagpatray' , 'Sachin Tendulkar', 'Lala Amarnath', 'Sunil Gavaskar'],
                'answer' => 2,
                'level' => 2
            ],
            [
                'question' => "The first man to swim across the Palk straits is?",
                'options' => [ 'Mihir Sen' , 'Ritik Roshan', 'Akshay Kumar', 'Kushal tondon'],
                'answer' => 0,
                'level' => 2
            ],
            [
                'question' => "Who broke Pete Sampras's record of maximum Grand Slams in tennis?",
                'options' => [ 'Dokowich' , 'Roger Federer', 'Ronaldo', 'Messy'],
                'answer' => 1,
                'level' => 3
            ],
            [
                'question' => "In Volley ball, the number of players on each side is?",
                'options' => [ '6' , '7', '8', '9'],
                'answer' => 0,
                'level' => 3
            ],
            [
                'question' => "Saina Nehwal is associated with which sport?",
                'options' => [ 'Tennis', 'Ludo', 'Hockey', 'Badminton' ],
                'answer' => 3,
                'level' => 3
            ]
        ];

        foreach($topics as $topic) {
            $topic = Topic::create($topic);
            foreach($quizQuestion['Quiz'][$topic->title] as $questions) {
                $question = Question::create([
                    'question_text' => $questions['question'],
                    'topic_id' => $topic->id,
                    'level' => $questions['level']
                ]);
                $option = [];
                foreach($questions['options'] as $options) {
                    $option[] = Option::create([
                        'option_text' => $options,
                        'question_id' => $question->id
                    ]);
                }
                Answer::create([
                    'question_id' => $question->id,
                    'option_id' => $option[$questions['answer']]->id
                ]);
            }

        }
    }
}
