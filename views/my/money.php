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
$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();




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
<?=$pagebuilder->build_component("status", ["status"=>"confirm", "msg"=>"This page is currently not functional and is a bit broken. Please stay tuned."]);?>
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
                                    <img src="https://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="The principal currency of Robloxia, which Builders Club members receive a daily allowance of to live a comfortable life of leisure. For this and other benefits, join Builders Club! Alternately, you can purchase ROBUX using our secure payment system." />
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
                                <td class="Categories">Pending Sales <img src="https://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="As an anti fraud precaution, revenue from certain transactions, such as Game Pass sales, is held for a short period of time before being released to the seller." /></td>
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
                                <img src="https://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="Similar to tickets won in an arcade - play the game, earn tickets, and get rewarded with fabulous prizes. Tickets are granted to citizens who help expand and improve Robloxia. The best way to get tickets is to attract a lot of visitors to a cool place that you create. You can also get the daily login bonus just by showing up!" />
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
                                <td class="Categories">Pending Sales <img src="https://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="As an anti fraud precaution, revenue from certain transactions, such as Game Pass sales, is held for a short period of time before being released to the seller." /></td>
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
        <img src="https://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="Number of people who clicked on your links who have never been on ROBLOX before." />
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
        <img src="https://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="Number of new visitors from your links who signed up." />
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
        <img src="https://images.rbxcdn.com/d3246f1ece35d773099f876a31a38e5a.png" class="tooltip" title="ROBUX earned through your promotional links." />
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
                <a class="BadAdButton" href="https://www.roblox.com/Ads/ReportAd.aspx" title="click to report an offensive ad">Report</a>
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
        
        <? $pagebuilder->build_footer(); ?>