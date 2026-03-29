<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;



new #[Layout('layouts::app')] #[Title('Login')] class extends Component {
    public $email;
    public $password;
    public $remember_token = null;

    public function login()
    {
        $data = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($data, $this->remember_token)) {
            request()->session()->regenerate();

            $this->redirect(route('dashboard'), navigate: true);
        }

        $this->reset('password');

        $this->addError('email', 'Your credentials are not match!');
    }
};
?>

<div class="flex flex-col justify-center items-center px-4">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-sm border border-gray-200 p-8 sm:p-10">

        <div class="mb-10 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                Login
            </h2>
            <p class="text-gray-500 mt-2">
                Login to your account
            </p>
        </div>

        <form wire:submit="login" method="POST" class="space-y-6">
            @csrf
            @method('post')

            {{-- Email Input --}}
            <x-input :type="'email'" :model="'email'" :label="'Email'" :placeholder="'Your email'" />

            {{-- Password Input --}}
            <x-input :type="'password'" :model="'password'" :label="'Password'" :placeholder="'Your password'" />

            <div class="flex items-center">
                <input wire:model="remember_token" type="checkbox" id="remember"
                    class="w-4 h-4 text-gray-900 border-gray-300 rounded focus:ring-gray-900">
                <label for="remember" class="ml-2 text-sm text-gray-600">
                    မမေ့နိုင်တဲ့ကောင်ကြီး လို့မှတ်ထားပါ
                </label>
            </div>

            <button type="submit"
                class="w-full bg-gray-900 text-white font-bold py-3.5 rounded-xl hover:bg-black transform transition-active active:scale-[0.98] duration-200 shadow-lg shadow-gray-200">
                Login
            </button>
        </form>

        <p class="mt-8 text-center text-sm text-gray-600">
            You don't have account?
            <a href="{{ route('register') }}" wire:navigate class="font-bold text-gray-900 hover:underline">
                Create account
            </a>
        </p>
    </div>
</div>
