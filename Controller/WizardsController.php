<?php

App::uses('WizardsAppController', 'Wizards.Controller');

/**
 * Wizards Controller
 *
 * @property Wizard $Wizard
 */
class WizardsController extends WizardsAppController {

	public $name = 'Wizards';
	public $uses = array('Wizards.Wizard');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Wizard->recursive = 0;
		$this->set('wizards', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Wizard->id = $id;
		if (!$this->Wizard->exists()) {
			throw new NotFoundException(__('Invalid wizard'));
		}
		$this->set('wizard', $this->Wizard->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($type) {
		if ($this->request->is('post')) {
			$this->Wizard->create();
			if ($this->Wizard->save($this->request->data)) {
				$this->Session->setFlash(__('The wizard has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wizard could not be saved. Please, try again.'), 'flash_warning');
			}
		}
		$this->view = 'add_edit_'.$type;
		//$this->set('actions', Zuha::getPluginControllerActions());
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Wizard->id = $id;
		if (!$this->Wizard->exists()) {
			throw new NotFoundException(__('Invalid wizard'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Wizard->save($this->request->data)) {
				$this->Session->setFlash(__('The wizard has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wizard could not be saved. Please, try again.'), 'flash_warning');
			}
		} else {
			$this->request->data = $this->Wizard->read(null, $id);
			$this->view = 'add_edit_'.$this->request->data['Wizard']['type'];
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Wizard->id = $id;
		if (!$this->Wizard->exists()) {
			throw new NotFoundException(__('Invalid wizard'));
		}
		if ($this->Wizard->delete()) {
			$this->Session->setFlash(__('Wizard deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Wizard was not deleted'), 'flash_danger');
		$this->redirect(array('action' => 'index'));
	}

/**
 * Returns Wizard data for the display element.
 *
 * @param string $plugin
 * @param string $controller
 * @param string $action
 * @return boolean|array
 */
	public function display($plugin, $controller, $action) {
		$data = $this->Wizard->find('first', array(
			'conditions' => array(
				'OR' => array(
					array(
						'Wizard.plugin' => '*',
						'Wizard.controller' => '*',
						'Wizard.action' => '*',
						),
					array(
						'Wizard.plugin' => $plugin,
						'Wizard.controller' => '*',
						'Wizard.action' => '*',
						),
					array(
						'Wizard.plugin' => $plugin,
						'Wizard.controller' => $controller,
						'Wizard.action' => '*',
						),
					array(
						'Wizard.plugin' => $plugin,
						'Wizard.controller' => $controller,
						'Wizard.action' => $action,
						)
				)
			)
		));

		if ($data['Wizard']) {
			return $data['Wizard'];
		} else {
			return false;
		}
	}

}
