<?php

namespace App\Http\Controllers;
use App\Http\Requests\Users\UpdatePrifileRquest;
use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    public function index()
    {
      return view('users.index')->with('users', User::all());
    }
    public function edit()
    {
      return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdatePrifileRquest $request)
    {
      $user = auth()->user();

      $user->update([
        'name' => $request->name,
        'about' => $request->about
      ]);

      session()->flash('success', 'User updated successfully.');

      return redirect()->back();
    }
    public function makeAdmin(User $user)
    {
      $user->role = 'admin';

      $user->save();

      session()->flash('success', 'User made admin successfully.');

      return redirect(route('users.index'));
    }
    public function makeTeacher(User $user)
    {
      $user->role = 'teacher';

      $user->save();

      session()->flash('success', 'User made teacher successfully.');

      return redirect(route('users.index'));
    }

   public function notifications()
    {
      //dd(auth()->user()->unreadNotifications);
      auth()->user()->unreadNotifications->markAsRead();

      // display all notifications

      return view('users.notifications', [
        'notifications' => auth()->user()->notifications()->paginate(5)
      ]);
    }
}
