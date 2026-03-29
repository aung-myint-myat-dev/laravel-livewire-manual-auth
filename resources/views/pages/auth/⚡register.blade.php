<?php

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

new class extends Component {
    public $name;
    public $email;
    public $password;
    public $confirm_password;

    public function register()
    {
        $data = $this->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $name = trim($data['name']);
        $email = trim(strtolower($data['email']));
        $hashPassword = Hash::make($data['password']);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $hashPassword,
        ]);

        $this->reset();
        auth()->login($user);
        $this->redirect(route('dashboard'), navigate: true);
    }
};
?>

<div class="flex flex-col justify-center items-center px-4">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-sm border border-gray-200 p-8 sm:p-10">

        <div class="mb-10 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                Register
            </h2>
            <p class="text-gray-500 mt-2">
                Create a new account.
            </p>
        </div>

        <form wire:submit="register" method="POST" class="space-y-6">
            @csrf
            @method('post')

            {{-- Name Input --}}
            <x-input :type="'name'" :model="'name'" :label="'Name'" :placeholder="'Your name'" />

            {{-- Email Input --}}
            <x-input :type="'email'" :model="'email'" :label="'Email'" :placeholder="'Your email'" />

            {{-- Password Input --}}
            <x-input :type="'password'" :model="'password'" :label="'Password'" :placeholder="'Your password'" />

            {{-- Confirm Password Input --}}
            <x-input :type="'password'" :model="'confirm_password'" :label="'Confirm Password'" :placeholder="'Confirm password'" />

            <button type="submit"
                class="w-full bg-gray-900 text-white font-bold py-3.5 rounded-xl hover:bg-black transform transition-active active:scale-[0.98] duration-200 shadow-lg shadow-gray-200">
                Register
            </button>
        </form>

        <p class="mt-8 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" wire:navigate class="font-bold text-gray-900 hover:underline">
                Login
            </a>
        </p>

    </div>
</div>
