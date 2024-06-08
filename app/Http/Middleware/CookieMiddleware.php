<?php

namespace App\Http\Middleware;

use App\Models\UserCookie;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
class CookieMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $getCookie = Cookie::get('cookie_id');
        if(!$getCookie){
            $cookie_id = Str::uuid();
            UserCookie::create([
                'cookie_id'=>$cookie_id,
            ]);
            Cookie::queue('cookie_id', $cookie_id,60*60*24);  

        }
        // // $checkIfCookieExist = UserCookie::where('cookie_id',$getCookie)->first();

        //     $ApiUrl = 'https://mustafa-gama.online/subscription/api/connect/api/key'; // Use 'https://api.coingate.com/v2/orders' for live environment

        //     $response = Http::withHeaders([
        //         'Accept' => 'application/json',
        //     ])->post($ApiUrl, [
        //         'enc_api_key'=> env('ENC_API_KEY'),
        //     ]);   

        //     if($response['status']){
        //     }else{
        //         return redirect()->to('https://mustafa-gama.online/subscription/check/api/key');
        //     } 
            return $next($request); 
            
            // return $next($request); 
    }
}
