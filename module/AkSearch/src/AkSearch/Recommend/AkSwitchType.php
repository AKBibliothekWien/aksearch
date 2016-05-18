<?php
/**
 * Extension for SwitchType recommendation
 *
 * PHP version 5
 *
 * Copyright (C) AK Bibliothek Wien 2016.
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
 * @category AKsearch
 * @package  Recommendations
 * @author   Michael Birkner <michael.birkner@akwien.at>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://wien.arbeiterkammer.at/service/bibliothek/
 */

namespace AkSearch\Recommend;


class AkSwitchType extends \VuFind\Recommend\SwitchType {
    /**
     * Search handler to try
     *
     * @var string
     */
    //protected $newHandler;

    /**
     * On-screen description of handler
     *
     * @var string
     */
    //protected $newHandlerName;

    /**
     * Is this module active?
     *
     * @var bool
     */
    //protected $active;

    /**
     * Results object
     *
     * @var \VuFind\Search\Base\Results
     */
    //protected $results;
    
	
	/**
	 * Old search route that should be replaced by new search route
	 *
	 * @var string
	 */
	protected $oldRoute;
	
	/**
	 * New search route that replaces old search route
	 * 
	 * @var string
	 */
	protected $newRoute;
	


    /**
     * Store the configuration of the recommendation module.
     *
     * @param string $settings Settings from searches.ini.
     *
     * @return void
     */
    public function setConfig($settings) {
    	echo $settings;
        $params = explode(':', $settings);
        $this->oldRoute = !empty($params[0]) ? $params[0] : null;
        $this->newRoute = !empty($params[1]) ? $params[1] : 'Solr';
        $this->newHandler = !empty($params[2]) ? $params[2] : 'AllFields';
        $this->newHandlerName = isset($params[3]) ? $params[3] : 'All Fields';

    }

    /**
     * Called at the end of the Search Params objects' initFromRequest() method.
     * This method is responsible for setting search parameters needed by the
     * recommendation module and for reading any existing search parameters that may
     * be needed.
     *
     * @param \VuFind\Search\Base\Params $params  Search parameter object
     * @param \Zend\StdLib\Parameters    $request Parameter object representing user
     * request.
     *
     * @return void
     */
    /*
    public function init($params, $request)
    {
    }
    */

    /**
     * Called after the Search Results object has performed its main search.  This
     * may be used to extract necessary information from the Search Results object
     * or to perform completely unrelated processing.
     *
     * @param \VuFind\Search\Base\Results $results Search results object
     *
     * @return void
     */
    /*
    public function process($results)
    {
        $handler = $results->getParams()->getSearchHandler();
        $this->results = $results;

        // If the handler is null, we can't figure out a single handler, so this
        // is probably an advanced search.  In that case, we shouldn't try to change
        // anything!  We should only show recommendations if we know what handler is
        // being used and can determine that it is not the same as the new handler
        // that we want to recommend.
        $this->active = (!is_null($handler) && $handler != $this->newHandler);
    }
*/
    /**
     * Get results stored in the object.
     *
     * @return \VuFind\Search\Base\Results
     */
    /*
    public function getResults()
    {
        return $this->results;
    }
    */
    

    /**
     * Get the new search handler, or false if it does not apply.
     *
     * @return string
     */
    public function getNewHandler()
    {
        return $this->active ? $this->newHandler : false;
    }
    
    /**
     * Get old route
     * 
     * @return string
     */
    public function getOldRoute() {
    	return $this->oldRoute;
    }
    
    /**
     * Get new route
     *
     * @return string
     */
    public function getNewRoute() {
    	return $this->newRoute;
    }

    /**
     * Get the description of the new search handler.
     *
     * @return string
     */
    /*
    public function getNewHandlerName()
    {
        return $this->newHandlerName;
    }
    */
}