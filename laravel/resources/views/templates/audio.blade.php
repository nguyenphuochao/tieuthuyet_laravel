<div class="container" id="truyen-slide">
    <div class="list list-thumbnail col-xs-12">
        <div class="title-list"><h2><a href="{{route('danhsach.truyenaudio')}}" title="Truy&#1073;»‡n Audio">Truy&#1073;»‡n Audio</a></h2><span class="glyphicon glyphicon-headphones"></span></a></div>
        <div class="row">
            @if($stories)
                @foreach($stories as $story)
                    <?php
                    $chapter = $story->chapters()->orderBy('created_at', 'DESC')->first();
                    ?>
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <a href="{{route('audio.show', $story->alias)}}" title="{{$story->name}}">
                         
                            @if ($story->image && file_exists(public_path($story->image)))
                                <img src="{{ url($story->image) }}" alt="{{$story->name}}">
                            @else
                                <img src="{{ url('/images/no_signal/no-signal.jpg') }}" alt="{{$story->name}}">
                            @endif

                            @if($story->view >= 1000)
                            <span class="icon icon-hot" style="top:6px; right:8%;"></span>
                            @endif
                            <div class="caption">
                                <h3>{{$story->name}}</h3>
                                <small class="btn-xs label-primary">Ho&#1043; n th&#1043; nh - {{$story->chapters()->count()}} ch&#1046;°&#1046;&#1038;ng</small>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p>Kh&#1043;&#1169;ng c&#1043;&#1110; b&#1043; i vi&#1073;&#1108;&#1111;t n&#1043; o &#1073;»&#1119; &#1044;‘&#1043;&#1118;y !</p>
            @endif
        </div>

    </div>
</div>