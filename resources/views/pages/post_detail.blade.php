@extends('home')
@section('post_section')
    <div class="post_content">

        <?php
        function checkMonth($month_id)
        {
            $month_name = 'null';
            if ($month_id == 1) {
                $month_name = "Jan";
            } elseif ($month_id == 2) {
                $month_name = "Feb";
            } elseif ($month_id == 3) {
                $month_name = "Mar";
            } elseif ($month_id == 4) {
                $month_name = "Apr";
            } elseif ($month_id == 5) {
                $month_name = "May";
            } elseif ($month_id == 6) {
                $month_name = "Jun";
            } elseif ($month_id == 7) {
                $month_name = "July";
            } elseif ($month_id == 8) {
                $month_name = "Aug";
            } elseif ($month_id == 9) {
                $month_name = "Sept";
            } elseif ($month_id == 10) {
                $month_name = "Oct";
            } elseif ($month_id == 11) {
                $month_name = "Nov";
            } elseif ($month_id == 12) {
                $month_name = "Dec";
            }
            return $month_name;
        }
        ?>


        <?php
        $date = $post_detail->created_at;
        //echo "<h3>$date</h3>";
        $date2 = explode('-', $date);
        //echo $date;
        //                echo '<pre>';
        //        print_r($date2);
        //echo $date[1];
        //echo $date2[1];

        $day = explode(' ', $date2[2]);
        //        print_r($day);
        $day = $day[0];

        $month_name = checkMonth($date2[1]);
        //print_r($month);


        ?>
        <div class="post_section">
            <div class="post_date">
                {{$day}} <span>{{$month_name}}</span>
            </div>
        </div>
        <h2>{{$post_detail->post_title}}</h2>
        <h6>View:{{$post_detail->read_count}}</h6>
        <p>Author name:<span>{{$post_detail->author_name}}</span></p>
        <a href="#"><img src="{{asset($post_detail->post_image)}}" alt="Templates"/></a>
        <p style="color: #8d1b0f">{{$post_detail->short_description}}</p>
        <p>{{$post_detail->long_description}}</p>
        <div class="comment_tab">
           {{$count}} Comments
        </div>
        <?php

        ?>


        <div id="comment_section">
            <ol class="comments first_level">

                @if($comments)
                @foreach($comments as $comment)
                <li>
                    <div class="comment_box commentbox1">

                        <div class="gravatar">
                            <img src="{{asset('public/assets')}}/images/avator.png" alt="author 6"/>
                        </div>

                        <div class="comment_text">
                            <div class="comment_author">{{$comment->user_name}} <span
                                        class="date">{{$comment->created_at}}</span></div>
                            <p>{{$comment->user_comment}}</p>
                            <div class="reply"><a href="#comment_form">Reply</a></div>
                        </div>
                        <div class="cleaner"></div>
                    </div>

                </li>
                @endforeach
                @else
                @endif
            </ol>
        </div>

        <div id="comment_form">
            <h3>Leave a comment</h3>

            {!! Form::open(['url' => '/comment_info','method'=>'post','enctype'=>'multipart/form-data','name'=>'comment','class'=>'form-horizontal']) !!}
            <div class="form_row">
                <label>Name ( Required )</label><br/>
                <input type="text" name="name"/>
                <input type="hidden" name="post_id" value="{{$post_detail->id}}"/>
            </div>
            <div class="form_row">
                <label>Email (Required, will not be published)</label><br/>
                <input type="text" name="email"/>
            </div>
            <div class="form_row">
                <label>Your comment</label><br/>
                <textarea name="comment" rows="" cols=""></textarea>
            </div>

            <input type="submit" name="Submit" value="Submit" class="submit_btn"/>
            {!! Form::close() !!}


        </div>

    </div>
@endsection