<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

use Livewire\Attributes\Validate;
use Livewire\Attributes\Session;

class SignIn extends Component
{

    #[Validate('required|string|min:8|max:16|regex:/^(\+?\d{1,4}[-.\s]?)?(\d{8,15})$/')]
    public $phone_number;
    

    #[Validate('required|string|min:8|max:16|regex:/^[\w]+$/')]
    public $pwd;

    #[Session(key: 'user')]
    public $user; // Được xem là biến session

    public $message = '';
    public $is_success = null;

    public function signin()
    {

        $this->validate();

        $response = Http::post(Component::$url . 'login', [
            "phone" => $this->phone_number,
            "password" => $this->pwd
        ])->json();

        if($response["code"] == 1) {

            $this->user = $response["user"];
            $this->is_success = true;

        } else {
            $this->is_success = false;

        }
        $this->message = $response["message"];

        return $this->redirect('/home', navigate:true);

    }

    public function messages()
    {

        return [
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
        return view('livewire.sign-in');
    }
}
