<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminId;
use App\Models\Category;
use App\Models\Users_Job;
use Auth;

class AdminInfo extends Controller
{
    public function fileUpload(Request $request)
    {
        $path = $request->file('image')->store('uploads', 'public');
        
        $user_email = auth()->user()->email;
        $user_name = auth()->user()->name;
        $user_id = auth()->user()->id;
        
        $work = new Users_Job();
        $work->customer_id = $user_id;
        $work->customer_name = $user_name;
        $work->customer_email = $user_email;
        $work->name = $request->input('name');
        $work->description = $request->input('description');
        $work->category = $request->input('category');
        $work->max_prise = $request->input('max_prise');
        $work->status = 'Новая';
        $work->image = $path;
        
        $work->image_gotovo = 'null';
        
        $work->save();
        return view('home', ['path' => $path]);
   }
    public function worksAdminChenge($id, Request $request)
    {
        
        $role = auth()->user()->role;
        $user_id = auth()->user()->id;
        if ($role == 'admin')
        {
        $work = Users_Job::find($id);
        $id = $request->input('id');
        $w1 = $work->status;
        if ($w1=='Услуга оказана' ||$w1=='Обработка данных'){
            
        $works = new Users_Job();
        return view('worksAdmin', ['works' => $works->orderBy('id', 'desc')->get()])->with('error', 'Нельзя изменить');
        }
        $work->id = $request->input('id');
        $work->status = $request->input('status');
        $work_status = $request->input('status');
        if ($work_status == 'Услуга оказана'){
            $path = $request->file('image')->store('uploads', 'public');
            $work->image_gotovo = $path;
        }
        $work->save();
        
        $works = new Users_Job();
        return view('worksAdmin', ['works' => $works->orderBy('id', 'desc')->get()]);
        }
        else 
        {
            
            return redirect()->route('welcome')->with('error', 'Вы не администратор');
        }
    }
    
