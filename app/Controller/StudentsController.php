<?php
App::uses('AppController', 'Controller');

class StudentsController extends AppController {

public $helpers = array('Js');

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 *//*
	public function view($id = null) {
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
		$this->set('student', $this->Student->find('first', $options));
	
		$this->loadModel('Department');
		$this->loadModel('User');
	
		$institute_id = $this->Student->find('list', ['fields' => ['Student.institution_id']]);
		$institutions = $this->Student->Institution->find('list', ['conditions' => ['Institution.id' => $institute_id]]);
		$this->set('institutions', $institutions);
	
		$email = $this->User->find('list',[
			'conditions' => ['User.student_id' => $id],
			'fields' => ['User.email']
			]);
		$this->set('email', $email);
	
		$degree_id = $this->Student->find('list', [
			'conditions' => ['Student.id' => $id],
			'fields' => ['Student.degree_id']
		]);
		$degrees = $this->Student->Degree->find('list', ['conditions' => ['Degree.id' => $degree_id]]);
		$this->set('degrees', $degrees);

		$department = $this->Student->Degree->find('list',[
			'conditions' => ['Degree.id' => $degree_id],
			'fields' => ['Degree.department_id']
		]);
		$department_name = $this->Department->find('list',[
			'conditions' => ['Department.id' => $department],
			'fields' => ['Department.name']
		]);
		$this->set('department_name', $department_name);
		
	}*/

/**
 * add method
 *
 * @return void
 */
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
	public function add() {
		if ($this->request->is('post')) {
			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				$id = $this->Student->getLastInsertID();
                $this->request->data['User']['student_id'] = $id;
               
                $this->request->data['User']['fullname'] =$this->request->data['Student']['firstname'].$this->request->data['Student']['lastname'] ;
				
				if ($this->Student->User->save($this->request->data)){
					 $uid = $this->Student->User->getLastInsertID();
                $this->request->data['UserRole']['student_id'] = $id;
                $this->request->data['UserRole']['user_id']=$uid;
                $this->request->data['UserRole']['role_id']=Configure::read('user');
                $this->request->data['UserRole']['institution_id'] = $this->request->data['Student']['institution_id'];
                $this->request->data['UserRole']['department_id'] = $this->request->data['Student']['department_id'];
                	//debug($this->request->data);
					if ($this->Student->UserRole->save($this->request->data)){
					
				    $this->Session->setFlash('The student has been saved.');
				    return $this->redirect(array('action' => 'index'));
			}
			 else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
			}	
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
                $this->request->data['User']['fullname'] =$this->request->data['Student']['firstname'].$this->request->data['Student']['lastname'] ;
				
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