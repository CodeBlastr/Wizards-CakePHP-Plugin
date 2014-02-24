<?php

App::uses('WizardsAppModel', 'Wizards.Model');

/**
 * Wizard Model
 *
 */
class Wizard extends WizardsAppModel {

	public $name = 'Wizard';

/**
 * 
 * @param array $options
 * @return boolean
 */
	public function beforeSave($options = array()) {

		// save the P/C/A as underscored
		$this->data['Wizard']['plugin'] = Inflector::underscore($this->data['Wizard']['plugin']);
		$this->data['Wizard']['controller'] = Inflector::underscore($this->data['Wizard']['controller']);
		$this->data['Wizard']['action'] = Inflector::underscore($this->data['Wizard']['action']);

		// serialize the display variables, and save them to `data`
		if (!empty($this->data['Wizard']['position']) || !empty($this->data['Wizard']['text'])) {
			$this->data['Wizard']['data'] = serialize(
					array(
						'type' => $this->data['Wizard']['type'],
						'position' => $this->data['Wizard']['position'],
						'text' => $this->data['Wizard']['text'],
					)
			);
		}

		return true;
	}

/**
 * 
 * @param array $queryData
 * @return array
 */
	public function beforeFind($queryData) {
		if (!empty($queryData['conditions']['plugin'])) {
			$queryData['conditions']['plugin'] = Inflector::underscore($queryData['conditions']['plugin']);
		}
		if (!empty($queryData['conditions']['controller'])) {
			$queryData['conditions']['controller'] = Inflector::underscore($queryData['conditions']['controller']);
		}
		if (!empty($queryData['conditions']['action'])) {
			$queryData['conditions']['action'] = Inflector::underscore($queryData['conditions']['action']);
		}
		return $queryData;
	}

/**
 * 
 * @param array|boolean $results
 * @param boolean $primary
 * @return array|boolean
 */
	public function afterFind($results, $primary = false) {
		if ($results) {
			foreach ($results as &$result) {
				$result['Wizard']['plugin'] = Inflector::camelize($result['Wizard']['plugin']);
				$result['Wizard']['controller'] = Inflector::camelize($result['Wizard']['controller']);
				$result['Wizard']['action'] = Inflector::camelize($result['Wizard']['action']);
				if (isset($result['Wizard']['data'])) {
					$result['Wizard'] = array_merge($result['Wizard'], unserialize($result['Wizard']['data']));
					unset($result['Wizard']['data']);
				}
			}
		}
		return $results;
	}

}
