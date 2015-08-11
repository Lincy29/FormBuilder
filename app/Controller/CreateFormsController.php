<?php
App::uses('AppController', 'Controller');

class CreateFormsController extends AppController {


    public function add() {
	
    if ($this->request->is('post')) {
            $this->CreateForm->create();
            if ($this->CreateForm->save($this->request->data)) {

                debug($this->request->data);
              $this->Session->setFlash(__('Your post has been saved.'));
               //return $this->redirect(array('action' => 'index'));
            }
            else
            $this->Session->setFlash(__('Unable to add your post.'));
                       
    }
  $institutions = $this->CreateForm->Institution->find('list');
  $this->set(compact('institutions')); 
  $departments = $this->CreateForm->Department->find('list');
  $this->set(compact('departments')); 
//debug($institutions);exit;
}
public function edit($id = null) {
    if (!$this->CreateForm->exists($id)) {
      throw new NotFoundException(__('Invalid name'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->CreateForm->save($this->request->data)) {
        $this->Session->setFlash(__('The Category has been saved.'));
        return $this->redirect(array('action' => 'index_category'));
      } else {
        $this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
      }
    }
  else {
      $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
      $this->request->data = $this->CreateForm->find('first', $options);
      $institutions = $this->CreateForm->Institution->find('list');
      $this->set(compact('institutions')); 
    }
}

}

?>