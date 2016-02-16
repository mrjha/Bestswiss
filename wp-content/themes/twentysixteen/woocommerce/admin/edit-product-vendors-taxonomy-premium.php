<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
?>

<?php
$trmid = $vendor->id;
  
 YITH_Vendors()->admin->add_upload_field( 'table', $vendor->header_image ) ?>

<tr class="form-field yith-choosen">
    <th scope="row" valign="top">
        <label for="key_user"><?php _e( 'Vendor Shop Owner', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <input type="hidden"
               class="wc-customer-search"
               id="key_user"
               name="yith_vendor_data[owner]"
               data-placeholder="<?php esc_attr_e( 'Search for a shop owner&hellip;', 'yith_wc_product_vendors' ); ?>"
               data-selected="<?php echo esc_attr( $owner ); ?>"
               value="<?php echo esc_attr( $owner_id ); ?>"
               data-allow_clear="true" />
        <br />
        <span class="description"><?php _e( 'User that can manage products in this shop and view sale reports.', 'yith_wc_product_vendors' ); ?></span>
    </td>
</tr>

<tr class="form-field yith-choosen">
    <th scope="row" valign="top">
        <label for="yith_vendor_admins"><?php _e( 'Vendor Shop Admins', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <input type="hidden"
               class="wc-customer-search"
               id="yith_vendor_admins"
               name="yith_vendor_data[admins]"
               data-placeholder="<?php esc_attr_e( 'Search for a shop admins&hellip;', 'yith_wc_product_vendors' ); ?>"
               data-selected='<?php echo $vendor_admins['selected'] ?>'
               value="<?php echo $vendor_admins['value'] ?>"
               data-allow_clear="true"
               data-multiple="true" />
        <br />
        <span class="description"><?php _e( 'User that can manage products in this vendor shop and view sale reports.', 'yith_wc_product_vendors' ); ?></span>
    </td>
</tr>

<tr class="form-field yith-choosen">
    <th scope="row" valign="top">
        <h4><?php _e( 'Contact information :', 'yith_wc_product_vendors' ) ?></h4>
    </th>
</tr>

<tr class="form-field yith-choosen">
    <th scope="row" valign="top">
        <label for="yith_vendor_location"><?php _e( 'Location', 'yith_wc_product_vendors' ); ?></label>
    </th>

    <td>
        <input type="text" class="regular-text" name="yith_vendor_data[location]" id="yith_vendor_location" placeholder="MyStore S.A. Avenue MyStore 55, 1800 Vevey, Switzerland" value="<?php echo $vendor->location ?>" /><br />
    </td>
</tr>

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_store_email"><?php _e( 'Store email', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <input type="text" class="regular-text" name="yith_vendor_data[store_email]" id="yith_vendor_store_email" value="<?php echo $vendor->store_email ?>" /><br />
    </td>
</tr>

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_telephone"><?php _e( 'Telephone', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <input type="text" class="regular-text" name="yith_vendor_data[telephone]" id="yith_vendor_telephone" value="<?php echo $vendor->telephone ?>" /><br />
    </td>
</tr>

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_vat"><?php _e( 'VAT/SSN', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <input type="text" class="regular-text" name="yith_vendor_data[vat]" id="yith_vendor_vat" value="<?php echo $vendor->vat ?>" /><br />
        <span class="description"><?php _e( 'Vendor\'s VAT/SSN.', 'yith_wc_product_vendors' ); ?></span>
    </td>
</tr>

<tr class="form-field term-slug-wrap">
    <th scope="row"><label for="Untertitel">Legal Name</label></th>
    <?php $legal_name= get_woocommerce_term_meta($trmid,'legal_name',true); ?>
    <td> <input type="text" class="regular-text" name="yith_vendor_data[legal_name]" id="yith_vendor_legal_name" value="<?php echo $legal_name; ?>" /></td>
</tr>  


<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_legal_notes"><?php _e( 'Company legal notes', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <input type="text" class="regular-text" name="yith_vendor_data[legal_notes]" id="yith_vendor_legal_notes" value="<?php echo $vendor->legal_notes ?>" /><br />
        <span class="description"><?php _e( 'Insert company legal notes (e.g. Managing Directors, Court of registration, Commercial registration number, ecc.)', 'yith_wc_product_vendors' ); ?></span>
    </td>
</tr>

<tr class="form-field">
    <th>
        <?php $socials = $vendor->socials ?>
        <h4><?php _e( 'Social profile:', 'yith_wc_product_vendors' ) ?></h4>
    </th>
</tr>

<?php foreach( $social_fields as $social => $social_args ) : ?>

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_social_<?php echo $social ?>"><?php echo $social_args['label'] ?></label>
    </th>

    <td>
        <input type="text" class="regular-text" name="yith_vendor_data[socials][<?php echo $social ?>]" id="yith_vendor_social_<?php echo $social ?>" value="<?php echo isset( $socials[ $social ] ) ? $socials[ $social ] : '' ?>" placeholder="http://" /><br />
    </td>
</tr>

<?php endforeach; ?>

<tr class="form-field">
    <th>
        <h4><?php _e( 'Payments:', 'yith_wc_product_vendors' ) ?></h4>
    </th>
</tr>

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_paypal_email"><?php _e( 'PayPal email address', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <input type="text" class="regular-text" name="yith_vendor_data[paypal_email]" id="yith_vendor_paypal_email" value="<?php echo $vendor->paypal_email ?>" /><br />
        <br />
        <span class="description"><?php _e( 'Vendor\'s PayPal email address where profits will be delivered.', 'yith_wc_product_vendors' ); ?></span>
    </td>
</tr>

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_bank_account"><?php _e( 'Bank Account (IBAN/BIC)', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <input type="text" class="regular-text" name="yith_vendor_data[bank_account]" id="yith_vendor_bank_account" value="<?php echo $vendor->bank_account ?>" /><br />
        <br />
        <span class="description"><?php _e( 'Vendor\'s IBAN/BIC bank account', 'yith_wc_product_vendors' ); ?></span>
    </td>
</tr>

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_enable_selling"><?php _e( 'Enable sales', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <?php $enable_selling = 'yes' == $vendor->enable_selling ? true : false; ?>
        <input type="checkbox" name="yith_vendor_data[enable_selling]" id="yith_vendor_enable_selling" value="yes" <?php checked( $enable_selling )?> /><br />
        <br />
        <span class="description"><?php _e( 'Enable or disable product sales.', 'yith_wc_product_vendors' ); ?></span>
    </td>
</tr>

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_skip_review"><?php _e( 'Skip admin review', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <?php $skip_review = 'yes' == $vendor->skip_review ? true : false; ?>
        <input type="checkbox" name="yith_vendor_data[skip_review]" id="yith_vendor_skip_review" value="yes" <?php checked( $skip_review )?> /><br />
        <br />
        <span class="description"><?php _e( 'Allow vendors to add products without admin review', 'yith_wc_product_vendors' ); ?></span>
    </td>
</tr>

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_enable_featured_products"><?php _e( 'Enable Featured products management', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <input type="checkbox" name="yith_vendor_data[featured_products]" id="yith_vendor_skip_review" value="yes" <?php checked( 'yes', $vendor->featured_products )?> /><br />
        <br />
        <span class="description"><?php _e( 'Allow vendors to manage featured products', 'yith_wc_product_vendors' ); ?></span>
    </td>
</tr>

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_enable_selling"><?php _e( 'Commission:', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <input type="number" class="regular-text" name="yith_vendor_data[commission]" id="yith_vendor_commission" value="<?php echo esc_attr( $vendor->get_commission() * 100 ); ?>" min="0" max="100" step="0.1" /> %<br/>

        <br />
        <span class="description"><?php _e( 'Percentage of the total sale price that this vendor receives.', 'yith_wc_product_vendors' ); ?></span>
    </td>
</tr>



<!-- custom field start -->
<?php
  
  $katgoval=get_woocommerce_term_meta($trmid,'Kategoriento');

  $cuscatid = $katgoval;
  $cuscatid = ($cuscatid!='')?$cuscatid:null;


       $taxnm = 'bstvencategory';
       $taxarg = array('hide_empty'=>0,'parent' =>0,'orderby'=>'name');
       $queryarr = get_terms($taxnm,$taxarg);
       
       if(count($queryarr)){
         $selectopt="<select name='yith_vendor_data[Kategorien][]' id='undo_redo' class='form-control' size='13' multiple='multiple'>";

        foreach ($queryarr as $pkey => $pvalues) {
            
            
            $term = get_term( $pvalues->term_id, $taxnm); 
            

            
            $selectopt.="<option style='color:red' dtid='".$term->term_id."' class='catparent catparent".$chterm->term_id."' value='".$term->term_id."'>".$term->name."</option>";
            

            $taxargchild = array('hide_empty'=>0,'parent' =>$term->term_id,'orderby'=>'name','exclude'=>$cuscatid);

            $taxonomy =get_terms($taxnm,$taxargchild);
            
            if(count($taxonomy)){
                foreach ($taxonomy as $childkey => $childvalues) { 
                  $selectopt.="<option dtid='".$childvalues->term_id."' class='catchild catchild".$childvalues->term_id."' value='".$childvalues->term_id."'>".$childvalues->name."</option>";
                }
            }

        }
          $selectopt.="</select>";
        }

$selectoptnew='';
      // $taxnm = 'bstregions';

       if($cuscatid){
       $taxtoargselect = array('hide_empty'=>0,'orderby'=>'name','include'=>$cuscatid);
       $queryarrsel = get_terms($taxnm,$taxtoargselect);
         $selectoptnew = '';
       if(count($queryarrsel)){
         foreach ($queryarrsel as $fromkey => $fromvalue) {
             $selectoptnew.="<option value='".$fromvalue->term_id."' class='catchild catchild".$fromvalue->term_id."' dtid='".$fromvalue->term_id."'>".$fromvalue->name."</option>";
         }
       }
     }
       

   ?>

<!-- Category section start -->

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_paypal_email"><?php _e( 'Category', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <div class="form-field yith-choosen">  
<div id="jquery-script-menu">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<div class="row">
                <div class="col-xs-5">
                    <?php echo $selectopt; ?>
                </div>
                
                <div class="col-xs-2">
                    <button type="button" id="undo_redo_undo" class="btn btn-primary btn-block">undo</button>
                    <button type="button" id="undo_redo_rightAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                    <button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                    <button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                    <button type="button" id="undo_redo_leftAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                    <button type="button" id="undo_redo_redo" class="btn btn-warning btn-block">redo</button>
                </div>
                
                <div class="col-xs-5">
                    <select name="yith_vendor_data1[Kategoriento][]" id="undo_redo_to" class="form-control" size="13" multiple="multiple">
                      <?php echo $selectoptnew; ?>
                    </select>
                </div>
            </div>

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="<?php echo plugins_url(); ?>/Bst_Manufacture/js/multiselect.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#undo_redo').multiselect();


       jQuery('#submit').click(function(){
           jQuery('#Beschreibung-html').click();
       });

    });
    
    </script>

