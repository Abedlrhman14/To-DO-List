@extends('default')

@section('content')
    <div class="d-flex align-items-center">
        <div class=" container card shadow-sm" style="margin-top:100px; max-width:500px ">
            <div class="fs-3 fw-bold text-center">Add new task</div>
            <form class='p-3' method="Post" action="{{route('task.add.post')}}">
                @csrf
                <div class="mb-3 mt-1">
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="datetime-local" name="dateline">
                </div>
                <div class="mb-3">
                    <textarea class="form-control"  name="description" rows="3"></textarea>
                </div>
                <button class="btn btn-outline-primary rounded-pill" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
