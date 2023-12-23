     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th style="width: 50px;">Ảnh</th>
                 <th class="text-center">Tên ngôn ngữ</th>
                 <th class="text-center">Canonical</th>
                 <th class="text-center">Mô tả</th>
                 <th class="text-center">Trạng thái </th>
                 <th class="text-center">Tùy chỉnh </th>
             </tr>
         </thead>
         <tbody>
             @if (@isset($languages) && is_object($languages))
                 @foreach ($languages as $language)
                     <tr>
                         <td>
                             <input type="checkbox" value="{{ $language->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td>
                             <span class="image img-cover"><img src="{{ asset($language->image) }}" alt="không có ảnh"></span>
                         </td>
                         <td>
                             <div>
                                 {{ $language->name }}
                             </div>
                         </td>
                         <td>
                             <div>
                                 {{ $language->canonical }}
                             </div>
                         </td>
                         <td>
                             <div>
                                 {{ $language->description }}
                             </div>
                         </td>
                         <td class="text-center js-switch-{{ $language->id }}">
                             <input type="checkbox" value="{{ $language->publish }}" class="js-switch status"
                                 data-field="publish" data-model="{{ $config['model'] }}"
                                 {{ $language->publish == 2 ? 'checked' : ' ' }} data-modelId = "{{ $language->id }}" />
                         </td>
                         <td class="text-center">
                             <a href="{{ route('language.edit', $language->id) }}" class="btn btn-success"><i
                                     class="fa fa-edit"></i></a>
                             <a href="{{ route('language.delete', $language->id) }}" class="btn btn-danger"><i
                                     class="fa fa-trash"></i></a>
                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $languages->Links('pagination::bootstrap-4') }}
