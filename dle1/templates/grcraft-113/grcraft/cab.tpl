		<div class="uk-modal dialog_window uk-open" aria-hidden="false" style="display: block; overflow-y: scroll;">
			<div class="uk-modal-dialog" style="top: 30.5px;">
				<a class="uk-modal-close uk-close" onclick="clearInterval(redirecttimer);" style="font-size: 15pt;" id="changename_close"></a>
				
							<h2>������ ��������� ������</h2>
							<div class="uk-text-small">
								� ��������� �� ����� ���������� ������� StreamCraft.net ��� ����������� ����� �����.<br>
								����� ��������� ������ �� ������ �������������� �� �������� ���������� ���������� UnitPay.<br>
								����� ����� ������ ��������� ���� ������ ����� �������.
							</div><hr>
							<div>������: <b><span class="uk-text-primary">������������ ����������� ������ (1 �����)</span></b></div>
							<div>������ ��������� ��������� ������: <b>99 ���.</b></div>
							<div>��� ������ ����������: <b class="uk-text-success">99 ���.</b></div>
							<div>�� ����� ������� ����: <b>0 ���.</b> </div>
							<br>
							<a href="https://unitpay.ru/pay/37321-6aa03?sum=99&amp;account=L0Lka&amp;desc=������+������+��+StreamCraft.net"><button class="uk-width-1-1" type="button">������� �� �������� ������ ��������� ������ [<span id="redirect_sec">6</span> ���.]</button></a>
							<script>RunTimeOutRedirect('https://unitpay.ru/pay/37321-6aa03?sum=99&account=L0Lka&desc=������+������+��+StreamCraft.net', 20)</script>
						
			</div>
		</div>

if(getStoreValue('flyPriceDisc')) {
		$flyPriceMinus = round((getStoreValue('flyPrice')*getStoreValue('flyPriceDisc'))/100, 2);
		$flyPrice = getStoreValue('flyPrice') - $flyPriceMinus;
		$realPricefly = "<span style='position: absolute;margin-top: -15px;font-size: 10pt;' class='line uk-text-danger'><s>".getStoreValue('flyPrice')." ���</s></span> ";
		$flySk = "<div style='font-size: 16pt; $dop' class='uk-text-danger'>-".getStoreValue('flyPriceDisc')."%</div>";
	}


			                          $error
			<div id='#shop' class='uk-modal uk-open' aria-hidden='false' style='display: none; overflow-y: scroll;'>
			    <div class='uk-modal-dialog'>
                    <a class='uk-modal-close uk-close'></a>
			        <div class='modal_content'>
							        <b>�������� ���������� ������</b>
							        <div class='modal_content'>
								        <table class='uk-width-1-1'>
								        	<tbody><tr>
								        		<td width='120px'><img src='{$select['icon']}' width='110px'></td>
								        		<td valign='top'>
								        			<table class='uk-width-1-1 uk-table uk-table-striped'>
								        				<tbody><tr>
								        					<td>�������� ������</td>
								        					<td align='right'><b>{$select['itemname']}</b></td>
								        				</tr>
								        				<tr>
								        					<td>���������</td>
								        					<td align='right'>$priceText$price $word</td>
								        				</tr>
								        				<tr>
								        					<td>���������� �� ��������� ����</td>
								        					<td align='right'>$stack $wordCount ��.</td>
								        				</tr>
								        			</tbody></table>
								        		</td>
								        	</tr>
								        </tbody></table>
								        
								        <table class='uk-width-1-1 uk-table uk-table-striped' style='width: 459px;'>
										    
								        	<tbody><tr>
								        		<td style='padding: 5px;' width='300px'><div style='margin-top: 4px;'><b>������� ������ ������ ��������?</b></div></td>
								        		<td align='right' style='padding: 5px;'>
								        			<div style='font-size: 14pt;'><i class='uk-icon-minus' id='lessItem' data-stack='10' data-cost='3' style='cursor: pointer;'></i> 
								        			<span id='countitems'>$stack</span> ��. 
								        			<i class='uk-icon-plus' style='cursor: pointer;' data-stack='10' data-cost='3' id='moreItem'></i></div>
								        		</td>
								        	</tr>
								        	<tr>
								        		<td style='padding: 5px;' width='300px'><div style='margin-top: 4px;'><b>����� ���������</b></div></td>
								        		<td align='right' style='padding: 5px;'>
								        			<div style='font-size: 14pt;'><b><span id='megatotalprice'>$price</span> ���.</b></div>
								        		</td>
								        	</tr>
								        </tbody></table>
								        <div id='buyOutput'></div>
					        					<input type='submit' class='uk-button uk-button-success uk-width-1-1' style='border-bottom-right-radius: 0px; margin-right: -3px; border-top-right-radius: 0px; color: white' name='buy' value='������'>
										
							        </div>
							    </div>