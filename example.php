<?php
	header('Content-Type: text/html; charset=UTF-8');
	
	// Setup the price matrix
	include ("prices.inc.php");
	$_PRICES = new PRICES("appstore_price_matrix.json");
	
?>

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