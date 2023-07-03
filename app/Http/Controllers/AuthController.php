<?php

namespace App\Http\Controllers;

use App\Models\FrontUser;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    private $frontUser;
    private $user;
    private $users;

    public function index($id = null)
    {
        if ($id)
        {
            Session::put('blog_id', $id);
        }
        return view('auth.user-login');
    }

    public function register()
    {
        return view('auth.user-register');
    }

    public function newRegister(Request $request)
    {
        if ($request->password == $request->confirm_password)
        {
            $this->frontUser = new FrontUser();
            $this->frontUser->name = $request->name;
            $this->frontUser->email = $request->email;
            $this->frontUser->password = bcrypt($request->password);
            $this->frontUser->save();

            Session::put('user_id', $this->frontUser->id);
            Session::put('user_name', $this->frontUser->name);

            return redirect('/blog-detail/'.Session::get('blog_id'));
        }
        else
        {
            return redirect()->back()->with('message', 'Sorry...password & confirm password not same.');
        }


    }

    public function newLogin(Request $request)
    {
        $this->user = FrontUser::where("email", $request->email)->first();
    
        if($this->user)
        {
            if(password_verify($request->password, $this->user->password))
            {
                Session::put("user_id", $this->user->id);
                Session::put("user_name", $this->user->name);
    
                return redirect('/blog-detail/'.Session::get('blog_id'));
            }
            else
            {
                return redirect('/user-login/')->with("message", "Your password is invalid.");
            }
            
        }
        else
            {
                return redirect("/user-login/")->with('message', 'Sorry...password or email invalid.');
            }
    }

    public function logout()
    {
        Session::forget("user_id");
        Session::forget("user_name");
        Session::forget("user_image");

        return redirect("/");
    }

    public function addUser()
    {
        return view("admin.user.add");
    }

    public function create(Request $request)
    {
        User::newUser($request);
        return redirect("/add-user")->with("message", "User created successfully");
    }
    public function manage()
    {
        $this->user = User::all();
        return view("admin.user.manage", ["users" =>$this->user]);
    }

    public function edit($id)
    {
        $this->user = User::find($id);
        return view("admin.user.edit", ["user" => $this->user]);
    }

    public function updete(Request $request, $id)
    {
        User::updeteUser($request, $id);
        return redirect("/manage-user")->with("message", "User update successfully");
    }

    public function delete($id)
    {
        $this->user = User::find($id);
        $this->user->delete();
        return redirect("/manage-user")->with("message", "User delete successfully");
    }
    
}
