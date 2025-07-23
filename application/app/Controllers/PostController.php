<?php
namespace App\Controllers;
use App\Models\Post;
use CodeIgniter\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return view('posts/index', ['posts' => $posts]);
    }

    public function all()
    {
        $search = $this->request->getGet('search');
        if ($search) {
            $posts = Post::where('title', 'LIKE', "%{$search}%")
                ->orWhere("description", "LIKE", "%{$search}%")
                ->orderBy("created_at", "desc")
                ->get();
        } else {
            $posts = Post::orderBy('created_at', 'desc')->get();
        }
        return view('posts/index', ['posts' => $posts]);
    }

    public function search()
    {
        $term = $this->request->getGet('q');
        $posts = Post::where('title', 'like', "%$term%")
            ->orWhere('description', 'like', "%$term%")
            ->orderBy('created_at', 'desc')
            ->get();
        return $this->response->setJSON($posts);
    }

    public function create()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/users/login');
        }
        return view('posts/create');
    }

    public function store()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/users/login');
        }
        $image = $this->request->getFile('image');
        $imagePath = null;
        if ($image && $image->isValid()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
            $imagePath = '/uploads/' . $newName;
        }
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'user_id' => session()->get('user_id'),
            'image' => $imagePath,
        ];
        Post::create($data);
        return redirect()->to('/posts');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts/show', ['post' => $post]);
    }

    public function edit($id)
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/users/login');
        }
        $post = Post::where('id', $id)->first();
        if (!$post || !isset($post->user_id) || $post->user_id != session()->get('user_id')) {
            return redirect()->to('/posts');
        }
        return view('posts/edit', ['post' => $post]);
    }

    public function update($id)
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/users/login');
        }
        $post = Post::where('id', $id)->first();
        if (!$post || !isset($post->user_id) || $post->user_id != session()->get('user_id')) {
            return redirect()->to('/posts');
        }
        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
            $post->image = '/uploads/' . $newName;
        }
        $post->title = $this->request->getPost('title');
        $post->description = $this->request->getPost('description');
        $post->save();
        return redirect()->to('/posts/show/' . $id);
    }

    public function delete($id)
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/users/login');
        }
        $post = Post::where('id', $id)->first();
        if ($post && isset($post->user_id) && $post->user_id == session()->get('user_id')) {
            $post->delete();
        }
        return redirect()->to('/posts');
    }

}
