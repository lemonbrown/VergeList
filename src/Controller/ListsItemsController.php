<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ListsItems Controller
 *
 * @property \App\Model\Table\ListsItemsTable $ListsItems
 */
class ListsItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $listsItems = $this->paginate($this->ListsItems);

        $this->set(compact('listsItems'));
        $this->set('_serialize', ['listsItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Lists Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listsItem = $this->ListsItems->get($id, [
            'contain' => ['Posts']
        ]);

        $this->set('listsItem', $listsItem);
        $this->set('_serialize', ['listsItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listsItem = $this->ListsItems->newEntity();
        if ($this->request->is('post')) {
            $listsItem = $this->ListsItems->patchEntity($listsItem, $this->request->data);
            if ($this->ListsItems->save($listsItem)) {
                $this->Flash->success(__('The lists item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The lists item could not be saved. Please, try again.'));
            }
        }
        $posts = $this->ListsItems->Posts->find('list', ['limit' => 200]);
        $this->set(compact('listsItem', 'posts'));
        $this->set('_serialize', ['listsItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lists Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $listsItem = $this->ListsItems->get($id, [
            'contain' => ['Posts']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listsItem = $this->ListsItems->patchEntity($listsItem, $this->request->data);
            if ($this->ListsItems->save($listsItem)) {
                $this->Flash->success(__('The lists item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The lists item could not be saved. Please, try again.'));
            }
        }
        $posts = $this->ListsItems->Posts->find('list', ['limit' => 200]);
        $this->set(compact('listsItem', 'posts'));
        $this->set('_serialize', ['listsItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lists Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listsItem = $this->ListsItems->get($id);
        if ($this->ListsItems->delete($listsItem)) {
            $this->Flash->success(__('The lists item has been deleted.'));
        } else {
            $this->Flash->error(__('The lists item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
