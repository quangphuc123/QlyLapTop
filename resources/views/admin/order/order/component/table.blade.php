     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th class="text-center">Tên người đặt</th>
                 <th class="text-center">Địa chỉ</th>
                 <th class="text-center">Email</th>
                 <th class="text-center">Trạng thái đơn hàng </th>
                 <th class="text-center">Trạng thái thanh toán </th>
                 <th class="text-center">Tổng tiền</th>
                 <th class="text-center">Tùy chỉnh </th>
             </tr>
         </thead>
         <tbody>
             @if (@isset($orders) && is_object($orders))
                 @foreach ($orders as $order)
                     <tr id="{{ $order->id }}">
                         <td>
                             <input type="checkbox" value="{{ $order->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td>
                             <div class="uk-flex uk-flex-middle">

                                 <div class="main-info">
                                     <div class="name">
                                         <span href="" class="main-title"> {{ $order->user->name }}
                                         </span>
                                     </div>
                                 </div>
                             </div>
                         </td>
                         <td class="text-center">
                             {{ $order->shipping->shipping_address }}
                         </td>
                         <td class="text-center">
                             {{ $order->shipping->shipping_email }}
                         </td>
                         <form action="{{ route('order.update', $order->id) }}" method="POST">
                             @csrf
                             <td class="text-center">
                                 <select name="order_status" class="form-control">
                                     @if ($order->order_status == 'Đang xử lý')
                                         {
                                         <option value="{{ $order->order_status }}">
                                             {{ $order->order_status }}</option>
                                         <option value="Đơn hàng đã được nhận">Đơn hàng đã được nhận</option>
                                         <option value="Đơn hàng đã bị hủy">Đơn hàng đã bị hủy</option>
                                         <option value="Đơn hàng đang được vận chuyển">Đơn hàng đang được vận chuyển
                                         </option>

                                         }
                                     @elseif($order->order_status == 'Đơn hàng đã được nhận')
                                         {
                                         <option value="{{ $order->order_status }}">
                                             {{ $order->order_status }}</option>
                                         </option>
                                         }
                                     @elseif($order->order_status == 'Đơn hàng đã bị hủy')
                                         {
                                         <option value="{{ $order->order_status }}">
                                             {{ $order->order_status }}</option>
                                         <option value="Đơn hàng đang được vận chuyển">Đơn hàng đang được vận chuyển
                                         </option>
                                         <option value="Đơn hàng đã được nhận">Đơn hàng đã được nhận</option>
                                         }
                                     @else{
                                         <option value="{{ $order->order_status }}">
                                             {{ $order->order_status }}</option>
                                         <option value="Đơn hàng đã được nhận">Đơn hàng đã được nhận</option>
                                         }
                                     @endif
                                 </select>
                             </td>
                             <td class="text-center">
                                 <select name="payment_status" class="form-control">
                                     @if ($order->payment->payment_status == 'Chưa thanh toán')
                                         {
                                         <option value="{{ $order->payment->payment_status }}">
                                             {{ $order->payment->payment_status }}</option>
                                         <option value="Đã được thanh toán">Đã được thanh toán</option>

                                         }
                                     @else
                                         {
                                         <option value="{{ $order->payment->payment_status }}">
                                             {{ $order->payment->payment_status }}</option>

                                         }
                                     @endif
                                 </select>
                             </td>
                             <td class="text-center">
                                 {{ number_format($order->order_total) }} đ
                             </td>
                             <td class="text-center">
                                 <a href="{{ route('order.detail.index', $order->id) }}" class="btn btn-success"><i
                                         class="fa fa-eye"></i></a>
                                 <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                                 <a href="{{ route('order.delete', $order->id) }}" class="btn btn-danger"><i
                                         class="fa fa-trash"></i></a>
                             </td>
                         </form>

                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $orders->Links('pagination::bootstrap-4') }}
