<div class="viewn">
<div class="viewn-top">
�����: {usertitle}
</div>
<div class="viewn-content" style="padding:0 5px;">
<center>
    <div class="uk-grid" style="height: 300px; width: 97%">
	<div class="uk-width-2-10" style="text-align: center">
		<div class="avatar"><img src="{foto}" style="  border-radius: 44%;height: 74px;width: 143px;margin-left: 10px;border: 3px solid rgba(121, 82, 49, 0.32);" alt="" /></div>
		[not-group=5]<div><a href="javascript:ShowOrHide('options')">
        <button type="button" class="uk-button uk-button-mini uk-button-primary" style="width: 104px; margin-top: 3px;">��������</button></a></div> [/not-group]
		<div>
			<button type="button" style="width: 104px; margin-top: 4px;" class="uk-button uk-button-mini">{email}</button></div>          
		[not-group=5]
		<div>      
			<button type="button" style="width: 104px; margin-top: 4px;" class="uk-button uk-button-mini">{pm}</button></div> [/not-group]</div>
    
	<div class="uk-width-8-10">
		<table class="uk-width-1-1 uk-table uk-table-striped">
			<tbody>
				<tr>
					<td width="250px">������ ���</td>
					<td>{fullname}</td>
				</tr>
				<tr>
					<td>������ �� �����</td>
					<td>{status}</td>
				</tr>
				<tr>
					<td>���� �����������</td>
					<td>{registration}</td>
				</tr>
				<tr>
					<td>��������� ��������� �����</td>
					<td>{lastdate}</td>
				</tr>
				<tr>
					<td>����� ����������</td>
					<td>{land}</td>
				</tr>
				<tr>
					<td>������� � ����</td>
					<td>{info}</td>
				</tr>
			</tbody>
        </table></div></div></center>
    
    [not-logged]<div id="options" style="display:none;"><div class="pheading"><h2><i class="uk-icon-cog"></i> �������������� �������</h2></div>
    
    <div class="baseform">
    
		<table class="uk-width-1-1 uk-table uk-table-striped">
			<tbody>
				<tr>
                    <td width="250px">���� ���:</td>
					<td><input style=" width: 450px;" type="text" name="fullname" value="{fullname}" class="f_input" /></td>
				</tr>
				<tr>
                    <td>��� email:</td>
					<td><input style=" width: 450px;" type="text" name="email" value="{editmail}" class="f_input" /><br />
					<div class="checkbox">{hidemail}</div></td>
				</tr>
				<tr>
                    <td>����� ����������:</td>
					<td><input style=" width: 450px;" type="text" name="land" value="{land}" class="f_input" /></td>
				</tr>
				<tr>
					<td>������ ������:</td>
					<td><input style=" width: 450px;" type="password" name="altpass" class="f_input" /></td>
				</tr>
				<tr>
					<td>����� ������:</td>
					<td><input style=" width: 450px;" type="password" name="password1" class="f_input" /></td>
				</tr>
				<tr>
					<td>��������� ������:</td>
					<td><input style=" width: 450px;" type="password" name="password2" class="f_input" /></td>
				</tr>
				<tr>
					<td>������:</td>
					<td><input style=" width: 450px;" type="file" name="image" class="f_input" /><br />
					<div class="checkbox" class="embutton"><input type="checkbox" name="del_foto" id="del_foto" value="yes" /><label for="del_foto">������� ����������</label></div></td>
				</tr>
				<tr>
					<td>� ����:</td>
					<td><textarea style=" width: 450px;" name="info" style="width:98%;" rows="5" class="f_textarea">{editinfo}</textarea></td>
				</tr>
				<tr>
					<td>�������:</td>
					<td><textarea style=" width: 450px;" name="signature" style="width:98%;" rows="5" class="f_textarea">{editsignature}</textarea></td>
				</tr>
				<tr>
					<td>��� ������ ������:</td>
					<td>{ignore-list}</td>
				</tr>
				<tr>
				<td></td>
				<td>{twofactor-auth}</td>
			</tr>
			</tbody>
		</table>
		    <div class="fieldsubmit">
			<input class="fbutton uk-width-1-1 uk-button uk-button-success" type="submit" name="submit" value="���������">
			<input name="submit" type="hidden" id="submit" value="submit" /></div></div></div>[/not-logged]
    
</div>
</div>