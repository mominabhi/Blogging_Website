@extends ('admin/master')
@section('daseboard')
    <!-- BEGIN EXAMPLE TABLE widget-->

    <div class="widget purple">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Editable Table</h4>
            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
        </div>
        <div class="widget-body">
            <div>
                <div class="clearfix">
                    <div class="btn-group">
                        <button id="editable-sample_new" class="btn green">
                            Add New <i class="icon-plus"></i>
                        </button>
                    </div>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul>
                    </div>
                </div>
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                    <tr>
                        <th>Blog ID</th>
                        <th>Blog Name</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($post_data as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->post_title}}</td>
                        <td>{{$post->publication_status}}</td>
                        <td>

                            @if ( $post->publication_status== 1)
                                <a href="{{URL::to('/publish_blog/'.$post->id)}}">
                                    <button class="btn btn-success"><i class="material-icons" style="font-size:20px">thumb_up</i>
                                    </button>
                                </a>

                            @else
                                <a href="{{URL::to('/publish_blog/'.$post->id)}}">
                                    <button class="btn btn-warning"><i class="material-icons" style="font-size:20px">thumb_down</i>
                                    </button>
                                </a>

                            @endif
                            <a href="{{URL::to('/delete_blog/'.$post->id)}}" onclick=" return check_delete()">
                                <button class="btn btn-danger"><i class="material-icons" style="font-size:20px">delete_forever</i>
                                </button>
                            </a>
                            <a href="{{URL::to('/edit_blog/'.$post->id)}}">
                                <button class="btn btn-primary"><i class="material-icons" style="font-size:20px">edit</i>
                                </button>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<!-- END EXAMPLE TABLE widget-->