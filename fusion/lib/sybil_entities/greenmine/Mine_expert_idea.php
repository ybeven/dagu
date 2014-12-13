<?php
/**
 * @property int $mineId
 * @property int $expertId
 * @property string $mineExpertIdeaContent
 * @property string $mineExpertIdeaTime
 * @property int $id
 * @property int $isShenbao
 * @property Mine $mine
 * @property Expert $expert
 */
class MineExpertIdea extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'mine_expert_idea',
			'columns' => array(
				'mineId' => 'mine_id',
				'expertId' => 'expert_id',
				'mineExpertIdeaContent' => 'mine_expert_idea_content',
				'mineExpertIdeaTime' => 'mine_expert_idea_time',
				'id' => 'id',
				'isShenbao' => 'is_shenbao',
			)
		),
	);
	protected $properties = array(
		'mineId' => null,
		'expertId' => null,
		'mineExpertIdeaContent' => null,
		'mineExpertIdeaTime' => null,
		'id' => 0,
		'isShenbao' => null,
	);
	protected function __get_mine() {
		if(!$this->properties['mine'] instanceof Mine) {
			$mine = new Mine;
			$mine->getById($this->properties['mineId']);
			if($mine->id>0) $this->properties['mine'] = &$mine;
		}
		return $this->properties['mine'];
	}
	protected function __get_expert() {
		if(!$this->properties['expert'] instanceof Expert) {
			$expert = new Expert;
			$expert->getById($this->properties['expertId']);
			if($expert->id>0) $this->properties['expert'] = &$expert;
		}
		return $this->properties['expert'];
	}
}
?>