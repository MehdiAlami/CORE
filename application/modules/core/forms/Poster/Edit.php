<?php
/**
 * CORE Conference Manager
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.terena.org/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to webmaster@terena.org so we can send you a copy immediately.
 *
 * @copyright  Copyright (c) 2011 TERENA (http://www.terena.org)
 * @license    http://www.terena.org/license/new-bsd     New BSD License
 * @revision   $Id$
 */

/** 
 *
 * @package Core_Forms
 * @subpackage Core_Forms_Poster
 */
class Core_Form_Poster_Edit extends Core_Form_Poster
{
	public function init()
	{
		parent::init();

		$this->setAction('/core/poster/edit');
	    $this->addElement('hidden', 'poster_id', array(
			'validators' => array(
				array('Int')
			),
			'required' => true,
			'decorators' => $this->_hiddenElementDecorator
	    ));

	}

	public function isValid($data)
	{
		$this->getElement('title')
		     ->getValidator('Zend_Validate_Db_NoRecordExists')
		     ->setExclude(array(
		        'field' => 'poster_id',
		        'value' => $data['poster_id']
		     ));

		return parent::isValid($data);
	}	

}