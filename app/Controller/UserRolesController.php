<?php
App::uses('AppController', 'Controller');
/**
 * User Roles Controller
 *
 * @property UserRoles $Manageroles
 * @property PaginatorComponent $Paginator
 */
class UserRolesController extends AppController {

public $components = array('Paginator');

/***
index functions for all roles, it displays all records with its details
**/

public function index_superadmin()
{
  $this->loadModel('Setting');
  $data = $this->Setting->find('first', array(
    'recursive' => - 1
  ));
  $pagination_value = $data['Setting']['pagination_value'];
  $this->Paginator->settings = array(
    'limit' => $pagination_value,
    'page' => 1,
    'contain' => ['Staff','Institution','Department','Role'],
    'conditions'=>['UserRole.role_id'=> Configure::read('superadmin')]);
  $this->set('superadmins', $this->Paginator->paginate());
}

public function index_admin() {
  $this->loadModel('Setting');
  $data = $this->Setting->find('first', array('recursive' => - 1));
  $pagination_value = $data['Setting']['pagination_value'];
  $this->Paginator->settings = array(
    'limit' => $pagination_value,
    'page' => 1,
    'contain' => ['Staff','Institution','Department','Role'],
    'conditions'=>['UserRole.role_id'=> Configure::read('admin')]);
  $this->set('admins', $this->Paginator->paginate());
}

public function index_formcoord() {
  $this->loadModel('Setting');
  $data = $this->Setting->find('first', array('recursive' => - 1));
  $pagination_value = $data['Setting']['pagination_value'];
  $this->Paginator->settings = array(
    'limit' => $pagination_value,
    'page' => 1,
    'contain' => ['Staff','Institution','Department','Role'],
    'conditions'=>['UserRole.role_id'=> Configure::read('formcoordinator')]);
  $this->set('formcoordinators', $this->Paginator->paginate());
}

public function index_formadmin() {
  $this->loadModel('Setting');
  $data = $this->Setting->find('first', array('recursive' => - 1));
  $pagination_value = $data['Setting']['pagination_value'];
  $this->Paginator->settings = array(
    'limit' => $pagination_value,
    'page' => 1,
    'contain' => ['Staff','Institution','Department','Role'],
    'conditions'=>['UserRole.role_id'=> Configure::read('formadmin')]);
  $this->set('formadmins', $this->Paginator->paginate());
}

/***
add functions for all roles, it adds new record
**/

public function add_superadmin() {
  if($this->request->is('post') && $this->request->data['UserRole']['staff_id'] != 0) {
      $this->UserRole->create();
      $this->request->data['UserRole']['role_id'] = Configure::read('superadmin');
      $staff_id = $this->request->data['UserRole']['staff_id'];
      $data = $this->UserRole->User->find('first',['conditions'=>['User.staff_id'=>$staff_id]]);
      $this->request->data['UserRole']['user_id'] = $data['User']['id']; 
      if($this->UserRole->save($this->request->data)){
            $this->Session->setFlash(__('The Super Admin has been saved.'), 'alert', array(
     'class' => 'alert-success'));
          return $this->redirect(array('controller' => 'user_roles','action' => 'index_superadmin'));
      } else  {
           $this->Session->setFlash(__('The Super Admin could not be saved. Please, try again.'), 'alert', array(
                                        'class' => 'alert-success'));
      }
  }
  unset($this->request->data);  
  $institutions = $this->UserRole->Institution->find('list');
 
  $departments = [];
  $staffs = [];
  $this->set(compact('institutions', 'departments', 'staffs'));
 
}

public function add_admin() {
  if($this->request->is('post') && $this->request->data['UserRole']['staff_id'] != 0){
      $this->UserRole->create();
      $staff_id = $this->request->data['UserRole']['staff_id']; 
      $data = $this->UserRole->User->find('first',['conditions'=>['User.staff_id'=>$staff_id]]);
      $this->request->data['UserRole']['user_id'] = $data['User']['id'];
      $this->request->data['UserRole']['role_id'] = Configure::read('admin');
      if($this->UserRole->save($this->request->data)){
            $this->Session->setFlash(__('The  Admin has been saved.'), 'alert', array(
          'class' => 'alert-success'));
            return $this->redirect(array('controller' => 'user_roles','action' => 'index_admin'));
      } else  {
           $this->Session->setFlash(__('The  Admin could not be saved. Please, try again.'), 'alert', array(
            'class' => 'alert-success'));
      }
    }
    unset($this->request->data);
    $institutions = $this->UserRole->Institution->find('list');
    $departments = [];
    $staffs = [];
    $this->set(compact('institutions', 'departments', 'staffs','roles'));
}


public function add_formcoord() {
  if($this->request->is('post') && $this->request->data['UserRole']['staff_id'] != 0){
      $this->UserRole->create();
      $staff_id = $this->request->data['UserRole']['staff_id']; 
      $data = $this->UserRole->User->find('first',['conditions'=>['User.staff_id'=>$staff_id]]);
      $this->request->data['UserRole']['user_id'] = $data['User']['id'];
      $this->request->data['UserRole']['role_id'] = Configure::read('formcoordinator');
      if($this->UserRole->save($this->request->data)){
            $this->Session->setFlash(__('The  Form Coordinator has been saved.'), 'alert', array(
          'class' => 'alert-success'));
            return $this->redirect(array('controller' => 'user_roles','action' => 'index_formcoord'));
      } else  {
           $this->Session->setFlash(__('The  Form Coordinator could not be saved. Please, try again.'), 'alert', array(
            'class' => 'alert-success'));
      }
    }
    unset($this->request->data);
    $institutions = $this->UserRole->Institution->find('list');
    $departments = [];
    $staffs = [];
    $this->set(compact('institutions', 'departments', 'staffs','roles'));
}

public function add_formadmin() {
  if($this->request->is('post') && $this->request->data['UserRole']['staff_id'] != 0){
      $this->UserRole->create();
      $staff_id = $this->request->data['UserRole']['staff_id']; 
      $data = $this->UserRole->User->find('first',['conditions'=>['User.staff_id'=>$staff_id]]);
      $this->request->data['UserRole']['user_id'] = $data['User']['id'];
      $this->request->data['UserRole']['role_id'] = Configure::read('formadmin');
      if($this->UserRole->save($this->request->data)){
            $this->Session->setFlash(__('The  Form Admin has been saved.'), 'alert', array(
          'class' => 'alert-success'));
            return $this->redirect(array('controller' => 'user_roles','action' => 'index_formadmin'));
      } else  {
           $this->Session->setFlash(__('The  Form Admin could not be saved. Please, try again.'), 'alert', array(
            'class' => 'alert-success'));
      }
    }
    unset($this->request->data);
    $institutions = $this->UserRole->Institution->find('list');
    $departments = [];
    $staffs = [];
    $this->set(compact('institutions', 'departments', 'staffs','roles'));
}

/***
view functions for all roles, it displays individual record with its details
**/
public function view_superadmin($id = null) {
  if (!$this->UserRole->exists($id)) {
    throw new NotFoundException(__('Invalid id'));
  }

  $options = array(
    'recursive' => - 1,
    'contain' => ['Staff','Institution','Department','Role'],
    'conditions' => array('UserRole.' . $this->UserRole->primaryKey => $id
    )
  );
  $this->set('superadmin', $this->UserRole->find('first', $options));
}


public function view_admin($id = null)
{
  if (!$this->UserRole->exists($id)) {
    throw new NotFoundException(__('Invalid id'));
  }

  $options = array(
    'recursive' => - 1,
    'contain' => ['Staff','Institution','Department','Role'],
    'conditions' => array('UserRole.' . $this->UserRole->primaryKey => $id
    )
  );
  $this->set('admin', $this->UserRole->find('first', $options));
}

public function view_formadmin($id = null)
{
  if (!$this->UserRole->exists($id)) {
    throw new NotFoundException(__('Invalid id'));
  }

  $options = array(
    'recursive' => - 1,
    'contain' => ['Staff','Institution','Department','Role'],
    'conditions' => array('UserRole.' . $this->UserRole->primaryKey => $id
    )
  );
  $this->set('formadmin', $this->UserRole->find('first', $options));
}

public function view_formcoord($id = null)
{
  if (!$this->UserRole->exists($id)) {
    throw new NotFoundException(__('Invalid id'));
  }

  $options = array(
    'recursive' => - 1,
    'contain' => ['Staff','Institution','Department','Role'],
    'conditions' => array('UserRole.' . $this->UserRole->primaryKey => $id
    )
  );
  $this->set('formcoordinator', $this->UserRole->find('first', $options));
}
/***
it deactivates the records
**/
public function deactivate($id = null)
{
  if (!$this->UserRole->exists($id)) {

      throw new NotFoundException(__('Invalid Role'));
  }

  if ($this->request->is(array('post','put'))) {
    $this->request->data['UserRole']['id'] = $id;
    $this->request->data['UserRole']['recstatus'] = 0;
    if ($this->UserRole->save($this->request->data, true, array('id','recstatus'))) {
      $this->Session->setFlash(__('It has been deactivated.') , 'alert', array(
        'class' => 'alert-success'
      ));
    } else {
      $this->Session->setFlash(__('It cannot be deactivated. Please, try again.') , 'alert', array(
        'class' => 'alert-success'
      ));
    }
    return $this->redirect($this->referer());
  }
}


}
