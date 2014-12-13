<?php
/**
 * 结果限制过滤器LimitFilter生成LIMIT指令，用于限制返回的最大数据量
 */
class LimitFilter extends DataFilter {
	private $start = 0; #start是LIMIT指令的开端，即从第几条开始获取数据
	private $length = 0; #length是数据量，描述从start开始获取多少条数据
	/**
	 * 初始化一个结果限制过滤器
	 * @param int $offset 偏移量，即起始行
	 * @param int $rows 返回最大行数
	 */
	public function __construct($offset, $rows) {
		if(is_numeric($offset) && $offset >= 0) {
			$this->start = $offset;
		} else {
			throw new ArgumentException('offset');
		}
		if(is_numeric($rows) && $rows > 0) {
			$this->length = $rows;
		} else {
			throw new ArgumentException('rows');
		}
	}
	public function getLevel() {
		return 0;
	}
	protected function getSqlElement() {
		return 'LIMIT '.$this->start.', '.$this->length;
	}
}
?>