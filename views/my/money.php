<?php 
use watrlabs\watrkit\pagebuilder;
$pagebuilder = new pagebuilder();

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___454963b97fe545e3b3f2aaf85eef6d4a_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('jsfiles', '/js/35442da4b07e6a0ed6b085424d1a52cb.js');
$pagebuilder->addresource('jsfiles', '/js/8220b4ecd0fe4da790391da3fd0b442c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/59e30cf6dc89b69db06bd17fbf8ca97c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/3f3e6c117b7e1ff6c7644a1b4048a54c.js.gzip');
$pagebuilder->set_page_name("Trade");

$pagebuilder->buildheader();

$pagebuilder->setlegacy(true);


?> 
        
        <div id="BodyWrapper">
            
        <div id="AdvertisingLeaderboard">
                

<iframe allowtransparency="true"
            frameborder="0"
            height="110"
            scrolling="no"
            src="/userads/1"
            width="728"
            data-js-adtype="iframead"></iframe>


            </div>
            
            <div id="RepositionBody">
                <div id="Body" style='width:970px;'>
                    
    
<style type="text/css">
    #BodyWrapper {
        padding: 50px;
    }
</style>

<div class="MyMoneyPage text">
    <div class="WhiteSquareTabsContainer">
        <ul class="SquareTabsContainer">
            
            <li class="SquareTabGray selected" contentid="MyTransactions_tab">
                <span><a>My Transactions</a></span>
            </li>
            
            <li class="SquareTabGray " contentid="Summary_tab">
                <span><a>Summary</a></span>
            </li>
            
            <li class="SquareTabGray " contentid="TradeCurrency_tab">
               <span><a>Trade Currency</a></span>
            </li>
            
            <li class="SquareTabGray " contentid="TradeItems_tab">
               <span><a>Trade Items</a></span>
            </li>
            
            <li class="SquareTabGray" contentid="Promotion_tab">
                <span><a>Promotion (Beta)</a></span>
            </li>
            
        </ul>
    </div>
    <a href=https://www.roblox.com/upgrades/robux?ctx=money class="BuyRobuxButton btn-medium btn-primary">Buy Robux</a>
    <div class="StandardPanelContainer">
        <div id="TabsContentContainer" class="StandardPanelWhite">
        
            <div id="MyTransactions_tab" class="TabContent selected uninitialized">
                <div class="SortsAndFilters">
                    <div class="TransactionType">
                        <span class="form-label">Transaction Type:</span>
                        <select class="form-select" id="MyTransactions_TransactionTypeSelect">
                            <option value="purchase">Purchases</option>
                            <option value="sale">Sales</option>
                            <option value="affiliatesale">Commissions</option>
                            
                            <option value="grouppayout">Group Payouts</option>
                            
                        </select>
                    </div>
                    <div style="clear:both;float:none;"></div>
                </div>
                <div class="TransactionsContainer">
                    <table class="table" cellpadding="0" cellspacing="0" border="0">
                        <tr class="table-header">
                            <th class="Date first">Date</th>
                            <th class="Member">Member</th>
                            <th class="Description">Description</th>
                            <th class="Amount">Amount</th>
                        </tr>
                        <tr class="datarow" colspan="4">
                            <td class="loading"></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div id="Summary_tab" class="TabContent uninitialized">
                <div class="SortsAndFilters">
                    <span class="form-label">Time Period:</span>
                    <select class="form-select" id="TimePeriod">
                        <option value="day">Past Day</option>
                        <option value="week">Past Week</option>
                        <option value="month">Past Month</option>
                        <option value="year">Past Year</option>
                    </select>
                </div>
                <div class="ColumnsContainer">
                    <div class="RobuxColumn divider-right">
                        <div>
                            <h2 class="light">
                                    <span class="robux">&nbsp;</span>
                                    <span>Robux</span>
                                    <img src="http://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="The principal currency of Robloxia, which Builders Club members receive a daily allowance of to live a comfortable life of leisure. For this and other benefits, join Builders Club! Alternately, you can purchase ROBUX using our secure payment system." />
                            </h2>
                            <table class="table" cellpadding="0" cellspacing="0" border="0" >
                            <tr class="table-header">
                                <th class="Categories first">Categories</th>
                                <th class="Credit">Credit</th>
                            </tr>
                            <tr >
                                <td class="Categories">Builders Club Stipend</td>
                                <td class="Credit BCStipend">&nbsp;</td>
                            </tr>
                            <tr >
                                <td class="Categories">Builders Club Stipend Bonus</td>
                                <td class="Credit BCStipendBonus">&nbsp;</td>
                            </tr>
                            <tr >
                                <td class="Categories">Sale of Goods</td>
                                <td class="Credit R_SaleOfGoods">&nbsp;</td>
                            </tr>
                            <tr >
                                <td class="Categories">Currency Purchase</td>
                                <td class="Credit CurrencyPurchase">&nbsp;</td>
                            </tr>
                            
                           
                            <tr >
                                <td class="Categories">Trade System Trades</td>
                                <td class="Credit R_TradeSystem">&nbsp;</td>
                            </tr> 
                           
                            
                            <tr>
                                <td class="Categories">Promoted Page Conversion Revenue</td>
                                <td class="Credit PromotedPageConversionRevenue">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="Categories">Game Page Conversion Revenue</td>
                                <td class="Credit GamePageConversionRevenue">&nbsp;</td>
                            </tr>
                            
                            <tr  >
                                <td class="Categories">Pending Sales <img src="http://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="As an anti fraud precaution, revenue from certain transactions, such as Game Pass sales, is held for a short period of time before being released to the seller." /></td>
                                <td class="Credit R_PendingSales">&nbsp;</td>
                            </tr> 
                            
                            <tr>
                                <td class="Categories">Group Payouts</td>
                                <td class="Credit R_GroupPayouts">&nbsp;</td>
                            </tr>
                            
                            <tr class="total">
                                <td colspan="3"><h2 class="light">TOTAL&nbsp;</h2><span class="robux money">(xxx)</span></td>
                            </tr>
                            </table>
                        </div>
                    </div>
                    <div class="TicketsColumn">
                        <div>
                            <h2 class="light">
                                <span class="tickets">&nbsp;</span>
                                <span>Tickets</span>
                                <img src="http://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="Similar to tickets won in an arcade - play the game, earn tickets, and get rewarded with fabulous prizes. Tickets are granted to citizens who help expand and improve Robloxia. The best way to get tickets is to attract a lot of visitors to a cool place that you create. You can also get the daily login bonus just by showing up!" />
                            </h2>
                            <table class="table" cellpadding="0" cellspacing="0" border="0" >
                            <tr class="table-header">
                                <th class="Categories first">Categories</th>
                                <th class="Credit">Credit</th>
                            </tr>
                            <tr >
                                <td class="Categories">Login Award</td>
                                <td class="Credit LoginAward">&nbsp;</td>
                            </tr>
                            <tr >
                                <td class="Categories">Place Traffic Award</td>
                                <td class="Credit PlaceTraffic">&nbsp;</td>
                            </tr>
                            <tr >
                                <td class="Categories">Sale of Goods</td>
                                <td class="Credit T_SaleOfGoods">&nbsp;</td>
                            </tr>
                            

                            <tr  >
                                <td class="Categories">Pending Sales <img src="http://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="As an anti fraud precaution, revenue from certain transactions, such as Game Pass sales, is held for a short period of time before being released to the seller." /></td>
                                <td class="Credit T_PendingSales">&nbsp;</td>
                            </tr> 
                                
                            
                            <tr>
                                <td class="Categories">Group Payouts</td>
                                <td class="Credit T_GroupPayouts">&nbsp;</td>
                            </tr>
                            
                            <tr class="total">
                                <td colspan="3"><h2 class="light">TOTAL&nbsp;</h2><span class="tickets money">(xxx)</span></td>
                            </tr>

                            </table>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </div>
            
            <div id="TradeCurrency_tab" class="TabContent ">
                  

<div id="TradeCurrencyContainer">
    <div class="LeftColumn">
        
            
        <div class="TradingDashboard">
            <div class="menu-area divider-right">
                <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_CurrencyTradePane">
                        <a  class="btn-medium btn-primary TradeCurrencyModalBtn">Trade</a>
                    </div>
                
                <div class="tab-item tab-item-selected" contentid="RobuxPositions">My <span class="robux">&nbsp;</span> Positions</div>
                <div class="tab-item" contentid="TicketsPositions">My <span class="tickets">&nbsp;</span> Positions</div>
                <div class="tab-item" contentid="RobuxTradeHistory"><span class="robux">&nbsp;</span> Trade History</div>
                <div class="tab-item" contentid="TicketsTradeHistory"><span class="tickets">&nbsp;</span> Trade History</div>
            </div>
            <div class="content-area divider-right">
                <div id="RobuxPositions" class="tab-content tab-content-selected">
                    

<div class="OpenOffers">
    <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_OpenOffers_OpenOffersUpdatePanel">
	
            
            
                    <div class="NoResults">You do not have any open ROBUX trades.</div>
                
            <div class="FooterPager">
                <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_OpenOffers_OpenOffersDataPager_Footer"><a disabled="disabled">First</a>&nbsp;<a disabled="disabled">Previous</a>&nbsp;<a disabled="disabled">Next</a>&nbsp;<a disabled="disabled">Last</a>&nbsp;</span>
            </div>
        
</div>
</div>
                </div>
                <div id="TicketsPositions" class="tab-content">
                    

<div class="OpenBids">
    <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_OpenBids_OpenBidsUpdatePanel">
	
            
            
                    <div class="NoResults">You do not have any open Ticket trades.</div>
                
            <div class="FooterPager">
                <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_OpenBids_OpenBidsDataPager_Footer"><a disabled="disabled">First</a>&nbsp;<a disabled="disabled">Previous</a>&nbsp;<a disabled="disabled">Next</a>&nbsp;<a disabled="disabled">Last</a>&nbsp;</span>
            </div>
        
</div>
</div>
                </div>
                <div id="RobuxTradeHistory" class="tab-content">
                    

<div class="TradeHistory">
    <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_MyTradesOffers_MyTradesOffersUpdatePanel">
	
            
            
                    <table class="TradeHistoryContent table" cellpadding="0" cellspacing="0" border="0">
                        <tr class="table-header">
                            <th class="first trade">Trade</th>
                            <th class="rate">Rate</th>
                            <th class="date">Date</th>
                        </tr>
                        
                    <tr class="TileGroup">
                        
                    <td class="trade">3 R$ for 56 Tx</td>
                    <td class="rate">18.666</td>
                    <td class="date">12/23/15</td>
                
                    </tr>
                
                    </table>
                
            <div class="FooterPager">
                <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_MyTradesOffers_MyTradesOffersDataPager_Footer"><a disabled="disabled">First</a>&nbsp;<a disabled="disabled">Previous</a>&nbsp;<span>1</span>&nbsp;<a disabled="disabled">Next</a>&nbsp;<a disabled="disabled">Last</a>&nbsp;</span>
            </div>
        
