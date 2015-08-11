<?php
App::uses('FormBuilderAppController','FormBuilder.Controller');

class FormsController extends FormBuilderAppController {
     
public $components = array('Paginator','Session');

public function index() {
    $this->Form->recursive = -1;
   $this->Paginator->settings = array(
  'page' => 1,
  'contain' => ['Institution'=>['fields'=>['name']],'Category'=>['fields'=>['category_name']],'Department'=>['fields'=>['name']]],'fields'=>['id','name','close','recstatus']);
    $this->set('forms', $this->Paginator->paginate());
 }

 public function index_fadmin() {
    $this->Form->recursive = -1;
   $this->Paginator->settings = array(
  'page' => 1,
  'contain' => ['Department'=>['fields'=>['name']],'Category'=>['fields'=>['category_name']]],'fields'=>['id','name','close','recstatus']);
    $this->set('forms', $this->Paginator->paginate());
 }

 public function index_fcoord() {
    $this->Form->recursive = -1;
   $this->Paginator->settings = array(
  'page' => 1,
  'contain' => ['Category'=>['fields'=>['category_name']]],'fields'=>['id','name','close','recstatus']);
    $this->set('forms', $this->Paginator->paginate());
 }

    public function add() {
	
	if ($this->request->is('post')) {
           $this->Form->create();
            if ($this->Form->save($this->request->data)) {
                $this->Session->setFlash(__('New form has been added.'));
                return $this->redirect(array('action' => 'create'));
            }
            else{
           $this->Session->setFlash(__('Unable to add form.'));
         }
        }
  unset($this->request->data);  
  $institutions = $this->Form->Institution->find('list');  
  $departments = [];
  $categories = [];
  $this->set(compact('institutions','departments', 'categories'));  
     }

   public function add_fadmin() {
  
  if ($this->request->is('post')) {
           $this->Form->create();
            if ($this->Form->save($this->request->data)) {
                $this->Session->setFlash(__('New form has been added.'));
                return $this->redirect(array('action' => 'create'));
            }
            else{
           $this->Session->setFlash(__('Unable to add form.'));
         }
        }
  unset($this->request->data);  
  
  $departments = $this->Form->Department->find('list'); 
  $categories = [];
  $this->set(compact('departments', 'categories'));  
     }

 public function add_fcoord() {
  
  if ($this->request->is('post')) {
           $this->Form->create();
            if ($this->Form->save($this->request->data)) {
                $this->Session->setFlash(__('New form has been added.'));
                return $this->redirect(array('action' => 'create'));
            }
            else{
           $this->Session->setFlash(__('Unable to add form.'));
         }
        }
  unset($this->request->data);  
  $categories = $this->Form->Category->find('list'); 
  $this->set(compact('categories'));  
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
      $departments = [];  
      $this->set(compact('institutions','departments')); 
     /* $departments = $this->Form->Department->find('list');
      $this->set(compact('departments')); */
    }
}

public function deactivate_admin_form($id = null)
{
  //debug($this->Category->exists());exit();
  if (!$this->Form->exists($id)) {
      throw new NotFoundException(__('Invalid Form'));
  }

  if ($this->request->is(array('post','put'))) {
    $this->request->data['Form']['id'] = $id;
    $this->request->data['Form']['recstatus'] = 0;
    if ($this->Form->save($this->request->data, true, array('id','recstatus'))) {
      $this->Session->setFlash(__('It has been deactivated.') , 'alert', array(
        'class' => 'alert-success'
      ));
    } else {
      $this->Session->setFlash(__('It cannot be deactivated. Please, try again.') , 'alert', array(
        'class' => 'alert-success'
      ));
    }
    return $this->redirect(array('controller' => 'forms','action' => 'index'));
  }
}

public function deactivate_fadmin($id = null)
{
  //debug($this->Category->exists());exit();
  if (!$this->Form->exists($id)) {
      throw new NotFoundException(__('Invalid Form'));
  }

  if ($this->request->is(array('post','put'))) {
    $this->request->data['Form']['id'] = $id;
    $this->request->data['Form']['recstatus'] = 0;
    if ($this->Form->save($this->request->data, true, array('id','recstatus'))) {
      $this->Session->setFlash(__('It has been deactivated.') , 'alert', array(
        'class' => 'alert-success'
      ));
    } else {
      $this->Session->setFlash(__('It cannot be deactivated. Please, try again.') , 'alert', array(
        'class' => 'alert-success'
      ));
    }
    return $this->redirect(array('controller' => 'forms','action' => 'index_fadmin'));
  }
}

public function deactivate_fcoord($id = null)
{
  //debug($this->Category->exists());exit();
  if (!$this->Form->exists($id)) {
      throw new NotFoundException(__('Invalid Form'));
  }

  if ($this->request->is(array('post','put'))) {
    $this->request->data['Form']['id'] = $id;
    $this->request->data['Form']['recstatus'] = 0;
    if ($this->Form->save($this->request->data, true, array('id','recstatus'))) {
      $this->Session->setFlash(__('It has been deactivated.') , 'alert', array(
        'class' => 'alert-success'
      ));
    } else {
      $this->Session->setFlash(__('It cannot be deactivated. Please, try again.') , 'alert', array(
        'class' => 'alert-success'
      ));
    }
    return $this->redirect(array('controller' => 'forms','action' => 'index_fcoord'));
  }
}


public function create()
{
<<<<<<< HEAD
 }
=======
 $this->request->onlyAllow('ajax');
 $code = $this->request->query('text');
if ($this->request->is('get') {
   $this->Form->create();           
           $this->request->data['Form']['code'] = $code;
           $this->Form->save($this->request->data);
        }

>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719


 }


?>