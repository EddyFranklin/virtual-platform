<?php

namespace Muserpol\Http\Middleware\RetirementFundMiddleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\DB;

class Archivo
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
        if(Auth::check())
        {
            $user = Auth::user();
            $rolUser = DB::table('role_user')->where('user_id','=',$user->id)->first();
            $user_rol = $rolUser->role_id;

            switch ($user_rol) {
                 case '9':
                    # code...
                    return redirect('t_tesoreria_route');
                    break;
                case '8':
                    # code...
                    return redirect('b_presupuesto_route');
                    break;
                case '7':
                    return redirect('a_contabilidad_route');
                    break;

                case '17':
                    # code...
                    return redirect('j_juridica_route');
                    break;

                case '16':
                    return redirect('l_prestamo_route');
                    break;

                case '15':
                     # code...
                     return $next($request);
                     break;

                case '14':
                    return redirect('rf_legal_route');
                    break;

                case '13':
                    return redirect('rf_calificacion_route');
                    break;

                case '12':
                    return redirect('rf_aprobacion_route');
                    break;

                case '11':
                    return redirect('rf_revision_route');
                    break;

                case '10':
                    return redirect('rf_recepcion_route');
                    break;

                case '6': 
                    return redirect('legal_route');
                    break;
                
                case '5':
                   
                    return redirect('aprobacion_route');
                    break;

                case '4':
                    return redirect('calificacion_route');
                    break;    

                case '3':
                    return redirect('revision_route');
                    break;

                case '2':
                    # code...
                    return redirect('recepcion_route');
                    break;
                    
                case '1':
                    return redirect('admin');
                    break;

                default:
                    # code...
                    return redirect('home');
                    break;
            }
        }
        else{
            return redirect('Login');
        }
    }
}
