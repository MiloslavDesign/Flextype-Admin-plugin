<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry, Token\Token};
use function Flextype\Component\I18n\__;
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links',   ['pages' => ['url' => Http::getBaseUrl() . '/admin/plugins', 'title' => __('admin_plugins_heading', Registry::get('system.locale'))]])
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>

<form>
    <input type="hidden" name="url" value="<?php echo Http::getBaseUrl() . '/admin/plugins'; ?>">
</form>

<div class="card">
    <div class="card-body no-padding">
        <table class="table no-margin">
            <thead>
                <tr>
                    <th><?php echo __('admin_plugins_name', Registry::get('system.locale')); ?></th>

                    <th class="text-right"><?php echo __('admin_plugins_status', Registry::get('system.locale')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($plugins_list as $key => $plugin) { ?>
                <tr>
                    <td><?php echo $plugin['name']; ?></td>
                    <td class="text-right">
                        <?php if ($key !== 'admin') { ?>
                            <div class="form-group no-margin">
                              <span class="switch switch-sm">
                                <input id="switch-sm-<?php echo $plugin['name']; ?>" type="checkbox" class="switch js-switch" data-plugin="<?php echo $key; ?>" data-token="<?php echo Token::generate(); ?>" <?php if ($plugin['enabled'] == 'true') echo 'checked'; else echo ''; ?> >
                                <label for="switch-sm-<?php echo $plugin['name']; ?>"></label>
                              </span>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
