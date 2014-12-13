<?php
/**
 * @property int $id
 * @property int $mineId
 * @property string $cultureAim
 * @property string $cultureIdea
 * @property string $cultureBelief
 * @property string $cultureRecog
 * @property mixed $cultureRecogImage
 * @property string $cultureOrgan
 * @property string $cultureOrganMusic
 * @property string $cultureOrganMusicFile
 * @property string $cultureOrganMusicLrc
 * @property string $cultureOrganActive
 * @property string $cultureOrganPaper
 * @property string $cultureVideo
 * @property string $cultureOther
 * @property Mine $mine
 */
class Culture extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'culture',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'cultureAim' => 'culture_aim',
				'cultureIdea' => 'culture_idea',
				'cultureBelief' => 'culture_belief',
				'cultureRecog' => 'culture_recog',
				'cultureRecogImage' => 'culture_recog_image',
				'cultureOrgan' => 'culture_organ',
				'cultureOrganMusic' => 'culture_organ_music',
				'cultureOrganMusicFile' => 'culture_organ_music_file',
				'cultureOrganMusicLrc' => 'culture_organ_music_lrc',
				'cultureOrganActive' => 'culture_organ_active',
				'cultureOrganPaper' => 'culture_organ_paper',
				'cultureVideo' => 'culture_video',
				'cultureOther' => 'culture_other',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'cultureAim' => null,
		'cultureIdea' => null,
		'cultureBelief' => null,
		'cultureRecog' => null,
		'cultureRecogImage' => null,
		'cultureOrgan' => null,
		'cultureOrganMusic' => null,
		'cultureOrganMusicFile' => null,
		'cultureOrganMusicLrc' => null,
		'cultureOrganActive' => null,
		'cultureOrganPaper' => null,
		'cultureVideo' => null,
		'cultureOther' => null,
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