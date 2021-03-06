<?php
/**
 * @version     $Id: groups.php 1041 2011-10-09 00:04:40Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Groups
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Aros Database Table Class
 *
 * @author      Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Groups
 */

class ComGroupsDatabaseTableGroups extends ComGroupsDatabaseTableNodes
{
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
            'name'  => 'core_acl_aro_groups',
            'base'  => 'core_acl_aro_groups'
        ));

        parent::_initialize($config);
	}
}