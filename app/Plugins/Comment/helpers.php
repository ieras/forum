<?php

use App\Plugins\Comment\src\Model\TopicComment;

if(!function_exists("get_topic_comment_page")){
	/**
	 * 获取评论所在的页码
	 * @param int $comment_id
	 * @return int
	 */
	function get_topic_comment_page(int $comment_id): int
	{
		if(!\App\Plugins\Comment\src\Model\TopicComment::query()->where('id',$comment_id)->exists()){
			return 1;
		}
		// 所在帖子ID
		$topic_id = \App\Plugins\Comment\src\Model\TopicComment::query()->where('id',$comment_id)->value('topic_id');
		// 每页加载的评论数量
		$comment_num = get_options("comment_page_count",15);
		$inPage=1;
		// 获取最后一页页码
		$lastPage = TopicComment::query()
			->where(['status' => 'publish','topic_id'=>$topic_id])
			->paginate($comment_num)->lastPage();
		for($i = 0; $i < $lastPage; $i++){
			$page = $i+1;
			$data = TopicComment::query()
				->where(['status' => 'publish','topic_id'=>$topic_id])
				->with("topic","user","parent")
				->orderBy("optimal","desc")
				->orderBy("likes","desc")
				->paginate($comment_num,['*'],'page',$page)->items();
			foreach($data as $value){
				if((int)$value->id===(int)$comment_id){
					$inPage=$page;
				}
			}
		}
		return $inPage;
	}
}