<?php
App::uses('AppController', 'Controller');
/**
 * Staffs Controller
 *
 * @property Staff $Staff
 * @property PaginatorComponent $Paginator
 */
class StaffsController extends AppController {

/**
 * index method
 *
 * @return void
 */

public $components = array('Paginator','Session');

public function index() {
 
  $this->Staff->recursive = -1;
  $this->Paginator->settings = array(
  'page' => 1,
  'contain' =>['Staff'=>['Department','Institution']],
  'conditions'=> array("NOT"=>['User.staff_id' => null])
  );  
  $this->set('staffs', $this->Paginator->paginate('User'));
}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 *//*
	public function view($id = null) {
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id),'recursive'=>-1,'contain'=>['Institution','Department']);
		$this->set('staff', $this->Staff->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->Staff->User->Behaviors->attach('Tools.Passwordable');
		if ($this->request->is('post')) {
			$this->Staff->create();
			if ($this->Staff->save($this->request->data)) {
				//debug($this->request->data);exit;
				$id = $this->Staff->getLastInsertID();
                $this->request->data['User']['staff_id'] = $id;
                $this->request->data['User']['fullname'] =$this->request->data['Staff']['firstname'].$this->request->data['Staff']['lastname'] ;
				
				if ($this->Staff->User->save($this->request->data)){

				$s_id = $this->Staff->User->getLastInsertID();

				$this->request->data['UserRole']['staff_id'] = $id;
				$this->request->data['UserRole']['user_id']= $s_id;
                $this->request->data['UserRole']['role_id']= Configure::read('user');
                $this->request->data['UserRole']['institution_id'] = $this->request->data['Staff']['institution_id'];
                $this->request->data['UserRole']['department_id'] = $this->request->data['Staff']['department_id'];

				
					if ($this->Staff->UserRole->save($this->request->data)){
				   $this->Session->setFlash(__('The staff has been saved.'));
				   return $this->redirect(array('action' => 'index'));
			    }
			  }
			} else {
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'));
			}
		}
		$institutions = $this->Staff->Institution->find('list');
		$departments = [];
		$this->set(compact('institutions', 'departments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Staff->save($this->request->data)) {
				$this->Session->setFlash(__('The staff has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'));
			}
		} 
		else {
			$option = array('conditions' => array('User.staff_id'=>$id));
			//debug($options);exit();

			$this->request->data = $this->Staff->find('first',array('conditions' => array('id'=>$id)));	
			//debug($this->request->data );exit();
			$username=$this->Staff->User->find('first',array('fields' =>['User.username','User.email'],'conditions' => ['User.staff_id'=>$id]));		
			
			$this->request->data['User']['username']=$username['User']['username'];
			$this->request->data['User']['email']=$username['User']['email'];
			
		
		   	}
		   	$institutions = $this->Staff->Institution->find('list');
		    $departments = $this->Staff->Department->find('list');
		    $this->set(compact('institutions', 'departments'));
}

public function list_staff() {
		$this->request->onlyAllow('ajax');
		$id = $this->request->query('id');
		if (!$id) {
			throw new NotFoundException();
		}

		$this->disableCache();
		$staffs = $this->Staff->getListByDepartment($id);
		$this->set(compact('staffs'));
		$this->set('_serialize', array('staffs'));
	}
}
