<?php

namespace App\Models\Exam;

use App\Models\Question\Answer as OriginAnswer;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "exam_attendee_question";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exam()
    {
        return $this->belongsTo(Attendee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'exam_attendee_question_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function origin()
    {
        return $this->belongsTo(\App\Models\Question\Question::class, 'question_id');
    }

    /**
     * @return int|float
     */
    public function getScore()
    {
        $answersFromExam = $this->answers;
        $answersFromExamCount = count($answersFromExam);
        $originalAnswers = $this->origin->answers()->where('isCorrect', '=', true)->get();
        $correctAnswersCount = count($originalAnswers);
        $correctAnswersFromExamCount = 0;
        $score = 1;

        /** @var Answer $answer */
        foreach ($answersFromExam as $answer) {
            /** @var OriginAnswer $originalAnswer */
            foreach ($originalAnswers as $originalAnswer) {
                if ($answer->answer_id == $originalAnswer->id) {
                    $correctAnswersFromExamCount++;
                }
            }
        }

        if ($correctAnswersFromExamCount == 0) {
            $score = 0;
        } elseif ($correctAnswersFromExamCount < $correctAnswersCount) {
            $diff = $correctAnswersCount - $correctAnswersFromExamCount;
            for ($i = $diff; $i > 0, $i--;) {
                $score = $score - 0.5;
            }

            if ($score < 0) {
                $score = 0;
            }
        }

        if ($score != 0 && $answersFromExamCount > $correctAnswersCount) {
            $diff = $answersFromExamCount - $correctAnswersCount;
            for ($i = $diff; $i > 0, $i--;) {
                $score = $score - 0.5;
            }

            if ($score < 0) {
                $score = 0;
            }
        }

        return $score;
    }
}
