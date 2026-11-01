<?php
 namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController {
    public function login() { return view('auth/login'); }

    public function auth() {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $model->where('username', $username)->first();

        if($user && password_verify($password, $user['password'])) {
            session()->set(['isLoggedIn' => true, 'username' => $user['username'], 'role' => $user['role']]);
            return redirect()->to('/dashboard');
        }
        return redirect()->back()->with('error', 'Username atau Password salah');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}