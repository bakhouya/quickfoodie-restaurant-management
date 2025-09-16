<?php

namespace App\Livewire\Auth;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash ;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Livewire\Component;
use App\Models\User;
class Login extends Component{

    public $data = [];

    public function login(){
        $this->validate() ;
        $this->ensureIsNotRateLimited() ;
        if (Auth::guard('web')->attempt(['email' => $this->data['email'], 'password' => $this->data['password']])) {
            $this->redirect(
                session('url.intended', RouteServiceProvider::HOME),
                navigate: true
            );
        } else {
            RateLimiter::clear($this->throttleKey()) ;
            $this->dispatch('alert' , type: 'error', message: __("app.success")); 
        }
    }
    protected function ensureIsNotRateLimited(){
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return ;
        }
        $seconds = RateLimiter::availableIn($this->throttleKey());
        throw ValidationException::withMessages([
            'data.email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
    protected function throttleKey(){
        return Str::transliterate(Str::lower($this->data['email']).'|'.request()->ip());
    }

    public function rules(){
        return [
            'data.email' => 'required|email',
            'data.password' => 'required',
        ];
    }
    // public function login(){
    //     $this->validate();
    //     $user = User::where('password', $this->password)->first();
    //     if ($user) {
    //         Auth::login($user);
    //         return redirect()->route('articles');
    //     }else{
    //         $this->dispatch('alert' , type: 'error', message: "This Email not exsists with Password"); 
    //     }
    // }
    public function render(){
        return view('livewire.auth.login');
    }
}
