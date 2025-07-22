<?php
namespace App\Controllers;
use App\Models\User;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = User::where('email', $email)->first();
            if ($user && password_verify($password, $user->password)) {
                session()->set('user_id', $user->id);
                return redirect()->to('/users/profile');
            }
            return view('users/login', ['error' => 'Credenciais inválidas']);
        }
        return view('users/login');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            User::create($data);
            return redirect()->to('/users/login');
        }
        return view('users/register');
    }

    public function profile()
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/users/login');
        }
        $user = User::find($userId);
        return view('users/profile', ['user' => $user]);
    }

    public function logout()
    {
        session()->remove('user_id');
        return redirect()->to('/users/login');
    }
}
