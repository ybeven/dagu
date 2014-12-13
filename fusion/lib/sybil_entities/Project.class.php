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
 * @property string $projectType
 * @property string $projectStarttime
 * @property string $projectFinish1
 * @property string $projectFinish2
 * @property string $projectFinish3
 * @property string $projectFinish4
 * @property string $projectFinish5
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
				'projectFinish1' => 'project_finish1',
				'projectFinish2' => 'project_finish2',
				'projectFinish3' => 'project_finish3',
				'projectFinish4' => 'project_finish4',
				'projectFinish5' => 'project_finish5',
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
		'projectFinish1' => null,
		'projectFinish2' => null,
		'projectFinish3' => null,
		'projectFinish4' => null,
		'projectFinish5' => null,
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