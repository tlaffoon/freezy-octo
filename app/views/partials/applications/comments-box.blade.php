@foreach($comments as $comment)

    <div class="col-sm-12 comment-header">
        <div class="text-muted pull-left">
            {{ $comment->author->first }} said:
        </div>

        <div class="col-sm-12 comment-body">
            <p> {{ $comment->body }} </p>
        </div>
    </div>

    <div class="col-sm-12 timestamp">
        <div class="text-muted pull-right">
            on {{ $comment->created_at }} 
        </div>
    </div>

@endforeach