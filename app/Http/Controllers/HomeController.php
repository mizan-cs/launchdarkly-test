<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use LaunchDarkly\LDClient;
use LaunchDarkly\LDUser;


class HomeController extends Controller
{
    public function test() {
        return view('test');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feature = 'Feature';
        if (Auth::check()) {
            $user = Auth::user();
            $client = new LDClient(env('LAUNCH_DARKLY_SDK_KEY'));

            $lUser = new LDUser($user->email);

            if ($client->variation('show-home-page', $lUser)) {
                $feature = 'Feature X';
            } else {
                $feature = 'Feature Y';
            }
        }

        return Inertia::render('Welcome', [
            'canLogin'          => Route::has('login'),
            'canRegister'       => Route::has('register'),
            'laravelVersion'    => Application::VERSION,
            'phpVersion'        => PHP_VERSION,
            'feature'           => $feature
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
