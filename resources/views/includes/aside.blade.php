<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('welcome') }}">
            <span class="align-middle me-3">{{ env("APP_NAME") }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                General
            </li>
            <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('welcome') }}">
                    <i class="align-middle" data-feather="list"></i>
                    <span class="align-middle">Home</span>
                </a>
            </li>


            @if(auth()->user()->is_admin)

                <li class="sidebar-header">
                    Manage Checklists
                </li>
                @foreach($admin_menu as $group)
                    <li class="sidebar-item">
                        <a href=" {{ route('admin.checklist_groups.edit' , $group->id) }} "
                           data-target="#group{{ $group->id }}"  class="sidebar-link"
{{--                           style="--}}
{{--                            background-color: white;--}}
{{--                            color: blue; "--}}
                        >
                            <i class="align-middle" data-feather="shopping-bag"></i>
                            <span class="align-middle"> {{ $group->name }} </span>

                            <span class="badge badge-sidebar-primary">34 USD</span>

                        </a>

                        <ul id="group{{ $group->id }}" class="sidebar-dropdown list-unstyled ">
                            @foreach($group->checklists as $checklist)
                                <li class="sidebar-item" >
                                    <a class="sidebar-link"
                                       href=" {{ route('admin.checklist_groups.checklists.edit',[$group,$checklist]) }} ">
                                        <i class="align-middle" data-feather="list"></i>
                                        {{ $checklist->name }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="sidebar-item" >
                                <a href="{{ route('admin.checklist_groups.checklists.create',$group) }}"
                                   class="sidebar-link collapsed" >
                                    <i class="align-middle" data-feather="shopping-bag"></i>
                                    <span class="align-middle">New Checklist</span>
                                </a>
                            </li>
                        </ul>


                    </li>
                @endforeach

                <li class="sidebar-item">
                    <a href="{{ route('admin.checklist_groups.create') }}"
                       class="sidebar-link collapsed" >
                        <i class="align-middle" data-feather="shopping-bag"></i>
                        <span class="align-middle">New Group</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    PAGES
                </li>
                @foreach( \App\Models\Page::all() as $page)
                    <li class="sidebar-item {{ request()->is('dashboard/redeems') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.pages.edit', $page) }}">
                            <i class="align-middle" data-feather="layout"></i>
                            <span class="align-middle"> {{ $page->title }}</span>
                        </a>
                    </li>
                @endforeach

                <li class="sidebar-header">
                    Manage Data
                </li>
                <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                        <i class="align-middle" data-feather="list"></i>
                        <span class="align-middle">Users</span>
                    </a>
                </li>
            @else
                @foreach($user_menu as $group)
                    @if(count($group['checklists']) > 0 )
                        <li class="sidebar-item">
                            <a href="#"
                               data-target="#group{{ $group['id'] }}"  class="sidebar-link"
                                {{--                           style="--}}
                                {{--                            background-color: white;--}}
                                {{--                            color: blue; "--}}
                            >
                                <i class="align-middle" data-feather="shopping-bag"></i>
                                <span class="align-middle"> {{ $group['name'] }} </span>

                                @if($group['is_new'])
                                    <span class="badge badge-sidebar-primary"> NEW </span>
                                @elseif($group['is_updated'])
                                    <span class="badge badge-sidebar-secondary"> UPD </span>
                                @endif


                            </a>

                            <ul id="group{{ $group['id'] }}" class="sidebar-dropdown list-unstyled ">
                                @foreach($group['checklists'] as $checklist)
                                    <li class="sidebar-item" >
                                        <a class="sidebar-link"
                                           href=" {{ route('users.checklists.show',$checklist['id']) }} ">

                                            <i class="align-middle" data-feather="list"></i>
                                            {{ $checklist['name']  }}

                                            @livewire('completed-tasks-counter',[
                                                'completed_tasks' => count($checklist['user_tasks']),
                                                'tasks_count' => count($checklist['tasks']),
                                                'checklist_id' => $checklist['id']
                                            ])

                                            @if($checklist['is_new'])
                                                <span class="badge badge-sidebar-primary"> NEW </span>
                                            @elseif($checklist['is_updated'])
                                                <span class="badge badge-sidebar-secondary"> UPD </span>
                                            @endif


                                        </a>
                                    </li>
                                @endforeach

                            </ul>


                        </li>
                    @endif

                @endforeach
            @endif

        </ul>
    </div>
</nav>
