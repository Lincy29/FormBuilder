<?php
App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

  public $components = array('Paginator','Session');

  public function index() {
    $this->Category->recursive = 0;
    $this->set('categories', $this->Paginator->paginate());
 }
   public function index_category() {
    $this->Category->recursive = -1;
    $this->Paginator->settings = array(
  'page' => 1,
  'contain' => ['Institution'=>['fields'=>['name']],'Department'=>['fields'=>['name']]],'fields'=>['id','category_name']);
    $this->set('categories', $this->Paginator->paginate());
 }
 public function index_category_fadmin() {
    $this->Category->recursive = -1;
    $this->Paginator->settings = array(
  'page' => 1,
  'contain' => ['Department'=>['fields'=>['name']]],'fields'=>['id','category_name']);
    $this->set('categories', $this->Paginator->paginate());
 }
    public function add() {
  
    if ($this->request->is('post')) {
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {

              $this->Session->setFlash(__('Your post has been saved.'));
              return $this->redirect(array('action' => 'index'));
              }
            else 
            $this->Session->setFlash(__('Unable to add your post.'));

            }  
    }

  

   public function add_category() {
    if($this->request->is('post') ){
      $this->Category->create();
      //debug($this->request->data);exit;    
      if($this->Category->save($this->request->data)){
            $this->Session->setFlash(__('New record has been added'));
             return $this->redirect(array('action' => 'index_category'));
         
      } else  {
           $this->Session->setFlash(__('Unable to add new record'));
      }
  }
  unset($this->request->data);  
  $institutions = $this->Category->Institution->find('list');
  $departments = [];
  $this->set(compact('institutions','departments')); 
}
 public function add_category_fadmin() {
    if($this->request->is('post') ){
      $this->Category->create();
      //debug($this->request->data);exit;    
      if($this->Category->save($this->request->data)){
            $this->Session->setFlash(__('New record has been added'));
             return $this->redirect(array('action' => 'index_category_fadmin'));
         
      } else  {
           $this->Session->setFlash(__('Unable to add new record'));
      }
  }
  unset($this->request->data);  
  
  $departments = $this->Category->Department->find('list');
  $this->set(compact('departments')); 
}

public function edit($id = null) {
    if (!$this->Category->exists($id)) {
      throw new NotFoundException(__('Invalid name'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Category->save($this->request->data)) {
        $this->Session->setFlash(__('The Category has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
      }
    }
  else {
      $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
      $this->request->data = $this->Category->find('first', $options);
    }
}
public function edit_category($id = null) {
    if (!$this->Category->exists($id)) {
      throw new NotFoundException(__('Invalid name'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Category->save($this->request->data)) {
        $this->Session->setFlash(__('The Category has been saved.'));
        return $this->redirect(array('action' => 'index_category'));
      } else {
        $this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
      }
    }
  else {
      $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
      $this->request->data = $this->Category->find('first', $options);
      $institutions = $this->Category->Institution->find('list');
      $departments = $this->Category->Department->find('list');
      $this->set(compact('institutions','departments')); 
      
  }
}
public function edit_category_fadmin($id = null) {
    if (!$this->Category->exists($id)) {
      throw new NotFoundException(__('Invalid name'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Category->save($this->request->data)) {
        $this->Session->setFlash(__('The Category has been saved.'));
        return $this->redirect(array('action' => 'index_category_fadmin'));
      } else {
        $this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
      }
    }
  else {
      $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
      $this->request->data = $this->Category->find('first', $options);
      $departments = $this->Category->Department->find('list');
      $this->set(compact('departments')); 
      
  }
}
public function list_categories(){
  $this->request->onlyAllow('ajax');
  $id = $this->request->query('id');
  if (!$id) {
    throw new NotFoundException();    
  }
  $this->disableCache();
  $categories = $this->Category->getListByDepartment($id);
  $this->set(compact('categories'));
  $this->set('__serialize',array('categories'));
}
}