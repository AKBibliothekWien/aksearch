<?php

namespace AkSearch\Controller;

class SearchController extends \VuFind\Controller\SearchController
{
    
	protected $akConfig;

    /**
     * Process the facets to be used as limits on the Advanced Search screen.
     *
     * @param array  $facetList    The advanced facet values
     * @param object $searchObject Saved search object (false if none)
     *
     * @return array               Sorted facets, with selected values flagged.
     */
    protected function processAdvancedFacets($facetList, $searchObject = false) {
    	
        // Process the facets
        $hierarchicalFacets = $this->getHierarchicalFacets();
        $facetHelper = null;
        if (!empty($hierarchicalFacets)) {
            $facetHelper = $this->getServiceLocator()->get('VuFind\HierarchicalFacetHelper');
        }
        
        foreach ($facetList as $facet => &$list) {
            // Hierarchical facets: format display texts and sort facets to a flat array according to the hierarchy
            if (in_array($facet, $hierarchicalFacets)) {
                $tmpList = $list['list'];
                $facetHelper->sortFacetList($tmpList, true);
                $tmpList = $facetHelper->buildFacetArray($facet, $tmpList);
                $list['list'] = $facetHelper->flattenFacetHierarchy($tmpList);
            }

            foreach ($list['list'] as $key => $value) {
                // Build the filter string for the URL:
                $fullFilter = ($value['operator'] == 'OR' ? '~' : '') . $facet . ':"' . $value['value'] . '"';

                // If we haven't already found a selected facet and the current facet has been applied to the search, we should store it as
                // the selected facet for the current control.
                if ($searchObject && $searchObject->getParams()->hasFilter($fullFilter)) {
                    $list['list'][$key]['selected'] = true;
                    // Remove the filter from the search object -- we don't want it to show up in the "applied filters" sidebar since it
                    // will already be accounted for by being selected in the filter select list!
                    $searchObject->getParams()->removeFilter($fullFilter);
                }
            }
        }
        
        
        
        // TODO: Read custom facet config from AKsearch.ini and add to facetList here:
        $this->akConfig = $this->getServiceLocator()->get('\VuFind\Config')->get('AKsearch'); // Get AKsearch.ini
        echo '<pre>';
        print_r($this->akConfig);
        echo '</pre>'; 
        $facetList['test_facet']['label'] = 'Spezial-Sammlung';
        $facetList['customField_txt_mv']['list'][] = array('value' => 'Digitaler Wandel', 'displayText' => 'Digitaler Wandel', 'operator' => 'OR');
        $facetList['locationCode_str_mv']['list'][]= array('value' => 'ZSF', 'displayText' => 'DVDs Arbeit im Film', 'operator' => 'OR');
        

        return $facetList;
    }
    
}