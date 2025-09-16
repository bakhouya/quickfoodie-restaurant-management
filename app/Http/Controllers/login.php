namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Login extends Component
{
    public $secret_code;

    protected $rules = [
        'secret_code' => 'required|string|exists:users,secret_code',
    ];

    public function login()
    {
        $this->validate();

        $user = User::where('secret_code', $this->secret_code)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        session()->flash('error', 'الكود السري غير صحيح');
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app');
    }
}


