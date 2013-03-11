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

header('Content-Type: text/html; charset=UTF-8');

// Setup the price matrix
include ("prices.inc.php");
$_PRICES = new PRICES("appstore_price_matrix.json");
	
?>

<h1>Uses </h1>

Let's say you lowered an in-app purchase to $0.99 (USD) and you want to send a push notification to user in Japan, but you want to display the price as it would be displayed in Japan.
<BR><BR>
First you get the <B>tier</B> for $0.99 USD.<BR>
<UL>
	<LI><PRE>tierForPriceWithCurrency("0.99", "USD")</PRE></LI>
	<LI>returns <B>1</B></LI>
</UL>
<BR><BR>
Next you get the <B>currency</B> code for Japan<BR>
<UL>
	<LI><PRE>currencyForCountry("JA")</PRE></LI>
	<LI>returns <B>JPY</B></LI>
</UL>
<BR><BR>
Now you get the price for <b>JPY</b> in tier <B>1</B><BR>
<UL>
	<LI><PRE>priceForCurrencyInTier("JPY", "1")</PRE></LI>
	<LI>returns <B>85</B></LI>
</UL>
<BR><BR>
Finally you can format the price as it would be displayed in Japan<BR>
<UL>
	<LI><PRE>formatPriceWithCurrency("85", "JPY")</PRE></LI>
	<LI>returns <B>¥85</B></LI>
</UL>


<h1>Examples </h1>

<TABLE BORDER="1" CELLPADDING="10">
	<TR>
		<TD VALIGN="top">
			<PRE>priceForCurrencyInTier("USD", "1")<BR>priceForCurrencyInTier("GBP", "5")<BR>priceForCurrencyInTier("EUR", "11")<BR>priceForCurrencyInTier("JPY", "20")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE><? print $_PRICES->priceForCurrencyInTier("USD", "1"); ?><BR><? print $_PRICES->priceForCurrencyInTier("GBP", "5"); ?><BR><? print $_PRICES->priceForCurrencyInTier("EUR", "11"); ?><BR><? print $_PRICES->priceForCurrencyInTier("JPY", "20"); ?></PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>proceedsForCurrencyInTier("USD", "1")<BR>proceedsForCurrencyInTier("GBP", "5")<BR>proceedsForCurrencyInTier("EUR", "11")<BR>proceedsForCurrencyInTier("JPY", "20")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE><? print $_PRICES->proceedsForCurrencyInTier("USD", "1"); ?><BR><? print $_PRICES->proceedsForCurrencyInTier("GBP", "5"); ?><BR><? print $_PRICES->proceedsForCurrencyInTier("EUR", "11"); ?><BR><? print $_PRICES->proceedsForCurrencyInTier("JPY", "20"); ?></PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>tierForPriceWithCurrency("0.99", "USD")<BR>tierForPriceWithCurrency("2.99", "GBP")<BR>tierForPriceWithCurrency("9.99", "EUR")<BR>tierForPriceWithCurrency("1700", "JPY")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE><? print $_PRICES->tierForPriceWithCurrency("0.99", "USD"); ?><BR><? print $_PRICES->tierForPriceWithCurrency("2.99", "GBP"); ?><BR><? print $_PRICES->tierForPriceWithCurrency("9.99", "EUR"); ?><BR><? print $_PRICES->tierForPriceWithCurrency("1700", "JPY"); ?></PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>tierForProceedWithCurrency("0.70", "USD")<BR>tierForProceedWithCurrency("1.82", "GBP")<BR>tierForProceedWithCurrency("6.08", "EUR")<BR>tierForProceedWithCurrency("1190", "JPY")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE><? print $_PRICES->tierForProceedWithCurrency("0.70", "USD"); ?><BR><? print $_PRICES->tierForProceedWithCurrency("1.82", "GBP"); ?><BR><? print $_PRICES->tierForProceedWithCurrency("6.08", "EUR"); ?><BR><? print $_PRICES->tierForProceedWithCurrency("1190", "JPY"); ?></PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>currencyForCountry("US")<BR>currencyForCountry("GB")<BR>currencyForCountry("FR")<BR>currencyForCountry("JA")<BR></PRE>
		</TD>
		<TD VALIGN="top">
			<PRE><? print $_PRICES->currencyForCountry("US"); ?><BR><? print $_PRICES->currencyForCountry("GB"); ?><BR><? print $_PRICES->currencyForCountry("FR"); ?><BR><? print $_PRICES->currencyForCountry("JP"); ?></PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>formatPriceWithCurrency("0.99", "USD")<BR>formatPriceWithCurrency("2.99", "GBP")<BR>formatPriceWithCurrency("9.99", "EUR")<BR>formatPriceWithCurrency("1700", "JPY")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE><? print $_PRICES->formatPriceWithCurrency("0.99", "USD"); ?><BR><? print $_PRICES->formatPriceWithCurrency("2.99", "GBP"); ?><BR><? print $_PRICES->formatPriceWithCurrency("9.99", "EUR"); ?><BR><? print $_PRICES->formatPriceWithCurrency("1700", "JPY"); ?></PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>pricesForTier("1")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE><? print_r($_PRICES->pricesForTier("1")); ?></PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>proceedsForTier("1")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE><? print_r($_PRICES->proceedsForTier("1")); ?></PRE>
		</TD>
	</TR>
</TABLE>