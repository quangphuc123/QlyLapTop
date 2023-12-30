     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th class="text-center">Tên sản phẩm</th>
                 <th class="text-center">Loại sản phẩm</th>
                 <th class="text-center">Giá sản phẩm</th>
                 <th class="text-center">Giá khuyến mãi</th>
                 <th class="text-center">Mã sản phẩm</th>
                 <th class="text-center">Tùy chỉnh</th>
             </tr>
         </thead>
         <tbody>
             @if (@isset($products) && is_object($products))
                 @foreach ($products as $product)
                     <tr>
                         <td>
                             <input type="checkbox" value="{{ $product->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td>
                            <div class="text-center">
                                {{ $product->name }}
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                {{ $product->product_catalogues->name }}
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                {{ $product->price }} Đ
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                {{ $product->sale_price }} Đ
                            </div>
                        </td>
                        <td>
                            <div>
                                {!! DNS1D::getBarcodeHTML("$product->product_code ",'PHARMA') !!}
                                HS - {{ $product->product_code  }}
                            </div>
                        </td>
                         <td class="text-center">
                             <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success"><i
                                     class="fa fa-edit"></i></a>
                             <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger"><i
                                     class="fa fa-trash"></i></a>
                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $products->Links('pagination::bootstrap-4') }}
