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

                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_category as $category_row)
                        <tr class="">
                            <td>{{$category_row->id}}</td>
                            <td>{{$category_row->Category_name}}</td>
                            <td>{{$category_row->Category_Description}}</td>
                            <td>{{$category_row->Category_Status}}</td>
                            <td>

                                @if ($category_row->Category_Status == 1)
                                    <a href="{{URL::to('/publish_category/'.$category_row->id)}}">
                                        <button class="btn btn-success"><i class="material-icons" style="font-size:20px">thumb_up</i>
                                        </button>
                                    </a>

                                @else
                                    <a href="{{URL::to('/publish_category/'.$category_row->id)}}">
                                        <button class="btn btn-warning"><i class="material-icons" style="font-size:20px">thumb_down</i>
                                        </button>
                                    </a>

                                @endif
                                    <a href="{{URL::to('/delete_category/'.$category_row->id)}}">
                                    <button class="btn btn-danger"><i class="material-icons" style="font-size:20px">delete_forever</i>
                                    </button>
                                </a>
                                    <a href="{{URL::to('/edit_category/'.$category_row->id)}}">
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