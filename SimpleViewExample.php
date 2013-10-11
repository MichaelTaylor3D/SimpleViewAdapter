<?php 
// 
//  SimpleViewExample.php
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

require_once 'SimpleViewAdapter.php';

$soapURL = '[SimpleView Soap URL]';
$clientUserName = '[Client Password]';
$clientPassword = '[Client UserName]';

$simpleViewConnect = new SimpleViewAdapter($clientUserName, $clientPassword, $soapURL);

$pageSize = 50;
$pageNum = 1;
$showAmenities = true;

$results = $simpleViewConnect->getListings(
											$pageSize,
											$pageNum,
											SimpleViewFilter::filter_AllListings(),
											$showAmenities
										  );

print_r($results);