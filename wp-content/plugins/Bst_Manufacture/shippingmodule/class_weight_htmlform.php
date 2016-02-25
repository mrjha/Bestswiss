<?php

class wightshipphtmlforms {

	 public function generateRangeHtml($key, array $data = array())
    { 
        global  $woocommerce;
        $currencysymbol = get_woocommerce_currency_symbol();
        //$weighdelivery ='';
        switch($data['type']){

            case "title":

                if(($key != 0) && $data['type']=='title'){
                 $weighdelivery.="</div>";
                }

                $weighdelivery.='<h3 id="woowbs_main_0" class="wc-settings-sub-title ">'.$data["title"].'</h3><p>'.$data["description"].'</p><hr/>';

                if(($key == 0) && $data['type']=='title'){
                  $weighdelivery.="<div class='tablecontainer'>";
                }elseif(($key != 0) && $data['type']=='title'){
                 $weighdelivery.="<div class='tablecontainer'>";
                }

            break;
            case "checkbox":
                $checked = ($data['default']=='no')?'':'checked="checked"';
                //$inputval.="<input type='checkbox' ".$checked."  value='yes' style='' id='' name='' class=''>";
                $weighdelivery.="<div class='customrow'><label class='th' for='woowbs_main_enabled'>".$data['title']."</label>
                                      <label class='td' for='woowbs_main_enabled'>
                                            <input type='checkbox' ".$checked." value='1' style='' id='woowbs_main_enabled' name='woowbs_main_enabled' class=''> ".$data['label']."</label>
                                </div>";
            break;
            case "select":

                foreach ($data['options'] as $optkey => $optvalue) {
                           $checked = ($data['default']==$optkey)?'selected':'';
                           $inputval.="<option ".$checked." val='".$optkey."'>".$optvalue."</option>";
                       }

               $weighdelivery.="<div class='customrow'><label class='th' for='woowbs_main_enabled'>".$data['title']."</label>
                                     <label class='td' for='woowbs_main_enabled'>
                                            <div class='select2-container select availability wc-enhanced-select enhanced' id='s2id_woowbs_main_tax_status' style=''>
                                                <select  id='woowbs_main_tax_status' name='woowbs_main_tax_status' class='select availability wc-enhanced-select enhanced' tabindex='-1' title='Tax Status'>
                                                        ".$inputval."
                                                </select>
                                            </div>
                                        </label></div>";
            break;
            case "wbs_range":

                if($data['wbs_range_type'] == 'simple'){
                    $weighdelivery.="<div class='customrow'><label class='th' for='woowbs_main_enabled'>".$data['title']."</label>
                                      <label class='td' for='woowbs_main_enabled'>                                                    
                                        <label class='wbs-minifield-container'>
                                        <span class='wbs-minifield-label'>minimum</span>
                                        <input type='text' placeholder='min' value='7' class='wbs-minifield wc_input_decimal input-text' name='woowbs_main_price_clamp[min][value]' id='woowbs_main_price_clamp_min'>
                                        </label>
                                        <label class='wbs-minifield-container'>
                                        <span class='wbs-minifield-label'>maximum</span>
                                        <input type='text' placeholder='max' value='100' class='wbs-minifield wc_input_decimal input-text' name='woowbs_main_price_clamp[max][value]' id='woowbs_main_price_clamp_max'>
                                        </label>
                                                    <p class='description'>If shipping price exceeds specified range it will be changed to either lower or upper bound appropriately.</p>
                                        </label>
                                        </div>";

                }else{
                        $weighdelivery.="<div class='customrow'><label class='th' for='woowbs_main_enabled'>".$data['title']."</label>
                                    <label class='td' for='woowbs_main_enabled'>
                                        <h2 data-duplicate-add='orderbyweightdel' data-duplicate-max='3'></h2>
                                        
                                        <fieldset class='wightfield' data-duplicate='orderbyweightdel' data-duplicate-min='1'>
                                        <a class='wightanch' href='javascript:void(0)' data-duplicate-add='orderbyweightdel'>+</a>
                                        <a class='wightanch' href='javascript:void(0)' data-duplicate-remove='orderbyweightdel'>-</a>
                                                <legend class='screen-reader-text'>
                                                <span>".$data['title']."</span>
                                                </legend>

                                                <label class='wbs-minifield-container'>
                                                <span class='wbs-minifield-label'>above</span>
                                                <input type='text' class='wbs-minifield wc_input_decimal input-text' name='woowbs_main_weight[min][value]' id='woowbs_main_weight_min'>
                                                <label> <input type='checkbox' checked='' value='1' name='woowbs_main_weight[min][inclusive]'> or equal
                                                </label>
                                                </label>
                                                
                                                <label class='wbs-minifield-container'>
                                                    <span class='wbs-minifield-label'>below</span>
                                                    <input type='text' class='wbs-minifield wc_input_decimal input-text' name='woowbs_main_weight[max][value]' id='woowbs_main_weight_max'>
                                                    <label> <input type='checkbox' value='1' name='woowbs_main_weight[max][inclusive]'> or equal</label>
                                                </label>

                                                <label class='wbs-minifield-container'>
                                                    <span class='wbs-minifield-label'>Cost</span>
                                                    <input type='text' class='wbs-minifield wc_input_decimal input-text' name='woowbs_main_weight[max][value]' id='woowbs_main_weight_max'>
                                                </label>

                                        </fieldset>


                                           

                                    </lable>
                                </div>";
                }
                
            break;
            case "wbs_custom":
              
            
                $weighdelivery.="<div class='customrow'><label class='th' for='woowbs_main_enabled'>".$data['title']."</label>
                                    <label class='td' for='woowbs_main_enabled'>
                                        <h2 data-duplicate-add='orderbypricedel' data-duplicate-max='3'></h2>
                                        <fieldset class='wightfield' data-duplicate='orderbypricedel' data-duplicate-min='1'>
                                        <a class='wightanch' href='javascript:void(0)' data-duplicate-add='orderbypricedel'>+</a>
                                        <a class='wightanch' href='javascript:void(0)' data-duplicate-remove='orderbypricedel'>-</a>
                                        <legend class='screen-reader-text'>
                                        <span>".$data['title']."</span>
                                        </legend>

                                        <label class='wbs-minifield-container'>
                                        <span class='wbs-minifield-label'>above</span>
                                        <input type='text' class='wbs-minifield wc_input_decimal input-text' name='woowbs_main_subtotal[min][value]' id='woowbs_main_subtotal_min'>
                                        <label> <input type='checkbox' checked='' value='1' name='woowbs_main_subtotal[min][inclusive]'> or equal
                                        </label>

                                        </label>
                                        <label class='wbs-minifield-container'>
                                        <span class='wbs-minifield-label'>below</span>
                                        <input type='text' class='wbs-minifield wc_input_decimal input-text' name='woowbs_main_subtotal[max][value]' id='woowbs_main_subtotal_max'>
                                        <label> <input type='checkbox' value='1' name='woowbs_main_subtotal[max][inclusive]'> or equal
                                        </label>

                                        </label>

                                         <label class='wbs-minifield-container'>
                                                    <span class='wbs-minifield-label'>Cost</span>
                                                    <input type='text' class='wbs-minifield wc_input_decimal input-text' name='woowbs_main_weight[max][value]' id='woowbs_main_weight_max'>
                                                </label>
                                        </fieldset>
                                    </label>
                                </div>";

            break;
            case "decimal":
                $weighdelivery.="<div class='customrow'><label class='th' for='woowbs_main_enabled'>".$data['title']."</label>
                                      <label class='td' for='woowbs_main_enabled'>
                                    <fieldset>
                                        <legend class='screen-reader-text'><span>".$data['title']."</span></legend>
                                        <input type='text' placeholder='' value='' style='' id='woowbs_main_fee' name='woowbs_main_fee' class='wc_input_decimal input-text regular-input '>
                                        <p class='description'>".$data['description']."</p>
                                    </fieldset>
                                    </label>
                            </div>";

            break;
            case "weight_rate":
                 $weighdelivery.="<div class='customrow'><label class='th' for='woowbs_main_enabled'>".$data['title']."</label>
                                       <label class='td' for='woowbs_main_enabled'>
                                    <fieldset>
                                                    <legend class='screen-reader-text'>
                                            <span>".$data['title']."</span>
                                        </legend>
                                                    
                            <label class='wbs-minifield-container'>
                                <span class='wbs-minifield-label'>charge</span>
                                <div class='wbs-input-group'>
                                    <span class='wbs-input-group-addon'>£</span>
                                    <input type='text' placeholder='e.g. £2.50' name='woowbs_main_weight_rate[cost]' class='wbs-minifield wc_input_decimal input-text' id='woowbs_main_weight_rate_cost'>
                                    
                                </div>
                            </label>
                        
                            <label class='wbs-minifield-container'>
                                <span class='wbs-minifield-label'>per each</span>
                                <div class='wbs-input-group'>
                                    
                                    <input type='text' placeholder='e.g. 0.5 kg' name='woowbs_main_weight_rate[step]' class='wbs-minifield wc_input_decimal input-text'>
                                    <span class='wbs-input-group-addon'>kg</span>
                                </div>
                            </label>
                        
                            <label class='wbs-minifield-container'>
                                <span class='wbs-minifield-label'>over</span>
                                <div class='wbs-input-group'>
                                    
                                    <input type='text' placeholder='e.g. 3 kg' name='woowbs_main_weight_rate[skip]' class='wbs-minifield wc_input_decimal input-text'>
                                    <span class='wbs-input-group-addon'>kg</span>
                                </div>
                            </label>
                                                    <p class='description'>Leave <code class='wbs-code'>charge</code> field empty if your shipping price is flat.<br>Use <code class='wbs-code'>over</code> field to skip weight part covered with Base Cost or leave it empty to charge for entire order weight.</p>
                                    </fieldset>
                            </label>
                    </div>";
            break;
            case "text":
                    $weighdelivery.="<div class='customrow'><label class='th' for='woowbs_main_enabled'>".$data['title']."</label>
                                       <label class='td' for='woowbs_main_enabled'><input type='text' placeholder='' value='".$fieldarr['fieldarray']['default']."' style='' id='' name='".$fieldarr['fieldarray']['name']."' class='input-text regular-input ".$fieldarr['class']."'><p>".$data['description']."</p></label>
                                       </div>";
            break;
            case "price":
                $weighdelivery.= "<div class='customrow'><label class='th' for='woowbs_main_enabled'>".$data['title']."</label>
                                       <label class='td' for='woowbs_main_enabled'>".$currencysymbol."<input type='text' name='' value='".$fieldarr['fieldarray']['default']."' placeholder='".$title."'/><p>".$data['description']."</p></label></div>";
            break;

        }
        

        return $weighdelivery;
        
    }
}


?>