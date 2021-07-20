<table id="withdraws-table" class="table table-striped" style="width:100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Action</th>

    </tr>
    </thead>
    <tbody>


    @foreach($tasks as $task)
        <tr >
            <td>
                @if($task->position > 1)
                    <a wire:click.prevent="task_up( {{ $task->id }} )" href="#">
                        &uarr;
                    </a>
                @endif

                @if($task->position < $tasks->max('position') )
                <a wire:click.prevent="task_down( {{ $task->id }} )" href="#">
                    &darr;
                </a>
                @endif

            </td>
            <td> {{ $task->name }}</td>
{{--            <td> {!! $task->description !!}</td>--}}
            <td>
                <a class="btn btn-lg btn-primary" href="{{ route('admin.checklists.tasks.edit',[$checklist,$task]) }}">Edit</a>
                <form method="post" action=" {{ route('admin.checklists.tasks.destroy',[$checklist,$task]) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-lg btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
