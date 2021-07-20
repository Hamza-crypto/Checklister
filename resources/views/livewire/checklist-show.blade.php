<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{ $checklist->name }}
            </div>
            <div class="card-body">

                <table id="withdraws-table" class="table table-striped" style="width:50%">
                    <tbody>
                    @foreach($checklist->tasks->where('user_id',NULL) as $task)
                        <tr >
                            <td> <input type="checkbox" wire:click="complete_task({{ $task->id }})"
                                @if(in_array($task->id , $completed_tasks)) checked @endif
                                    > </td>

                            <td>
                                <span wire:click="toggle_task({{ $task->id  }})"> {{ $task->name }}</span>

                            </td>
                            <td>
                                <div wire:click="toggle_task({{ $task->id  }})">
                                        <span> <i class="align-middle"
                                                  @if(in_array($task->id , $opened_tasks))
                                                  data-feather="chevron-down"
                                                  @else
                                                  data-feather="chevron-up"
                                                @endif>
                                            </i>
                                        </span>
                                </div>
                            </td>

                        </tr>

                         @if(in_array($task->id , $opened_tasks))
                            <tr>
                                <td> </td>
                                <td colspan="2"> {!! $task->description !!}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
