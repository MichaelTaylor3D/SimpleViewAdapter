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

class FilterType
{
	//Filter Type Enums
	const EQUAL_TO = 'EQUAL TO';
	const NOT_EQUAL_TO = 'NOT EQUAL TO';
	const GREATER_THAN = 'GREATER THAN';
	const GREATER_THAN_OR_EQUAL_TO = 'GREATER THAN OR EQUAL TO';
	const LESS_THAN = 'LESS THAN';
	const LESS_THAN_OR_EQUAL_TO = 'LESS THAN OR EQUAL TO';
	const LIKE = 'LIKE';
	const STARTS_WITH = 'STARTS WITH';
	const ENDS_WITH = 'ENDS WITH';
	const ANY = 'ANY';
	const ALL = 'ALL';
	const NONE = 'NONE';
}

class UDFTypeID
{
	const currency = 1;
	const data = 2;
	const email = 3;
	const number = 4;
	const percent = 5;
	const phone = 6;
	const dropdown = 7;
	const text = 8;
	const textArea = 9;
	const url = 10;
	const yesNo = 11;
	const multiSelect = 12;
	const ccNumber = 13;
	const ccExpiration = 14;
	const fileUpload = 15;
}

class HitTypes
{
	const listings = 1;
	const categories = 2;
	const subCategories = 3;
	const listingWebSite = 4;
	const coupons = 5;
	const locations = 6;
	const reservations = 7;
}