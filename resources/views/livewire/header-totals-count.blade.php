<div class="row ">
    <div class="col-10">
        <div class="row ">

            @foreach($checklists as $checklist)
            <div class="col-lg-6 col-xl-2 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <p class="d-flex align-items-center mb-0 fw-light">
                             {{ $checklist->name  }}
                        </p>
                    </div>
                    <div class="card-body my-0 pt-0">
                        <div class="row d-flex align-items-center mb-3">
                            <div class="col-8">
                                <h6 class="card-title mb-0 mt-2"> {{ $checklist->user_tasks_count }}/ {{ $checklist->tasks_count }}</h6>
                            </div>

                        </div>

                        <div class="progress progress-sm shadow-sm mb-1">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ ($checklist->user_tasks_count/$checklist->tasks_count)*100 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-2">

        <div class="col-lg-6 col-xl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h3 class="d-flex align-items-center mb-0 fw-light">
                        {{ $checklists->sum('user_tasks_count') }} / {{ $checklists->sum('tasks_count') }}
                    </h3>
                </div>
                <div class="card-body my-0 pt-0">
                    <div class="row d-flex align-items-center mb-3">
                        <div class="col-8">
                            <h5 class="card-title mb-0 mt-2">Total</h5>
                        </div>

                    </div>

                    <div class="progress progress-sm shadow-sm mb-1">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ ($checklists->sum('user_tasks_count')  / $checklists->sum('tasks_count') )*100 }}%"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
