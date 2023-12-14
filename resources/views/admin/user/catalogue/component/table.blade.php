     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th class="text-center">Tên nhóm tài khoản</th>
                 <th class="text-center">Tổng số tài khoản</th>
                 <th class="text-center">Mô tả chức năng nhóm tài khoản</th>
                 <th class="text-center">Trạng thái </th>
                 <th class="text-center">Tùy chỉnh </th>
             </tr>
         </thead>
         <tbody>
             @if (@isset($userCatalogues) && is_object($userCatalogues))
                 @foreach ($userCatalogues as $userCatalogue)
                     <tr>
                         <td>
                             <input type="checkbox" value="{{ $userCatalogue->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td>
                             <div class="info-item name">
                                 {{ $userCatalogue->name }}
                             </div>
                         </td>
                         <td>
                            <div class="text-center">
                                {{ $userCatalogue->users_count }} tài khoản
                            </div>
                        </td>
                         <td>
                             <div class="info-item name">
                                 {{ $userCatalogue->description }}
                             </div>
                         </td>
                         <td class="text-center js-switch-{{ $userCatalogue->id }}">
                             <input type="checkbox" value="{{ $userCatalogue->publish }}" class="js-switch status"
                                 data-field="publish" data-model="UserCatalogue"
                                 {{ $userCatalogue->publish == 2 ? 'checked' : ' ' }}
                                 data-modelId = "{{ $userCatalogue->id }}" />
                         </td>
                         <td class="text-center">
                             <a href="{{ route('user.catalogue.edit', $userCatalogue->id) }}" class="btn btn-success"><i
                                     class="fa fa-edit"></i></a>
                             <a href="{{ route('user.catalogue.delete', $userCatalogue->id) }}"
                                 class="btn btn-danger"><i class="fa fa-trash"></i></a>
                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $userCatalogues->Links('pagination::bootstrap-4') }}
