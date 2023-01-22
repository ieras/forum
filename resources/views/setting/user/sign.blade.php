<div class="card card-body">
    <div class="row">
        <div class="col-lg-3">
            <label class="form-label">注册默认用户组</label>
            <select class="form-select" v-model="data.core_user_reg_defuc">
                @foreach(plugins_core_user_reg_defuc() as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
            <small>默认选择id为1的用户组</small>
        </div>

        <div class="col-lg-3">
            <label class="form-label">注册开关</label>
            <select class="form-select" v-model="data.core_user_reg_switch">
                <option value="开启">开启</option>
                <option value="关闭">关闭</option>
            </select>
            <small>默认:开启</small>
        </div>

        <div class="col-lg-3">
            <label class="form-label">注册验证码</label>
            <select class="form-select" v-model="data.core_user_reg_captcha">
                <option value="开启">开启</option>
                <option value="关闭">关闭</option>
            </select>
            <small>默认:开启</small>
        </div>

        <div class="col-lg-3">
            <label class="form-label">登陆验证码</label>
            <select class="form-select" v-model="data.core_user_login_captcha">
                <option value="开启">开启</option>
                <option value="关闭">关闭</option>
            </select>
            <small>默认:开启</small>
        </div>

        <div class="col-lg-3">
            <label class="form-label">邀请码注册</label>
            <select class="form-select" v-model="data.core_user_reg_yaoqing">
                <option value="开启">开启</option>
                <option value="关闭">关闭</option>
            </select>
            <small>默认:关闭</small>
        </div>

        <div class="col-lg-3">
            <label class="form-label">邀请码获取链接</label>
            <input type="text" v-model="data.core_user_reg_yaoqing_url" class="form-control">
            <small>不写则不显示</small>
        </div>
        <div class="col-lg-3">
            <label class="form-label">第三方登陆方式</label>
            <select class="form-select" v-model="data.core_user_otlogin">
                <option value="开启">开启</option>
                <option value="关闭">关闭</option>
            </select>
            <small>默认:开启</small>
        </div>

        {{--        <div class="mb-3">--}}
        {{--            <label class="form-label">指定时间内可注册</label>--}}
        {{--            <select class="form-select" v-model="data.core_user_reg_time">--}}
        {{--                <option value="开启">开启</option>--}}
        {{--                <option value="关闭">关闭</option>--}}
        {{--            </select>--}}
        {{--            <small>默认:关闭</small>--}}
        {{--        </div>--}}

        {{--        <div class="mb-3">--}}
        {{--            <label class="form-label">注册开始时间</label>--}}
        {{--            <input v-model="data.core_user_reg_time_start" min="0" type="number" class="form-control">--}}
        {{--            <small>默认:07, 也就是每天早上7点后开放注册</small>--}}
        {{--        </div>--}}

        {{--        <div class="mb-3">--}}
        {{--            <label class="form-label">注册结束时间</label>--}}
        {{--            <input v-model="data.core_user_reg_time_end" max="24" type="number" class="form-control">--}}
        {{--            <small>默认:22, 也就是每晚10点后关闭注册</small>--}}
        {{--        </div>--}}
    </div>

</div>