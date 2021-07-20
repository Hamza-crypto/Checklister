<?php

namespace App\Http\Livewire;

use App\Models\Checklist;
use Livewire\Component;

class HeaderTotalsCount extends Component
{
    public $checklist_group_id;
    protected $listeners = ['task_complete' => 'render'];
    public function render()
    {
        $checklists = Checklist::where('checklist_group_id', $this->checklist_group_id)
            ->whereNull('user_id')
            ->withCount(['tasks' => function($query){
                $query->whereNull('completed_at');
            }])
            ->withCount(['user_tasks'])
            ->get();


        return view('livewire.header-totals-count', compact('checklists'));
    }
}
