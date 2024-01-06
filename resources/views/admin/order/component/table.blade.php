     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th class="text-center">Tên người đặt</th>
                 <th class="text-center">Địa chỉ</th>
                 <th class="text-center">Tài khoản</th>
                 <th class="text-center">Trạng thái đơn hàng </th>
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
                                         <span href="" class="main-title"> {{ $order->name }}
                                         </span>
                                     </div>
                                 </div>
                             </div>
                         </td>
                         <td class="text-center">
                             {{ $order->address }}
                         </td>
                         <td class="text-center">
                            {{ $order->user->name }}
                        </td>
                         <td class="text-center">
                             <input type="text" value="{{ $order->status }}">
                         </td>
                         <td class="text-center">
                             <a href="{{ route('order.delete', $order->id) }}" class="btn btn-danger"><i
                                     class="fa fa-trash"></i></a>
                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $orders->Links('pagination::bootstrap-4') }}
