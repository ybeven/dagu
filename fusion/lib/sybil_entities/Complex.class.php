<?php
/**
 * @property int $id
 * @property int $mineId
 * @property int $complexGoback
 * @property int $complexGobackDig
 * @property int $complexGobackUse
 * @property int $complexFindbackMain
 * @property int $complexFindbackAsso
 * @property int $complexFindbackOretaste
 * @property int $complexFindbackContaste
 * @property int $complexFindbackRate
 * @property int $complexFindbackOreuse
 * @property int $complexFindbackConuse
 * @property int $complexAllback
 * @property int $complexAllbackGo
 * @property int $complexAllbackFind
 * @property int $complexDilut
 * @property int $complexDilutAmount
 * @property int $complexDilutDownamont
 * @property int $complexDilutOretaste
 * @property int $complexDilutDowntaste
 * @property int $complexDilutUseless
 * @property int $complexProrate
 * @property int $complexProrateProquality
 * @property int $complexProrateOrequality
 * @property int $complexUserate
 * @property int $complexUserateUsequality
 * @property int $complexUserateSavequality
 * @property int $complexUserateGoback
 * @property int $complexUserateFindback
 * @property int $complexUserateTaste
 * @property int $complexEfficiency
 * @property int $complexEfficiencyAll
 * @property int $complexEfficiencyUsequality
 * @property int $complexEfficiencyAdjust
 * @property int $complexEfficiencyPastprice
 * @property int $complexEfficiencyNowprice
 * @property int $complexRecover
 * @property int $complexRecoverGoback
 * @property int $complexRecoverFindback
 * @property int $complexRecoverFireback
 * @property int $complexCoalBack
 * @property int $complexCoalIn
 * @property int $complexCoalAll
 * @property Mine $mine
 */
class Complex extends DataEntity {
	protected static $propSpec = array(
		'master' => array(
			'tableName' => 'complex',
			'columns' => array(
				'id' => 'id',
				'mineId' => 'mine_id',
				'complexGoback' => 'complex_goback',
				'complexGobackDig' => 'complex_goback_dig',
				'complexGobackUse' => 'complex_goback_use',
				'complexFindbackMain' => 'complex_findback_main',
				'complexFindbackAsso' => 'complex_findback_asso',
				'complexFindbackOretaste' => 'complex_findback_oretaste',
				'complexFindbackContaste' => 'complex_findback_contaste',
				'complexFindbackRate' => 'complex_findback_rate',
				'complexFindbackOreuse' => 'complex_findback_oreuse',
				'complexFindbackConuse' => 'complex_findback_conuse',
				'complexAllback' => 'complex_allback',
				'complexAllbackGo' => 'complex_allback_go',
				'complexAllbackFind' => 'complex_allback_find',
				'complexDilut' => 'complex_dilut',
				'complexDilutAmount' => 'complex_dilut_amount',
				'complexDilutDownamont' => 'complex_dilut_downamont',
				'complexDilutOretaste' => 'complex_dilut_oretaste',
				'complexDilutDowntaste' => 'complex_dilut_downtaste',
				'complexDilutUseless' => 'complex_dilut_useless',
				'complexProrate' => 'complex_prorate',
				'complexProrateProquality' => 'complex_prorate_proquality',
				'complexProrateOrequality' => 'complex_prorate_orequality',
				'complexUserate' => 'complex_userate',
				'complexUserateUsequality' => 'complex_userate_usequality',
				'complexUserateSavequality' => 'complex_userate_savequality',
				'complexUserateGoback' => 'complex_userate_goback',
				'complexUserateFindback' => 'complex_userate_findback',
				'complexUserateTaste' => 'complex_userate_taste',
				'complexEfficiency' => 'complex_efficiency',
				'complexEfficiencyAll' => 'complex_efficiency_all',
				'complexEfficiencyUsequality' => 'complex_efficiency_usequality',
				'complexEfficiencyAdjust' => 'complex_efficiency_adjust',
				'complexEfficiencyPastprice' => 'complex_efficiency_pastprice',
				'complexEfficiencyNowprice' => 'complex_efficiency_nowprice',
				'complexRecover' => 'complex_recover',
				'complexRecoverGoback' => 'complex_recover_goback',
				'complexRecoverFindback' => 'complex_recover_findback',
				'complexRecoverFireback' => 'complex_recover_fireback',
				'complexCoalBack' => 'complex_coal_back',
				'complexCoalIn' => 'complex_coal_in',
				'complexCoalAll' => 'complex_coal_all',
			)
		),
	);
	protected $properties = array(
		'id' => 0,
		'mineId' => null,
		'complexGoback' => null,
		'complexGobackDig' => null,
		'complexGobackUse' => null,
		'complexFindbackMain' => null,
		'complexFindbackAsso' => null,
		'complexFindbackOretaste' => null,
		'complexFindbackContaste' => null,
		'complexFindbackRate' => null,
		'complexFindbackOreuse' => null,
		'complexFindbackConuse' => null,
		'complexAllback' => null,
		'complexAllbackGo' => null,
		'complexAllbackFind' => null,
		'complexDilut' => null,
		'complexDilutAmount' => null,
		'complexDilutDownamont' => null,
		'complexDilutOretaste' => null,
		'complexDilutDowntaste' => null,
		'complexDilutUseless' => null,
		'complexProrate' => null,
		'complexProrateProquality' => null,
		'complexProrateOrequality' => null,
		'complexUserate' => null,
		'complexUserateUsequality' => null,
		'complexUserateSavequality' => null,
		'complexUserateGoback' => null,
		'complexUserateFindback' => null,
		'complexUserateTaste' => null,
		'complexEfficiency' => null,
		'complexEfficiencyAll' => null,
		'complexEfficiencyUsequality' => null,
		'complexEfficiencyAdjust' => null,
		'complexEfficiencyPastprice' => null,
		'complexEfficiencyNowprice' => null,
		'complexRecover' => null,
		'complexRecoverGoback' => null,
		'complexRecoverFindback' => null,
		'complexRecoverFireback' => null,
		'complexCoalBack' => null,
		'complexCoalIn' => null,
		'complexCoalAll' => null,
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