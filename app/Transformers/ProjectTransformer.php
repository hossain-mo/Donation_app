<?php
namespace App\Transformers;

use League\Fractal;
use Carbon\Carbon;
class ProjectTransformer extends Fractal\TransformerAbstract
{   


	public function transform($project)
    {
        $start_at = new Carbon($project->start_at);
        $end_at   = new Carbon($project->end_at);
	    return [
	        'id'               =>  $project->id,
            'description'      =>  $project->description,
            'name'             =>  $project->name,
            'cost'             =>  $project->cost,
            'execution_period' =>  $project->execution_period,
            'cause'            =>  $project->cause,
            'village'          =>  $project->village->name,
            'village_id'       =>  $project->village_id,
            'project_category' =>  $project->projectCategory->name,
            'project_category_id'=>  $project->project_category_id,
            'collected'        =>  $project->collected ? $project->collected : 0,
            'start_at'         =>  $project->start_at ? $start_at->toDateString() : '',
            'end_at'           =>  $project->end_at ?$end_at->toDateString() : '',
            'expected_date'    =>  $start_at->addDays($project->execution_period)->toDateString(),
            'disabled'         =>  $project->disabled ? 'Yes' : 'No',
            'created_by'       =>  $project->createdUser ? $project->createdUser->name : '',
            'created_at'       =>  $project->created_at->toDateTimeString(),
            'cover_photo'      =>  $project->coverPhoto ? $project->coverPhoto->content : '',
            'galary'           =>  $project->galary ? $project->galary->pluck('content'): ''

        ];
    }
   
}