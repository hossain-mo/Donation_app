<?php
namespace App\Transformers;

use League\Fractal;
use Carbon\Carbon;
class DonationProjectTransformer extends Fractal\TransformerAbstract
{   


	public function transform($project)
    {
        $start_at  = new Carbon($project->start_at);

	    return [
	        'id'               =>  $project->id,
            'description'      =>  $project->description,
            'name'             =>  $project->name,
            'cost'             =>  $project->cost,
            'execution_period' =>  $project->execution_period . " Day",
            'cause'            =>  $project->cause,
            'village'          =>  $project->village->name,
            'project_category' =>  $project->projectCategory->name,
            'village_id'       =>  $project->village_id,
            'project_category_id' =>  $project->project_category_id,
            'collected'        =>  $project->collected,
            'start_at'         =>  $project->start_at ? $start_at->toDateString() : '',
            'cover_photo'      =>  $project->coverPhoto ? $project->coverPhoto->content : '',
            'galary'           =>  $project->galary ? $project->galary->pluck('content'): ''
        ];
        
    }
   
}