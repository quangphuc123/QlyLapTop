     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th class="text-center">Tên quyền</th>
                 <th class="text-center">Canonical</th>
                 <th class="text-center">Tùy chỉnh </th>
             </tr>
         </thead>
         <tbody>
             @if (@isset($permissions) && is_object($permissions))
                 @foreach ($permissions as $permission)
                     <tr>
                         <td>
                             <input type="checkbox" value="{{ $permission->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td>
                             <div>
                                 {{ $permission->name }}
                             </div>
                         </td>
                         <td>
                             <div>
                                 {{ $permission->canonical }}
                             </div>
                         </td>
                         <td class="text-center">
                             <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-success"><i
                                     class="fa fa-edit"></i></a>
                             <a href="{{ route('permission.delete', $permission->id) }}" class="btn btn-danger"><i
                                     class="fa fa-trash"></i></a>
                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $permissions->Links('pagination::bootstrap-4') }}
