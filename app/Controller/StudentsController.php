<?php
App::uses('AppController', 'Controller');

class StudentsController extends AppController {

public $helpers = array('Js');

public $components = array('Paginator','Session');

public function index() {

  $this->Student->recursive = -1;
  $this->Paginator->settings = array(
 'page' => 1,
  'contain' =>['Student'=>['Department','Institution']],
  'conditions'=> array("NOT"=>['User.student_id' => null])
  );  
  $this->set('students', $this->Paginator->paginate('User'));

	}


public function add_stu() {
	$this->Student->User->Behaviors->attach('Tools.Passwordable');

		if ($this->request->is('post')) {
			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				//debug($this->request->data);exit;
				$id = $this->Student->getLastInsertID();
                $this->request->data['User']['Student_id'] = $id;
                $this->request->data['User']['fullname'] =$this->request->data['Student']['firstname'].$this->request->data['Student']['lastname'] ;
				
				if ($this->Student->User->save($this->request->data)){

				$s_id = $this->Student->User->getLastInsertID();

				$this->request->data['UserRole']['student_id'] = $id;
				$this->request->data['UserRole']['user_id']= $s_id;
                $this->request->data['UserRole']['role_id']= Configure::read('student');
                $this->request->data['UserRole']['institution_id'] = $this->request->data['Staff']['institution_id'];
                $this->request->data['UserRole']['department_id'] = $this->request->data['Staff']['department_id'];

				
					if ($this->Student->UserRole->save($this->request->data)){
				   $this->Session->setFlash(__('The Student has been saved.'));
				   return $this->redirect(array('action' => 'index'));
			    }
			  }

			} else {
				$this->Session->setFlash(__('The Student could not be saved. Please, try again.'));
			}
		}
	 $institutions = $this->Student->Institution->find('list');
	 $departments = [];
	 $degrees = [];
	 $this->set(compact('institutions', 'departments','degrees'));

}



public function edit($id = null) {
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Student->save($this->request->data)) {

				$id = $this->Student->getLastInsertID();
                //$this->request->data['User']['staff_id'] = $id;

                $this->request->data['User']['fullname'] =$this->request->data['Staff']['firstname'].$this->request->data['Staff']['lastname'] ;

				
				if ($this->Student->User->save($this->request->data)){
				   $this->Session->setFlash(__('The student has been saved.'));
				   return $this->redirect(array('action' => 'index'));
			    }else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));

			}
		} 
		else {
			
			$option = array('conditions' => array('User.student_id'=>$id));
			$this->request->data = $this->Student->find('first',array('conditions' => array('id'=>$id)));	
			
			$username=$this->Student->User->find('first',array('fields' =>['User.username','User.email'],'conditions' => ['User.student_id'=>$id]));		
			
			$this->request->data['User']['username']=$username['User']['username'];
			$this->request->data['User']['email']=$username['User']['email'];			
		
		   	}
		   	$institutions = $this->Student->Institution->find('list');
		    $departments = $this->Student->Department->find('list');
		    $degree = $this->Student->Degree->find('list');

		    $this->set(compact('institutions', 'departments','degree'));

}

}

