<?php

namespace App\Http\Controllers\Backend;

use App\Models\CommentPost;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentPostController extends Controller
{
    public function postComment($id, CommentRequest $request)
    {
        $comment = CommentPost::create([
            'user_id' => (Auth::user()->id),
            'ho_ten' => (Auth::user()->name),
            'post_id' => ($request->post_id),
            'noiDung' => ($request->noiDung)
        ]);
        if (!empty($comment)) {
            return redirect('chi-tiet-bai-viet/' . $request->post_id);
        }
        #Thông báo thêm không thành công
        return  redirect()->route('trang-chu');
    }
    public function deleteComment($id){
        $comment=CommentPost::find($id);
        $comment->delete();
        return back()->with('succes','Đã xóa bình luận');
    }
}
