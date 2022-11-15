<?php
/*
    ____Get_______________________
    search_string - (String) Строка поиска
    domain_url - (String) Домен на который отправить запрос
*/

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller{
    public function search(Request $request){
        $result = [];
        $serchString = $request['search_string'];
        $urlDomain = $request['domain_url']; //Домен из гет параметра

        if($serchString && $urlDomain){
            $httpUrl = 'https://'.$urlDomain.'/'; //Формируем https url
            $searchFileName = 'searchcode.php'; //Название файла для поиска
            $result['info_servers']['status'] = 'success';
            if (@get_headers($httpUrl)) { //Проверяем доступен ли домен
                $responses = Http::get($httpUrl.$searchFileName, [ //Получаем данные от сервера
                    'action' => 'search',
                    'search_string' => $serchString,
                ]);
                $result['info_servers']['domain'] = $urlDomain;
                $result['info_servers']['code'] = $responses->status();
                if($responses->status() === 200){ //Если сервер отдал ответ 200
                    $result['response'] =  json_decode($responses->body());
                } else {
                    $result['info_servers']['status'] = 'error';
                    $result['info_servers']['message'] = 'Server returns '.$responses->status().' response code';
                }
            } else {
                $result['info_servers']['status'] = 'error';
                $result['info_servers']['message'] = 'Domain not found';
                $result['response'] = [];
            }

        } else {
            $result['info_servers']['status'] = 'error';
            $result['info_servers']['message'] = "Required parameters not passed. Pass two get parameters: search_string, domain_url";
            $result['response'] = [];
        }


        return response(json_encode($result))->header('Content-Type', 'application/json');;
    }
}
