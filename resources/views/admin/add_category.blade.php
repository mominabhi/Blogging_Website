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
        {!! Form::open(['url' => '/check_category','method'=>'post','class'=>'form-horizontal']) !!}

        {{--<form action="#" class="form-horizontal">--}}

            <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                    <input type="text" placeholder="Enter Category Name" class="input-xlarge" name="category_name"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Category Description</label>
                <div class="controls">
                    <textarea class="input-large" rows="3" name="category_description"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Category Status</label>
                <div class="controls">
                    <select class="input-large m-wrap" tabindex="1" name="category_status">
                        <option value="0">Select Status</option>
                        <option value="1">Publish</option>
                        <option value="2">Unpublish</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><i class="icon-ok"></i> Save</button>
                <button type="button" class="btn"><i class=" icon-remove"></i> Cancel</button>
            </div>
    {!! Form::close() !!}
        <!-- END FORM-->
    </div>
</div>
<!-- END SAMPLE FORM PORTLET-->
@endsection