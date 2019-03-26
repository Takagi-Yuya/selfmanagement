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
        $question_dammy = 'Q.ダミー質問です質問です質問です質問です質問です質問です質問です質問です質問です';
        $answer_dammy = 'A.ダミー回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です';
        $reason_dammy = 'why?.ダミー理由です理由です理由です理由です理由です理由です理由です理由です理由です理由です';

        for ($i = 1; $i <= 10; $i++) {
      	    	$question = new OtherQuestion;
      	    	$question->question = $question_dammy;
      		    $question->user_id = 1;
      		    $question->save();

            for ($j = 1; $j <= 5; $j++) {
                $other = new OtherAnswer;
                $other->answer = $answer_dammy;
                $other->reason = $reason_dammy;
                $other->user_id = rand(2, 3);
                $question->other_answers()->save($other);
            }
        }
    }
}
