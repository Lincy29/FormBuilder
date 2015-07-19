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
		if ($this->request->is('post')) {
			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				$id = $this->Student->getLastInsertID();
                $this->request->data['User']['student_id'] = $id;
                $this->request->data['User']['fullname'] =$this->request->data['Student']['firstname'].$this->request->data['Student']['lastname'] ;
				
				if ($this->Student->User->save($this->request->data)){
				    $this->Session->setFlash('The student has been saved.');
				    return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
			}

		}
	}
	 $institutions = $this->Student->Institution->find('list');
	 $departments = [];
	 $degrees = [];
	 $this->set(compact('institutions', 'departments','degrees'));
}



public function edit($id = null) {
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
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
		} 
		else {
			
			$option = array('conditions' => array('User.staff_id'=>$id));
			$this->request->data = $this->Student->find('first',array('conditions' => array('student.id'=>$id)));	
			
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