</div>
</div>
                </div>
                <div id="TicketsTradeHistory" class="tab-content">
                    

<div class="TradeHistory">
    <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_MyTradesBids_MyTradesBidsUpdatePanel">
	
            
            
                    <table class="TradeHistoryContent table" cellpadding="0" cellspacing="0" border="0">
                        <tr class="table-header">
                            <th class="first trade">Trade</th>
                            <th class="rate">Rate</th>
                            <th class="date">Date</th>
                        </tr>
                        
                    <tr class="TileGroup">
                        
                    <td class="trade">180 Tx for 9 R$</td>
                    <td class="rate">20.000</td>
                    <td class="date">12/22/15</td>
                
                    </tr>
                
                    <tr class="TileGroup">
                        
                    <td class="trade">196 Tx for 10 R$</td>
                    <td class="rate">19.600</td>
                    <td class="date">10/3/15</td>
                
                    </tr>
                
                    </table>
                
            <div class="FooterPager">
                <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_MyTradesBids_MyTradesBidsDataPager_Footer"><a disabled="disabled">First</a>&nbsp;<a disabled="disabled">Previous</a>&nbsp;<span>1</span>&nbsp;<a disabled="disabled">Next</a>&nbsp;<a disabled="disabled">Last</a>&nbsp;</span>
            </div>
        
</div>
</div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="RightColumn">
        <div id="CurrencyQuotePane">
            

<div class="CurrencyQuote">
    <div class="column">
        <div class="form-label">Pair: </div><div>BUX/TIX</div>
        <div class="form-label padding-top">Spread: </div><div>-1</div>
    </div>
    <div class="column">
        <div class="form-label">Rate: </div><div>18.866/18.864</div>
        <div class="form-label padding-top">High/Low: </div><div>740.00/0.0035</div>
    </div>
</div>
            <div class="clear"></div>
        </div>
        <div id="CurrencyBidsPane">
            

<div class="CurrencyBids padding-top">
    <span class="form-label">Available Tickets:</span>
    
            <div class="CurrencyBid">
                7,339 @ 18.866:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                152,738 @ 18.861:1
            </div>
        
            <div class="CurrencyBid">
                1,886 @ 18.860:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                3,772 @ 18.860:1
            </div>
        
            <div class="CurrencyBid">
                7,128 @ 18.857:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                7,258 @ 18.851:1
            </div>
        
            <div class="CurrencyBid">
                87,157 @ 18.844:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                4,956 @ 18.844:1
            </div>
        
            <div class="CurrencyBid">
                716 @ 18.842:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                7,932 @ 18.840:1
            </div>
        
            <div class="CurrencyBid">
                339 @ 18.833:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                113 @ 18.833:1
            </div>
        
            <div class="CurrencyBid">
                113 @ 18.833:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                27,665 @ 18.832:1
            </div>
        
            <div class="CurrencyBid">
                395,760 @ 18.832:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                410,974 @ 18.828:1
            </div>
        
            <div class="CurrencyBid">
                10,600 @ 18.827:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                546 @ 18.827:1
            </div>
        
            <div class="CurrencyBid">
                5,290 @ 18.825:1
            </div>
        
            <div class="AlternatingCurrencyBid">
                371,937 @ 18.825:1
            </div>
        
    
</div>
        </div>
        <div id="CurrencyOffersPane">
            

<div class="CurrencyOffers padding-top">
    <span class="form-label">Available Robux:</span>
    
            <div class="CurrencyOffer">
                <span class="notranslate">6,181</span> @ 1:18.864
            </div>
        
            <div class="AlternatingCurrencyOffer">
                <span class="notranslate">250,421</span> @ 1:18.874
            </div>
        
            <div class="CurrencyOffer">
                <span class="notranslate">9,086</span> @ 1:18.884
            </div>
        
            <div class="AlternatingCurrencyOffer">
                <span class="notranslate">141</span> @ 1:18.893
            </div>
        
            <div class="CurrencyOffer">
                <span class="notranslate">95</span> @ 1:18.894
            </div>
        
            <div class="AlternatingCurrencyOffer">
                <span class="notranslate">69</span> @ 1:18.898
            </div>
        
            <div class="CurrencyOffer">
                <span class="notranslate">10</span> @ 1:18.900
            </div>
        
            <div class="AlternatingCurrencyOffer">
                <span class="notranslate">7,562</span> @ 1:18.989
            </div>
        
            <div class="CurrencyOffer">
                <span class="notranslate">1,394</span> @ 1:18.999
            </div>
        
            <div class="AlternatingCurrencyOffer">
                <span class="notranslate">38,995</span> @ 1:18.999
            </div>
        
            <div class="CurrencyOffer">
                <span class="notranslate">20</span> @ 1:19.000
            </div>
        
            <div class="AlternatingCurrencyOffer">
                <span class="notranslate">20</span> @ 1:19.000
            </div>
        
            <div class="CurrencyOffer">
                <span class="notranslate">20</span> @ 1:19.000
            </div>
        
            <div class="AlternatingCurrencyOffer">
                <span class="notranslate">20</span> @ 1:19.000
            </div>
        
            <div class="CurrencyOffer">
                <span class="notranslate">20</span> @ 1:19.000
            </div>
        
            <div class="AlternatingCurrencyOffer">
                <span class="notranslate">12</span> @ 1:19.000
            </div>
        
            <div class="CurrencyOffer">
                <span class="notranslate">11</span> @ 1:19.000
            </div>
        
            <div class="AlternatingCurrencyOffer">
                <span class="notranslate">16</span> @ 1:19.000
            </div>
        
            <div class="CurrencyOffer">
                <span class="notranslate">3</span> @ 1:19.000
            </div>
        
            <div class="AlternatingCurrencyOffer">
                <span class="notranslate">2</span> @ 1:19.000
            </div>
        
    
</div>

        </div>
    </div>
                    
    <div id="TradeCurrencyModal" class="PurchaseModal text">
        <div class="titleBar" style="text-align:center">Trade Currency</div>
        <div class="PurchaseModalBody">
            <div class="PurchaseModalMessage" style="height:auto;">
                <div class="validation-summary-errors" style="display:none">
                    Market Orders must be at least <span class="tickets">20</span>.
                </div>
                <div class="CurrencyTradeDetails" >
                    <div class="CurrencyTradeDetail">
                        <span class="form-label">Trade Type: </span>
                        <span class="MarketOrderRadioButton"><input id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_MarketOrderRadioButton" type="radio" name="ctl00$ctl00$cphRoblox$cphMyRobloxContent$ctl00$OrderType" value="MarketOrderRadioButton" checked="checked" /><label for="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_MarketOrderRadioButton">Market Order</label></span>
                        <span class="info-tool-tip tooltip" 
                            title="A market order is a buy or sell order to be executed immediately at current market prices. As long as there are willing sellers and buyers, a market order will be filled." >&nbsp;</span>
                            
                        <span class="LimitOrderRadioButton"><input id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_LimitOrderRadioButton" type="radio" name="ctl00$ctl00$cphRoblox$cphMyRobloxContent$ctl00$OrderType" value="LimitOrderRadioButton" /><label for="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_LimitOrderRadioButton">Limit Order</label></span>
                        <span class="info-tool-tip tooltip" 
                            title="A limit order is an order to buy at no more (or sell at no less) than a specific price. This gives you some control over the price at which the trade is executed, but may prevent the order from being executed." >&nbsp;</span>
                    </div>
                    <div class="CurrencyTradeDetail">
                        <span class="form-label">What I'll give:</span>
                        <input name="ctl00$ctl00$cphRoblox$cphMyRobloxContent$ctl00$HaveAmountTextBoxRestyle" type="text" maxlength="9" id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountTextBoxRestyle" tabindex="1" class="TradeBox HaveAmountTextBox text-box text-box-medium" autocomplete="off" />
                        <select name="ctl00$ctl00$cphRoblox$cphMyRobloxContent$ctl00$HaveCurrencyDropDownList" id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveCurrencyDropDownList" class="HaveCurrencyDropDownList form-select">
	<option value="Tickets">Tickets</option>
	<option value="Robux">Robux</option>

</select>
                        <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle" class="HaveAmountRequiredFieldValidator" style="color:Red;display:none;"></span>
                        <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle" style="color:Red;visibility:hidden;"></span>&nbsp;
                    </div>
                    <div id="LimitOrder" class="CurrencyTradeDetail" style="display: none;">
                        <span class="form-label">What I want:</span>
                        <input name="ctl00$ctl00$cphRoblox$cphMyRobloxContent$ctl00$WantAmountTextBox" type="text" maxlength="9" id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountTextBox" tabindex="2" class="TradeBox WantAmountTextBox text-box text-box-medium" autocomplete="off" />
                            <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle" class="WantAmountRequiredFieldValidator" style="color:Red;display:none;">!</span>
                        &nbsp;
                        <select name="ctl00$ctl00$cphRoblox$cphMyRobloxContent$ctl00$WantCurrencyDropDownList" id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantCurrencyDropDownList" class="WantCurrencyDropDownList form-select">
	<option value="Robux">Robux</option>
	<option value="Tickets">Tickets</option>

</select>
                    </div>
                    <div id="SplitTrades" class="CurrencyTradeDetail" style="display: none;">
                        <span class="form-label">Allow Split Trades: </span>
                        <input id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_AllowSplitTradesCheckBox" type="checkbox" name="ctl00$ctl00$cphRoblox$cphMyRobloxContent$ctl00$AllowSplitTradesCheckBox" checked="checked" tabindex="3" />
                    </div>
                    <div id="MarketOrder" class="CurrencyTradeDetail">
                        <span class="form-label">What I'll get:</span>
                        <span id="EstimatedTrade"></span><span class="estimated invisible">&nbsp;(estimated)</span>
                    </div>
                </div>
                                        
            </div>
            <div class="PurchaseModalButtonContainer">
                <a onclick="return Roblox.TradeCurrency.confirmTrade();" id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_SubmitTradeButton" tabindex="4" class="btn-medium btn-primary translate" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ctl00$SubmitTradeButton&#39;,&#39;&#39;)">Trade</a>&nbsp;
                <a class="btn-medium btn-negative" onclick="$.modal.close();">
                    Cancel
                </a>
            </div>
            <div class="PurchaseModalFooter">
                Your money will be held for safe-keeping until either the trade executes or you cancel your position.
            </div>
        </div>
    </div>
