@extends ('admin/master')
@section('daseboard')
    <!-- BEGIN SAMPLE FORMPORTLET-->
    <div class="widget green">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Form Layouts</h4>
            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
        </div>
        <div class="widget-body">
            <h3 align="center" style="color: green">
                <?php

                $msg = Session::get('message');
                if ($msg) {
                    echo $msg;
                    Session::put('message', '');
                }


                ?>
            </h3>
            <!-- BEGIN FORM-->
            {!! Form::open(['url' => '/update_blog','method'=>'post','enctype'=>'multipart/form-data','name'=>'edit_blog','class'=>'form-horizontal']) !!}
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <input type="hidden" placeholder="Enter Post Title" class="input-xlarge" name="post_id" value="{{$edited_value->id}}"/>
                    <input type="hidden" placeholder="Enter Post Title" class="input-xlarge" name="default_post_image" value="{{$edited_value->post_image}}"/>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Post Title</label>
                <div class="controls">
                    <input type="text" placeholder="Enter Post Title" class="input-xlarge" name="post_title" value="{{$edited_value->post_title}}"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                    <select class="input-large m-wrap" tabindex="1" name="category_name">
                        {{--<option value="{{$edited_value->category_name}}">{{$edited_value->category_name}}</option>
--}}
                        <?php
                        $all_category_only = DB::table('category')
                            ->get();
                        foreach ($all_category_only as $category)
                        {
                        ?>
                        <option value="{{$category->id}}">{{$category->Category_name}}</option>
                        <?php
                        }
                        ?>


                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Post Image</label>
                <div class="controls">
                    <input onchange="loadFile(event)"type="file" name="post_image" id="fileToUpload">
                    <img id="output" height="100px" width="100px" src="{{asset($edited_value->post_image)}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Short Description</label>
                <div class="controls">
                    <textarea class="input-large" rows="3" name="short_description" >{{$edited_value->short_description}}</textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Long Description</label>
                <div class="controls">
                    <textarea class="input-xxlarge" rows="3" name="long_description">{{$edited_value->long_description}}</textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Author name</label>
                <div class="controls">
                    <select class="input-large m-wrap" tabindex="1" name="author_name">
                        <option value="{{Session::get('name')}}">{{Session::get('name')}}</option>
                        <option value="guest_{{Session::get('id')}}">As Guest</option>

                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Publication Status</label>
                <div class="controls">
                    <select class="input-large m-wrap" tabindex="1" name="publication_status">
                        {{--publication_status--}}
                        <option value="0">Select Status</option>
                        <option value="1">Publish</option>
                        <option value="2">Unpublish</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><i class="icon-ok"></i>Update</button>
                <button type="button" class="btn"><i class=" icon-remove"></i> Cancel</button>
            </div>
        {!! Form::close() !!}
        <!-- END FORM-->
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
    <script type="text/javascript" >
        document.forms['edit_blog'].elements['category_name'].value='<?php echo $edited_value->category_name?>';
        document.forms['edit_blog'].elements['publication_status'].value='<?php echo $edited_value->publication_status?>';
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection