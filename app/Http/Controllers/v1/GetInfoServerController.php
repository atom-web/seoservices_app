<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetInfoServerController extends Controller{
    public function get_info(Request $request){
//        $result = $request;
//        $urlDomain = $request['domain_url']; //Домен из гет параметра
//
//        $httpUrl = 'https://'.$urlDomain.'/'; //Формируем https url
//        $searchFileName = 'searchcode.php'; //Название файла для поиска
//        $post = Http::post($httpUrl.$searchFileName, [ //Получаем данные от сервера
//            'action' => 'get_status',
//        ]);
//        $getResponsesLink = [
//            'https://codeviews.ru/searchcode.php?action=get_status',
//            'https://codeviews.ru/searchcode.php?action=get_status',
//            'https://codeviews.ru/searchcode.php?action=get_status',
//        ];
 //       $responses = Http::pool(fn (Pool $pool) => [
 //           $pool->get('https://codeviews.ru/searchcode.php?action=get_status')
 //       ]);
//        return $responses;
    }
}
