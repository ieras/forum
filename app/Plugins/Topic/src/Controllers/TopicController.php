<?php


namespace App\Plugins\Topic\src\Controllers;

use App\Plugins\Topic\src\Handler\Topic\CreateTopic;
use App\Plugins\Topic\src\Handler\Topic\CreateTopicView;
use App\Plugins\Topic\src\Models\Topic;
use App\Plugins\Topic\src\Requests\Topic\CreateTopicRequest;
use App\Plugins\User\src\Middleware\LoginMiddleware;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\Utils\Str;

#[Controller(prefix:"/topic")]
#[Middleware(\App\Plugins\User\src\Middleware\AuthMiddleware::class)]
class TopicController
{
    #[GetMapping(path: "create")]
    #[Middleware(LoginMiddleware::class)]
    public function create(){
        return (new CreateTopicView())->handler();
    }
    #[PostMapping(path: "create")]
    #[Middleware(LoginMiddleware::class)]
    public function create_post(CreateTopicRequest $request){
        return (new CreateTopic())->handler($request);
    }
}