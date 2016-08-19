<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PostsListsItems Controller
 *
 * @property \App\Model\Table\PostsListsItemsTable $PostsListsItems
 */
class PostsListsItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Posts', 'ListsItems']
        ];
        $postsListsItems = $this->paginate($this->PostsListsItems);

        $this->set(compact('postsListsItems'));
        $this->set('_serialize', ['postsListsItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Posts Lists Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $postsListsItem = $this->PostsListsItems->get($id, [
            'contain' => ['Posts', 'ListsItems']
        ]);

        $this->set('postsListsItem', $postsListsItem);
        $this->set('_serialize', ['postsListsItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $postsListsItem = $this->PostsListsItems->newEntity();
        if ($this->request->is('post')) {
            $postsListsItem = $this->PostsListsItems->patchEntity($postsListsItem, $this->request->data);
            if ($this->PostsListsItems->save($postsListsItem)) {
                $this->Flash->success(__('The posts lists item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The posts lists item could not be saved. Please, try again.'));
            }
        }
        $posts = $this->PostsListsItems->Posts->find('list', ['limit' => 200]);
        $listsItems = $this->PostsListsItems->ListsItems->find('list', ['limit' => 200]);
        $this->set(compact('postsListsItem', 'posts', 'listsItems'));
        $this->set('_serialize', ['postsListsItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Posts Lists Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $postsListsItem = $this->PostsListsItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postsListsItem = $this->PostsListsItems->patchEntity($postsListsItem, $this->request->data);
            if ($this->PostsListsItems->save($postsListsItem)) {
                $this->Flash->success(__('The posts lists item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The posts lists item could not be saved. Please, try again.'));
            }
        }
        $posts = $this->PostsListsItems->Posts->find('list', ['limit' => 200]);
        $listsItems = $this->PostsListsItems->ListsItems->find('list', ['limit' => 200]);
        $this->set(compact('postsListsItem', 'posts', 'listsItems'));
        $this->set('_serialize', ['postsListsItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Posts Lists Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $postsListsItem = $this->PostsListsItems->get($id);
        if ($this->PostsListsItems->delete($postsListsItem)) {
            $this->Flash->success(__('The posts lists item has been deleted.'));
        } else {
            $this->Flash->error(__('The posts lists item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
