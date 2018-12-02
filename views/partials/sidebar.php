<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Html\Html, Registry\Registry, Event\Event, Token\Token, Session\Session};
use function Flextype\Component\I18n\__;
use Flextype\Navigation;
?>
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="flextype-logo">
            <a href="<?php echo Http::getBaseUrl(); ?>/admin">
                FLEXTYPE
            </a>
        </div>
          <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#menu-user">
                      <i class="fas fa-user-circle"></i>
                      <p>
                          <?php echo Session::get('username'); ?>
                          <b class="caret"></b>
                      </p>
                  </a>
                  <div class="collapse" id="menu-user">
                      <ul class="nav">
                          <li class="nav-item">
                              <a class="nav-link" target="_blank" href="<?php echo Http::getBaseUrl(); ?>">
                                  <span class="sidebar-normal"><?php echo __('admin_view_site'); ?></span>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a class="nav-link" href="<?php echo Http::getBaseUrl(); ?>/admin/logout?token=<?php echo Token::generate(); ?>">
                                  <span class="sidebar-normal"><?php echo __('admin_menu_logout'); ?></span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#menu-content">
                    <i class="far fa-file"></i>
                    <p>
                        <?php echo __('admin_menu_content'); ?>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="menu-content">
                    <ul class="nav">
                        <?php foreach (NavigationManager::getItems('content') as $item) { ?>
                            <li class="nav-item">
                                <?php echo Html::anchor('<span class="sidebar-normal">'.$item['title'].'</span>', $item['link'], $item['attributes']); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#menu-extends">
                    <i class="fas fa-plug"></i>
                    <p>
                        <?php echo __('admin_menu_extends'); ?>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="menu-extends">
                    <ul class="nav">
                        <?php foreach (NavigationManager::getItems('extends') as $item) { ?>
                            <li class="nav-item">
                                <?php echo Html::anchor('<span class="sidebar-normal">'.$item['title'].'</span>', $item['link'], $item['attributes']); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#menu-system">
                    <i class="fas fa-cog"></i>
                    <p>
                        <?php echo __('admin_menu_system'); ?>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="menu-system">
                    <ul class="nav">
                        <?php foreach (NavigationManager::getItems('settings') as $item) { ?>
                            <li class="nav-item">
                                <?php echo Html::anchor('<span class="sidebar-normal">'.$item['title'].'</span>', $item['link'], $item['attributes']); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#menu-help">
                    <i class="fas fa-info-circle"></i>
                    <p>
                        <?php echo __('admin_menu_help'); ?>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="menu-help">
                    <ul class="nav">
                        <?php foreach (NavigationManager::getItems('help') as $item) { ?>
                            <li class="nav-item">
                                <?php echo Html::anchor('<span class="sidebar-normal">'.$item['title'].'</span>', $item['link'], $item['attributes']); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="sidebar-off-canvas"></div>
