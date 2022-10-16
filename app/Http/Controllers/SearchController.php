<?php
/*
    ____Get_______________________
    search_string - (String) Строка поиска
    domain_url - (String) Домен на который отправить запрос
*/

namespace App\Http\Controllers;

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
            if (@get_headers($httpUrl)) { //Проверяем доступен ли домен
                $post = Http::get($httpUrl.$searchFileName, [ //Получаем данные от сервена
                    'action' => 'search',
                    'search_string' => $serchString,
                ]);
                if($post->status() === 200){ //Если сервер отдал ответ 200

                    $result['response_searchcode'] =  json_decode($post->body());
                    $result['info']['error'] = false;
                } else {
                    $result['info']['error'] = true;
                    $result['info']['message'] = "Сервер отдает статус ".$post->status();
                }
                $result['info']['code_response'] = $post->status();
            } else {
                $result['info']['error'] = true;
                $result['info']['message'] = "Домен введен не верно, либо не существует";
            }
            
        } else {
            $result['info']['error'] = true;
            $result['info']['message'] = "Не переданы нужные поля";
        }
        

        return response(json_encode($result))->header('Content-Type', 'application/json');;
    }
}