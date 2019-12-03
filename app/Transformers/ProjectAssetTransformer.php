<?php
namespace App\Transformers;

use League\Fractal;
class ProjectAssetTransformer extends Fractal\TransformerAbstract
{   

    

	public function transform($projectAsset)
    {  
	    return [
	        'id'          =>  $projectAsset->id,
            'type'        =>  $projectAsset->type,
            'created_at'  =>  $projectAsset->created_at  ? $projectAsset->created_at->toDateString() : '',
            'content'     =>  $projectAsset->content ,
            'project'     =>  $projectAsset->project->name
        ];
        
    }
   
}