</div>
    </td>
</tr>

 <!-- category section end --> 



<!-- Region section start -->

<?php
  
  $regkatgoval=get_woocommerce_term_meta($trmid,'regionto');

  $regcuscatid = $regkatgoval;
  $rcuscatid = ($regcuscatid!='')?$regcuscatid:null;


       $taxnm = 'bstregions';
       $taxarg = array('hide_empty'=>0,'parent' =>0,'orderby'=>'name');
       $queryarr = get_terms($taxnm,$taxarg);
       
       if(count($queryarr)){
         $selectopt="<select name='yith_vendor_data[regions][]' id='undo_redo1' class='form-control' size='13' multiple='multiple'>";

        foreach ($queryarr as $pkey => $pvalues) {
            
            
            $term = get_term( $pvalues->term_id, $taxnm); 
            

            
            $selectopt.="<option style='color:red' dtid='".$term->term_id."' class='catparent catparent".$chterm->term_id."' value='".$term->term_id."'>".$term->name."</option>";
            

            $taxargchild = array('hide_empty'=>0,'parent' =>$term->term_id,'orderby'=>'name','exclude'=>$rcuscatid);

            $taxonomy =get_terms($taxnm,$taxargchild);
            
            if(count($taxonomy)){
                foreach ($taxonomy as $childkey => $childvalues) { 
                  $selectopt.="<option dtid='".$childvalues->term_id."' class='catchild catchild".$childvalues->term_id."' value='".$childvalues->term_id."'>".$childvalues->name."</option>";
                }
            }

        }
          $selectopt.="</select>";
        }

