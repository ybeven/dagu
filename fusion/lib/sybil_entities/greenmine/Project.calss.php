<?php
/**
 * @property int $id
 * @property string $mineId
 * @property string $projectNum
 * @property string $projectName
 * @property string $projectDetail
 * @property string $projectlWorktime
 * @property int $projectCost
 * @property string $projectMoney
 * @property string $projectOrgan
 * @property string $projectEffect
 * @property int $projectType
 * @property string $projectStarttime
 * @property Mine $mine
 */
class Project extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'project',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'projectNum' => 'project_num',
				'projectName' => 'project_name',
				'projectDetail' => 'project_detail',
				'projectlWorktime' => 'projectl_worktime',
				'projectCost' => 'project_cost',
				'projectMoney' => 'project_money',
				'projectOrgan' => 'project_organ',
				'projectEffect' => 'project_effect',
				'projectType' => 'project_type',
				'projectStarttime' => 'project_starttime',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'projectNum' => null,
		'projectName' => null,
		'projectDetail' => null,
		'projectlWorktime' => null,
		'projectCost' => null,
		'projectMoney' => null,
		'projectOrgan' => null,
		'projectEffect' => null,
		'projectType' => null,
		'projectStarttime' => null,
	);
	protected function __get_mine() {
		if(!$this->properties['mine'] instanceof Mine) {
			$mine = new Mine;
			$mine->getById($this->properties['mineId']);
			if($mine->id>0) $this->properties['mine'] = &$mine;
		}
		return $this->properties['mine'];
	}
}
?>