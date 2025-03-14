<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Validate;

class SignUp extends Component
{

    #[Validate('required|string|min:8|max:16|regex:/^[\w]+$/|unique:users,name')]
    public $name;

    #[Validate('required')]
    public $phone_number;

    #[Validate('required|string|min:8|max:16|regex:/^[\w]+$/')]
    public $pwd;

    public function signup()
    {
        $this->validate();

        $user = Http::post(Component::$url . 'users', [
            'name' => $this->name,
            'phone' => $this->phone_number,
            'password' => $this->pwd,
            'created_at' => now(),
            'updated_at' => now()
        ])->json();

        dd($user);

    }

    public function messages()
    {

        return [
            'name.unique' => 'Tên người dùng đã tồn tại.',
            'name.required' => 'Vui lòng nhập tên người dùng.',
            'name.min' => 'Độ dài phải từ 8 đến 16 ký tự.',
            'name.max' => 'Độ dài phải từ 8 đến 16 ký tự.',
            'name.regex' => 'Tên người dùng không được chứa ký tự đặc biệt hoặc khoảng trắng.',

            'pwd.required' => 'Vui lòng nhập mật khẩu.',    
            'pwd.min' => 'Độ dài phải từ 8 đến 16 ký tự.',
            'pwd.max' => 'Độ dài phải từ 8 đến 16 ký tự.',
            'pwd.regex' => 'Mật khẩu không được chứa ký tự đặc biệt hoặc khoảng trắng.',
        ];
    }

    public function render()
    {
        return view('livewire.sign-up');
    }
}
