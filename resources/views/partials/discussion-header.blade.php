<div class="card-header">
    <div class="d-flex justify-content-between">
        <div class="font-weight-bold">{{$discussion->user->name}}</div>
        <div>
            <a href="{{route('discussion.show',$discussion->slug)}}" class="btn btn-primary btn-sm">View</a>
        </div>
    </div>

</div>
