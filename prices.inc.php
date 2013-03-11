<?php
/*

Copyright (c) 2013 Alan Beebe

Permission is hereby granted, free of charge, to any person obtaining a copy of this
software and associated documentation files (the "Software"), to deal in the Software
without restriction, including without limitation the rights to use, copy, modify, merge,
publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons
to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or
substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE
FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
DEALINGS IN THE SOFTWARE.

*/

class PRICES {

	protected $_matrix;
	
	
/* ------------------------------------------------------------------- */
	public function PRICES($matrixFile) {
		$this->_matrix = json_decode(file_get_contents($matrixFile), true);
	}
	
	

/* ------------------------------------------------------------------- */
	public function priceForCurrencyInTier($currency, $tier) {
		/*
		
		Returns the price for the currency in the specified tier
		
		*/
		
		$currency = strtoupper($currency);
		return $this->_matrix["Tier ".$tier]["prices"][$currency];
	}
	
	

/* ------------------------------------------------------------------- */
	public function proceedsForCurrencyInTier($currency, $tier) {
		/*
		
		Returns the proceeds for the currency in the specified tier
		
		*/
		
		$currency = strtoupper($currency);
		return $this->_matrix["Tier ".$tier]["proceeds"][$currency];
	}
	
	

/* ------------------------------------------------------------------- */
	public function tierForPriceWithCurrency($price, $currency) {
		/*
		
		Returns the tier that contains the price with the specified currency
		
		*/
		
		$currency = strtoupper($currency);
		foreach ($this->_matrix as $tier=>$values) {
			if ($values["prices"][$currency] == $price) {
				return ltrim($tier, "Tier ");
			}
		}
		return "";
	}
	
	

/* ------------------------------------------------------------------- */
	public function tierForProceedWithCurrency($price, $currency) {
		/*
		
		Returns the tier that contains the proceed with the specified currency
		
		*/
		
		$currency = strtoupper($currency);
		foreach ($this->_matrix as $tier=>$values) {
			if ($values["proceeds"][$currency] == $price) {
				return ltrim($tier, "Tier ");
			}
		}
		return "";
	}
	
	
	
/* ------------------------------------------------------------------- */
	public function pricesForTier($tier) {
		/*
		
		Return array containing the prices for the tier
		
		*/
		
		$arrPrices = $this->_matrix["Tier ".$tier]["prices"];
		return (is_array($arrPrices)) ? $arrPrices : array();
	}
	
	
	
/* ------------------------------------------------------------------- */
	public function proceedsForTier($tier) {
		/*
		
		Return array containing the proceeds for the tier
		
		*/
		
		$arrProceeds = $this->_matrix["Tier ".$tier]["proceeds"];
		return (is_array($arrProceeds)) ? $arrProceeds : array();
	}
	
	

/* ------------------------------------------------------------------- */
	public function formatPriceWithCurrency($price, $currency) {
		/*
		
		Return a formatted price based on the currency.  Ex: Returns 22,00 for 22 SEK
		
		*/

		switch (strtoupper($currency)) {
			case "USD":
				$price = number_format($price, 2, "", "");
				$preSymbol = "$";
				$format = "###,###,###.##";
				break;
				
			case "CAD":
				$price = number_format($price, 2, "", "");
				$preSymbol = "$";
				$format = "###,###,###.##";
				break;
				
			case "MXN":
				$price = number_format($price, 0, "", "");
				$preSymbol = "MXN $";
				$format = "###,###,###";
				break;
				
			case "AUD":
				$price = number_format($price, 2, "", "");
				$preSymbol = "$";
				$format = "### ### ###.##";
				break;
				
			case "NZD":
				$price = number_format($price, 2, "", "");
				$preSymbol = "$";
				$format = "###,###,###.##";
				break;
				
			case "JPY":
				$price = number_format($price, 0, "", "");
				$preSymbol = "¥";
				$format = "###,###,###";
				break;
				
			case "EUR":
				$price = number_format($price, 2, "", "");
				$postSymbol = " €";
				$format = "###.###.###,##";
				break;
				
			case "DKK":
				$price = number_format($price, 2, "", "");
				$postSymbol = " kr.";
				$format = "###.###.###,##";
				break;
				
			case "SEK":
				$price = number_format($price, 2, "", "");
				$postSymbol = " kr";
				$format = "###.###.###,##";
				break;
				
			case "CHF":
				$price = number_format($price, 2, "", "");
				$preSymbol = "CHF ";
				$format = "###'###'###.##";
				break;
				
			case "NOK":
				$price = number_format($price, 2, "", "");
				$preSymbol = "kr ";
				$format = "###.###.###,##";
				break;
				
			case "GBP":
				$price = number_format($price, 2, "", "");
				$preSymbol = "£";
				$format = "###,###,###.##";
				break;
				
			case "CNY":
				$price = number_format($price, 0, "", "");
				$preSymbol = "RMB ";
				$format = "###,###,###";
				break;
				
			case "SGD":
				$price = number_format($price, 2, "", "");
				$preSymbol = "S$ ";
				$format = "###,###,###.##";
				break;
				
			case "HKD":
				$price = number_format($price, 2, "", "");
				$preSymbol = "HK$ ";
				$format = "###,###,###.##";
				break;
				
			case "TWD":
				$price = number_format($price, 0, "", "");
				$preSymbol = "NT$ ";
				$format = "###,###,###,###";
				break;
				
			case "RUB":
				$price = number_format($price, 0, "", "");
				$postSymbol = " p.";
				$format = "###.###.###";
				break;
				
			case "TRY":
				$price = number_format($price, 2, "", "");
				$postSymbol = " TL";
				$format = "###.###.###,##";
				break;
				
			case "INR":
				$price = number_format($price, 0, "", "");
				$preSymbol = "Rs ";
				$format = "##,##,##,##,###";
				break;
				
			case "IDR":
				$price = number_format($price, 0, "", "");
				$preSymbol = "Rp ";
				$format = "###.###.###";
				break;
				
			case "ILS":
				$price = number_format($price, 2, "", "");
				$preSymbol = "₪";
				$format = "###,###,###.##";
				break;
				
			case "ZAR":
				$price = number_format($price, 2, "", "");
				$preSymbol = "R";
				$format = "### ### ###.##";
				break;
				
			case "SAR":
				$price = number_format($price, 2, "", "");
				$preSymbol = "SAR ";
				$format = "###,###,###.##";
				break;
				
			case "AED":
				$price = number_format($price, 2, "", "");
				$preSymbol = "AED ";
				$format = "###,###,###.##";
				break;
				
			default:
				$price = number_format($price, 2, "", "");
				$preSymbol = "$";
				$format = "###,###,###.##";
		}
		
		// Perform the formatting
		$revPrice = strrev($price);
		$format = strrev($format);
		for ($x = 0; $x < strlen($revPrice); $x++) {
			$digit = substr($revPrice, $x, 1);
			$formatting = substr($format, 0, strpos($format, "#") + 1);
			$format = substr($format, strlen($formatting));
			$formattedPrice .= str_replace("#", $digit, $formatting);
		}
		$formattedPrice = strrev($formattedPrice);
		return $preSymbol.$formattedPrice.$postSymbol;
	}
	
	
		
/* ------------------------------------------------------------------- */
	public function currencyForCountry($country) {
		/*
		
		Return the currency for the country
		
		*note* This returns what currency the App Store uses for the country.
		USD is default
		
		*/
		
		switch (strtoupper($country)) {
			case "MX": // Mexico
				return "MXN";
				break;
				
			case "CA": // Canada
				return "CAD";
				break;
				
			case "AU": // Australia
				return "AUD";
				break;
				
			case "NZ": // New Zealand
				 return "NZD";
				break;
				
			case "JP": // Japan
				return "JPY";
				break;
				
			case "DK": // Denmark
				return "DKK";
				break;
				
			case "NO": // Norway
				return "NOK";
				break;
				
			case "SE": // Sweden
				return "SEK";
				break;
				
			case "CH": // Switzerland
				return "CHF";
				break;
				
			case "UK": // United Kingdom
			case "GB": // Great Britain
				return "GBP";
				break;
				
			case "CN": // China
				return "CNY";
				break;
				
			case "SG": // Singapore
				return "SGD";
				break;
				
			case "HK": // Hong Kong
				return "HKD";
				break;
				
			case "TW": // Taiwan
				return "TWD";
				break;
				
			case "RU": // Russia
				return "RUB";
				break;
				
			case "TR": // Turkey
				return "TRY";
				break;
				
			case "IN": // India
				return "INR";
				break;
				
			case "ID": // Indonesia
				return "IDR";
				break;
				
			case "IL": // Israel
				return "ILS";
				break;
				
			case "ZA": // South Africa
				return "ZAR";
				break;
				
			case "SA": // Saudi Arabia
				return "SAR";
				break;
				
			case "AE": // United Arab Emirates
				return "AED";
				break;
				
			case "AT": // Austria
			case "BE": // Belgium
			case "BG": // Bulgaria
			case "CY": // Cyprus
			case "CZ": // Czech Republic
			case "EE": // Estonia
			case "FI": // Finland
			case "FR": // France
			case "DE": // Germany
			case "GR": // Greece
			case "HU": // Hungary
			case "IE": // Ireland
			case "IT": // Italy
			case "LV": // Latvia
			case "LT": // Lithuania
			case "MT": // Malta
			case "LU": // Luxemborg
			case "NL": // Netherlands
			case "PL": // Poland
			case "PT": // Portugal
			case "RO": // Romania
			case "SK": // Slovakia
			case "SI": // Slovenia
			case "ES": // Spain
				return "EUR";
				break;
				
			default:
				return "USD";
		}
		
	}
	
	
}