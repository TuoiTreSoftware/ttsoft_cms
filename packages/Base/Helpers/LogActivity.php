<?php


namespace TTSoft\Base\Helpers;
use Request;
use TTSoft\Base\Entities\LogActivity as LogActivityModel;
use Illuminate\Support\Facades\Route;

class LogActivity
{
    public static function addToLog()
    {
        $params = str_replace(['https://','http://'], '', Request::fullUrl());
        $params = explode('/', $params);
        $subject = [
            'route' => Route::getCurrentRoute()->getName(),
            'controller' => Route::getCurrentRoute()->getActionName(),
        ];
    	$log = [];
    	$log['subject'] = json_encode($subject);
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : 1;
    	LogActivityModel::create($log);
    }
    public static function logActivityLists()
    {
    	return LogActivityModel::latest()->get();
    }
}