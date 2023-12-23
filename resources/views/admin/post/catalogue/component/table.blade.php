     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th class="text-center">Tên nhóm</th>
                 <th class="text-center">Trạng thái </th>
                 <th class="text-center">Tùy chỉnh </th>
             </tr>
         </thead>
         <tbody>
             @if (@isset($postCatalogues) && is_object($postCatalogues))
                 @foreach ($postCatalogues as $postCatalogue)
                     <tr>
                         <td>
                             <input type="checkbox" value="{{ $postCatalogue->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td>
                             <div>
                                 {{ str_repeat('|-----', (($postCatalogue->level > 0)? ($postCatalogue->level -1):0)).$postCatalogue->name }}
                             </div>
                         </td>
                         <td class="text-center js-switch-{{ $postCatalogue->id }}">
                             <input type="checkbox" value="{{ $postCatalogue->publish }}" class="js-switch status"
                                 data-field="publish" data-model="{{ $config['model'] }}"
                                 {{ $postCatalogue->publish == 2 ? 'checked' : ' ' }}
                                 data-modelId = "{{ $postCatalogue->id }}" />
                         </td>
                         <td class="text-center">
                             <a href="{{ route('post.catalogue.edit', $postCatalogue->id) }}" class="btn btn-success"><i
                                     class="fa fa-edit"></i></a>
                             <a href="{{ route('post.catalogue.delete', $postCatalogue->id) }}"
                                 class="btn btn-danger"><i class="fa fa-trash"></i></a>
                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $postCatalogues->Links('pagination::bootstrap-4') }}
