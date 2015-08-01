<?php
App::uses('AppController','Controller');
class CformsController extends AppController {
     
public $components = array('Paginator','Session');

public function index() {
    $this->Form->recursive = -1;
   $this->Paginator->settings = array(
  'page' => 1,
  'contain' => ['Institution'=>['fields'=>['name']],'Department'=>['fields'=>['name']]],'fields'=>['id','name','close']);
    $this->set('forms', $this->Paginator->paginate());
 }
    public function add() {
	
	if ($this->request->is('post')) {
           $this->Cform->create();
            if ($this->Cform->save($this->request->data)) {
                $this->Session->setFlash(__('New form has been added.'));
                return $this->redirect(array('action' => 'index'));
            }
            else{
           $this->Session->setFlash(__('Unable to add form.'));
         }
        }
  unset($this->request->data);  
  $institutions = $this->Cform->Institution->find('list');  
  $departments = [];
  $this->set(compact('institutions','departments')); 
  //$departments = $this->Form->Department->find('list');
  //$this->set(compact('departments')); 
     }

  public function edit($id = null) {
    if (!$this->Form->exists($id)) {
      throw new NotFoundException(__('Invalid name'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Form->save($this->request->data)) {
        $this->Session->setFlash(__('The form has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The Form could not be saved. Please, try again.'));
      }
    }
  else {
      $options = array('conditions' => array('Form.' . $this->Form->primaryKey => $id));
      $this->request->data = $this->Form->find('first', $options);
      $institutions = $this->Form->Institution->find('list');
      $this->set(compact('institutions')); 

      $departments = $this->Form->Department->find('list');
      $this->set(compact('departments')); 
    }
}
}
?>