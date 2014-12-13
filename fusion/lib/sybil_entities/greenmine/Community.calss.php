<?php
/**
 * @property int $id
 * @property int $mineId
 * @property int $communityDonate
 * @property int $communityDonateBase
 * @property int $communityDonateStudy
 * @property int $communityDonateChannel
 * @property int $communityDonateRoad
 * @property string $communityDonateComment
 * @property int $communityManrate
 * @property string $communityTacit
 * @property string $communityTacitFarm
 * @property string $communityTacitTeach
 * @property string $communityTacitDefeat
 * @property string $communityTacitHelp
 * @property string $communityTacitComment
 * @property string $communityWelfare
 * @property Mine $mine
 */
class Community extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'community',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'communityDonate' => 'community_donate',
				'communityDonateBase' => 'community_donate_base',
				'communityDonateStudy' => 'community_donate_study',
				'communityDonateChannel' => 'community_donate_channel',
				'communityDonateRoad' => 'community_donate_road',
				'communityDonateComment' => 'community_donate_comment',
				'communityManrate' => 'community_manrate',
				'communityTacit' => 'community_tacit',
				'communityTacitFarm' => 'community_tacit_farm',
				'communityTacitTeach' => 'community_tacit_teach',
				'communityTacitDefeat' => 'community_tacit_defeat',
				'communityTacitHelp' => 'community_tacit_help',
				'communityTacitComment' => 'community_tacit_comment',
				'communityWelfare' => 'community_welfare',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'communityDonate' => null,
		'communityDonateBase' => null,
		'communityDonateStudy' => null,
		'communityDonateChannel' => null,
		'communityDonateRoad' => null,
		'communityDonateComment' => null,
		'communityManrate' => null,
		'communityTacit' => null,
		'communityTacitFarm' => null,
		'communityTacitTeach' => null,
		'communityTacitDefeat' => null,
		'communityTacitHelp' => null,
		'communityTacitComment' => null,
		'communityWelfare' => null,
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