<?php 
// 
//  SimpleViewFilter.php
//  
//  Author:
//       Michael Taylor <mtaylor@asg-architects.com>
//  
//  Copyright (c) 2013 Ayers Saint Gross
// 
//  This program is free software: you can redistribute it and/or modify
//  it under the terms of the GNU Lesser General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
// 
//  This program is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU Lesser General Public License for more details.
// 
//  You should have received a copy of the GNU Lesser General Public License
//  along with this program.  If not, see <http://www.gnu.org/licenses/>.

/**
* This filter class is still pretty basic 
* and it doesnt support some more advanced 
* filter types that utilize combinations
* of ANDOR. If these filter types are needed
* it is suggested that you build them manually.
 */
class SimpleViewFilter
{	
	public $fieldName;
	public $fieldCategory;
	public $filterValue;
	public $filterType;
	
	function __construct($fieldCategory, $fieldName, $filterType, $filterValue)
	{
		$this->fieldName = $fieldName;
		$this->fieldCategory = $fieldCategory;
		$this->filterValue = $filterValue;
		$this->filterType = $filterType;
	}
	
	/**
	 * Converts this object into an associative array
	 */
	public function toArray()
	{
		return array
		(
			'FIELDCATEGORY' => $this->fieldCategory,
			'FIELDNAME' => $this->fieldName,
			'FILTERTYPE' => $this->filterType,
			'FILTERVALUE' => $this->filterValue
		);
	}
	
	/**
	 * Generates an array of filter arrays
	 * @param Array $filters
	 */
	public static function filterCollectiontoArray($filters)
	{
		assert(self::isArrayOfFilters($filters));	
		
		$processedArray = array();
		
		foreach ($filters as $filter)
		{
			array_push($processedArray, $filter->toArray());
		}
		
		return $processedArray;
	}
	
	/**
	 * Pre-built filter: returns all listings
	 */
	public static function filter_AllListings()
	{
		$filter = new SimpleViewFilter('Listing', 'Listingid', FilterType::GREATER_THAN, 0);
		return self::filter($filter);
	}
	
	/**
	 * Generates a basic filter from a FilterObject
	 * @param Filter $filterObject
	 */
	public static function generatefilter($filterObject)
	{
		assert(is_a($filterObject, 'SimpleViewFilter'));
		
		$filter = array 
		(
			'ANDOR' => 'OR',
			'FILTERS' => array
			(
				$filterObject->toArray()
			)
		);	
		
		return $filter;
	}
	
	/**
	 * <--Warning: Still not properly tested-->
	 * Allows compund filters to be generated
	 * @param string $AndOr
	 * @param Array $filters
	 */
	public static function generateCompoundfilter($AndOr, $filters)
	{
		assert(self::isArrayOfFilters($filters));
			
		return array 
		(
			'ANDOR' => $AndOr,
			'FILTERS' => array
			(
				self::filterCollectiontoArray($filters)
			)
		);
	}
	
	private static function isArrayOfFilters($array)
	{
		return (is_array($filters) && (is_a($filters[0], 'SimpleViewFilter'))) ? true : false;
	}
}