<?php

namespace Hcode;

class PageAdmin extends Page {
	//os layouts virão da pasta /views/admin e não da pasta views para não gerar conflitos estarão separadas
	public function __construct($opts = array(), $tpl_dir = "/views/admin/")
	{
		//aproveita o construtor da classe Page//chama
		parent::__construct($opts, $tpl_dir);
	}

}

?>