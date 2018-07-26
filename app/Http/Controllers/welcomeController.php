<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class welcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function loadHome()
    {
        $blog_post=DB::table('post')
            ->where('publication_status',1)
            ->orderBy('id','desc')
            ->get();
        $postPage=view('pages.post')
                    ->with('blog_post_info',$blog_post);
        return view('home')
            ->with('postPage',$postPage);
    }
    public function portfolio()
    {
        $portfolio=view('pages.portfolio');
        return view('home')
            ->with('portfolio',$portfolio);
    }
    public function contact()
    {
        return view('pages.contact');

    }
    public function category_post_show($category_id)
    {

        $blog_post=DB::table('post')
            ->where('publication_status',1)
            ->where('category_name',$category_id)
            ->orderBy('id','desc')
            ->get();
        $postPage=view('pages.post')
            ->with('blog_post_info',$blog_post);
        return view('home')
            ->with('postPage',$postPage);

    }
    public function popular_post()
    {
        $popular=DB::table('post')
        ->where('publication_status',1)
        ->orderBy('read_count','desc')
        ->get();
        $postPage=view('pages.post')
            ->with('blog_post_info',$popular);
        return view('home')
            ->with('postPage',$postPage);
    }
    public function post_detail($id)
    {

        $post_detail=DB::table('post')
            ->where('id',$id)
            ->first();
        $read_count=$post_detail->read_count;
        $read_count++;
        DB::table('post')
            ->where('id',$id)
            ->update(['read_count'=>$read_count]);
        $post_detail=DB::table('post')
            ->where('id',$id)
            ->first();
        $comment=DB::table('comments')
            ->where('post_id',$id)
            ->get();
        $count=DB::table('comments')
            ->where('post_id',$id)
            ->count('post_id');
        return view('pages.post_detail')
            ->with('post_detail',$post_detail)
            ->with('comments',$comment)
            ->with('count',$count);
    }
    public function comment_info(Request $request)
    {
            $data=array();
            $data['post_id']=$request->post_id;
            $data['user_name']=$request->name;
            $data['user_email']=$request->email;
            $data['user_comment']=$request->comment;
            DB::table('comments')
                ->insert($data);
        return Redirect::to('post_detail/'.$request->post_id);


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
