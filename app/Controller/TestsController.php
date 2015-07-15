<?php
App::uses('AppController', 'Controller');
/**
 * Roles Controller
 *
 * @property Role $Role
 * @property PaginatorComponent $Paginator
 */
class TestsController extends AppController {

/**
 * Components
 *
 * @var array
 */
public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Paginator','Session');

/**
 * index method
 *
 * @return void
 */
public function index() {
    $this->First->recursive = 0;
    $this->set('tests', $this->Paginator->paginate());
 }


    public function add() {
	
    if ($this->request->is('post')) {
            $this->Test->create();
            if ($this->Test->save($this->request->data)) {

              $this->Session->setFlash(__('Your post has been saved.'));
              // return $this->redirect(array('action' => 'index'));
            }
            else
            $this->Session->setFlash(__('Unable to add your post.'));
                       
    }

  
}/*
public function edit($id = null) {
    if (!$this->Test->exists($id)) {
      throw new NotFoundException(__('Invalid name'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Test->save($this->request->data)) {
        $this->Session->setFlash(__('The name has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The name could not be saved. Please, try again.'));
      }
    }
  else {
      $options = array('conditions' => array('First.' . $this->Test->primaryKey => $id));
      $this->request->data = $this->Test->find('first', $options);
    }
}

/*
public function view($id = null) {
    if (!$this->Test->exists($id)) {
      throw new NotFoundException(__('Invalid role'));
    }
    $options = array('conditions' => array('Test.' . $this->Test->primaryKey => $id));
    $this->set('test', $this->Test->find('first', $options));
  }

*/
}

?>