<?php
/**
 * Extended Permission Provider Factory Class for AKsearch/VuFind.
 *
 * PHP version 5
 *
 * Copyright (C) AK Bibliothek Wien 2017.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1335, USA.
 *
 * @category AkSearch
 * @package  Authorization
 * @author   Michael Birkner <michael.birkner@akwien.at>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://wien.arbeiterkammer.at/service/bibliothek/
 */

namespace AkSearch\Role\PermissionProvider;
use Zend\ServiceManager\ServiceManager;

class Factory extends \VuFind\Role\PermissionProvider\Factory {
    

    /**
     * Factory for Usergroup
     *
     * @param ServiceManager $sm Service manager.
     *
     * @return Usergroup
     */
    public static function getUsergroup(ServiceManager $sm) {    	
    	return new Usergroup($sm->getServiceLocator()->get('ZfcRbac\Service\AuthorizationService'), $sm->getServiceLocator()->get('VuFind\ILSConnection'));
    }
}
