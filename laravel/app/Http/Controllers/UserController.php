<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('updated_at', 'DESC')->get();
        return view('admin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function createCustomer()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'txtName' => 'required|max:255',
            'txtEmail' => 'required|email|max:255|unique:users,email',
            'txtPassword' => 'required|confirmed|min:6',
        ], [
            'txtName.required' => 'Bạn chưa điền tên',
            'txtName.max' => 'Tên chỉ tối đa 255 ký tự',
            'txtEmail.required' => 'Bạn chưa điền Email',
            'txtEmail.unique' => 'Email này đã được sử dụng',
            'txtEmail.max' => 'Email chỉ tối đa 255 ký tự',
            'txtEmail.email' => 'Không đúng định dạng Email',
            'txtPassword.required' => 'Bạn chưa điền mật khẩu',
            'txtPassword.confirmed' => 'Xác nhận mật khẩu không khớp',
            'txtPassword.min' => 'Mật khẩu ít nhất phải có 6 ký tự',
        ]);

        User::create([
            'name' => $request->txtName,
            'email' => $request->txtEmail,
            'password' => bcrypt($request->txtPassword),
            'level' => $request->txtLevel,
            
        ]);

        return redirect()->route('dashboard.user.index')->with(['flash_message' => 'Tạo thành viên thành công !', 'flash_level' => 'success']);
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeCustomer(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ], [
            'name.required' => 'Bạn chưa điền tên',
            'name.max' => 'Tên chỉ tối đa 255 ký tự',
            'email.required' => 'Bạn chưa điền Email',
            'email.unique' => 'Email này đã được sử dụng',
            'email.max' => 'Email chỉ tối đa 255 ký tự',
            'email.email' => 'Không đúng định dạng Email',
            'password.required' => 'Bạn chưa điền mật khẩu',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
            'password.min' => 'Mật khẩu ít nhất phải có 6 ký tự',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 0,

        ]);

        return redirect()->route('customer.create')->with(['flash_message' => 'Tạo tài khoản thành công !', 'flash_level' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'txtName' => 'required|max:255',
            'txtEmail' => 'required|email|max:255',
            'txtPassword' => 'confirmed|min:6',
        ], [
            'txtName.required' => 'Bạn chưa điền tên',
            'txtName.max' => 'Tên chỉ tối đa 255 ký tự',
            'txtEmail.required' => 'Bạn chưa điền Email',
            'txtEmail.max' => 'Email chỉ tối đa 255 ký tự',
            'txtEmail.email' => 'Không đúng định dạng Email',
            'txtPassword.confirmed' => 'Xác nhận mậy khẩu không khớp',
            'txtPassword.min' => 'Mật khẩu ít nhất phải có 6 ký tự',
        ]);

        $user = User::find($request->id);
        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        if(!empty($request->txtPasswoard)) $user->password = bcrypt($request->txtPassword);
        $user->level = $request->txtLevel;
        $user->save();
        return redirect()->route('dashboard.user.index')->with(['flash_message'=> 'Thành viên đã lưu thành công !', 'flash_level'=> 'success']);
    }

    public function bienSoan()
    {
        if(\Auth::user()->level == 0)
        {
            $user = User::find(\Auth::user()->id);
            $user->level = 1;
            $user->save();
            return 1;
        }
        return 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.user.index')->with(['flash_message'=> 'Xóa thành viên thành công !', 'flash_level'=> 'success']);
    }

    public function passwordChange(Request $request)
    {
        $this->validate($request, [
            'txtPassword' => 'confirmed|min:6',
        ], [
            'txtPassword.confirmed' => 'Xác nhận mậy khẩu không khớp',
            'txtPassword.min' => 'Mật khẩu ít nhất phải có 6 ký tự',
        ]);
        $user = User::find(\Auth::user()->id);
        $user->password = bcrypt($request->txtPassword);
        $user->save();
        return redirect()->route('dashboard.changepassword')->with(['flash_message'=> 'Đã đổi mật khẩu thành công !', 'flash_level'=> 'success']);

    }

    public function changeName(Request $request)
    {
        $this->validate($request, [
            'txtPassword' => 'min:6',
            'txtName' => 'max:20|min:1'
        ], [
            'txtPassword.min' => 'Mật khẩu ít nhất phải có 6 kí tự',
            'txtName.min' => 'Không được để trống tên',
            'txtName.max' => 'Tên tối đa 20 kí tự',
        ]);
        $user = User::find(\Auth::user()->id);
        if(Hash::check($request->txtPassword,$user->password))
        {
            $user->name = $request->txtName;
            $user->save();
            return redirect()->route('dashboard.changename')->with(['flash_message'=> 'Đã đổi tên thành công !', 'flash_level'=> 'success']);
        }
        return redirect()->route('dashboard.changename')->with(['flash_message'=> 'Sai mật khẩu !', 'flash_level'=> 'error']);

    }
}
