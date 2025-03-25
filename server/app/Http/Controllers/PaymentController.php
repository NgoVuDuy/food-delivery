<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $amount = $request->query('amount');
        // $ipAddr = $request->query('ipaddr');
        $data = $request->all();
        //
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.callback');
        $vnp_TmnCode = "J7EZUWZ1"; //Mã website tại VNPAY 
        $vnp_HashSecret = "2GT1GOM5TWXFHD5ZSA813GY01XVV7R4E"; //Chuỗi bí mật

        $vnp_TxnRef = time(); // Mã giao dịch là thời gian hiện tại
        $vnp_OrderInfo = 'Thanh toán đơn hàng VND\'s Pizzeria '; // Nội dung chuyển khoản
        $vnp_OrderType = 'Food'; // Danh mục hàng hóa
        $vnp_Amount = $data['amount'] * 100; // Số tiền cần thanh toán
        $vnp_Locale = 'vn'; // Ngôn ngữ hiển thị trên giao diện
        $vnp_BankCode = 'VNBANK'; // Phương thức thanh toán bằng tài khoản ngân hàng
        $vnp_IpAddr = $data['ipaddr']; // Địa chỉ ip của khách hàng thực hiện giao dịch
        // $desc = $data['desc']; // Địa chỉ ip của khách hàng thực hiện giao dịch



        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            // "desc" => $desc,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";

        foreach ($inputData as $key => $value) {
            
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );

        return response()->json($returnData);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
