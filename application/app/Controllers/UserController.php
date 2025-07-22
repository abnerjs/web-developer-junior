<?php
namespace App\Controllers;
use App\Models\User;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
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
        $error = null;
        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->getPost('email');
            $existingUser = User::where('email', $email)->first();
            if ($existingUser) {
                $error = 'Este e-mail já está cadastrado.';
            } else {
                try {
                    $data = [
                        'name' => $this->request->getPost('name'),
                        'email' => $email,
                        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    ];

                    User::create($data);
                    return redirect()->to('/users/login');
                } catch (\Exception $e) {
                    $error = 'Erro ao cadastrar usuário: ' . $e->getMessage();
                    log_message('error', $error);
                    var_dump($error);
                    exit;
                }
            }
        }
        return view('users/register', ['error' => $error]);
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
