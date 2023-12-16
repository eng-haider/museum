<?php

namespace App\Http\Middleware;
use Exception;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        // return $next($request);
        
            $headers = apache_request_headers();
	    $headers_new = [];
    foreach ($headers as $key => $val) {
       $headers_new[ucfirst($key)] = $val;
    }
        $request->headers->set('Authorization','Bearer '.$headers_new['Authorizations']);
        
        
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
        }
        catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
               
                return response()->json([
                    'success' => false,
                    'Data' => 'Token is Invalid'
                ], 400);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
          
                return response()->json([
                    'success' => false,
                    'Data' => 'Token is Expired'
                ], 400);
            }else{
               
                return response()->json([
                    'success' => false,
                    'Data' => 'Authorization Token not found'
                ], 400);
            }
        }

        
return $next($request);

        // if(Auth::user()->user_type=='admin'  || Auth::user()->user_type=='author')
        // {
        //     return $next($request);
        // }
        // else
        // {
            return response()->json([
                'success' => false,
                'Data' => 'Authorization Vaild It Only  To Owner'
            ], 400);

        // }
        

//         // return $next($request);
//         $headers = apache_request_headers();
//         $request->headers->set('Authorization','Bearer '.$headers['authorizations']

//         );


//         $role;
//         $roles=[
//             'admin'=>[3],
//             'owner'=>[2],
//             'client'=>[1],
//             'operation'=>[4]
//         ];

//         $rolesId=$roles[$role] ?? [];
//         try {

//             if (JWTAuth::check()) {
//                 throw new Exception('User Not Found');
//             }


// // return JWTAuth::parseToken()->authenticate()->role_id;
// //         if (JWTAuth::parseToken()->authenticate()->status_id ==2) {
// //             return response()->json([
// //                 'sucess' => false,
// //                 'data' => 'Unactive User',
// //             ], 401);
// //         }


//             // if(!in_array(JWTAuth::parseToken()->authenticate()->role_id,$rolesId))
//             // {
//             //           return response()->json([
//             //             'sucess' => false,
//             //             'data' => 'Unauthorized Permission',
//             //         ], 400);
//             // }


//             DB::commit();
//             return $next($request);


//         } catch (Exception $e) {


//             if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
//                 return response()->json([
//                     'sucess' => false,
//                     'data' => 'Token Invalid',
//                 ], 402);
//             } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {

//                 return response()->json([
//                     'sucess' => false,
//                     'data' => 'Token Expired',
//                 ], 401);
//             } else {
//                 if ($e->getMessage() === 'User Not Found') {

//                     return response()->json([
//                         'sucess' => false,
//                         'data' => 'User Not Found',
//                     ], 402);
//                 }elseif($e->getMessage() === 'Unauthorized Permission'){
//                     return response()->json([
//                         'sucess' => false,
//                         'data' => 'Unauthorized Permission',
//                     ], 402);
//                 }
//                 else
//                 {
//                     return response()->json([
//                         'sucess' => false,
//                         'data' => $e->getMessage(),
//                     ], 402);

//                 };
//             }
//         }
    }
}
