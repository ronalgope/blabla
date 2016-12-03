  <!-- Header Start -->
  <header id="navigation header-container-box" class="navigation affix-top menu-line" data-offset-top="2" data-spy="affix">
    <div class="container" id="menu-nav">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-xs-6">
          <div class="logo"><a href="/pages/home"><?= $this->Html->image('logo2.png', array('id' => 'logo-header')); ?></a></div>
        </div>
        <!-- /.logo -->
        <div class="col-lg-8 col-md-6 col-xs-6"> <a class="visible-xs" href="#mobile-menu" id="mobile-menu-button"><i class="fa fa-bars"></i></a>
          <nav id="navigation" class="pull-right">
            <ul>

              <?php
                if($user):
               ?>
               <li>
                 <a class="hvr-overline-from-center" href="/profile"><i class="fa fa-sign-in" aria-hidden="true"></i>Profile</a>
               </li>
              <li class="contact-us-top">
                  <a class="hvr-overline-from-center" href="/logout"><i class="fa fa-lock" aria-hidden="true"></i>Logout</a>
              </li>
            <?php else : ?>
              <li>
                <a class="hvr-overline-from-center" href="/users/users/register"><i class="fa fa-sign-in" aria-hidden="true"></i>Daftar</a>
              </li>
              <li class="contact-us-top">
                  <a class="hvr-overline-from-center" href="/login"><i class="fa fa-lock" aria-hidden="true"></i>Masuk</a>
              </li>
            <?php endif;?>
              <li class="login-menu">
                  <a class="hvr-overline-from-center" href="#"><i class="fa fa-users" aria-hidden="true"></i>Forum</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>