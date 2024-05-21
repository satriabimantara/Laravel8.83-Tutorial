@extends('layouts.app')
@section('main')
<div class="border rounded my-5 mx-auto d-flex flex-column align-items-stretch bg-white" style="width: 380px;">
    <div class="d-flex justify-content-between flex-shrink-0 p-3 link-dark  border-bottom">
        <span class="fs-5 fw-semibold">Task Lists {{ $tasks->total() }}</span>
        <a href="{{ url('/tasks/create') }}" class="btn btn-sm btn-primary">add</a>
    </div>
    @foreach ($tasks as $task)

    <div class="list-group list-group-flush border-bottom scrollarea">
        <div class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
            <div class="d-flex w-100 align-items-center justify-content-between">
                <strong class="mb-1">{{ $task->task }}</strong>
                <small>{{ $task->updated_at->diffForHumans() }}</small>
            </div>
            <div class="col-10 mb-1 small">{{ $task->user }}</div>
            <div class="group-action">
                <a href="{{ url("/tasks/$task->id/edit") }}" class="badge bg-info text-white">edit</a>
                <form action="{{ url("/tasks/$task->id") }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger badge d-inline-block">
                        delete
                    </button>
                </form>

            </div>
        </div>
    </div>
    @endforeach
    {{ $tasks->links('pagination::bootstrap-4') }}


</div>

@endsection
