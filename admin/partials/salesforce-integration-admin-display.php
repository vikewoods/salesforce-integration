<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://riseproject.com
 * @since      1.0.0
 *
 * @package    Salesforce_Integration
 * @subpackage Salesforce_Integration/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" name="options_update" action="options.php">

        <?php
            settings_fields($this->salesforce_integration);
            do_settings_sections($this->salesforce_integration);
        ?>

        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="sfclientid">Client id</label>
                </th>
                <td><input type="text" value="<?php echo esc_attr(get_option('sfclientid')); ?>" id="sfclientid"
                           class="regular-text" name="sfclientid"/></td>
            </tr>
            <tr>
                <th scope="row"><label for="sfclientsecret">Client secret</label>
                </th>
                <td><input type="text" value="<?php echo esc_attr(get_option('sfclientsecret')); ?>" id="sfclientsecret"
                           class="regular-text" name="sfclientsecret"/></td>
            </tr>
            <tr>
                <th scope="row"><label for="sfmailinglist">Mailing list name</label>
                </th>
                <td><input type="text" value="<?php echo esc_attr(get_option('sfmailinglist')); ?>" id="sfmailinglist"
                           class="regular-text" name="sfmailinglist"/></td>
            </tr>
            <tr>
                <th scope="row"><label for="sfmailinglistid">Mailing list id</label>
                </th>
                <td><input type="text" value="<?php echo esc_attr(get_option('sfmailinglistid')); ?>" id="sfmailinglistid"
                           class="regular-text" name="sfmailinglistid"/></td>
            </tr>
            </tbody>
        </table>
        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
    </form>
</div>