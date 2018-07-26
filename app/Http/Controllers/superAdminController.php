<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class superAdminController extends Controller
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
    public function admin_login()
    {


        if(!Session::get('id'))
        {
            return view("admin.login");
        }
        else
        {
            return Redirect::to('/master');
        }

    }
    public function admin_master(Request $request)
    {

        $email=$request->admin_email;
        $pass=$request->password;

//        echo $email.'<br>'.$pass;
        $result= DB::table('admin')
            ->where('email',$email)
            ->where('password',md5($pass))
            ->first();

//        echo "<pre>";print_r($result);

        //exit();

        if($result)
        {
            Session::put('name',$result->name);
            Session::put('id',$result->id);

            return Redirect::to('/master')->send();

        }
        else
        {
            Session::put('exception','Email or password is invalid');
            return Redirect::to('/login');
        }

    }
    public function loadMaster()
    {
        if(Session::get('id'))
        {
            $daseboard=view('admin.daseboard');
            return view("admin.master")
                ->with('daseboard',$daseboard);
        }
        else
        {
            return Redirect::to('/login');
        }

    }

    public function admin_logout()
    {
        Session::put('id','');
        return Redirect::to('/login')->send();
    }

    public function add_Category()
    {
        $add_category=view('admin.add_category');
        return view('admin.master')
            ->with('add_category',$add_category);
    }
    public function check_cetegory(Request $request)
    {
        $data=array();
        $data['Category_name']=$request->category_name;
        $data['Category_Description']=$request->category_description;
        $data['Category_Status']=$request->category_status;
        DB::table('category')
            ->insert($data);
        Session::put('message','Category Information Added Successfully!');
        return Redirect::to('add_category');
    }
    public function manage_category()
    {

        $all_category=DB::table('category')
            ->get();

        return view('admin.manage_category')
            ->with('all_category',$all_category);
    }
    public function add_blog()
    {
        return view('admin.add_blog');
    }
    public function check_blog(Request $request_blog)
    {


//        File/image Upload
        $files=$request_blog->file('post_image');
        $file_name=$files->getClientOriginalName();
        $directory= 'public/image/post_image/';
        $change_name=date('dmy').'_'.date('His').$file_name;
        $files->move($directory,$change_name);
        $image_url=$directory.$change_name;
//       End Image

        $data=array();
        $data['post_title']=$request_blog->post_title;
        $data['category_name']=$request_blog->category_name;
        $data['post_image']=$image_url;
        $data['short_description']=$request_blog->short_description;
        $data['long_description']=$request_blog->long_description;
        $data['author_name']=$request_blog->author_name;
        $data['publication_status']=$request_blog->publication_status;
        $data['read_count']=1;
        DB::table('post')
            ->insert($data);
        Session::put('message','Post Information Added Successfully!');
        return Redirect::to('add_blog');
    }

    public function publish_category($id)
    {
        $result=DB::table('category')
            ->where('id',$id)
            ->first();

        $category_status=$result->Category_Status;
        if($category_status==1)
        {
            $category_status=2;
        }
        else
        {
            $category_status=1;
        }

        $result=DB::table('category')
            ->where('id',$id)
            ->update(['Category_Status'=>$category_status]);
       return Redirect::to('manage_category');
    }
    public function delete_category($id)
    {
        $result=DB::table('category')
            ->where('id',$id)
            ->delete();
        return Redirect::to('manage_category');
    }
    public function edit_category($id)
    {
        $result=DB::table('category')
            ->where('id',$id)
            ->first();

        return view('admin.edit_category')
            ->with('edited_value',$result);
    }
    public function update_category(Request $request)
    {
        $data=array();
        $data['Category_name']=$request->category_name;
        $data['Category_Description']=$request->category_description;
        DB::table('category')
            ->where('id',$request->category_id)
            ->update($data);
        return Redirect::to('manage_category');


    }
    public function manage_blog()
    {
        $result=DB::table('post')
            ->get();
        return view('admin.manage_blog')
            ->with('post_data',$result);
    }

    public function publish_blog($id)
    {
        $result=DB::table('post')
            ->where('id',$id)
            ->first();

        $publication_status=$result->publication_status;
        if($publication_status==1)
        {
            $publication_status=2;
        }
        else
        {
            $publication_status=1;
        }

        $result=DB::table('post')
            ->where('id',$id)
            ->update(['publication_status'=>$publication_status]);
        return Redirect::to('manage_blog');

    }
    public function delete_blog($id)
    {

        $result=DB::table('post')
            ->where('id',$id)
            ->delete();
        return Redirect::to('manage_blog');
    }
    public function edit_blog($id)
    {
        $result=DB::table('post')
            ->where('id',$id)
            ->first();

        return view('admin.edit_blog')
            ->with('edited_value',$result);
    }
    public function update_blog(Request $request_blog)
    {
        if($_FILES['post_image']['name']=='')
        {
            $image_url=$request_blog->default_post_image;

        }
        else{
            $files=$request_blog->file('post_image');
            $file_name=$files->getClientOriginalName();
            $directory= 'public/image/post_image/';
            $change_name=date('dmy').'_'.date('His').$file_name;
            $files->move($directory,$change_name);
            $image_url=$directory.$change_name;
//       End Image
        }


        $data=array();
        $data['post_title']=$request_blog->post_title;
        $data['category_name']=$request_blog->category_name;
        $data['post_image']=$image_url;
        $data['short_description']=$request_blog->short_description;
        $data['long_description']=$request_blog->long_description;
        $data['author_name']=$request_blog->author_name;
        $data['publication_status']=$request_blog->publication_status;

        DB::table('post')
            ->where('id',$request_blog->post_id)
            ->update($data);
        return Redirect::to('manage_blog');


    }
}

