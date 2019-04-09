<?php

use Illuminate\Database\Seeder;
use App\OtherAnswer;
use App\OtherQuestion;
use App\User;
use Illuminate\Support\Facades\Auth;

class OtherQuestionAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$question_dammy = 'Q.'.str_random(15).'？';
        //$answer_dammy = 'A.'.str_random(18);
        //$reason_dammy = 'why?.'.str_random(21);

        for ($i = 1; $i <= 10; $i++) {
      	    	$question = new OtherQuestion;
      	    	$question->question = 'Q.'.str_random(15).'？';
      		    $question->user_id = mt_rand(1, 3);
      		    $question->save();

            for ($j = 1; $j <= 5; $j++) {
                $other = new OtherAnswer;
                $other->answer = 'A.'.str_random(18);
                $other->reason = 'why?.'.str_random(21);
                $other->user_id = mt_rand(4, 6);
                $question->other_answers()->save($other);
            }
        }
    }
}