$selectoptnew='';
      // $taxnm = 'bstregions';

       if($rcuscatid){
        
       $taxtoargselect = array('hide_empty'=>0,'orderby'=>'name','include'=>$rcuscatid);
       $queryarrsel = get_terms($taxnm,$taxtoargselect);
         $selectoptnew = '';
       if(count($queryarrsel)){
         foreach ($queryarrsel as $fromkey => $fromvalue) {
             $selectoptnew.="<option value='".$fromvalue->term_id."' class='catchild catchild".$fromvalue->term_id."' dtid='".$fromvalue->term_id."'>".$fromvalue->name."</option>";
         }
       }
     }
       

   ?>

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_paypal_email"><?php _e( 'Region', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <div class="form-field yith-choosen">  
<div id="jquery-script-menu">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<div class="row">
                <div class="col-xs-5">
                    <?php echo $selectopt; ?>
                </div>
                
                <div class="col-xs-2">
                    <button type="button" id="undo_redo1_undo" class="btn btn-primary btn-block">undo</button>
                    <button type="button" id="undo_redo1_rightAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                    <button type="button" id="undo_redo1_rightSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                    <button type="button" id="undo_redo1_leftSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                    <button type="button" id="undo_redo1_leftAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                    <button type="button" id="undo_redo1_redo" class="btn btn-warning btn-block">redo</button>
                </div>
                
                <div class="col-xs-5">
                    <select name="yith_vendor_data[regionto][]" id="undo_redo1_to" class="form-control" size="13" multiple="multiple">
                      <?php echo $selectoptnew; ?>
                    </select>
                </div>
            </div>


