php-appstore-matrix
===================

PHP class with a bunch of functions to help you use the App Store price matrix in your code

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
			<PRE>0.99<BR>2.99<BR>9.99<BR>1700</PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>proceedsForCurrencyInTier("USD", "1")<BR>proceedsForCurrencyInTier("GBP", "5")<BR>proceedsForCurrencyInTier("EUR", "11")<BR>proceedsForCurrencyInTier("JPY", "20")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE>0.70<BR>1.82<BR>6.08<BR>1190</PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>tierForPriceWithCurrency("0.99", "USD")<BR>tierForPriceWithCurrency("2.99", "GBP")<BR>tierForPriceWithCurrency("9.99", "EUR")<BR>tierForPriceWithCurrency("1700", "JPY")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE>1<BR>5<BR>11<BR>20</PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>tierForProceedWithCurrency("0.70", "USD")<BR>tierForProceedWithCurrency("1.82", "GBP")<BR>tierForProceedWithCurrency("6.08", "EUR")<BR>tierForProceedWithCurrency("1190", "JPY")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE>1<BR>5<BR>11<BR>20</PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>currencyForCountry("US")<BR>currencyForCountry("GB")<BR>currencyForCountry("FR")<BR>currencyForCountry("JA")<BR></PRE>
		</TD>
		<TD VALIGN="top">
			<PRE>USD<BR>GBP<BR>EUR<BR>JPY</PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>formatPriceWithCurrency("0.99", "USD")<BR>formatPriceWithCurrency("2.99", "GBP")<BR>formatPriceWithCurrency("9.99", "EUR")<BR>formatPriceWithCurrency("1700", "JPY")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE>$0.99<BR>£2.99<BR>9,99 €<BR>¥1,700</PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>pricesForTier("1")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE>Array
(
    [USD] => 0.99
    [CAD] => 0.99
    [MXN] => 13.00
    [AUD] => 0.99
    [NZD] => 1.29
    [JPY] => 85
    [EUR] => 0.89
    [DKK] => 7.00
    [SEK] => 7.00
    [CHF] => 1.00
    [NOK] => 7.00
    [GBP] => 0.69
    [CNY] => 6.00
    [SGD] => 1.28
    [HKD] => 8.00
    [TWD] => 30
    [RUB] => 33
    [TRY] => 1.79
    [INR] => 55
    [IDR] => 9500
    [ILS] => 3.90
    [ZAR] => 7.99
    [SAR] => 3.69
    [AED] => 3.69
)
</PRE>
		</TD>
	</TR>
	
	<TR>
		<TD VALIGN="top">
			<PRE>proceedsForTier("1")</PRE>
		</TD>
		<TD VALIGN="top">
			<PRE>Array
(
    [USD] => 0.70
    [CAD] => 0.70
    [MXN] => 9.10
    [AUD] => 0.63
    [NZD] => 0.90
    [JPY] => 60
    [EUR] => 0.54
    [DKK] => 4.26
    [SEK] => 4.26
    [CHF] => 0.65
    [NOK] => 3.92
    [GBP] => 0.42
    [CNY] => 4.20
    [SGD] => 0.9
    [HKD] => 5.60
    [TWD] => 21
    [RUB] => 23.10
    [TRY] => 1.25
    [INR] => 38.50
    [IDR] => 6650.00
    [ILS] => 2.73
    [ZAR] => 5.59
    [SAR] => 2.58
    [AED] => 2.58
)
</PRE>
		</TD>
	</TR>
</TABLE>