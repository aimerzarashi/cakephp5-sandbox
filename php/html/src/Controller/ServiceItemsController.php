<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ServiceItems Controller
 *
 * @property \App\Model\Table\ServiceItemsTable $ServiceItems
 */
class ServiceItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ServiceItems->find()
            ->contain(['Services']);
        $serviceItems = $this->paginate($query);

        $this->set(compact('serviceItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Service Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serviceItem = $this->ServiceItems->get($id, contain: ['Services']);
        $this->set(compact('serviceItem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $serviceItem = $this->ServiceItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $serviceItem = $this->ServiceItems->patchEntity($serviceItem, $this->request->getData());
            if ($this->ServiceItems->save($serviceItem)) {
                $this->Flash->success(__('The service item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service item could not be saved. Please, try again.'));
        }
        $services = $this->ServiceItems->Services->find('list', limit: 200)->all();
        $this->set(compact('serviceItem', 'services'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serviceItem = $this->ServiceItems->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serviceItem = $this->ServiceItems->patchEntity($serviceItem, $this->request->getData());
            if ($this->ServiceItems->save($serviceItem)) {
                $this->Flash->success(__('The service item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service item could not be saved. Please, try again.'));
        }
        $services = $this->ServiceItems->Services->find('list', limit: 200)->all();
        $this->set(compact('serviceItem', 'services'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serviceItem = $this->ServiceItems->get($id);
        if ($this->ServiceItems->delete($serviceItem)) {
            $this->Flash->success(__('The service item has been deleted.'));
        } else {
            $this->Flash->error(__('The service item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
