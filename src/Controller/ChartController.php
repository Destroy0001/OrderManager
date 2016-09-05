<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Chart Controller
 *
 * @property \App\Model\Table\ChartTable $Chart
 */
class ChartController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $chart = $this->paginate($this->Chart);

        $this->set(compact('chart'));
        $this->set('_serialize', ['chart']);
    }

    /**
     * View method
     *
     * @param string|null $id Chart id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chart = $this->Chart->get($id, [
            'contain' => []
        ]);

        $this->set('chart', $chart);
        $this->set('_serialize', ['chart']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chart = $this->Chart->newEntity();
        if ($this->request->is('post')) {
            $chart = $this->Chart->patchEntity($chart, $this->request->data);
            if ($this->Chart->save($chart)) {
                $this->Flash->success(__('The chart has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The chart could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('chart'));
        $this->set('_serialize', ['chart']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Chart id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chart = $this->Chart->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chart = $this->Chart->patchEntity($chart, $this->request->data);
            if ($this->Chart->save($chart)) {
                $this->Flash->success(__('The chart has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The chart could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('chart'));
        $this->set('_serialize', ['chart']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chart id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chart = $this->Chart->get($id);
        if ($this->Chart->delete($chart)) {
            $this->Flash->success(__('The chart has been deleted.'));
        } else {
            $this->Flash->error(__('The chart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
