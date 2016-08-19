<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		$this->loadModel('Posts');
        $users = $this->paginate($this->Users);
		
		$posts = $this->Posts->find('all');

		$this->set('posts', $posts);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {	
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function post($id = null){
		$this->loadModel('Posts');
		$post = $this->Posts->newEntity();
		
		if($id != null){
			$post = $this->Posts->get($id);
		}
		
		$this->set('post', $post);
	}
	
	public function savePost(){
		$this->autoRender = false;
	
		$this->loadModel('Posts');
		$this->loadModel('ListsItems');
		$this->loadModel('Tags');
		$this->loadModel('PostsListsItems');
		$this->loadModel('PostsTags');
		
		$post = $this->Posts->newEntity();
		$post = $this->Posts->patchEntity($post, $this->request->data['post']);
		$post->timestamp = time();
		$this->Posts->save($post);
		var_dump($post);
		
		$listItems = $this->request->data['listItems'];
		$tags = $this->request->data['tags'];
		
		foreach($listItems as $listItem){
			$listItemModel = $this->ListsItems->newEntity();
			$listItemModel = $this->ListsItems->patchEntity($listItemModel, $listItem);
			$listItemModel = $this->ListsItems->save($listItemModel);
			
			$postListItem = $this->PostsListsItems->newEntity();
			$postListItem->post_id = $post->id;
			$postListItem->list_items_id = $listItemModel->id;
			$this->PostsListsItems->save($postListItem);
		}
		
		foreach(split(",", $tags) as $tag){
			$tagModel = $this->Tags->newEntity();
			$tagModel->name = $tag;
			$tagModel = $this->Tags->save($tagModel);
			$postTag = $this->PostTags->newEntity();
			$postTag->post_id = $post->id;
			$postTag->tag_id = $tagModel->id;
			$this->PostsTags->save($postTag);
		}
	}
}
