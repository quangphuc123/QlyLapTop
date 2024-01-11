     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th class="text-center">Tên sản phẩm</th>
                 <th class="text-center">Số lượng</th>
                 <th class="text-center">Giá</th>
                 <th class="text-center">Tùy chỉnh </th>
             </tr>
         </thead>
         <tbody>
             {{-- @dd($orderdetails) --}}
             @if (@isset($orderdetails) && is_object($orderdetails))
                 @foreach ($orderdetails as $order)
                     <tr id="{{ $order->id }}">
                         <td>
                             <input type="checkbox" value="{{ $order->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td class="text-center">
                             {{ $order->product_id }}
                         </td>
                         <td class="text-center">
                             {{ $order->quantity }}
                         </td>
                         <td class="text-center">
                            {{ $order->price }}
                        </td>
                         <td class="text-center">
                             <a href="{{ route('order.detail.delete', $order->order_id) }}" class="btn btn-danger"><i
                                     class="fa fa-trash"></i></a>
                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $orderdetails->Links('pagination::bootstrap-4') }}
