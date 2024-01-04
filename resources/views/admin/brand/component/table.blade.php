     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th class="text-center">Tên loại thương hiệu</th>
                 <th class="text-center">Mô tả loại thương hiệu</th>
                 <th class="text-center">Tùy chỉnh </th>
             </tr>
         </thead>
         <tbody>
             @if (@isset($brands) && is_object($brands))
                 @foreach ($brands as $brand)
                     <tr>
                         <td>
                             <input type="checkbox" value="{{ $brand->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td>
                             <div class="info-item name">
                                 {{ $brand->name }}
                             </div>
                         </td>
                         <td>
                             <div class="info-item name">
                                 {{ $brand->description }}
                             </div>
                         </td>
                         <td class="text-center">
                            <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                            <a href="{{ route('brand.delete', $brand->id) }}"
                                class="btn btn-danger"><i class="fa fa-trash"></i></a>

                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $brands->Links('pagination::bootstrap-4') }}
