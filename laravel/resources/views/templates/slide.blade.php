<div class="container" id="truyen-slide">
    <div class="list list-thumbnail col-xs-12">
        <div class="title-list"><h2><a href="{{route('danhsach.truyenfull')}}" title="Truyện full">TRUYỆN FULL</a></h2><span class="glyphicon glyphicon-menu-right"></span></a></div>
        <div class="row">
            @if($stories)
                @foreach($stories as $story)
                    <?php
                    $chapter = $story->chapters()->orderBy('created_at', 'DESC')->first();
                    ?>
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <a href="{{route('story.show', $story->alias)}}" title="{{$story->name}}">
                          
                            @if ($story->image && file_exists(public_path($story->image)))
                                <img src="{{ url($story->image) }}" alt="{{$story->name}}" loading="lazy">
                            @else
                                <img src="{{ url('/images/no_signal/no-signal.jpg') }}" alt="{{$story->name}}" loading="lazy">
                            @endif

                            @if($story->view >= 1000)
                            <span class="icon icon-hot" style="top:6px; right:8%;"></span>
                            @endif
                            <div class="caption">
                                <h3>{{$story->name}}</h3>
                                <small class="btn-xs label-primary">Ho&agrave;n th&agrave;nh - {{$story->chapters()->count()}} ch&#432;&#417;ng</small>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p>Kh&ocirc;ng c&oacute; b&agrave;i vi&#7871;t n&agrave;o &#7903; &#273;&acirc;y !</p>
            @endif
        </div>

    </div>
</div>