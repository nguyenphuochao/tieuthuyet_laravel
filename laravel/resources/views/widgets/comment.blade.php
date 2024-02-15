<script>
    function get_rep_cmt($id){
        var skip = $('#more_r_comment'+$id).val();
        var nskip = 4 + Number(skip);
        $.ajax({
            type:'GET',
            url:'{{route("get-rcomment-story")}}',
            data:
            {
                _token : '<?php echo csrf_token() ?>',
                comment_story_id: $id,
                skip: skip
            },
            success:function(data) {
                $('.list-rep-cmt'+$id).append(data);
                $('#more_r_comment'+$id).val(nskip);
                if(data == null || data == '')
                {
                    $('.more_r_comment'+$id).hide();
                }

            }
        });
    }

    function rep_comment($id){
        var html = '<div class="form-group panel-footer" style="margin: 7px">';
        html += '<input style="height: 53px;" class="form-control" id="noi_dung_rep'+$id+'" name="noi_dung_rep" required placeholder="Nh&#1073;&#1108;­p tr&#1073;&#1108;&#1032; l&#1073;»&#1116;i...">';
        html += '<button id="repbinhluan'+$id+'" onclick="repBinhLuan('+$id+')" type="button" class="btn btn-primary">';
        html += 'B&#1043;¬nh lu&#1073;&#1108;­n';
        html += '</button>';
        html += '</div>';
        $('.repcmt'+$id).html(html);
        $('#rep_comment'+$id).remove();
    }

    function repBinhLuan($id){
        var nd = $('#noi_dung_rep'+$id).val();
        if(nd != '')
        {    $.ajax({
                type:'POST',
                url:'{{ route("xu-ly-rep-binh-luan") }}',
                data:
                {
                _token : '<?php echo csrf_token() ?>',
                comment_story_id: $id,
                noi_dung: nd
                },
                success:function(data) {
                    var html = '<div class="more_r_comment'+$id+'" style="display: flex; justify-content: center; margin-top: -15px; display:none">';
                    html += '<input id="more_r_comment'+$id+'" type="hidden" value=4>';
                    html += '<a onclick="get_rep_cmt('+$id+')" type="button" >Xem th&#1043;&#1028;m</a>';
                    html += '</div>';
                    $(".morecmt"+$id).html(html);
                    $('.ds-list-cmt'+$id).css("display","block");
                    $(".list-rep-cmt"+$id).html(data);
                    $('#noi_dung_rep'+$id).val("");
                    $('#more_r_comment'+$id).val(5);
                },
                error:function(){
                    alert("&#1044;&#1106;&#1044;&#1107;ng nh&#1073;&#1108;­p &#1044;‘&#1073;»&#1107; tr&#1073;&#1108;&#1032; l&#1073;»&#1116;i b&#1043;¬nh lu&#1073;&#1108;­n!")
                }
            });
        }
    }
</script>
<div class="comment">
<ul class="list-group list-group-flush">
    @foreach($comments as $comment)
    <li class="list-group-item">
        <article class="row">
            <div class="col-md-2 col-sm-2 col-xs-3 padding-mobile-cmt" style="text-align: center;">
                @if($comment->user->avatar)
                <img src="{!! $comment->user->avatar !!}" class="img-responsive img-thumbnail" alt="User Image">
                @else
                <img src="http://www.gravatar.com/avatar/{!! md5( strtolower( trim( $comment->user->email ) ) )!!}?s=90&d=mp" class="img-responsive img-thumbnail" alt="User Image">
                @endif
                <input onclick="rep_comment({{$comment->id}})" id="rep_comment{{$comment->id}}" type="button" value="Tr&#1073;&#1108;&#1032; l&#1073;»&#1116;i">
            </div>
            <div class="col-md-10 col-sm-10 col-xs-9 padding-mobile-cmt">
                <div class="panel panel-default arrow left">
                    <div class="panel-body">
                        <lable style="font-size: initial; font-weight: bold; color: blue;" for="">{{$comment->user->name}}&nbsp;</lable>
                        <span style="font-size: 11px; color: indianred;"> 
                            <span class="glyphicon glyphicon-time"></span> 
                            <?php Carbon\Carbon::setLocale('vi'); echo $comment->created_at->diffForHumans(Carbon\Carbon::now('Asia/Ho_Chi_Minh'));?>
                        </span>
                        <div class="comment-post">
                            <span for="">{{$comment->content}}</span>
                        </div>
                    </div>
                    <div class="repcmt{{$comment->id}}">

                    </div>
                    @if($comment->replay_comment->count() > 0)
                    <div class="panel-footer ds-list-cmt" style="padding: 5px 0px;">
                        <ul class="list-group list-group-flush list-rep-cmt{{$comment->id}}">
                            @foreach($comment->replay_comment->reverse() as $key => $r_comment)
                                @if ($comment->replay_comment->count() - $key < 5)
                                <li class="list-group-item" style="padding-bottom: 0px;">
                                    <article class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-3 padding-mobile-cmt">
                                            @if($r_comment->user->avatar)
                                            <img src="{!! $r_comment->user->avatar !!}" class="img-responsive img-thumbnail" alt="User Image">
                                            @else
                                            <img src="http://www.gravatar.com/avatar/{!! md5( strtolower( trim( $r_comment->user->email ) ) )!!}?s=90&d=mp" class="img-responsive img-thumbnail" alt="User Image">
                                            @endif
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-xs-9 padding-mobile-cmt">
                                            <div class="panel panel-default arrow left">
                                                <div class="panel-body">
                                                    <lable style="font-size: initial; font-weight: bold; color: blue;" for="">{{$r_comment->user->name}}&nbsp;</lable>
                                                    <span style="font-size: 11px; color: indianred;"> 
                                                        <span class="glyphicon glyphicon-time"></span>
                                                        <?php Carbon\Carbon::setLocale('vi'); echo $r_comment->created_at->diffForHumans(Carbon\Carbon::now('Asia/Ho_Chi_Minh'));?> 
                                                    </span>
                                                    <div class="comment-post">
                                                        <span for="">{{$r_comment->content}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="more_r_comment{{$r_comment->comment_story_id}}" style="display: flex; justify-content: center; margin-top: -15px; display:none">
                            <input id="more_r_comment{{$r_comment->comment_story_id}}" type="hidden" value=4>
                            <a onclick="get_rep_cmt({{$r_comment->comment_story_id}})" type="button" >Xem th&#1043;&#1028;m</a>
                        </div>
                        @if($comment->replay_comment->count() > 4)
                        <script>
                            $('.more_r_comment{{$r_comment->comment_story_id}}').css("display","flex");
                        </script>
                        @endif
                    </div>
                    @else
                    <div class="panel-footer ds-list-cmt{{$comment->id}}" style="padding: 5px 0px; display:none">
                        <ul class="list-group list-group-flush list-rep-cmt{{$comment->id}}">
                        </ul>
                        <div class="morecmt{{$comment->id}}"></div>
                    </div>
                    @endif
                </div>
            </div>
        </article>
    </li>
    @endforeach
</ul>
</div>
<div class="comment-paga" style="display: flex;justify-content: center;">
    <?php echo $comments->render(); ?>
</div>