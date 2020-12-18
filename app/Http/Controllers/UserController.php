<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateProfileSettingRequest;

class UserController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileSettingRequest $request, User $user)
    {
        $user->hide_viewed_posts = $request->hide_viewed_posts;
        $user->save();

        return redirect()->back()->with('status', 'Профиль обновлен');
    }
}
