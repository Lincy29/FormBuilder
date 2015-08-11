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
             // debug($this->Form->getLastInsertId());exit;
              $this->Session->write('form_id',$this->Form->getLastInsertId());
                //$this->set($id= $this->Form->getLastInsertId(),$this->form_id);
              $form_id=$this->Form->getLastInsertID();
             // debug($form_id);
            
                $this->Session->setFlash(__('New form has been added.'));

                return $this->redirect('/create');
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
      $departments = [];  
      $categories = [];
      $this->set(compact('institutions','departments', 'categories')); 
    
    }
}

public function edit_fadmin($id = null) {
    if (!$this->Form->exists($id)) {
      throw new NotFoundException(__('Invalid name'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Form->save($this->request->data)) {
        $this->Session->setFlash(__('The form has been saved.'));
        return $this->redirect(array('action' => 'index_fadmin'));
      } else {
        $this->Session->setFlash(__('The Form could not be saved. Please, try again.'));
      }
    }
  else {
      $options = array('conditions' => array('Form.' . $this->Form->primaryKey => $id));
      $this->request->data = $this->Form->find('first', $options);
      $departments = $this->Form->Department->find('list');
      $this->set(compact('departments')); 
    
    }
}

public function edit_fcoord($id = null) {
    if (!$this->Form->exists($id)) {
      throw new NotFoundException(__('Invalid name'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Form->save($this->request->data)) {
        $this->Session->setFlash(__('The form has been saved.'));
        return $this->redirect(array('action' => 'index_fcoord'));
      } else {
        $this->Session->setFlash(__('The Form could not be saved. Please, try again.'));
      }
    }
  else {
      $options = array('conditions' => array('Form.' . $this->Form->primaryKey => $id));
      $this->request->data = $this->Form->find('first', $options);
          
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

 if ($this->request->is('post')) {
           $this->Form->create();
            
        $form_id=$this->Session->read('form_id');
        $this->request->data['Form']['id']=$form_id;        
        //debug($this->request->data);exit();
         if ($this->Form->save($this->request->data)) {
                $this->Session->setFlash(__('Form has been added.'));               
         }else{
           $this->Session->setFlash(__('Unable to add form.'));
         }        
           $attr=$this->request->data['Form']['attribute'];
           $att_array=explode('-',$attr);
           $label=$this->request->data['Form']['label'];
           //debug($this->request->data['Form']['label']);exit();
           $label_array=explode('-',$label);
           //debug($label_array);exit(); 
           $cnt='0';
           $i='0';
           foreach ($att_array as $value) {     

                 $this->request->data=$this->Form->Element->find('first',
                  array('conditions' => array('Element.name' => $value)));
          
                 $id=$this->request->data['Element']['id'];
                
                 $this->request->data['FormElement']['element_id'] = $id;
                 $this->request->data['FormElement']['form_id'] = $form_id; 
                $this->request->data['FormElement']['label'] = $label_array[$i];
                 
                 if($id!='16' || $cnt=='0'){ 

                 $this->Form->FormElement->saveMany($this->request->data);
                 debug($this->request->data);exit(); 
                 }  
                 if($id=='16'){
                 $cnt='1';}   
                 else{$cnt='0';} 

                 $i++;                    
           }  
                                    
        } 
  } 
 

 }


?>