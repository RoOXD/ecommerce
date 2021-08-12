@props(['comment'])

<div class="column" style="background-color:lightgray; margin: 3px; border-radius: 25px;">
    <h3 class="font-weight-bold" style="padding-left: 25px">{{$comment->author->name}}</h3>
    <p class="text-xs" style="padding-left: 25px">Postat
        <time>{{$comment->created_at}}</time>
    </p>
    <h5 style="padding-left: 25px">{{$comment->body}}</h5>
</div>
