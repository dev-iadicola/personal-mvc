<?php 
namespace App\Controllers;

use App\Core\Mvc;
use App\Core\ORM;
use App\Model\Post;
use App\Core\Controller;
use App\Core\Http\Request;

class PostController extends Controller{
    public function __construct(public Mvc $mvc) {
        parent::__construct($mvc);
        
     
    }

    public function index() {
        $orm = new ORM($this->mvc->pdo);
    
        $sql = "CREATE TABLE IF NOT EXISTS posts (
            id INT PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR(100),
            description TEXT,
            created_at DATETIME default now()
        );";
    
        $orm->query($sql);
    
       $posts =  Post::findAll();

        return $this->render('crud',compact('posts'));
    }

    public function create(Request $request){
        //var_dump($request->getPost()); exit;
        $postData = $request->getPost();
        Post::save($postData);
        $this->withSuccess('New post added');
        return $this->redirectBack();
    }

    public function destroy(Request  $request, $id){
        $data = $request->getPost();
        if($data['_method'] !=='DELETE' || !isset($data['_method']) ){
            $this->withError('Wrong');
            return $this->redirectBack();
        }
        $post = Post::find($id);
        $post->delete();
        $this->withSuccess('Success, task deleted!');
        return $this->redirectBack();
    }

    public function update(Request $request, $id){

        $data = $request->getPost();

       $post =   Post::find($id);

       $post->update($data);

        $this->withSuccess('Update!');
        return $this->redirectBack();
    }
    
}