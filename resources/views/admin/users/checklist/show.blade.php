@extends('layouts.app')

@section('title', 'Checklist Group')


@section('content')
    <h1 class="h3 mb-3"> Checklist Group </h1>

   @livewire('header-totals-count', ['checklist_group_id' => $checklist->checklist_group_id])

   @livewire('checklist-show', ['checklist' => $checklist])
@endsection

{{--@section('scripts')--}}

{{--    <script>--}}
{{--        $(function(){--}}

{{--            $(".task-description-toggle").click(function(){--}}
{{--                $("#task-description-" + $(this).data('id')).toggleClass('d-none');--}}
{{--                $("#task-chevron-top-" + $(this).data('id')).toggleClass('d-none');--}}
{{--                $("#task-chevron-down-" + $(this).data('id')).toggleClass('d-none');--}}

{{--            });--}}
{{--        });--}}
{{--    </script>--}}

{{--@endsection--}}

