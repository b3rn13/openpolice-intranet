<?php
/**
 * @version     $Id: dispatcher.php 3024 2011-10-09 01:44:30Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Installer
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Component Dispatcher
 *
 * @author      Stian Didriksen <http://nooku.assembla.com/profile/stiandidriksen>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Installer
 */
class ComInstallerDispatcher extends ComDefaultDispatcher
{
    /**
     * Set the default controller
     *
     * @return  void
     */
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'controller' => 'components'
        ));

        parent::_initialize($config);
    }
}