<?php
// 
//  SimpleViewEnums.php
//  
//  Author:
//       Michael Taylor www.michaeltaylor3d.com/contact
//  
//  Copyright (c) 2013 Ayers Saint Gross
//	Website: www.asg-architects.com
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

include_once 'SimpleViewEnums.php';
include_once 'SimpleViewFilter.php';

/**
 * SimpleView Adapter Wraps SOAP API implementation
 * into easy to access PHP functions.
 */
class SimpleViewAdapter
{
	private $clientUserName;
	private $clientPassword;
	private $soapClient;
	
	function __construct($clientUserName, $clientPassword, $soapURL)
	{
		$this->clientUserName = $clientUserName;
		$this->clientPassword = $clientPassword;
		$this->soapClient = new SoapClient($soapURL);
	}
	
	private function convertBoolToInt($var)
	{
		if(is_bool($var))
		{
			return $var ? 1 : 0;
		}
		else if(is_int($var) && ($var == 1 || $var == 0))
		{
			//if its an int just return the value;
			return $var;
		}
		else
		{
			die('Error: variable can not be converted to a bool, please check the value');
		}
		
	}
	
	//<-------------------API WRAPPERS------------------->//
	
	/**
	 * @param integer $pageSize
	 * @param integer $pageNum
	 * @param array $filter
	 * @param bool $displayAmenities
	 */
	public function getListings($pageSize, $pageNum, $filter, $displayAmenities)
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getListings(
														$this->clientUserName,
														$this->clientPassword,
														$pageNum,$pageSize,
														$filter,
														$this->convertBoolToInt($displayAmenities)
													 );
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
												
		return $results;
	}
	
	/**
	 * @param integer $listingId
	 * @param integer $updateHits
	 */
	public function getListing($listingId, $updateHits)
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getListing(
														$this->clientUserName,
														$this->clientPassword,
														$listingId,
														$updateHits
													);
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}
	
	/**
	 * @param bit $webOnly
	 */
	public function getListingTypes($webOnly)
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getListingTypes(
														$this->clientUserName,
														$this->clientPassword,
														$webOnly
													);
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}
	
	/**
	 * @param integer $listingTypeID
	 */
	public function getListingCategories($listingTypeID)
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getListingCats(
															$this->clientUserName,
															$this->clientPassword,
															$listingTypeID
														);
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}
	
	/**
	 * @param integer $listingCatId
	 * @param integer $listingTypeID
	 */
	public function getListingSubCategories($listingCatId, $listingTypeID)
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getListingSubCats(
																$this->clientUserName,
																$this->clientPassword,
																$listingCatId,
																$listingTypeID
														   );
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}
	
	/**
	 * @param integer $catId
	 */
	public function getListingRegions($catId)
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getListingRegions(
																$this->clientUserName,
																$this->clientPassword,
																$catId
														   );
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}
	
	public function getListingAmenities()
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getListingAmenities(
																$this->clientUserName,
																$this->clientPassword
															 );
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}
	
	public function getCouponCategories()
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getCouponCats(
															$this->clientUserName,
															$this->clientPassword
													   );
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}
	
	/**
	 * @param integer $pageNum
	 * @param integer $pageSize
	 * @param array $filter
	 */
	public function getCoupons($pageNum, $pageSize, $filter)
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getCoupons(
														$this->clientUserName,
														$this->clientPassword,
														$pageNum,
														$pageSize,
														$filter
													);
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}
	
	/**
	 * @param integer $couponCatId
	 * @param integer $pageNum
	 * @param integer $pageSize
	 * @param array $filters
	 */
	public function getCouponsByCategories($couponCatId, $pageNum, $pageSize, $filters)
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getCouponsByCats(
																$this->clientUserName,
																$this->clientPassword,
																$couponCatId,
																$pageNum,
																$pageSize,
																$filters
														  );
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}
	
	/**
	 * @param integer $listingId
	 * @param integer $pageNum
	 * @param integer $pageSize
	 * @param date $redeemStart
	 * @param date $redeemEnd
	 * @param string $keywords
	 */
	public function getCouponsByListingId($listingId, $pageNum, $pageSize, $redeemStart, $redeemEnd, $keywords)
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getCouponsByListingId(
																	$this->clientUserName,
																	$this->clientPassword,
																	$listingId,
																	$pageNum,
																	$pageSize,
																	$redeemStart,
																	$redeemEnd,
																	$keywords
														  	   );
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}
	
	/**
	 * @param integer $couponId
	 * @param integer $updateHits
	 */
	public function getCoupon($couponId, $updateHits)
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->getCoupon(
														$this->clientUserName,
														$this->clientPassword,
														$couponId,
														$updateHits
												   );
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}
	
	/**
	 * @param integer $hitTypeID
	 * @param integer $recId
	 * @param date $hitDate
	 */
	public function updateHits($hitTypeID, $recId, $hitDate)
	{
		$results;
		
		try 
		{
			$results = $this->soapClient->updateHits(
														$this->clientUserName,
														$this->clientPassword,
														$hitTypeID,
														$recId,
														$hitDate
												   );
		}
		catch (Exception $ex)		
		{
			die($ex);
		}
		
		return $results;
	}	
}