     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th class="text-center">Tên loại sản phẩm</th>
                 <th class="text-center">Mô tả loại sản phẩm</th>
                 <th class="text-center">Tùy chỉnh </th>
             </tr>
         </thead>
         <tbody>
             @if (@isset($productCatalogues) && is_object($productCatalogues))
                 @foreach ($productCatalogues as $productCatalogue)
                     <tr>
                         <td>
                             <input type="checkbox" value="{{ $productCatalogue->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td>
                             <div class="info-item name">
                                 {{ $productCatalogue->name }}
                             </div>
                         </td>
                         <td>
                             <div class="info-item name">
                                 {{ $productCatalogue->description }}
                             </div>
                         </td>
                         <td class="text-center">
                            <a href="{{ route('product.catalogue.edit', $productCatalogue->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                            <a href="{{ route('product.catalogue.delete', $productCatalogue->id) }}"
                                class="btn btn-danger"><i class="fa fa-trash"></i></a>

                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $productCatalogues->Links('pagination::bootstrap-4') }}
