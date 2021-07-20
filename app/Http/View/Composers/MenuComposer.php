<?php

namespace App\Http\View\Composers;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Support\Carbon;
use Illuminate\View\View;


class MenuComposer
{

    public function compose(View $view)
    {

        $menu = ChecklistGroup::with([
            'checklists' => function ($query) {
                $query->whereNull('user_id');
            },
            'checklists.tasks' => function ($query) {
                $query->whereNull('tasks.user_id');
            },
            'checklists.user_tasks'
        ])->get();
        $view->with('admin_menu', $menu);

        $last_action_at = auth()->user()->last_action_at;
        if (is_null($last_action_at)){
            $last_action_at = now()->subYear('1');
        }


        $user_checklist = Checklist::where('user_id', auth()->id())->get();


//        dd($last_action_at);
        $groups = [];
        foreach ($menu->toArray() as $group)
        {
            $group_updated = $user_checklist->where('checklist_group_id', $group['id'])->max('updated_at');

            $group['is_new'] = Carbon::create($group['created_at'])->greaterThan($group_updated);
            $group['is_updated'] = !($group['is_new']) && (Carbon::create($group['updated_at'])->greaterThan($group_updated));

            foreach ($group['checklists'] as &$checklist)
            {
                $checklist_updated = $user_checklist->where('checklist_id', $checklist['id'])->max('updated_at');

               // dd(($checklist_updated));
               //    dd(($checklist['created_at']));
                $checklist['is_new'] = !($group['is_new']) && !($group['is_updated']) && (Carbon::create($checklist['created_at'])->greaterThan($checklist_updated));
                $checklist['is_updated'] = !($group['is_new']) && !($group['is_updated']) && !($checklist['is_new']) && (Carbon::create($checklist['updated_at'])->greaterThan($checklist_updated) );
                $checklist['tasks_count'] = count($checklist['tasks']);
                $checklist['completed_tasks_count'] = count($checklist['user_tasks']);
            }

            $groups[] = $group;
        }


//dd($groups);
        $view->with('user_menu', $groups);
    }
}
