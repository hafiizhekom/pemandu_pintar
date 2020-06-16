<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Validator;
use Closure;

class UpdateProfileMiddleware
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
            'id' => 'required|integer',
            'nama_lengkap' => 'required|string|max:100',
            'tanggal_lahir' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string|max:1',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:15',
            'email' => 'required|string|max:50',
            'role' => 'required|string|max:7',
            'image' => 'image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all());
        }

        return $next($request);
    }
}