<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#undo_redo1').multiselect();


       

    });
    
    </script>

</div>
    </td>
</tr>

 <!-- Region section end -->






<tr class="form-field term-slug-wrap">
    <th scope="row"><label for="Untertitel">Subtitle(H3)</label></th>
    <?php $Untertitel=get_woocommerce_term_meta($trmid,'Untertitel',true); ?>
    <td> <input type="text" class="regular-text" name="yith_vendor_data[Untertitel]" id="yith_vendor_Untertitel" value="<?php echo $Untertitel; ?>" /></td>
</tr> 

<tr class="form-field term-slug-wrap">
<th scope="row"><label for="Untertitel">Font Big Title</label></th>
    <td>  
       <select name="yith_vendor_data[Schriftgrosse_titel]" id="yith_vendor_owner" class="ajax_chosen_select_customer" style="width:95%;" data-placeholder="Search for users">
            <option>Normal</option>
        </select>
    </td>
</tr>


<tr class="form-field term-slug-wrap">
    <th scope="row"><label for="Untertitel">Beschreibungeditor</label></th>
    <td> 
       <?php
             $Beschreibungeditor = get_woocommerce_term_meta($trmid,'Beschreibungeditor',true); 
            $content = urldecode($Beschreibungeditor);
            $editor_id ='Beschreibungeditor';
            $settings = array('textarea_name' => 'yith_vendor_data1[Beschreibungeditor]','textarea_rows'=>5);

            wp_editor( $content, $editor_id, $settings); 
      ?> 
    </td>
</tr>


<!-- End custom field -->

<tr class="form-field term-slug-wrap">
    <th scope="row"><label for="Untertitel">Logo</label></th>
    <td> 
     <?php  add_upload_field1( 'span', $vendor->header_logo,'header_logo','Header Logo','false'); ?>
    </td>
</tr>

<!-- <tr class="form-field term-slug-wrap">
    <th scope="row"><label for="Untertitel">Gallery</label></th>
    <td> 
     <?php
    //   add_upload_field1( 'span', $vendor->header_gallery,'header_gallery','Gallery','true'); ?>
    </td>
</tr> -->

<tr class="form-field">
    <th scope="row" valign="top">
        <label for="yith_vendor_registration_date"><?php _e( 'Registration date:', 'yith_wc_product_vendors' ); ?></label>
    </th>
    <td>
        <?php echo $vendor->get_registration_date( 'display' ) ?>
    </td>
</tr>