</div>

<div id="FundsPopupBux" class="modalPopup PurchaseModal trade-currency">
    <div class="titleBar">
        Insufficient Funds
    </div>
    <div class="PurchaseModalBody">
        <div class="PurchaseModalMessage">
            <div>
                <p>
                    You need
                    
                    more ROBUX to execute this trade.</p>
            </div>
        </div>
        <div class="PurchaseModalButtonContainer">
            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_CurrencyPurchaseButton" class="btn-medium btn-primary" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ctl00$CurrencyPurchaseButton&#39;,&#39;&#39;)">Buy Robux</a>
            <a class="btn-medium btn-negative" onclick="Roblox.TradeCurrency.FundsPopupBux.close()">Cancel</a>
        </div>
        <div class="PurchaseModalFooter"></div>
    </div>
</div>
                
<div id="FundsPopupTix" class="modalPopup PurchaseModal trade-currency">
    <div class="titleBar">
        Insufficient Funds
    </div>
    <div class="PurchaseModalBody">
        <div class="PurchaseModalMessage">
            <div>
                <p>You need
                    -66
                    more Tickets to execute this trade.</p>
            </div>
        </div>
        <div class="PurchaseModalButtonContainer">
            <a class="btn-medium btn-negative" onclick="Roblox.TradeCurrency.FundsPopupBux.close()">Cancel</a>
        </div>
        <div class="PurchaseModalFooter"></div>
    </div>
</div>


<script type="text/javascript">
$(function() {
    if (typeof Roblox === "undefined") {
	    Roblox = {};
    }
    if (typeof Roblox.TradeCurrency === "undefined") {
	    Roblox.TradeCurrency = {};
    }
    Roblox.TradeCurrency.Resources = {
        unableToEstimate: 'Unable to estimate at this time.'
    };
    
});

</script>

            </div>
            
                <div id="TradeItems_tab" class="TabContent uninitialized">
                    <div class="status-confirm" style="display:none;"></div>   
                    <div class="SortsAndFilters">
                    <div class="TradeType">
                        <span class="form-label">Trade Type:</span>
                        <select class="form-select" id="TradeItems_TradeType">
                            <option value="inbound">Inbound</option>
                            <option value="outbound">Outbound</option>
                            <option value="completed">Completed</option>
                            <option value="inactive">Inactive</option>
                        </select>
						<a href="" target="_blank" id="trade-help-link" class="text-link">How do I send a trade?</a>
                        <span class="tool-tip" style="display:none;" data-js-trade-write-disabled ><img src="/images/UI/img-tail-left.png" class="left"/>Trading is currently disabled. Trades can be viewed, but they may not be changed. Please check back later.</span>
                    </div>
                    <div style="clear:both;float:none;"></div>
                </div>
                <div class="TradeItemsContainer">
                    <table class="table" cellpadding="0" cellspacing="0" border="0">
                        <tr class="table-header">
                            <th class="Date first">Date</th>
                            <th class="Expires">Expires</th>
                            <th class="TradePartner">Trade Partner</th>
                            <th class="Status">Status</th>
                            <th class="Action">Action</th>
                        </tr>
                        <tr class="datarow" colspan="4">
                            <td class="loading"></td>
                        </tr>
                    </table>
                </div>
                    <table class="template table">
                        <tr class="datarow">
                            <td class="Date" data-se="trade-date"></td>
                            <td class="Expires" data-se="trade-expires"></td>
                            <td class="TradePartner" data-se="trade-tradepartner"></td>
                            <td class="Status" data-se="trade-status"></td>
                            <td class="Action" data-se="trade-Action"></td>
                        </tr>
                    </table>
                </div>
                <div TradeUpdater></div>
            
                <div id="Promotion_tab" class="TabContent uninitialized">
                    


<div class="info">
    When you share a promotional link to any ROBLOX page and new players come to ROBLOX from your link, you earn 5% of every purchase they make. You can use the Share button on any place page to generate a link that includes your promoter code.<br /><br />
    You can also create promotional links with this link generator:
</div>
<div>
    <div class="form-label">ROBLOX url:</div>
    <input type="text" id="LinkGeneratorInput" data-rbx-id="65367932" />
</div>
<div>
    <div class="form-label">Promotion link:</div>
    <div id="LinkGeneratorOutput">Please link to a page on www.roblox.com!</div>
</div>
<ul class="nav nav-pills">
    <li class="active" data-rbx-time="hourly"><a>Hourly</a></li>
    <li data-rbx-time="daily"><a>Daily</a></li>
    <li data-rbx-time="monthly"><a>Monthly</a></li>
</ul>
<div id="PromotionAcquisitionsContainer">
    <div class="separator-horizontal"></div>
    <h2>
        New Visitors
        <img src="http://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="Number of people who clicked on your links who have never been on ROBLOX before." />
    </h2>
    <div class="separator-horizontal"></div>
    
    <div data-rbx-organic-acquisition-type="0" data-rbx-time="hourly" data-rbx-series-names='["Visitors"]' data-rbx-series-units='["Visitors"]'>
        <div id="new-visitors-hourly" class="stats-chart loading"></div>
        <div id="new-visitors-hourly-legend" class="stats-legend"></div>
    </div>

    <div style="display:none" data-rbx-organic-acquisition-type="0" data-rbx-time="daily" data-rbx-series-names='["Visitors"]' data-rbx-series-units='["Visitors"]'>
        <div id="new-visitors-daily" class="stats-chart loading"></div>
        <div id="new-visitors-daily-legend" class="stats-legend"></div>
    </div>

    <div style="display:none" data-rbx-organic-acquisition-type="0" data-rbx-time="monthly" data-rbx-series-names='["Visitors"]' data-rbx-series-units='["Visitors"]'>
        <div id="new-visitors-monthly" class="stats-chart loading"></div>
        <div id="new-visitors-monthly-legend" class="stats-legend"></div>
    </div>
</div>
<div id="PromotionConversionsContainer">
    <div class="separator-horizontal"></div>
    <h2>
        Signups
        <img src="http://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="Number of new visitors from your links who signed up." />
    </h2>
    <div class="separator-horizontal"></div>

    <div data-rbx-organic-acquisition-type="1" data-rbx-time="hourly" data-rbx-series-names='["Signups"]' data-rbx-series-units='["Signups"]'>
        <div id="signups-hourly" class="stats-chart loading"></div>
        <div id="signups-hourly-legend" class="stats-legend"></div>
    </div>

    <div style="display:none" data-rbx-organic-acquisition-type="1" data-rbx-time="daily" data-rbx-series-names='["Signups"]' data-rbx-series-units='["Signups"]'>
        <div id="signups-daily" class="stats-chart loading"></div>
        <div id="signups-daily-legend" class="stats-legend"></div>
    </div>

    <div style="display:none" data-rbx-organic-acquisition-type="1" data-rbx-time="monthly" data-rbx-series-names='["Signups"]' data-rbx-series-units='["Signups"]'>
        <div id="signups-monthly" class="stats-chart loading"></div>
        <div id="signups-monthly-legend" class="stats-legend"></div>
    </div>
</div>
<div id="PromotionRevenueContainer">
    <div class="separator-horizontal"></div>
    <h2>
        Promotional Revenue
        <img src="http://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="ROBUX earned through your promotional links." />
    </h2>
    <div class="separator-horizontal"></div>

    <div data-rbx-organic-acquisition-type="3" data-rbx-time="hourly" data-rbx-series-names='["Revenue"]' data-rbx-series-units='["R$"]'>
        <div id="revenue-hourly" class="stats-chart loading"></div>
        <div id="revenue-hourly-legend" class="stats-legend"></div>
    </div>

    <div style="display:none" data-rbx-organic-acquisition-type="3" data-rbx-time="daily" data-rbx-series-names='["Revenue"]' data-rbx-series-units='["R$"]'>
        <div id="revenue-daily" class="stats-chart loading"></div>
        <div id="revenue-daily-legend" class="stats-legend"></div>
    </div>

    <div style="display:none" data-rbx-organic-acquisition-type="3" data-rbx-time="monthly" data-rbx-series-names='["Revenue"]' data-rbx-series-units='["R$"]'>
        <div id="revenue-monthly" class="stats-chart loading"></div>
        <div id="revenue-monthly-legend" class="stats-legend"></div>
    </div>
</div>
<div class="separator-horizontal"></div>

<table class="table" id="promotion-data-table">
    <tr class="table-header">
        <th class="first">Time</th>
        <th class="acquisitions" data-rbx-organic-acquisition-type="0">New Visitors</th>
        <th class="conversions" data-rbx-organic-acquisition-type="1">Signups</th>
        <th class="revenue" data-rbx-organic-acquisition-type="3">Promotional Revenue (R$)</th>
    </tr>
</table>
                </div>
            
            <div id="AdContainer" class="Ads_WideSkyscraper">
                

<div style="width: 160px; " class="abp adp-gpt-container">
    <span id='3434323032363537' class="GPTAd skyscraper" data-js-adtype="gptAd">
    </span>
        <div class="ad-annotations " style="width: 160px">
            <span class="ad-identification">
                Advertisement
            </span>
                <a class="BadAdButton" href="http://www.roblox.com/Ads/ReportAd.aspx" title="click to report an offensive ad">Report</a>
        </div>
    <script type="text/javascript">
        googletag.cmd.push(function () {
            if (typeof Roblox.AdsHelper !== "undefined" && typeof Roblox.AdsHelper.toggleAdsSlot !== "undefined") {
                Roblox.AdsHelper.toggleAdsSlot("", "3434323032363537");
            } else {
                googletag.display("3434323032363537");
            }
        });
    </script>
</div>


            </div>
            <div style="clear: both;"></div>
        </div>
    </div>

