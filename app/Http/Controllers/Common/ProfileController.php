<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('common.profile.index', compact('user'));
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
        $user = auth()->user();
        return view('common.profile.edit', compact('user'));
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
        $user = User::find(auth()->user()->id);
        if($request->has('EditPasswordForm')) {

            $request->validate([
                'current_password' => ['required', new MatchOldPassword ],
                'new_password' => 'required',
                'confirm_password' => [ 'required', 'same:new_password' ]
            ]);

            $user->update(['password'=> Hash::make($request->new_password)]);

            toast('Password updated successfully!', 'success');

            return redirect()->route('profile.index');
        }

        $rules = [
            'name' => 'required',
            'mobile' => ['required','numeric','digits:10', Rule::unique('users')->ignore($user->id, 'id')],
            "image" => ['nullable', 'image','mimes:jpg,jpeg,png']
        ];

        if ($user->mobile !== $request->mobile) {
            $rules['mobile'][] = 'unique:users';
        }
        $request->validate($rules);

        $user->update($request->all());

        if ($request->has('image')) {
            if ($user->getFirstMedia('avatar')) {
                $user->getFirstMedia('avatar')->delete();
            }
            $user->addMedia($request->image)->toMediaCollection('avatar');
        }

        toast('Profile updated successfully!', 'success');

        return redirect()->route('profile.index');
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
