<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Evaluation;
use App\Models\EvaluationRating;
use App\Models\User;
use Livewire\Component;

class PrintDetails extends Component
{

    public $police_id;
    public $user;
    public $evaluations = [];
    public $last_name,
        $first_name,
        $middle_name,
        $position,
        $year_attended,
        $rank,
        $unit_assign;
    public $output,
        $job_knowledge,
        $work_management,
        $interpersonal,
        $concern,
        $personal;
    public $output_evaluation_item;

    public $max_points = 5;
    public $user_output_points;
    public $output_total_points;
    public $job_knowledge_points;
    public $work_management_points;
    public $interpersonal_points;
    public $concern_points;
    public $personal_points;

    public $user_total_points;
    public $total_weight_score;

    public function printDetails()
    {
        $this->evaluations = Evaluation::with(['evaluationItems', 'evaluationItems.evaluationRatings' => function ($query) {
            $query->whereDate('created_at', today());
        }])->get();

        $this->output = Evaluation::where('title', 'Output')->with('evaluationItems')->first();
        $this->job_knowledge = Evaluation::where('title', 'Job Knowledge')->first();
        $this->work_management = Evaluation::where('title', 'Work Management')->first();
        $this->interpersonal = Evaluation::where('title', 'Interpersonal Relationship')->first();
        $this->concern = Evaluation::where('title', 'Concern for the Organization')->first();
        $this->personal = Evaluation::where('title', 'Personal Qualities')->first();

        $this->total_weight_score = EvaluationRating::where('user_id', $this->user->id)->whereDate('created_at', today())->sum('weight_score');

        // OUTPUT
        $this->output_total_points = $this->output->evaluationItems->sum('point_allocation') * $this->max_points;

        $outputItemIds = $this->output->evaluationItems->pluck('id');

        $user_output_points = EvaluationRating::where('user_id', $this->user->id)
            ->whereDate('created_at', today())
            ->whereIn('evaluation_item_id', $outputItemIds)
            ->sum('weight_score');

        $total_output = $user_output_points / $this->output_total_points * $this->output->sub_title;

        // JOB KNOWLEDGE
        $this->job_knowledge_points = $this->job_knowledge->evaluationItems->sum('point_allocation') * $this->max_points;

        $job_knowledgeItemIds = $this->job_knowledge->evaluationItems->pluck('id');

        $job_knowledge_points = EvaluationRating::where('user_id', $this->user->id)
            ->whereDate('created_at', today())
            ->whereIn('evaluation_item_id', $job_knowledgeItemIds)
            ->sum('weight_score');

        $total_job_knowledge = $job_knowledge_points / $this->job_knowledge_points * $this->job_knowledge->sub_title;

        // WORK MANAGEMENT
        $this->work_management_points = $this->work_management->evaluationItems->sum('point_allocation') * $this->max_points;

        $work_managementItemIds = $this->work_management->evaluationItems->pluck('id');

        $user_work_management_points = EvaluationRating::where('user_id', $this->user->id)
            ->whereDate('created_at', today())
            ->whereIn('evaluation_item_id', $work_managementItemIds)
            ->sum('weight_score');

        $total_work_management = $user_work_management_points / $this->work_management_points * $this->work_management->sub_title;

        // INTERPERSONAL RELATIONSHIP
        $this->interpersonal_points = $this->interpersonal->evaluationItems->sum('point_allocation') * $this->max_points;

        $interpersonalItemIds = $this->interpersonal->evaluationItems->pluck('id');

        $user_interpersonal_points = EvaluationRating::where('user_id', $this->user->id)
            ->whereDate('created_at', today())
            ->whereIn('evaluation_item_id', $interpersonalItemIds)
            ->sum('weight_score');

        $total_interpersonal = $user_interpersonal_points / $this->interpersonal_points * $this->interpersonal->sub_title;

        // CONCERN FOR THE ORGANIZATION
        $this->concern_points = $this->concern->evaluationItems->sum('point_allocation') * $this->max_points;

        $concernItemIds = $this->concern->evaluationItems->pluck('id');

        $user_concern_points = EvaluationRating::where('user_id', $this->user->id)
            ->whereDate('created_at', today())
            ->whereIn('evaluation_item_id', $concernItemIds)
            ->sum('weight_score');

        $total_concern = $user_concern_points / $this->concern_points * $this->concern->sub_title;

        // PERSONAL QUALITIES
        $this->personal_points = $this->personal->evaluationItems->sum('point_allocation') * $this->max_points;

        $personalItemIds = $this->personal->evaluationItems->pluck('id');

        $user_personal_points = EvaluationRating::where('user_id', $this->user->id)
            ->whereDate('created_at', today())
            ->whereIn('evaluation_item_id', $personalItemIds)
            ->sum('weight_score');

        $total_personal = $user_personal_points / $this->personal_points * $this->personal->sub_title;

        $this->user_total_points = $total_output + $total_job_knowledge + $total_work_management + $total_interpersonal + $total_concern + $total_personal;

        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->middle_name = $this->user->middle_name;
        $this->position = $this->user->position->position_name;
        $this->year_attended = $this->user->year_attended;
        $this->rank = $this->user->rank;
        $this->unit_assign = $this->user->unit->unit_assignment;
    }

    public function mount($userId, $policeId)
    {
        $user = User::where('id', $userId)->where('police_id', $policeId)->first();

        $this->police_id = $user->police_id;

        $this->user = $user;

        if (!$user) {
            $this->redirect('/super-admin/evaluation/user-evaluation', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.admin.pages.print-details', [
            $this->printDetails()
        ]);
    }
}