</div>
<div id="TradeRequest" class="modalPopup unifiedModal smallModal TraderSystemRobux" UserID="65367932" style="display:none;">
	
    <div style="height:38px;padding-top:2px;">
        <span>Trade Request</span>
    </div>
    <div class="simplemodal-close">
        <a class="ImageButton closeBtnCircle_20h" data-se="trade-close"></a>
    </div>
    <div class="unifiedModalContent" style="min-height:385px;width:584px; padding:5px;margin: 0 auto;" >
        <div class="GenericModalErrorMessage status-error" style="display:none;"></div>
        <div class="LeftContentContainer" >
            <div class="roblox-avatar-image" data-user-id="" data-image-size="medium" data-se="trade-partner-avatar"></div>
            <p class="TradeRequestText"></p>
            <p class="TradeExpiration">Expires <span id="TradeRequestExpiration" data-se="trade-expire"></span></p>
        </div>
        <div style="padding-left: 5px; float:left;display:inline;">
            <div class="OfferContainer" >
                <div class="OfferList"  list-id="OfferList0">
		            <div class="OfferHeaderWrapper">
			            <h3 class="OfferHeader">ITEMS YOU WILL GIVE</h3>
                        <div class="OfferValueContainer">
                            Value: <img class="RBXImg" width="18" height="12" src="/images/Icons/img-robux.png" alt="RBX" /><span class="OfferValue" data-se="trade-give-value">0</span>
		                </div>
		            </div>                   
                    <div class="OfferItems"></div>
                </div>
                    <img src="/images/trade_divider2.jpg" style="margin-left:-5px;" alt="" /> 
                <div class="OfferList"  list-id="OfferList1">
		            <div class="OfferHeaderWrapper">
			            <h3 class="OfferHeader">ITEMS YOU WILL RECEIVE</h3>
                        <div class="OfferValueContainer">
                            Value: <img class="RBXImg" width="18" height="12" src="/images/Icons/img-robux.png" alt="RBX" /><span class="OfferValue" data-se="trade-receive-value">0</span>
		                </div>
		            </div>
                    <div class="OfferItems"></div>  
                    <div class="FeeNoteContainer"><div class="FeeNote" data-js="feenote" style="display:none;"><span class="Asterisk" >*</span> A  30% fee was taken from the amount.</div></div>
		        </div> 
	        </div> 
            <div style="clear:both;"></div>
        </div>  
        <div style="clear:both;"></div>
        <div class="ActionButtonContainer"  style="height:50px;display:none">
            <div id="ButtonAcceptTrade" class="btn-large btn-neutral" data-se="trade-accept">Accept</div>
            <div id="ButtonCounterTrade" class="btn-large btn-neutral" data-se="trade-counter">Counter</div>
            <div id="ButtonDeclineTrade" class="btn-large btn-negative" data-se="trade-decline">Decline</div>
            <div style="clear:both;"></div>
        </div>
        <div class="ReviewButtonContainer" style="height:50px;display:none">
            <div roblox-ok class="btn-large btn-neutral" data-se="trade-ok">OK</div>
            <div id="ButtonCancelTrade" class="btn-large btn-negative" data-se="trade-cancel">Cancel</div>
            <div style="clear:both;"></div>
        </div>
        <div class="ViewButtonContainer" style="height:50px;display:none">
            <div roblox-ok class="btn-large btn-neutral" data-se="trade-ok">OK</div>
            <div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
    </div>
    <script type="text/javascript">
        $(function () {
         Roblox.Trade.TradeRequestModal.initialize(4, true, 0.3);
        });
    </script>

</div>
<div id="InventoryItemTemplate" style="display:none;">
    

<div class="InventoryItemContainerOuter"  data-se="trade-item" >
    <div fieldname="InventoryItemSize">
		<div templateid="DefaultContent" class="InventoryItemContainerInner">
            <div class="HeaderButtonPlaceHolder"></div>
            <div class="InventoryNameWrapper">
			    <a class="InventoryItemLink" href="#" target="_blank"><div class="InventoryItemName"></div></a>
            </div>
			<div class="ItemLinkDiv">
				<img class="ItemImg" alt="Item Image" />
			</div>
			<div class="HoverContent">
				<div><span class="ItemInfoLabel">Avg. Price:</span><img class="RBXImg" width="14" height="9" src="/images/cssspecific/rbx2/head_bux.png" alt="RBX" /><span class="ItemInfoData InventoryItemAveragePrice"></span></div>
				<div><span class="ItemInfoLabel">Orig. Price:</span><img class="RBXImg" width="14" height="9" src="/images/cssspecific/rbx2/head_bux.png" alt="RBX"/><span class="ItemInfoData InventoryItemOriginalPrice"></span></div>
				<div><span class="ItemInfoLabel">Serial # :&nbsp;</span><span class="InventoryItemSerial"></span><span class="ItemInfoLabel" style="margin:0 2px 0 2px;">/</span><span class="SerialNumberTotal"></span></div>
				<div class="FooterButtonPlaceHolder"></div>
            </div>
            <img class="BuildersClubOverlay">
		</div>
	</div>	
</div>

</div>
<div id="BlankTemplate" style="display:none;">
    <div class="BlankItem LargeInventoryItem"  style="padding-right:4px;">
    </div>
</div>
<div id="RobuxTemplate" style="display:none;">
    <div class="RobuxTradeRequestItem" >
        <div class="RobuxAmountWrapper" style="">
			<div><span class="RobuxAmount" ></span><span class="RobuxItemAsterisk" >*</span> </div>
            <div>Robux</div>
        </div>
		<div style="margin:auto; width:51px;">
			<img class="ItemImg"src="/images/ROBUX.jpg" />
        </div>
    </div>
</div>
<div missing-user-asset-template style="display:none;">
    <div class="LargeInventoryItem MissingItemContainer">
        <div class="MissingItem " style="padding-right:4px;"></div>
    </div>
</div>
<div deleted-user-asset-template style="display:none;">
    <div class="LargeInventoryItem MissingItemContainer">
        <div class="MissingItem Deleted" style="padding-right:4px;"></div>
    </div>
</div>


    
    


                    <div style="clear:both"></div>
                </div>
            </div>
        </div> 
        </div>
        
            <div id="Footer" class="footer-container">
    <div class="FooterNav">
        <a href="http://www.roblox.com/info/Privacy.aspx">Privacy Policy</a>
        &nbsp;|&nbsp;
        <a href="http://corp.roblox.com/advertise-on-roblox" class="roblox-interstitial">Advertise with Us</a>
        &nbsp;|&nbsp;
        <a href="http://corp.roblox.com/press" class="roblox-interstitial">Press</a>
        &nbsp;|&nbsp;
        <a href="http://corp.roblox.com/contact-us" class="roblox-interstitial">Contact Us</a>
        &nbsp;|&nbsp;
            <a href="http://corp.roblox.com/about" class="roblox-interstitial">About Us</a>
&nbsp;|&nbsp;        <a href="http://blog.roblox.com">Blog</a>
        &nbsp;|&nbsp;
            <a href="http://corp.roblox.com/careers" class="roblox-interstitial">Jobs</a>
&nbsp;|&nbsp;        <a href="http://corp.roblox.com/parents" class="roblox-interstitial">Parents</a>
    </div>
    <div class="legal">
            <div class="left">
                <div id="a15b1695-1a5a-49a9-94f0-9cd25ae6c3b2">
    <a href="//privacy.truste.com/privacy-seal/Roblox-Corporation/validation?rid=2428aa2a-f278-4b6d-9095-98c4a2954215" title="TRUSTe Children privacy certification" target="_blank">
        <img style="border: none" src="//privacy-policy.truste.com/privacy-seal/Roblox-Corporation/seal?rid=2428aa2a-f278-4b6d-9095-98c4a2954215" width="133" height="45" alt="TRUSTe Children privacy certification"/>
    </a>
</div>
            </div>
            <div class="right">
                <p class="Legalese">
    ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a href="http://corp.roblox.com/" ref="footer-smallabout" class="roblox-interstitial">ROBLOX Corporation</a>, ©2015. Patents pending.
    ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
    Use of this site signifies your acceptance of the <a href="http://www.roblox.com/info/terms-of-service" ref="footer-terms">Terms and Conditions</a>.
</p>
            </div>
        <div class="clear"></div>
    </div>

</div>
        
        </div></div>
    </div>
    

<div id="usernotifications-data-model"
     class="hidden"
     data-notificationsdomain="https://notifications.roblox.com/"
     data-notificationstestinterval="5000"
     data-notificationsmaxconnectiontime="43200000">
</div>
        <script type="text/javascript">
            function urchinTracker() { };
            GoogleAnalyticsReplaceUrchinWithGAJS = true;
        </script>
    

    
<script type="text/javascript">
//<![CDATA[
var Page_Validators =  new Array(document.getElementById("ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle"), document.getElementById("ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle"), document.getElementById("ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle"));
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
var ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle = document.all ? document.all["ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle"] : document.getElementById("ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle");
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle.controltovalidate = "ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountTextBoxRestyle";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle.focusOnError = "t";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle.display = "Dynamic";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle.validationGroup = "TradeCurrencyRestyle";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle.initialvalue = "";
var ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle = document.all ? document.all["ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle"] : document.getElementById("ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle");
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle.controltovalidate = "ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountTextBoxRestyle";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle.focusOnError = "t";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle.validationGroup = "TradeCurrencyRestyle";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle.evaluationfunction = "RangeValidatorEvaluateIsValid";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle.maximumvalue = "999999999";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle.minimumvalue = "1";
var ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle = document.all ? document.all["ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle"] : document.getElementById("ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle");
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle.controltovalidate = "ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountTextBox";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle.focusOnError = "t";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle.errormessage = "!";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle.display = "Dynamic";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle.enabled = "False";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle.validationGroup = "TradeCurrencyRestyle";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle.initialvalue = "";
//]]>
</script>


<script type="text/javascript">
//<![CDATA[

var Page_ValidationActive = false;
if (typeof(ValidatorOnLoad) == "function") {
    ValidatorOnLoad();
}

function ValidatorOnSubmit() {
    if (Page_ValidationActive) {
        return ValidatorCommonOnSubmit();
    }
    else {
        return true;
    }
}
        WebForm_AutoFocus('ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountTextBoxRestyle');
document.getElementById('ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle').dispose = function() {
    Array.remove(Page_Validators, document.getElementById('ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRequiredFieldValidatorRestyle'));
}

document.getElementById('ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle').dispose = function() {
    Array.remove(Page_Validators, document.getElementById('ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_HaveAmountRangeValidatorRestyle'));
}

document.getElementById('ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle').dispose = function() {
    Array.remove(Page_Validators, document.getElementById('ctl00_ctl00_cphRoblox_cphMyRobloxContent_ctl00_WantAmountRequiredFieldValidatorRestyle'));
}
//]]>
</script>
</form>
        <script type="text/javascript">
        var Roblox = Roblox || {};
        Roblox.ChatTemplates = {
            ChatBarTemplate: "chat-bar",
            AbuseReportTemplate: "chat-abuse-report",
            DialogTemplate: "chat-dialog",
            FriendsSelectionTemplate: "chat-friends-selection",
            GroupDialogTemplate: "chat-group-dialog",
            NewGroupTemplate: "chat-new-group",
            DialogMinimizeTemplate: "chat-dialog-minimize"
        };
        Roblox.Chat = {
            SoundFile: "http://www.roblox.com/Chat/sound/chatsound.mp3"
        };
        Roblox.Party = {};
        Roblox.Party.SetGoogleAnalyticsCallback = function () {
            RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  }; 
        };

    </script>


