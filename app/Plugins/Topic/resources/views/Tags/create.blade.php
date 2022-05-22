@extends("App::app")
@section('title',__("tag.create tag"))

@section('content')
    <div class="col-md-12">
        <div class="card card-body" id="vue-user-topic-tag-create">
            <h3 class="card-title">{{__("tag.create tag")}}</h3>
            <form method="post" action="/tags/create?Redirect=/tags/create" @@submit.prevent="submit" enctype="multipart/form-data">
                <x-csrf/>
                <div class="mb-3">
                    <label class="form-label">
                        {{__("app.name")}}
                    </label>
                    <input type="text" class="form-control" name="name" v-model="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        {{__("app.color")}}
                    </label>
                    <input type="color" class="form-control form-control-color" name="color" v-model="color" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        {{__("app.icon")}}
                    </label>
                    <input type="file" accept="image/gif, image/png, image/jpeg, image/jpg" class="form-control" name="icon" v-model="icon" required>
                </div>
                <div class="mb-3">
                    <label class="form-label"> {{__("tag.Which user group can use this label")}} </label>
                    <select class="form-select" name="userClass[]" multiple size="8">
                        @foreach($userClass as $value)
                            <option value="{{$value->name}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    <small style="color:red">{{__("tag.If not selected, this label is available to all user groups")}}</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{__("app.description")}}</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">{{__("app.submit")}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