    public function workDelete($id) 
    {
        $user_id = auth()->user()->id;
        $work = Users_Job::find($id);
        
        if ($work->customer_id == $user_id)
        {
            $work->delete();
            return redirect()->route('zakaz-info')->with('success', 'Задание удалено успешно');
        } else {
            return view('zakazInfo', ['works' => $works->where('customer_id', '=', $user_id)->get()], ['cat' => $cat->orderBy('id', 'asc')->get()]);
        }
        
//        $validation = $req->validate([
//           'title' => 'required' 
//        ]);
    }
    public function zakazInfo(){
        $user_id = auth()->user()->id;
        $cat = new Category();
        $works = new Users_Job();
//        return view('work', ['works' => $works->orderBy('id', 'desc')->get()]);
//        return view('work', ['works' => $works->orderBy('id', 'desc')->take(50)->get()]);
//        return view('work', ['works' => $works->orderBy('id', 'desc')->skip(50)->take(50)->get()]);
        return view('zakazInfo', ['works' => $works->where('customer_id', '=', $user_id)->get()], ['cat' => $cat->orderBy('id', 'asc')->get()]);
    }
    public function cp($id){
        $user_id = auth()->user()->id;
        $works = new Users_Job();
        $work_work = $works->where('customer_id', '=', $user_id)->where('status', '=', 'Новая')->count();
        $work_work2 = $works->where('customer_id', '=', $user_id)->where('status', '=', 'Обработка данных')->count();
        $work_work = $work_work + $work_work2;
        return view('user', ['end_work' => $works->where('customer_id', '=', $user_id)->where('status', '=', 'Услуга оказана')->count()], ['you_work' => $works->where('customer_id', '=', $user_id)->count()]);
        
    }
    public function welcomeInfo(){
        $cat = new Category();
        $works = new Users_Job();
//        return view('work', ['works' => $works->orderBy('id', 'desc')->get()]);
//        return view('work', ['works' => $works->orderBy('id', 'desc')->take(50)->get()]);
//        return view('work', ['works' => $works->orderBy('id', 'desc')->skip(50)->take(50)->get()]);
        return view('welcome', ['works' => $works->where('status', '=', 'Услуга оказана')->take(4)->get()], ['col' => $works->where('status', '=', 'Услуга оказана')->count()]);
    }
    public function info($id){
        $works = new Users_Job;
         return view('info', ['works' => $works->where('id', '=', $id)->get()]);
    }
    public function workInfo($id){
        $user_id = auth()->user()->id;
        $cat = new Category();
        $works = new Users_Job();
        if ($id == 'Все'){
        return view('zakazInfo', ['works' => $works->where('customer_id', '=', $user_id)->get()], ['cat' => $cat->orderBy('id', 'asc')->get()]);
        } else {
//        return view('work', ['works' => $works->orderBy('id', 'desc')->get()]);
//        return view('work', ['works' => $works->orderBy('id', 'desc')->take(50)->get()]);
//        return view('work', ['works' => $works->orderBy('id', 'desc')->skip(50)->take(50)->get()]);
        return view('zakazInfo', ['works' => $works->where([
  ['customer_id', '=', $user_id],
  ['status', '=', $id],
])->get()], ['cat' => $cat->orderBy('id', 'asc')->get()]);
            }
    }
    public function adminInfo() 
    {
        $role = auth()->user()->role;
        $user_id = auth()->user()->id;
        if ($role == 'admin')
        {
//            return view('workEdit', ['works' => $find]);
            return view('adminCreateCategory'); //adminCreateCategoty
        }
        else 
        {
            
            return redirect()->route('welcome')->with('error', 'Вы не администратор');
        }
        
//        $validation = $req->validate([
//           'title' => 'required' 
//        ]);
    }
    public function CreateWorkCat()
    {
        
        $works = new Category();
        return view('zakaz', ['works' => $works->orderBy('id', 'desc')->get()]);
    }
    public function worksAdmin()
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->role;
        if ($role == 'admin')
        {
        
        $works = new Users_Job();
        return view('worksAdmin', ['works' => $works->orderBy('id', 'desc')->get()]);
        }
        else 
        {
            
            return redirect()->route('welcome')->with('error', 'Вы не администратор');
        }
    }
    public function adminInfoDelete() 
    {
        $role = auth()->user()->role;
        $user_id = auth()->user()->id;
        if ($role == 'admin')
        {
//            return view('workEdit', ['works' => $find]);
            return view('adminCreateDelete'); //adminCreateCategoty
        }
        else 
        {
            
            return redirect()->route('welcome')->with('error', 'Вы не администратор');
        }
        
//        $validation = $req->validate([
//           'title' => 'required' 
//        ]);
    }
    public function adminCreateCategory(Request $req) {

        
        $role = auth()->user()->role;
        $user_id = auth()->user()->id;
        if ($role == 'admin')
        {
            $cat = new Category();
            $cat->category = $req->category;

            $cat->save();
            return redirect()->route('adminCreateCategoty')->with('success', 'Категория создана');
        }
        else 
        {
            return redirect()->route('welcome')->with('error', 'Вы не администратор');
        }
        
    }
    
    public function adminDeleteCategory($id) {

        $role = auth()->user()->role;
        $user_id = auth()->user()->id;
        if ($role == 'admin')
        {
            $cat = Category::find($id);
            $cat2 = $cat->category;
            $cat->delete();
            $cat1 = new Users_Job;
            $cat1 = $cat1->where('category', '=', $cat2);
            $cat1->delete();
            return redirect()->route('home')->with('error', 'Категория удалена');
        } 
        else
        {
            return redirect()->route('welcome')->with('error', 'Вы не администратор');
        }
    }
    public function adminDeleteInfo() {

        $cat = new Category();
        return view('adminCreateDelete', ['adminCreateDelete' => $cat->orderBy('id', 'asc')->get()]);
//        return view('work', ['works' => $works->orderBy('id', 'desc')->take(50)->get()]);
//        return view('work', ['works' => $works->orderBy('id', 'desc')->skip(50)->take(50)->get()]);
//        return view('work', ['works' => $works->where('section', '=', 'Разработка сайтов')->get()]);
        
        
    }
}