<div id="chat-container" class="chat chat-container"
     ng-modules="robloxApp, chat"
     ng-controller="chatController"
     ng-class="{'collapsed': chatLibrary.chatLayout.collapsed}"
     ng-cloak>
    <!--chatLibrary.deviceType === deviceType.TABLET && ,
                'tablet-inapp': chatLibrary.tabletInApp-->
<div id="chat-data-model"
     class="hidden"
     chat-data
     chat-view-model="chatViewModel"
     chat-library="chatLibrary"
     data-userid="65367932"
     data-domain="roblox.com"
     data-gamespagelink="http://www.roblox.com/games"
     data-chatdomain="https://chat.roblox.com"
     data-numberofmembersforpartychrome="6"
     data-avatarheadshotsmultigetlimit="100"
     data-userpresencemultigetlimit="100"
     data-intervalofchangetitleforpartychrome="500"
     data-spinner="http://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif"
     data-notificationsdomain="https://notifications.roblox.com/"
     data-devicetype="Computer"
     data-inapp=false
     data-smallerchatenabled=true
     data-cleanpartyfromconversationenabled=false>
</div>
    <div chat-bar></div>
    <script type="text/ng-template" id="chat-bar">
    <div id="chat-main" class="chat-main"
         ng-class="{'chat-main-empty': chatLibrary.chatLayout.chatLandingEnabled}" ng-cloak>
        <div id="chat-header"
             class="chat-windows-header chat-header">
            <div class="chat-header-label"
                 ng-click="toggleChatContainer()">
                <span class="rbx-font-bold chat-header-title">Chat & Party</span>
            </div>
            <div class="chat-header-action">
                <span class="rbx-notification-red"
                      ng-show="chatLibrary.chatLayout.collapsed && chatViewModel.conversationCount > 0"
                      ng-cloak>{{chatViewModel.conversationCount}}</span>
                <span id="chat-group-create"
                      class="rbx-icon-chat-group-create"
                      ng-hide="chatLibrary.chatLayout.collapsed || chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.chatLandingEnabled || chatLibrary.chatLayout.pageDataLoading"
                      ng-click="launchDialog(newGroup.layoutId)"
                      data-toggle="tooltip"
                      title="Add at least 2 people to create chat group"
                      ng-cloak></span>
            </div>
        </div>
        <div id="chat-body"
             class="chat-body"
             ng-hide="chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.pageDataLoading"
             ng-if="!chatLibrary.chatLayout.chatLandingEnabled">
            <div class="chat-search"
                 ng-class="{'chat-search-focus': chatLibrary.chatLayout.searchFocus}">
                <input type="text"
                       placeholder="Search"
                       class="chat-search-input"
                       ng-model="chatViewModel.searchTerm"
                       ng-focus="chatLibrary.chatLayout.searchFocus = true" />
                <span class="rbx-icon-chat-search"></span>
                <span class="rbx-icon-chat-cancel-search"
                      ng-click="cancelSearch()"></span>
            </div>
            <button id="chat-group-create-btn"
                    type="button"
                    class="btn rbx-btn-control-xs"
                    ng-click="launchDialog(newGroup.layoutId)"
                    title="Add at least 2 people to create chat group"
                    ng-cloak>
                <span>Create Chat Group</span>
            </button>
            <div id="chat-friend-list" class="rbx-scrollbar chat-friend-list" lazy-load>
                <ul id="chat-friends" class="chat-friends">
                    <li ng-repeat="chatUser in chatUserDict | orderList: chatLibrary.chatLayoutIds | filter : {name: chatViewModel.searchTerm}"
                        class="chat-friend">
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.CHAT && chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatLibrary.friendsDict[chatUser.displayUserId].AvatarThumb.Url}}"
                                     class="chat-avatar"
                                     thumbnail="chatLibrary.friendsDict[chatUser.displayUserId].AvatarThumb"
                                     image-retry
                                     ng-if="chatUser.isConversation">
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatLibrary.friendsDict[chatUser.displayUserId].UserPresenceType]['className']"></div>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name" ng-if="chatUser.isConversation">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>

                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.GROUPCHAT && chatUser.isConversation"
                             class="chat-friend-container chat-friend-groups">
                            <div class="chat-friend-avatar">
                                <ul class="chat-avatar-groups">
                                    <li ng-repeat="userId in chatUser.userIds | limitTo : 4"
                                        class="chat-avatar">
                                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                             image-retry>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>

                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.PARTY && chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar chat-party-avatar">
                                <span class="rbx-icon-chat-party-avatar"></span>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.PENDINGPARTY  && chatUser.isConversation"
                             class="chat-friend-container chat-pending-party">
                            <div class="chat-friend-avatar">
                                <ul class="chat-avatar-groups">
                                    <li ng-repeat="userId in chatUser.userIds | limitTo : 3"
                                        class="chat-avatar">
                                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                             image-retry>
                                    </li>
                                    <li class="chat-avatar-party-icon">
                                        <span class="rbx-icon-chat-party-avatar"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message party-pending-msg"
                                      ng-if="chatUser.incomingPartyInvite">{{chatUser.pendingPartyMsg}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage && !chatUser.incomingPartyInvite"></span>
                            </div>
                        </div>
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="!chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatUser.AvatarThumb.Url}}" class="chat-avatar"
                                     thumbnail="chatUser.AvatarThumb"
                                     image-retry>
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatUser.UserPresenceType]['className']"></div>

                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-xs chat-friend-message">{{userPresenceTypes[chatUser.UserPresenceType].title}}</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="chat-loading loading-bottom"
                     ng-show="chatLibrary.chatLayout.isChatLoading">
                    <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
                </div>
            </div>
        </div>
        <div id="chat-disconnect"
             class="chat-disconnect"
             ng-show="chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.pageDataLoading"
             ng-cloak>
            <p ng-show="chatLibrary.chatLayout.errorMaskEnable">Trying to connect ...</p>
            <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
        </div>
        <div id="chat-empty-list"
             class="chat-disconnect"
             ng-hide="chatLibrary.chatLayout.errorMaskEnable"
             ng-if="chatLibrary.chatLayout.chatLandingEnabled">
            <span class="rbx-icon-chat-friends"></span>
            <p class="rbx-lead">Make friends to start chatting and partying!</p>
        </div>
    </div>
</script>
    <div id="dialogs"
         class="dialogs"
         ng-controller="dialogsController">
        <div dialog
             id="{{chatLayoutId}}"
             dialog-data="chatUserDict[chatLayoutId]"
             chat-library="chatLibrary"
             close-dialog="closeDialog(chatLayoutId)"
             send-invite="sendInvite(chatLayoutId)"
             ng-repeat="chatLayoutId in chatLibrary.layoutIdList"></div>
        <script type="text/ng-template" id="chat-abuse-report">
    <div class="dialog-report-container"
         ng-show="dialogLayout.isConfirmationOn">
        <div class="dialog-report-content">
            <h4>Continue to report?</h4>
            <button id="chat-abuse-report-btn"
                    class="rbx-btn-primary-xs"
                    ng-click="abuseReport(null, true)">
                Report
            </button>

            <button class="rbx-btn-control-xs"
                    ng-click="dialogLayout.isConfirmationOn = false">
                Cancel
            </button>
        </div>
    </div>
