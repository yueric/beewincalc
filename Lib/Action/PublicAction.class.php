<?php
/**
 * 
 * 通用类
 * @author ericyu
 *
 */
class PublicAction extends Action{
	public function header() {
		$this->display('header');
	}
	public function nav($ntype="help") {
		$this->ntype = $ntype;
		$this->display('nav');
	}
	public function footer() {
		$this->display('footer');
	}
	public function mark() {
		$this->display('mark');
	}
}