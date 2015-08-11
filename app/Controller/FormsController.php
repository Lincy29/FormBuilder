<?php
App::uses('AppController','Controller');
class FormsController extends AppController {
     
public $components = array('Paginator','Session');

public function index() {
    $this->Form->recursive = -1;
   $this->Paginator->settings = array(
  'page' => 1,
  'contain' => ['Institution'=>['fields'=>['name']],'Department'=>['fields'=>['name']]],'fields'=>['id','name','close']);
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
public function edit_coord($id = null) {
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
     
    }
}
public function create()
{

 if ($this->request->is('post')) {
           $this->Form->create();
            
        $form_id=$this->Session->read('form_id');
        $this->request->data['Form']['id']=$form_id;        

        // debug($this->request->data);exit();
         if ($this->Form->save($this->request->data)) {
                $this->Session->setFlash(__('Form has been added.'));               
         }else{
           $this->Session->setFlash(__('Unable to add form.'));
         }            
           $attr=$this->request->data['Form']['attribute'];
           $att_array=explode('-',$attr);
           $label=$this->request->data['Form']['label'];
           $label_array=explode('-',$label);
             
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
                 }  
                 if($id=='16'){
                 $cnt='1';}   
                 else{$cnt='0';} 

                 $i++;                    
           }  
                                    
        } 
  }

  public function view_form(){



 // unset($this->request->data);  
  $forms = $this->Form->find('list');  
//debug($forms);
  ///$forms = [];
  $this->set(compact('forms')); 
if ($this->request->is('post')) {
  $id=$this->request->data['Form']['form_id'];

   
           $this->Session->write('id',$id);                              
$this->redirect(array(
    'controller' => 'forms', 'action' => 'display', '?' => array(
        'id' => $id
    )
));



}

 
public function view() {
      
      $code = $this->Form->find('all', array('conditions' => array('Form.code !=' => 'null'),
                                             'fields' => array('Form.code')));
     
      debug($code);
  }
}

  } 


 
 public function list_forms() {
      $this->request->onlyAllow('ajax');
    $id = $this->request->query('id');
    if (!$id) {
      throw new NotFoundException();
    }

    $this->disableCache();

    $forms = $this->Form;
     $this->set(compact('forms'));
    $this->set('_serialize', array('forms'));
  }

  public function view($id = null) {
    if (!$this->Form->exists($id)) {
      throw new NotFoundException(__('Invalid institution'));
    }
    $options = array('conditions' => array('Form.' . $this->Form->primaryKey => $id));
    $this->set('form', $this->Form->find('first', $options));
  }

  public function display($id = null)
  {$this->Form->create();
    $id=$this->Session->read('id');
    //debug($id);
    if (!$this->Form->exists($id)) {
      throw new NotFoundException(__('Invalid name'));
    }
   else
   {
    $code = $this->request->data=$this->Form->find('first',
                     array('conditions' => array('Form.id' => $id),'fields' => array('Form.code')));
  //debug($code);
    $this->set('code',$code['Form']['code']);
   echo html_entity_decode($code['Form']['code']);

   }

  }

}


?>