</script>

        <script type="text/ng-template" id="chat-friends-selection">
    <div class="chat-friends-container">
        <div class="chat-search"
             ng-class="{'group-select-container' : dialogData.selectedUserIds.length > 0}"
             group-select>
            <div class="group-select">
                <ul class="group-select-friends">
                    <li class="rbx-font-sm group-select-friend"
                        ng-repeat="userId in dialogData.selectedUserIds">
                        {{dialogData.selectedUsersDict[userId].Username}}
                        <span class="rbx-icon-chat-cancel-search group-select-cancel" ng-click="selectFriends(userId)"></span>
                    </li>
                </ul>
                <input type="text"
                       placeholder="Search"
                       class="chat-search-input"
                       focus-me="chatLibrary.inApp ? false: true"
                       ng-model="dialogData.searchTerm" />
            </div>
            <button id="friends-selection-btn"
                    class="rbx-btn-secondary-xs friends-invite-btn"
                    ng-disabled="dialogLayout.inviteBtnDisabled"
                    ng-click="sendInvite()">
                Invite
            </button>
        </div>

        <div id="scrollbar_friend_{{dialogData.dialogType}}_{{dialogData.layoutId}}" class="rbx-scrollbar chat-friend-list"
             friends-lazy-load>
            <ul class="chat-friends">
                <li ng-repeat="friend in chatLibrary.friendsDict | orderList: dialogData.friendIds  | filter: {Username: dialogData.searchTerm}"
                    class="chat-friend">
                    <div class="chat-friend-container chat-friend-select"
                         ng-click="selectFriends(friend.Id)">
                        <div class="chat-friend-avatar">
                            <img ng-src="{{friend.AvatarThumb.Url}}"
                                 thumbnail="friend.AvatarThumb"
                                 image-retry
                                 class="chat-avatar">
                            <div class="chat-friend-status" ng-class="userPresenceTypes[friend.UserPresenceType]['className']"></div>
                        </div>
                        <div class="chat-friend-info">
                            <span class="chat-friend-name">{{friend.Username}}</span>
                            <span class="rbx-font-sm chat-friend-message">{{userPresenceTypes[friend.UserPresenceType].title}}</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</script>
        <script type="text/ng-template" id="chat-dialog">
    <div id="dialog-container" class="dialog-container"
         ng-class="{'group-has-banner': dialogData.isPartyExisted || dialogData.partyInGame,
                    'dialog-party': dialogData.dialogType == dialogType.PARTY,
                    'collapsed': dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER,
                    'active': dialogLayout.active && !dialogLayout.hasFocus}"
         ng-controller="dialogController"
         ng-focus="focusDialog()">
        <div class="dialog-main">
            <div class="chat-windows-header dialog-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-party-label"
                          ng-show="dialogData.dialogType == dialogType.PARTY"
                          title="Party"
                          ng-cloak></span>
                    <span id="chat-title"
                          class="rbx-font-bold chat-header-title dialog-header-title" 
                          ng-click="toggleDialogContainer()" 
                          ng-if="dialogData.dialogType != dialogType.PARTY">
                        <a class="rbx-font-bold"
                           ng-click="linkToProfile($event)"
                           ng-href="{{dialogData.nameLink}}">{{dialogData.name}}</a>
                    </span>
                    <span id="party-title"
                          class="rbx-font-bold chat-header-title dialog-header-title"
                          ng-click="toggleDialogContainer()" 
                          ng-if="dialogData.dialogType == dialogType.PARTY">{{dialogData.name}}
                    </span>
                </div>
                <div class="chat-header-action"
                     chat-setting>
                    <span class="rbx-icon-chat-close"
                          ng-click="closeDialog(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Close"></span>
                    <span class="rbx-icon-chat-setting"
                          data-toggle="popover"
                          data-bind="group-settings-{{dialogData.Id}}"
                          ng-hide="(dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                    <div class="rbx-popover-content" data-toggle="group-settings-{{dialogData.Id}}">
                        <ul class="rbx-dropdown-menu" role="menu">
                            <li>
                                <a id="abuse-report"
                                   ng-click="abuseReport(dialogData.userIds[0], false)">Report Abuse</a>
                            </li>
                            <li>
                                <a id="leave-group"
                                   ng-click="leaveGroup()"
                                   ng-if="dialogData.dialogType === dialogType.PARTY">Leave Party</a>
                            </li>
                        </ul>
                    </div>
                    <span id="create-party"
                          class="rbx-icon-chat-party-label"
                          ng-click="sendInvite(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Play Together"
                          ng-hide="dialogData.party || (dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER)  || chatLibrary.chatLayout.errorMaskEnable"></span>
                </div>
            </div>

            <div id="dialog-member-header"
                 class="dialog-member-header"
                 ng-show="dialogData.isPartyExisted && !dialogData.partyInGame">
                <ul class="group-members">
                    <li class="group-member"
                        title="{{chatLibrary.friendsDict[userId].Username}}{{dialogData.membersDict[userId].statusTooltip}}"
                        ng-repeat="userId in dialogData.userIds">
                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[userId].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-leader': dialogData.membersDict[userId].memberStatus === memberStatus.LEADER,
                                        'group-pending':dialogData.membersDict[userId].memberStatus === memberStatus.PENDING}">
                    </li>
                </ul>
                <a id="find-game"
                   class="rbx-btn-primary-xs"
                   ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.party.LeaderUser.Id === chatLibrary.userId"
                   ng-href="{{chatLibrary.gamesPageLink}}">Find Game</a>
                <a id="join-party"
                   class="rbx-btn-control-xs"
                   ng-hide="dialogData.dialogType === dialogType.PARTY || !dialogData.party"
                   ng-click="joinParty()">
                    Join Party
                </a>
            </div>

            <div id="party-ingame-header"
                 class="party-ingame-header"
                 ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.isPartyExisted && dialogData.partyInGame">
                <img ng-src="{{dialogData.placeThumbnail.Url}}"
                     thumbnail="dialogData.placeThumbnail" image-retry
                     class="party-ingame-thumbnail">
                <div class="party-ingame-label"
                     ng-class="{'party-ingame-member': chatLibrary.userId !== dialogData.party.LeaderUser.Id}">
                    <span class="rbx-font-sm">Playing</span>
                    <span class="rbx-font-sm rbx-font-bold party-ingame-name">{{dialogData.party.GameName}}</span>
                </div>
                <a id="join-game"
                   class="rbx-btn-control-xs"
                   ng-hide="chatLibrary.userId === dialogData.party.LeaderUser.Id"
                   ng-click="joinGame()">
                    Join Game
                </a>
            </div>
            <div id="scrollbar_{{dialogData.dialogType}}_{{dialogData.layoutId}}"
                 class="rbx-scrollbar dialog-body"
                 dialog-lazy-load>
                <ul class="dialog-messages">
                    <li class="dialog-message-container"
                        ng-repeat="message in dialogData.ChatMessages | reverse"
                        ng-class="{'message-inbound': message.SenderUserId != chatLibrary.userId && !message.isSystemMessage,
                                    'system-message': message.isSystemMessage}">
                        <div class="rbx-font-sm dialog-message dialog-triangle dialog-message-content"
                             ng-bind-html="message.Content" 
                             ng-hide="message.isSystemMessage"></div>
                        <div class="rbx-font-xs dialog-sending" ng-show="message.sendingMessage">Sending...</div>
                        <div class="rbx-font-xs rbx-text-danger dialog-sending" ng-show="message.sendMessageHasError"
                             ng-bind="message.error || 'Error'"></div>
                        <span class="system-message-content"
                              ng-show="message.isSystemMessage"
                              ng-bind-html="message.Content"></span>
                    </li>
                </ul>
            </div>
            <div class="chat-loading loading-top"
                 ng-show="dialogLayout.isChatLoading">
                <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
            </div>
            <div class="dialog-input-container">
                <textarea id="dialog-input"
                          msd-elastic
                          focus-me="{{dialogLayout.focusMeEnabled}}"
                          ng-focus="toggleDialogFocusStatus(true)"
                          ng-blur="toggleDialogFocusStatus(false)"
                          placeholder="Send a message ..."
                          ng-model="dialogData.messageForSend"
                          key-press-enter="sendMessage()"
                          class="dialog-input"
                          maxlength="{{dialogLayout.limitCharacterCount}}"
                          ng-disabled="chatLibrary.chatLayout.errorMaskEnable"></textarea>
            </div>

            <div abuse-report></div>
        </div>
    </div>
