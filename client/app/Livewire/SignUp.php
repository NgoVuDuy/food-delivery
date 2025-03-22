<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Validate;

class SignUp extends Component
{

    #[Validate('required|string|min:8|max:16')]
    public $name = '';

    #[Validate('required|string|min:8|max:16|regex:/^(\+?\d{1,4}[-.\s]?)?(\d{8,15})$/|')]
    public $phone_number = '';
    

    #[Validate('required|string|min:8|max:16|regex:/^[\w]+$/')]
    public $pwd = '';

    public $message = '';
    public $is_success = null;

    public function signup()
    {
        $this->validate();

        $message = Http::post(Component::$url . 'users', [
            'name' => $this->name,
            'phone' => $this->phone_number,
            'password' => $this->pwd,
            'created_at' => now(),
            'updated_at' => now()
        ])->json();


        // $this->reset('name');
        // $this->reset('phone_number');
        // $this->reset('pwd');
        if($message["code"] == 1) {

            $this->is_success = true;
        } else {
            $this->is_success = false;

        }

        $this->message = $message["message"];

    }

    public function messages()
    {

        return [
            'name.required' => 'Vui lòng nhập tên người dùng.',
            'name.min' => 'Độ dài phải từ 8 đến 16 ký tự.',
            'name.max' => 'Độ dài phải từ 8 đến 16 ký tự.',

            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'phone_number.regex' => 'Số điện thoại không đúng định dạng.',
            'phone_number.min' => 'Độ dài phải từ 8 đến 16 ký tự.',
            'phone_number.max' => 'Độ dài phải từ 8 đến 16 ký tự.',

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
