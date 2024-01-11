<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment_method(Request $request)
    {
        $payment_method = $request->payment_method;
        $payment_name = $request->redirect;
        $payment_name1 = $request->payUrl;
        if ($payment_method == 1 && $payment_name == "vnpay") {
            $this->create_payment($request);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            session()->flush('cart');
            $carts = session()->get(key: 'cart');
            $vnp_Returnurl = "http://127.0.0.1:8000/thanh-toan";
            $vnp_TmnCode = "PVFRY0FG"; //Mã website tại VNPAY
            $vnp_HashSecret = "ZZEKHACYBSPXBGTWBDSGCILRHXSGIZHH"; //Chuỗi bí mật
            $vnp_TxnRef = rand(0, 9999999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh Toán HandSome Store";
            $vnp_OrderType = "billpayment";
            $total = $request->total_cart;
            $vnp_Amount = $total * 100;
            $vnp_Locale = "vn";
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
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
                "vnp_TxnRef" => $vnp_TxnRef
            );
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
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
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url,
            );
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        } elseif ($payment_method == 2 && $payment_name1 == "momo") {
            $this->create_payment($request);
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua ATM MoMo";
            $total = $request->total_cart;
            $amount = "$total";
            $orderId = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/thanh-toan";
            $ipnUrl = "http://127.0.0.1:8000/thanh-toan";
            $extraData = "";
            $requestId = time() . "";
            $requestType = "payWithATM";
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json
            session()->flush('cart');
            $carts = session()->get(key: 'cart');
            return redirect()->to($jsonResult['payUrl']);
        }
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function checkOut()
    {
        $carts = session()->get(key: 'cart');
        if ($carts != []) {
            return view('user.auth.check-out', compact('carts'));
        } else {
            return back()->with('error', 'Giỏ hàng của bạn đang rỗng');
        }
    }


    private function create_payment(Request $request)
    {
        $carts = session()->get(key: 'cart');
        $request->validate([
            'name',
            'email',
            'phone',
            'address',
        ]);
        $paymet = array();
        $paymet['payment_method'] = $request->payment_method;
        $paymet['status'] = 'Đang chờ xử lý';
        $paymets = Payment::create($paymet);
        $data = $request->only(
            'name',
            'email',
            'phone',
            'address',
            'order_id',
            'payment_method',
        );
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'Đang chờ xử lý';
        $data['payment_id'] = $paymets->id;
        $data['total'] = $request->total_cart;
        $order = Order::create($data);
        if ($order) {
            foreach ($carts as $id => $car) {
                $data1 = [
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'price' => $car['price'],
                    'name' => $car['name'],
                    'quantity' => $car['quantity'],
                ];
                OrderDetail::create($data1);
            }
        }
    }
}
