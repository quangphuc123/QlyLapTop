<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment_method(Request $request)
    {
        if (isset($_POST['payUrl'])) {
            $this->create_order($request);
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua ATM MoMo";
            $total = $request->total_cart;
            $amount = "$total";
            $orderId = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/cart";
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

            session()->forget('cart');
            $carts = session()->get(key: 'cart');

            return redirect($jsonResult['payUrl']);
        } elseif (isset($_POST['COD'])) {
            $this->create_order($request);
            session()->forget('cart');
            $carts = session()->get(key: 'cart');
            return redirect()->route('show.thanks')->with('success', 'Đặt hàng thành công');
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

    public function show_cam_on()
    {
        $carts = session()->get(key: 'cart');

        return view('user.checkout.show_hash_cash', compact('carts'));
    }
    private function create_order(Request $request)
    {
        $carts = session()->get(key: 'cart');
        $request->validate([
            'shipping_email',
            'shipping_name',
            'shipping_note',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
        ], [
            'shipping_address.required' => 'Vui lòng nhập địa chỉ',
            'shipping_phone.required' => 'Vui lòng nhập số điện thoại'
        ]);
        $data_shipping = $request->only(
            'shipping_email',
            'shipping_name',
            'shipping_note',
            'shipping_address',
            'shipping_phone',
        );

        $shipping = Shipping::create($data_shipping);
        $paymet = array();
        $paymet['payment_method'] = $request->payment_method;
        $paymet['payment_status'] = 'Chưa thanh toán';
        $paymets = Payment::create($paymet);
        $data_order = $request->only(
            'order_id',
            'payment_method',
        );
        $data_order['user_id'] = Auth::user()->id;
        $data_order['shipping_id'] = $shipping->id;
        $data_order['order_status'] = 'Đang xử lý';
        $data_order['payment_id'] = $paymets->id;
        $data_order['order_total'] = $request->total_cart;
        $order = Order::create($data_order);
        if ($order) {
            foreach ($carts as $id => $car) {
                $data1 = [
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'price' => $car['price'],
                    'product_name' => $car['name'],
                    'quantity' => $car['quantity'],
                ];
                OrderDetail::create($data1);
            }
        }
    }
}
