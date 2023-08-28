<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use App\Models\Mitra;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {

        if(empty(auth()->user()->id)){
            $status = null;
            $nama_toko = null;
            $mitra_id = null;
        }else{
            $id = auth()->user()->id;
            $status = Mitra::where('user_id', $id)->pluck('status_mitra')->first();
            $nama_toko = Mitra::where('user_id', $id)->pluck('nama_usaha')->first();
            $mitra_id = Mitra::where('user_id', $id)->pluck('id')->first();
        }
      

        return array_merge(parent::share($request), [
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'error' => fn () => $request->session()->get('error')
            ],
            'status_mitra' => $status,
            'nama_toko'=>$nama_toko,
            'mitra_id'=>$mitra_id
        ]);
    }
}
