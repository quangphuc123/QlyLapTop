     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th class="text-center">Tên khách hàng</th>
                 <th class="text-center">Số điện thoại</th>
                 <th class="text-center">Email</th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td class="text-center">
                     {{ $user->name }}
                 </td>
                 <td class="text-center">
                     {{ $user->phone }}
                 </td>
                 <td class="text-center">
                     {{ $user->email }}
                 </td>
             </tr>
         </tbody>
     </table>
     <br>
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th class="text-center">Tên người vận chuyển</th>
                 <th class="text-center">Số điện thoại</th>
                 <th class="text-center">Địa Chỉ</th>
                 <th class="text-center">Ghi Chú</th>
                 <th class="text-center">Email</th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td>{{ $shipping->shipping_name }}</td>
                 <td>{{ $shipping->shipping_phone }}</td>
                 <td>{{ $shipping->shipping_address }}</td>
                 <td>{{ $shipping->shipping_note }}</td>
                 <td>{{ $shipping->shipping_email }}</td>
             </tr>
         </tbody>
     </table>
     <br>
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th class="text-center">Tên sản phẩm</th>
                 <th class="text-center">Số lượng</th>
                 <th class="text-center">Giá</th>
                 <th class="text-center">Tổng Tiền</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($order_de as $key => $val)
                 <tr>
                     <td>{{ $val->product_name }}</td>
                     <td>{{ $val->quantity }}</td>
                     <td>{{ number_format($val->price, 0, ',', '.') }} đ</td>
                     <td>{{ number_format($val->quantity * $val->price, 0, ',', '.') }} đ</td>
                 </tr>
             @endforeach
         </tbody>
     </table>
