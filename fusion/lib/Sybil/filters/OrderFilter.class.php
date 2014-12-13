<?php
/**
 * 显示顺序过滤器
 */
class OrderFilter extends DataFilter {
	private $filed = '';
        private $asc;
	/**
	 * 初始化一个显示顺序过滤器
	 * @param string $orderByFiled 排序依据的列名
	 */
	public function OrderFilter($orderByFiled, $asc=true) {
		$this->filed = mysql_escape_string($orderByFiled);
                $this->asc = $asc;
	}
	public function getLevel() {
		return 1;
	}
	protected function getSqlElement() {
		return 'ORDER BY `'.$this->filed.'`'.($this->asc?' ASC':' DESC');
	}
}
?>