</script>
        <script type="text/ng-template" id="chat-group-dialog">
    <div class="dialog-container group-dialog"
         ng-class="{'group-has-banner': dialogData.isPartyExisted || dialogData.partyInGame,
                    'dialog-party': dialogData.dialogType == dialogType.PARTY,
                    'collapsed': dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER,
                    'active': dialogLayout.active && !dialogLayout.hasFocus}"
         ng-controller="dialogController">
        <div class="dialog-main" 
             ng-hide="dialogLayout.isConfirmationOn || dialogLayout.lookUpMembers || dialogData.addMoreFriends">
            <div class="chat-windows-header dialog-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-party-label"
                          ng-show="dialogData.dialogType == dialogType.PARTY"
                          title="Party"
                          ng-cloak></span>
                    <span class="rbx-icon-chat-group-label"
                          ng-show="dialogData.dialogType != dialogType.PARTY"
                          title="Group Chat"
                          ng-cloak></span>
                    <span id="party-title"
                          class="rbx-font-bold dialog-header-title"
                          title="{{dialogData.partyName}}"
                          ng-click="toggleDialogContainer()" ng-if="dialogData.dialogType == dialogType.PARTY">{{dialogData.partyName}}</span>
                    <span id="group-chat-title"
                          class="rbx-font-bold dialog-header-title"
                          title="{{dialogData.groupName}}"
                          ng-click="toggleDialogContainer()" ng-if="dialogData.dialogType != dialogType.PARTY">{{dialogData.groupName}}</span>
                </div>
                <div class="chat-header-action"
                     chat-setting>
                    <span class="rbx-icon-chat-close"
                          ng-click="closeDialog(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Close"></span>
                    <span class="rbx-icon-chat-setting"
                          data-toggle="popover"
                          data-bind="group-settings-{{dialogData.Id}}"
                          ng-hide="(dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                    <div class="rbx-popover-content" data-toggle="group-settings-{{dialogData.Id}}">
                        <ul class="rbx-dropdown-menu" role="menu">
                            <li><a id="add-friends" ng-click="addFriends()">Add Friends</a></li>
                            <li><a id="view-participants" ng-click="viewParticipants()">View Participants</a></li>
                            <li>
                                <a id="leave-group" ng-click="leaveGroup()" ng-bind="dialogData.dialogType === dialogType.PARTY ? 'Leave Party' : 'Leave Group'"></a>
                            </li>
                        </ul>
                    </div>
                    <span id="create-party"
                          class="rbx-icon-chat-party-label"
                          ng-click="sendInvite(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Play Together"
                          ng-hide="dialogData.party || (dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                </div>
            </div>
            <div id="dialog-member-header"
                 class="dialog-member-header"
                 ng-show="dialogData.isPartyExisted && (!dialogData.partyInGame || dialogData.dialogType === dialogType.PENDINGPARTY)">
                <ul class="group-members">
                    <li class="group-member"
                        title="{{chatLibrary.friendsDict[userId].Username}}{{dialogData.membersDict[userId].statusTooltip}}"
                        ng-repeat="userId in dialogData.userIds | limitTo: dialogLayout.limitMemberDisplay">
                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[userId].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-leader': dialogData.membersDict[userId].memberStatus === memberStatus.LEADER,
                                        'group-pending':dialogData.membersDict[userId].memberStatus === memberStatus.PENDING}">
                    </li>
                    <li ng-show="dialogData.userIds.length === (dialogLayout.limitMemberDisplay + 1)"
                        title="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].Username}}{{dialogData.membersDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].statusTooltip}}"
                        class="group-member">
                        <img ng-src="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-pending': dialogData.membersDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].memberStatus === memberStatus.PENDING}">
                    </li>
                    <li ng-show="dialogData.userIds.length > (dialogLayout.limitMemberDisplay + 1)"
                        ng-click="dialogLayout.lookUpMembers = !dialogLayout.lookUpMembers"
                        class="group-member group-member-plus"
                        ng-cloak>+{{dialogData.userIds.length - dialogLayout.limitMemberDisplay}}</li>
                </ul>
                <a id="find-game"
                   class="rbx-btn-primary-xs"
                   ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.party.LeaderUser.Id === chatLibrary.userId && !chatLibrary.inApp"
                   ng-href="{{chatLibrary.gamesPageLink}}">Find Game</a>
                <a id="join-party"
                   class="rbx-btn-control-xs"
                   ng-hide="dialogData.dialogType === dialogType.PARTY || !dialogData.party"
                   ng-click="joinParty()">
                    Join Party
                </a>
            </div>

            <div id="party-ingame-header"
                 class="party-ingame-header"
                 ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.isPartyExisted && dialogData.partyInGame">
                <img ng-src="{{dialogData.placeThumbnail.Url}}"
                     thumbnail="dialogData.placeThumbnail" image-retry
                     class="party-ingame-thumbnail">
                <div class="party-ingame-label"
                     ng-class="{'party-ingame-member': chatLibrary.userId !== dialogData.party.LeaderUser.Id}">
                    <span class="rbx-font-sm">Playing</span>
                    <span class="rbx-font-sm rbx-font-bold party-ingame-name">{{dialogData.party.GameName}}</span>
                </div>
                <a id="join-game"
                   class="rbx-btn-control-xs"
                   ng-hide="chatLibrary.userId === dialogData.party.LeaderUser.Id"
                   ng-click="joinGame()">
                    Join Game
                </a>
            </div>
            <div id="scrollbar_{{dialogData.dialogType}}_{{dialogData.layoutId}}"
                 class="rbx-scrollbar dialog-body"
                 dialog-lazy-load>
                <ul class="dialog-messages">
                    <li class="dialog-message-container"
                        ng-repeat="message in dialogData.ChatMessages | reverse"
                        ng-class="{'message-inbound': message.SenderUserId != chatLibrary.userId && !message.isSystemMessage,
                                    'system-message': message.isSystemMessage}">
                        <a ng-href="{{chatLibrary.friendsDict[message.SenderUserId].UserProfileLink}}"
                           ng-hide="message.isSystemMessage">
                            <img ng-if="message.SenderUserId != chatLibrary.userId"
                                 ng-src="{{chatLibrary.friendsDict[message.SenderUserId].AvatarThumb.Url}}"
                                 thumbnail="chatLibrary.friendsDict[message.SenderUserId].AvatarThumb"
                                 image-retry
                                 class="dialog-message-avatar">
                        </a>
                        <div class="dialog-message dialog-triangle" 
                             ng-hide="message.isSystemMessage">
                            <span ng-if="chatLibrary.friendsDict[message.SenderUserId] && message.SenderUserId != chatLibrary.userId"
                                  class="rbx-font-xs dialog-message-author">{{chatLibrary.friendsDict[message.SenderUserId].Username}}</span>
                            <span class="rbx-font-sm dialog-message-content" ng-bind-html="message.Content"></span>
                        </div>
                        <div class="rbx-font-xs dialog-sending" ng-show="message.sendingMessage">Sending...</div>
                        <div class="rbx-font-xs rbx-text-danger dialog-sending" ng-show="message.sendMessageHasError"
                             ng-bind="message.error || 'Error'"></div>
                        <span class="system-message-content"
                              ng-show="message.isSystemMessage"
                              ng-bind-html="message.Content"></span>
                    </li>
                </ul>
            </div>
            <div class="chat-loading loading-top"
                 ng-show="dialogLayout.isChatLoading">
                <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
            </div>
            <div class="dialog-input-container">
                <textarea msd-elastic
                          focus-me="{{dialogLayout.focusMeEnabled}}"
                          ng-focus="toggleDialogFocusStatus(true)"
                          ng-blur="toggleDialogFocusStatus(false)"
                          placeholder="Send a message ..."
                          ng-model="dialogData.messageForSend"
                          key-press-enter="sendMessage()"
                          class="dialog-input"
                          maxlength="{{dialogLayout.limitCharacterCount}}"
                          ng-disabled="chatLibrary.chatLayout.errorMaskEnable"></textarea>
            </div>
        </div>
        <div class="group-members-container"
             ng-show="dialogLayout.lookUpMembers">
            <div class="chat-windows-header">
                <span class="rbx-icon-chat-arrow-left"
                      ng-click="viewParticipants()"></span>
                <span class="rbx-font-bold">Participants</span>
            </div>
            <div id="group-members" class="rbx-scrollbar chat-friend-list"
                <ul class="chat-friends">
                    <li ng-repeat="userId in dialogData.userIds"
                        class="chat-friend">
                        <div class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                     thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                     image-retry
                                     class="chat-avatar">
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatLibrary.friendsDict[userId].UserPresenceType]['className']"></div>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatLibrary.friendsDict[userId].Username}}</span>
                                <span class="rbx-font-sm rbx-text-notes" ng-show="dialogData.party && dialogData.membersDict[userId].memberStatus == memberStatus.LEADER">Leader</span>
                                <span class="rbx-font-sm rbx-text-notes" ng-show="dialogData.party && dialogData.membersDict[userId].memberStatus == memberStatus.MEMBER">In party</span>
                            </div>
                            <div class="group-member-action">
                                <span ng-if="chatLibrary.userId != userId && chatLibrary.userId === dialogData.party.LeaderUser.Id && dialogData.dialogType == dialogType.PARTY"
                                      class="rbx-icon-chat-remove"
                                      ng-click="removeMember(userId)"></span>
                                <span ng-if="chatLibrary.userId != userId && chatLibrary.userId === dialogData.InitiatorUser.Id && dialogData.dialogType != dialogType.PARTY"
                                      class="rbx-icon-chat-remove"
                                      ng-click="removeMember(userId)"></span>
                                <span class="rbx-icon-chat-report-person"
                                      ng-if="chatLibrary.userId != userId"
                                      ng-click="abuseReport(userId, false)"></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div abuse-report></div>
        <div class="group-friends-container"
             ng-show="dialogData.addMoreFriends">
            <div class="chat-windows-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-arrow-left"
                          ng-click="dialogData.addMoreFriends = false"></span>
                    <span class="rbx-font-bold">Add Friends</span>
                    <span class="rbx-font-bold"
                          ng-class="{'group-overload': dialogLayout.isMembersOverloaded}">
                        ({{(dialogData.numberOfSelected)}}/{{chatLibrary.quotaOfPartyMembers}})
                    </span>
                </div>
            </div>
            <div friends-selection></div>
        </div>
    </div>
</script>

        <div dialog
             id="{{newGroup.layoutId}}"
             dialog-data="newGroup"
             chat-library="chatLibrary"
             close-dialog="closeDialog('newGroup')"
             send-invite="sendInvite(newGroup.layoutId)"
             ng-if="newGroup"></div>
        <script type="text/ng-template" id="chat-new-group">
    <div class="dialog-container group-create-container"
         ng-controller="friendsController">
        <div class="chat-windows-header">
            <div class="chat-header-title">
                <span class="rbx-font-bold">{{dialogLayout.title}}</span>
                <span class="rbx-font-bold"
                      ng-class="{'group-overload': dialogLayout.isMembersOverloaded}">
                    ({{(dialogData.numberOfSelected)}}/{{chatLibrary.quotaOfPartyMembers}})
                </span>
            </div>
            <div class="chat-header-action">
                <span class="rbx-icon-chat-close"
                      ng-click="closeDialog(dialogData.layoutId)"
                      data-toggle="tooltip"
                      title="Close"></span>
            </div>
        </div>
        <div friends-selection></div>
    </div>
</script>
        <script type="text/ng-template" id="chat-dialog-minimize">
    <div id="dialogs-minimize-container"
         class="dialogs-minimize-container"
         ng-show="hasMinimizedDialogs"
         data-toggle="popover"
         data-bind="dialogs">
        <span class="rbx-icon-chat-minimize"></span>
        <span class="minimize-count">{{chatLibrary.minimizedDialogIdList.length}}</span>
        <div class="rbx-popover-content" data-toggle="dialogs">
            <ul class="rbx-dropdown-menu minimize-list" role="menu">
                <li ng-repeat="dialogLayoutId in chatLibrary.minimizedDialogIdList"
                    class="minimize-item"
                    id="{{dialogLayoutId}}"
                    minimize-item>
                    <a class="rbx-text-overflow minimize-title">
                        <span>
                            {{chatLibrary.minimizedDialogData[dialogLayoutId].name}}
                        </span>
                    </a>
                    <span class="rbx-icon-chat-cancel-search minimize-close"></span>
                </li>
            </ul>
        </div>
    </div>
</script>


        <div id="dialogs-minimize"
             class="dialogs-minimize"
             dialog-minimize
             chat-library="chatLibrary">
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            // Because of placeLauncher.js, has to add this stupid global "play_placeId"
            $(document).on('Roblox.Chat.PartyInGame', function (event, args) {
                play_placeId = args.placeId;
            });
        });
    </script>

</div>
    
    

    <div id="InstallationInstructions" style="display:none;">
        <div class="ph-installinstructions">
            <div class="ph-modal-header">
                <span class="rbx-icon-close simplemodal-close"></span>
                <h3>Thanks for playing ROBLOX</h3>
            </div>
            <div class="ph-installinstructions-body">
                    <div class="ph-install-step ph-installinstructions-step1-of4">
                        <h1>1</h1>
                        <p class="larger-font-size">Click RobloxPlayerLauncher.exe to run the ROBLOX installer, which just downloaded via your web browser.</p>
                        <img width="230" height="180" src="http://images.rbxcdn.com/8b0052e4ff81d8e14f19faff2a22fcf7.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step2-of4">
                        <h1>2</h1>
                        <p class="larger-font-size">Click <strong>Run</strong> when prompted by your computer to begin the installation process.</p>
                        <img width="230" height="180" src="http://images.rbxcdn.com/4a3f96d30df0f7879abde4ed837446c6.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step3-of4">
                        <h1>3</h1>
                        <p class="larger-font-size">Click <strong>Ok</strong> once you've successfully installed ROBLOX.</p>
                        <img width="230" height="180" src="http://images.rbxcdn.com/6e23e4971ee146e719fb1abcb1d67d59.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step4-of4">
                        <h1>4</h1>
                        <p class="larger-font-size">After installation, click <strong>Play</strong> below to join the action!</p>
                        <div class="VisitButton VisitButtonContinuePH">
                            <a class="btn rbx-btn-primary-lg disabled">Play</a>
                        </div>
                    </div>
            </div>
            <div class="rbx-font-sm rbx-text-notes">
                The ROBLOX installer should download shortly. If it doesn’t, <a href="#" onclick="Roblox.ProtocolHandlerClientInterface.startDownload(); return false;">start the download now.</a>
            </div>
        </div>
    </div>
    <div class="InstallInstructionsImage" data-modalwidth="970" style="display:none;"></div>



<div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
<iframe id="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>

<script type='text/javascript' src='http://js.rbxcdn.com/6b9fed5e91a508780b95c302464d62ef.js.gzip'></script>

