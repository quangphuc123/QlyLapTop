<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function postComment($id,CommentRequest $request){
        $comment=Comment::create([
            'user_id'=>(Auth::user()->id),
            'ho_ten'=>(Auth::user()->name),
            'product_id'=>($request->product_id),
            'noiDung'=>($request->noiDung)
        ]);
        if(!empty($comment)){
            return redirect('chi-tiet-san-pham/'.$request->product_id);
        }
        #Thông báo thêm không thành công
        return  redirect()->route('trang-chu');
    }

    public function deleteComment($id){
        $comment=Comment::find($id);
        $comment->delete();
        return back()->with('succes','Đã xóa bình luận');
    }
}
