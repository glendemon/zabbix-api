<?php
/**
 * @author Victor Demin <mail@vdemin.com>
 * @copyright (c) 2015, Victor Demin <mail@vdemin.com>
 */

namespace GlenDemon\ZabbixApi\Entity;

/**
 * @property string $alias Alias.
 * @property string $asset_tag Asset tag.
 * @property string $chassis Chassis.
 * @property string $contact Contact person.
 * @property string $contract_number Contract number.
 * @property string $date_hw_decomm HW decommissioning date.
 * @property string $date_hw_expiry HW maintenance expiry date.
 * @property string $date_hw_install HW installation date.
 * @property string $date_hw_purchase HW purchase date.
 * @property string $deployment_status Deployment status.
 * @property string $hardware Hardware.
 * @property string $hardware_full Detailed hardware.
 * @property string $host_netmask Host subnet mask.
 * @property string $host_networks Host networks.
 * @property string $host_router Host router.
 * @property string $hw_arch HW architecture.
 * @property string $installer_name Installer name.
 * @property integer $inventory_mode Host inventory population mode.

  Possible values are:
  -1 - disabled;
  0 - (default) manual;
  1 - automatic.
 * @property string $location Location.
 * @property string $location_lat Location latitude.
 * @property string $location_lon Location longitude.
 * @property string $macaddress_a MAC address A.
 * @property string $macaddress_b MAC address B.
 * @property string $model Model.
 * @property string $name Name.
 * @property string $notes Notes.
 * @property string $oob_ip OOB IP address.
 * @property string $oob_netmask OOB host subnet mask.
 * @property string $oob_router OOB router.
 * @property string $os OS name.
 * @property string $os_full Detailed OS name.
 * @property string $os_short Short OS name.
 * @property string $poc_1_cell Primary POC mobile number.
 * @property string $poc_1_email Primary email.
 * @property string $poc_1_name Primary POC name.
 * @property string $poc_1_notes Primary POC notes.
 * @property string $poc_1_phone_a Primary POC phone A.
 * @property string $poc_1_phone_b Primary POC phone B.
 * @property string $poc_1_screen Primary POC screen name.
 * @property string $poc_2_cell Secondary POC mobile number.
 * @property string $poc_2_email Secondary POC email.
 * @property string $poc_2_name Secondary POC name.
 * @property string $poc_2_notes Secondary POC notes.
 * @property string $poc_2_phone_a Secondary POC phone A.
 * @property string $poc_2_phone_b Secondary POC phone B.
 * @property string $poc_2_screen Secondary POC screen name.
 * @property string $serialno_a Serial number A.
 * @property string $serialno_b Serial number B.
 * @property string $site_address_a Site address A.
 * @property string $site_address_b Site address B.
 * @property string $site_address_c Site address C.
 * @property string $site_city Site city.
 * @property string $site_country Site country.
 * @property string $site_notes Site notes.
 * @property string $site_rack Site rack location.
 * @property string $site_state Site state.
 * @property string $site_zip Site ZIP/postal code.
 * @property string $software Software.
 * @property string $software_app_a Software application A.
 * @property string $software_app_b Software application B.
 * @property string $software_app_c Software application C.
 * @property string $software_app_d Software application D.
 * @property string $software_app_e Software application E.
 * @property string $software_full Software details.
 * @property string $tag Tag.
 * @property string $type Type.
 * @property string $type_full Type details.
 * @property string $url_a URL A.
 * @property string $url_b URL B.
 * @property string $url_c URL C.
 * @property string $vendor Vendor.
 */
class HostInventory extends AbstractEntity
{
    /**
     * {@inheritdoc}
     */
    public function getIdKey()
    {
        throw new Exception('Not implemented');
    }
}