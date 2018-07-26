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

                $msg=Session::get('message');
                if($msg)
                {
                    echo $msg;
                    Session::put('message','');
                }


                ?>
            </h3>
            <!-- BEGIN FORM-->
            {!! Form::open(['url' => '/update_category','method'=>'post','name'=>'edit_form','class'=>'form-horizontal']) !!}

            {{--<form action="#" class="form-horizontal">--}}
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <input type="hidden" placeholder="Enter Category Name" class="input-xlarge" name="category_id", value="{{$edited_value->id}}"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                    <input type="text" placeholder="Enter Category Name" class="input-xlarge" name="category_name", value="{{$edited_value->Category_name}}"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Category Description</label>
                <div class="controls">
                    <textarea class="input-large" rows="3" name="category_description">{{$edited_value->Category_Description}}</textarea>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><i class="icon-ok"></i>Edit</button>
                <button type="button" class="btn"><i class=" icon-remove"></i> Cancel</button>
            </div>
        {!! Form::close() !!}
        <!-- END FORM-->
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->

@endsection