<script type="text/javascript">
    Roblox.Client._skip = null;
    Roblox.Client._CLSID = '76D50904-6780-4c8b-8986-1A7EE0B1716D';
    Roblox.Client._installHost = 'setup.roblox.com';
    Roblox.Client.ImplementsProxy = true;
    Roblox.Client._silentModeEnabled = true;
    Roblox.Client._bringAppToFrontEnabled = false;
    Roblox.Client._currentPluginVersion = '';
    Roblox.Client._eventStreamLoggingEnabled = true;

        
        Roblox.Client._installSuccess = function() {
            if(GoogleAnalyticsEvents){
                GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
                GoogleAnalyticsEvents.FireEvent(['Plugin','Install Success']);
                if (Roblox.Client._eventStreamLoggingEnabled && typeof Roblox.GamePlayEvents != "undefined") {
                    Roblox.GamePlayEvents.SendInstallSuccess(Roblox.Client._launchMode, play_placeId);
                }
            }
        }
        
            
        if ((window.chrome || window.safari) && window.location.hash == '#chromeInstall') {
            window.location.hash = '';
            var continuation = '(' + $.cookie('chromeInstall') + ')';
            play_placeId = $.cookie('chromeInstallPlaceId');
            Roblox.GamePlayEvents.lastContext = $.cookie('chromeInstallLaunchMode');
            $.cookie('chromeInstallPlaceId', null);
            $.cookie('chromeInstallLaunchMode', null);
            $.cookie('chromeInstall', null);
            RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  }; 
            Roblox.Client.ResumeTimer(eval(continuation));
        }
        
</script>


<div id="PlaceLauncherStatusPanel" style="display:none;width:300px"
     data-new-plugin-events-enabled="True"
     data-event-stream-for-plugin-enabled="True"
     data-event-stream-for-protocol-enabled="True"
     data-is-protocol-handler-launch-enabled="True"
     data-is-user-logged-in="True"
     data-os-name="Windows"
     data-protocol-name-for-client="roblox-player"
     data-protocol-name-for-studio="roblox-studio"
     data-protocol-url-includes-launchtime="true"
     data-protocol-detection-enabled="true">
    <div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px">
        <div id="Spinner" class="Spinner" style="padding:20px 0;">
            <img src="http://images.rbxcdn.com/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress" />
        </div>
        <div id="status" style="min-height:40px;text-align:center;margin:5px 20px">
            <div id="Starting" class="PlaceLauncherStatus MadStatusStarting" style="display:block">
                Starting Roblox...
            </div>
            <div id="Waiting" class="PlaceLauncherStatus MadStatusField">Connecting to Players...</div>
            <div id="StatusBackBuffer" class="PlaceLauncherStatus PlaceLauncherStatusBackBuffer MadStatusBackBuffer"></div>
        </div>
        <div style="text-align:center;margin-top:1em">
            <input type="button" class="Button CancelPlaceLauncherButton translate" value="Cancel" />
        </div>
    </div>
</div>
<div id="ProtocolHandlerStartingDialog" style="display:none;">
    <div class="modalPopup ph-modal-popup">
        <div class="ph-modal-header">

        </div>
        <div class="ph-logo-row">
            <img src="/images/Logo/logo_R.svg" width="90" height="90" alt="R" />
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                ROBLOX is now loading. Get ready to play!
            </p>
            <div class="ph-startingdialog-spinner-row">
                <img src="http://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" width="82" height="24" />
            </div>
        </div>
    </div>
</div>
<div id="ProtocolHandlerAreYouInstalled" style="display:none;">
    <div class="modalPopup ph-modal-popup">
        <div class="ph-modal-header">
            <span class="rbx-icon-close simplemodal-close"></span>
        </div>
        <div class="ph-logo-row">
            <img src="/images/Logo/logo_R.svg" width="90" height="90" alt="R" />
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                You're moments away from getting into the game!
            </p>
            <div>
                <button type="button" class="btn rbx-btn-primary-sm" id="ProtocolHandlerInstallButton">
                    Download and Install ROBLOX
                </button>
            </div>
            <div class="rbx-small rbx-text-notes">
                <a href="https://en.help.roblox.com/hc/en-us/articles/204473560" class="rbx-link" target="_blank">Click here for help</a>
            </div>

        </div>
    </div>
</div>
<div id="ProtocolHandlerClickAlwaysAllowed" class="ph-clickalwaysallowed" style="display:none;">
    <p class="larger-font-size">
        <span class="rbx-icon-moreinfo"></span>
        Check <b>Remember my choice</b> and click <img src="http://images.rbxcdn.com/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application" />  in the dialog box above to join games faster in the future!
    </p>
</div>


    <div id="videoPrerollPanel" style="display:none">
        <div id="videoPrerollTitleDiv">
            Gameplay sponsored by:
        </div>
        <div id="content">
            <video id="contentElement" style="width:0; height:0;" />
        </div>
        <div id="videoPrerollMainDiv"></div>
        <div id="videoPrerollCompanionAd">
            
        </div>
        <div id="videoPrerollLoadingDiv">
            Loading <span id="videoPrerollLoadingPercent">0%</span> - <span id="videoPrerollMadStatus" class="MadStatusField">Starting game...</span><span id="videoPrerollMadStatusBackBuffer" class="MadStatusBackBuffer"></span>
            <div id="videoPrerollLoadingBar">
                <div id="videoPrerollLoadingBarCompleted">
                </div>
            </div>
        </div>
        <div id="videoPrerollJoinBC">
            <span>Get more with Builders Club!</span>
            <a href="https://www.roblox.com/premium/membership?ctx=preroll" target="_blank" class="btn-medium btn-primary" id="videoPrerollJoinBCButton">Join Builders Club</a>
        </div>
    </div>   
    <script type="text/javascript">
        $(function () {
            var videoPreRollDFP = Roblox.VideoPreRollDFP;
            if (videoPreRollDFP) {
                var customTargeting = Roblox.VideoPreRollDFP.customTargeting;
                videoPreRollDFP.showVideoPreRoll = false;
                videoPreRollDFP.loadingBarMaxTime = 33000;
                videoPreRollDFP.videoLoadingTimeout = 11000;
                videoPreRollDFP.videoPlayingTimeout = 41000;
                videoPreRollDFP.videoLogNote = "Flooded";
                videoPreRollDFP.logsEnabled = true;
                videoPreRollDFP.excludedPlaceIds = "32373412";
                videoPreRollDFP.adUnit = "/1015347/VideoPreroll";
                videoPreRollDFP.adTime = 15;
                videoPreRollDFP.isSwfPreloaderEnabled = true;
                videoPreRollDFP.isPrerollShownEveryXMinutesEnabled = true;
                customTargeting.userAge = "36";
                customTargeting.userGender = "Male";
                customTargeting.gameGenres = "";
                customTargeting.environment = "Production";
                customTargeting.adTime = "15";
                customTargeting.PLVU = false;
                $(videoPreRollDFP.checkEligibility);
            }
        });
    </script>                                                     


<div id="GuestModePrompt_BoyGirl" class="Revised GuestModePromptModal" style="display:none;">
    <div class="simplemodal-close">
        <a class="ImageButton closeBtnCircle_20h" style="cursor: pointer; margin-left:455px;top:7px; position:absolute;"></a>
    </div>
    <div class="Title">
        Choose Your Character
    </div>
    <div style="min-height: 275px; background-color: white;">
        <div style="clear:both; height:25px;"></div>

        <div style="text-align: center;">
            <div class="VisitButtonsGuestCharacter VisitButtonBoyGuest" style="float:left; margin-left:45px;"></div>
            <div class="VisitButtonsGuestCharacter VisitButtonGirlGuest" style="float:right; margin-right:45px;"></div>
        </div>
        <div style="clear:both; height:25px;"></div>
        <div class="RevisedFooter">
            <div style="width:200px;margin:10px auto 0 auto;">
                <a href="http://www.roblox.com/?returnUrl=http%3A%2F%2Fwww.roblox.com%2FMy%2FMoney.aspx"><div class="RevisedCharacterSelectSignup"></div></a>
                <a class="HaveAccount" href="https://www.roblox.com/newlogin?returnUrl=http%3A%2F%2Fwww.roblox.com%2FMy%2FMoney.aspx">I have an account</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function checkRobloxInstall() {
             return RobloxLaunch.CheckRobloxInstall('/install/download.aspx');
    }

</script>

<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.UpsellAdModal = Roblox.UpsellAdModal || {};

    Roblox.UpsellAdModal.Resources = {
        //<sl:translate>
        title: "Remove Ads Like This",
        body: "Builders Club members do not see external ads like these.",
        accept: "Upgrade Now",
        decline: "No, thanks"
        //</sl:translate>
    };
</script>  

<div class="ConfirmationModal modalPopup unifiedModal smallModal" data-modal-handle="confirmation" style="display:none;">
    <a class="genericmodal-close ImageButton closeBtnCircle_20h"></a>
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div class="TopBody">
            <div class="ImageContainer roblox-item-image"  data-image-size="small" data-no-overlays data-no-click>
                <img class="GenericModalImage" alt="generic image" />
            </div>
            <div class="Message"></div>
        </div>
        <div class="ConfirmationModalButtonContainer">
            <a href id="roblox-confirm-btn"><span></span></a>
            <a href id="roblox-decline-btn"><span></span></a>
        </div>
        <div class="ConfirmationModalFooter">
        
        </div>  
    </div>   
    <script type="text/javascript">
        Roblox = Roblox || {};
        Roblox.Resources = Roblox.Resources || {};

        //<sl:translate>
        Roblox.Resources.GenericConfirmation = {
            yes: "Yes",
            No: "No",
            Confirm: "Confirm",
            Cancel: "Cancel"
        };
        //</sl:translate>
    </script>
</div>


    
        <script>
            $(function () {
                Roblox.DeveloperConsoleWarning.showWarning();
            });
        </script>
    

    <script type="text/javascript">
        $(function () {
            Roblox.CookieUpgrader.domain = 'roblox.com';
            Roblox.CookieUpgrader.upgrade("GuestData", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
            Roblox.CookieUpgrader.upgrade("RBXSource", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("rbx_acquisition_time", cookie); } });
            Roblox.CookieUpgrader.upgrade("RBXViralAcquisition", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("time", cookie); } });
                
                Roblox.CookieUpgrader.upgrade("RBXMarketing", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
                
                            
                Roblox.CookieUpgrader.upgrade("RBXSessionTracker", { expires: Roblox.CookieUpgrader.fourHoursFromNow });
                
                    });
    </script>
    <script>
        var _comscore = _comscore || [];
        _comscore.push({ c1: "2", c2: "6035605", c3: "", c4: "", c15: "Over13" });

        (function() {
            var s = document.createElement("script"), el = document.getElementsByTagName("script")[0];
            s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();
    </script>
    <noscript>
        <img src="http://b.scorecardresearch.com/p?c1=2&c2=&c3=&c4=&c5=&c6=&c15=&cv=2.0&cj=1"/>
    </noscript>

</body>                
</html>