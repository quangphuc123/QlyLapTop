     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th class="text-center">Họ tên</th>
                 <th class="text-center">Email</th>
                 <th class="text-center">Số điện thoại</th>
                 <th class="text-center">Địa Chỉ</th>
                 <th class="text-center">Tình trạng</th>
                 <th class="text-center">Tùy chỉnh</th>
             </tr>
         </thead>
         <tbody>
             @if (@isset($users) && is_object($users))
                 @foreach ($users as $user)
                     <tr>
                         <td>
                             <input type="checkbox" value="{{ $user->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td>
                             <div class="info-item name">
                                 {{ $user->name }}
                             </div>
                         </td>
                         <td>
                             <div class="info-item email">
                                 {{ $user->email }}
                             </div>
                         </td>
                         <td>
                             <div class="info-item phone">
                                 {{ $user->phone }}
                             </div>
                         </td>
                         <td>
                             <div class="address-item address">
                                 {{ $user->address }}
                             </div>

                         </td>
                         <td class="text-center js-switch-{{ $user->id }}">
                             <input type="checkbox" value="{{ $user->publish }}"
                             class="js-switch status"
                                 data-field="publish"
                                 data-model="User" {{ $user->publish == 2 ? 'checked' : ' ' }}
                                 data-modelId = "{{ $user->id }}" />
                         </td>
                         <td class="text-center">
                             <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success"><i
                                     class="fa fa-edit"></i></a>
                             <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger"><i
                                     class="fa fa-trash"></i></a>
                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $users->Links('pagination::bootstrap-4') }}
