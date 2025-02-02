@extends("app")

@section('title',"修改id为".$data->id."的帖子标签")

@section('content')
    <div class="col-md-12">
        <div class="card card-body" id="vue-topic-tag-edit">
            <h3 class="card-title">修改id为{{$data->id}}的帖子标签</h3>
            <form method="post" action="/admin/topic/tag/edit?Redirect=/admin/topic/tag/edit/{{$data->id}}" @@submit.prevent="submit" enctype="multipart/form-data">
                <x-csrf/>
                <div class="mb-3">
                    <label class="form-label">
                        名称
                    </label>
                    <input type="text" class="form-control" value="{{$data->name}}" name="name" v-model="name" required>
                </div>
                <div class="mb-3 row">
                    <div class="col-6">
                        <label class="form-label">
                            颜色
                        </label>
                        <input type="color" class="form-control form-control-color"  value="{{$data->color}}" name="color" v-model="color" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        图标
                    </label>
                    <a href="https://tabler-icons.io/">https://tabler-icons.io/</a>
                    <textarea name="icon" v-model="icon"  rows="10" class="form-control" required>{{$data->icon}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"> 哪个用户组可使用此标签? </label>
                    <div class="row">
                        @foreach($userClass as $value)
                            <div class="col-4">
                                <label class="form-check form-switch">
                                    <input name="userClass[]" @if(user_DeCheckClass($data,$value->name)) checked @endif value="{{$value['name']}}" class="form-check-input" type="checkbox">
                                    <span class="form-check-label">{{$value['name']}}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <small style="color:red">不选择则所有用户组都可用此标签</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">描述</label>
                    <textarea name="description" class="form-control" rows="4">{{$data->description}}</textarea>
                </div>
                <div class="mb-3">
                    <button name="id" value="{{$data->id}}" class="btn btn-primary">提交</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section("scripts")
    <script src="{{mix('plugins/Topic/js/tag.js')}}"></script>
@endsection
