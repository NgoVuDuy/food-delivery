<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

use Livewire\Attributes\Validate;
use Livewire\Attributes\Session;

class SignIn extends Component
{

    #[Validate('required')]

    public $phone_number;

    #[Validate('required|string|min:8|max:16|regex:/^[\w]+$/')]
    public $pwd;

    #[Session(key: 'user')]
    public $user;

    public $message = '';

    public function signin()
    {

        $this->validate();

        $user = Http::post(Component::$url . 'login', [
            "phone" => $this->phone_number,
            "password" => $this->pwd
        ])->json();

        if($user["message"] == "Success") {

            $this->user = $user["user"];

            $this->message = "Đăng nhập thành công";
        } else {
            $this->message = "Đăng nhập thất bại";
        }

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
        return view('livewire.sign-in');
    }
}
