<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Validator;
use Closure;

class PemanduanStoreMiddleware
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

        $validator = Validator::make($request->all(), [
            'pendakian' => 'required|integer',
            'harga' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all());
        }

        return $next($request);
    }
}
