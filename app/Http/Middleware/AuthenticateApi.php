<?php

namespace App\Http\Middleware;


use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateApi extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    protected function authenticate($request, array $guards)
    {
        //3. Через заголовок Authorization: Bearer ......
        $token = $request->bearerToken();

        //Сравниваем токен с тем, что хранится в наших настройках. Здесь можно заменить логику на свою. Например сделать поиск токена в базе
        if ($token === config('apitokens')[0]) {
            return 200;
        } else {
            //В случае неуспеха, вызываем метод сообщающий о статусе "Неавторизован"
            $this->unauthenticated($request, $guards);
        }
    }
}
