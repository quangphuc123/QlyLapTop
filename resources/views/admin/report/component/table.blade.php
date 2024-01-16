     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th style="text-center">Tên</th>
                 <th class="text-center">Email</th>
                 <th class="text-center">Tiêu đề</th>
                 <th class="text-center">Nội dung</th>

             </tr>
         </thead>
         <tbody>
             @if (@isset($report_all) && is_object($report_all))
                 @foreach ($report_all as $val)
                     <tr>
                         <td>
                             <input type="checkbox" value="{{ $val->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td>
                             {{ $val->name }}
                         </td>
                         <td>
                             <div>
                                 {{ $val->email }}
                             </div>
                         </td>
                         <td>
                             <div>
                                 {{ $val->tieu_de_report }}
                             </div>
                         </td>
                         <td>
                             <div>
                                 {{ $val->noi_dung_report }}
                             </div>
                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
