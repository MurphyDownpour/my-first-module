<?php
    if (!defined('_PS_VERSION_'))
        exit;

    class ModuleDemo extends Module
    {
        public function __construct()
        {
            $this->name = 'moduledemo';
            $this->tab = 'front_office_features';
            $this->version = '0.1';
            $this->author = 'Zaur Akhmedov';
            $this->ps_versions_compliancy = array('min' => '1.5', 'max' => _PS_VERSION_);
            $this->need_instance = 0;
            $this->bootstrap = true;
            $this->displayName = $this->l('Module Demo');
            $this->description = $this->l('This is just a demo.');
            parent::__construct();
        }

        public function getContent()
        {
            $this->processConfiguration();
            $this->assignConfiguration();
            return $this->display(__FILE__, 'getContent.tpl');
        }

        public function install()
        {
            return parent::install() && $this->registerHook('leftColumn');
        }

        public function hookDisplayLeftColumn($params)
        {
            $price_from = Configuration::get('MYMOD_PRICE_FROM');
            $price_to = Configuration::get('MYMOD_PRICE_TO');


            $db = Db::getInstance();
            $sql = 'SELECT * FROM '._DB_PREFIX_.'product WHERE price >='
                . $price_from . ' AND price <=' . $price_to;
            $result = $db->executeS($sql);
            if (!isset($result))
                die('Ошибка.');
            $quantity = 0;
            foreach($result as $row)
            {
                $quantity += (int)$row['quantity'];
            }
            if (!isset($quantity))
                die('Ошибка.');

            $this->context->smarty->assign('result', $quantity);
            $this->context->smarty->assign('price_from', $price_from);
            $this->context->smarty->assign('price_to', $price_to);

            return $this->display(__FILE__, 'displayLeftColumn.tpl');
        }

        public function processConfiguration()
        {
            if (Tools::isSubmit('mymod_pc_form'))
            {
                $price_from = Tools::getValue('price_from');
                $price_to = Tools::getValue('price_to');

                Configuration::updateValue('MYMOD_PRICE_FROM', $price_from);
                Configuration::updateValue('MYMOD_PRICE_TO', $price_to);
                $this->context->smarty->assign('confirmation', 'ok');
            }
        }

        public function assignConfiguration()
        {
            $price_from = Configuration::get('MYMOD_PRICE_FROM');
            $price_to = Configuration::get('MYMOD_PRICE_TO');
            $this->context->smarty->assign('price_from', $price_from);
            $this->context->smarty->assign('price_to', $price_to);
        }
    }