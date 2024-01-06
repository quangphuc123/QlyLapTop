     {{-- bảng Danh sách --}}
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>
                     <input type="checkbox" value="" id="checkAll" class="input-checkox">
                 </th>
                 <th class="text-center">Tiêu đề bài viết</th>
                 <th class="text-center">Trạng thái </th>
                 <th class="text-center">Tùy chỉnh </th>
             </tr>
         </thead>
         <tbody>
             @if (@isset($posts) && is_object($posts))
                 @foreach ($posts as $post)
                     <tr id="{{ $post->id }}">
                         <td>
                             <input type="checkbox" value="{{ $post->id }}" class="input-checkox checkBoxItem">
                         </td>
                         <td>
                             <div class="uk-flex uk-flex-middle">
                                 <div class="image">
                                     <div class="img-cover image-post">
                                        <img src="{{ $post->image }}" alt=""
                                             style="width: 100%;
                                             height: 100%;
                                             display: block;
                                             object-fit: cover;">
                                     </div>
                                 </div>
                                 <div class="main-info">
                                     <div class="name">
                                         <span href="" class="main-title"> {{ $post->name }}
                                         </span>
                                     </div>
                                     <div class="catalogue">
                                         <span class="text-danger">Nhóm hiển thị: </span>
                                         @foreach ($post->post_catalogues as $val)
                                             @foreach ($val->post_catalogue_language as $cat)
                                                 <a href="{{ route('post.index', ['post_catalogue_id' => $val->id]) }}"
                                                     title="">{{ $cat->name }}</a>
                                             @endforeach
                                         @endforeach
                                     </div>
                                 </div>
                             </div>
                         </td>
                         <td class="text-center js-switch-{{ $post->id }}">
                             <input type="checkbox" value="{{ $post->publish }}" class="js-switch status"
                                 data-field="publish" data-model="{{ $config['model'] }}"
                                 {{ $post->publish == 2 ? 'checked' : ' ' }} data-modelId = "{{ $post->id }}" />
                         </td>
                         <td class="text-center">
                             <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success"><i
                                     class="fa fa-edit"></i></a>
                             <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger"><i
                                     class="fa fa-trash"></i></a>
                         </td>
                     </tr>
                 @endforeach
             @endif
         </tbody>
     </table>
     {{ $posts->Links('pagination::bootstrap-4') }}
