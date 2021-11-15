<?php
class Keyboard {
	function __construct() {}
	
	public function accept(ComputerPartDiagnoseVisitor $ComputerPartDiagnoseVisitor) {
		$ComputerPartDiagnoseVisitor->visit_keyboard($this);
	}
}

class Monitor {
	function __construct() {}
	
	public function accept(ComputerPartDiagnoseVisitor $ComputerPartDiagnoseVisitor): void {
		$ComputerPartDiagnoseVisitor->visit_monitor($this);
	}
}

class Mouse {
	function __construct() {}
	
	public function accept(ComputerPartDiagnoseVisitor $ComputerPartDiagnoseVisitor): void {
		$ComputerPartDiagnoseVisitor->visit_mouse($this);
	}
}

class Computer {
	function __construct() {
		$this->parts = [new Keyboard(), new Monitor(), new Mouse()];
	}
	
	public function accept(ComputerPartDiagnoseVisitor $ComputerPartDiagnoseVisitor): void {
		for($i = 0; $i < sizeof($this->parts); $i++) {
			$this->parts[$i]->accept($ComputerPartDiagnoseVisitor);
		}
		
		$ComputerPartDiagnoseVisitor->visit_computer($this);
	}
}

class ComputerPartDiagnoseVisitor {
	function __construct() {}
	
	public function visit_computer(Computer $Computer): void {
		echo 'Diagnosing Computer' . '<br/>';
	}
	
	public function visit_mouse(Mouse $Mouse): void {
		echo 'Diagnosing Mouse' . '<br/>';
	}
	
	public function visit_keyboard(Keyboard $Keyboard): void {
		echo 'Diagnosing Keyboard' . '<br/>';
	}
	
	public function visit_monitor(Monitor $Monitor): void {
		echo 'Diagnosing Monitor' . '<br/>';
	}
}

$computer = new Computer();
$computer->accept(new ComputerPartDiagnoseVisitor());
?>