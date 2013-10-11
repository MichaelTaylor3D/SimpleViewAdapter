
SimpleViewAdapter.php
SimpleViewFilter.php
SimpleViewEnums.php
SimpleViewExample.php

Author:
       Michael Taylor Contact: www.michaeltaylor3d.com/contact
 
Copyright (c) 2013 Ayers Saint Gross

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Lesser General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Lesser General Public License for more details.
 
You should have received a copy of the GNU Lesser General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

This Adapter exposes the following:


SimpleViewAdapter:

	getListings($pageSize, $pageNum, $filter, $displayAmenities)

	getListing($listingId, $updateHits)

	getListingTypes($webOnly)

	getListingCategories($listingTypeID)

	getListingSubCategories($listingCatId, $listingTypeID)

	getListingRegions($catId)

	getListingAmenities()

	getCouponCategories()

	getCoupons($pageNum, $pageSize, $filter)

	getCouponsByCategories($couponCatId, $pageNum, $pageSize, $filters)

	getCouponsByListingId($listingId, $pageNum, $pageSize, $redeemStart, $redeemEnd, $keywords)

	getCoupon($couponId, $updateHits)

	updateHits($hitTypeID, $recId, $hitDate)

Enums Available:

	FilterType:
		EQUAL_TO
		NOT_EQUAL_TO
		GREATER_THAN
		GREATER_THAN_OR_EQUAL_TO
		LESS_THAN
		LESS_THAN_OR_EQUAL_TO
		LIKE
		STARTS_WITH
		ENDS_WITH
		ANY
		ALL
		NONE

	UDFTypeID:
		currency
		data
		email
		number
		percent
		phone
		dropdown
		text
		textArea
		url
		yesNo
		multiSelect
		ccNumber
		ccExpiration
		fileUpload

	HitTypes:
		listings
		categories
		subCategories
		listingWebSite
		coupons
		locations
		reservations
		
