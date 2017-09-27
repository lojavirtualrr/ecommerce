<?php
	
	namespace Hcode;
	
	use Rain\Tpl;

	class Page {

	private $tpl;
	private $options = [];
	private $defaults = [
		"header"=>true,
		"footer"=>true,
		"data"=>[]
	];
	//função para a configuração do template
	public function __construct($opts = array(), $tpl_dir = "/views/"){

		$this->options = array_merge($this->defaults, $opts);

		$config = array(//o que vier no $tpl_dir dentro do __construct, passamos para a variável $tpl_dir na linha 20
		"tpl_dir"   => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
		"cache_dir" => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
		"debug"     => false
		);
			
		Tpl::configure($config);

		//instancia do template
		$this->tpl = new Tpl;

		$this->setData($this->options["data"]);

		//monta o html(page) a partir da pasta /views/
		if ($this->options["header"] === true) $this->tpl->draw("header");

		}

	private function setData($data = array())
	{
		//foreach na variávle data
		foreach ($data as $key => $value) {
			$this->tpl->assign($key, $value);
		}
	}
	public function setTpl($name, $data = array(), $returnHTMl = false)
	{
		//chama o método setData()
		$this->setData($data);
		//desenha o html na tela
		return $this->tpl->draw($name, $returnHTMl);
	}	
	public function __destruct(){

		if ($this->options["footer"] === true)$this->tpl->draw("footer");
	}
}

?>