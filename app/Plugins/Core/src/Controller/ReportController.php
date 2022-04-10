<?php

namespace App\Plugins\Core\src\Controller;

use App\Plugins\Core\src\Models\Report;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

#[Controller(prefix:"/report")]
class ReportController
{
    #[GetMapping(path:"")]
    public function index(){
        $page = Report::query()->orderBy("created_at","desc")->paginate(15);
        return view("App::report.index",['page' => $page]);
    }

    #[GetMapping(path:"{id}.html")]
    public function data($id){
        if(!Report::query()->where("id",$id)->exists()){
            return admin_abort("页面不存在",404);
        }
        $data = Report::query()->where("id",$id)->first();
        return view("App::report.data",['data' => $data]);
    }
}
