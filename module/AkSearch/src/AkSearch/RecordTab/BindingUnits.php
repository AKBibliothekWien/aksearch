<?php
/**
 * Tab for binding units of journals.
 * 
 * TODO: Check if this one is really necessary or if we could use HoldingsILS instead.
 *
 * PHP version 5
 *
 * Copyright (C) AK Bibliothek Wien 2015.
 * Some code parts ware adopted from VuFind\RecordDriver\SolrMarc. They are marked accordingly.
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
 * @package  RecordTabs
 * @author   Michael Birkner <michael.birkner@akwien.at>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://wien.arbeiterkammer.at/service/bibliothek/
 */

namespace AkSearch\RecordTab;
use VuFind\RecordTab\AbstractBase as AbstractBase;

class BindingUnits extends AbstractBase {

	
    /**
     * Return value is title of the Tab.
     * Is a method declared in interface TabInterface.php
     *
     * @return string
     */
    public function getDescription() {
		return 'Bindeeinheiten';
    }
    
    
    /**
     * Return value declares if Tab is active.
     * Is a method declared in interface TabInterface.php
     * 
     * @return bool
     */
    public function isActive() {
    	
    	return false; // We use HoldingsILS tab now for all!
    	/*
		// Method "isJournal" in RecordDriver "SolrMab" checks if currently loaded record is a journal.
		$tabEnabled = $this->getRecordDriver()->tryMethod('isJournal');
		
		// Tab is only visible if this method returns true
		return $tabEnabled;
		*/
    }

}
?>
